<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;

class PageController extends Controller
{
    /**
     *
     * @return array
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $blogs = $em->getRepository('BloggerBlogBundle:Blog')->getLatestBlogs();
        return(array('blogs'=>$blogs));
    }

    /**
     *
     * @return array
     * @Template()
     */
    public function aboutAction()
    {
        return array();
    }

    /**
     *
     * @return array
     *
     * @Template()
     */
    public function contactAction()
    {

        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);        

        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Contact enquiry from symblog')
                ->setFrom('send account')       // 发件帐号
                ->setTo('receive account')      // 收件帐号
                ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->set('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');

            return $this->redirect($this->generateUrl('blogger_blogBundle_contact'));
        }



        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                // 表单验证通过，执行一些操作，如发送邮件。
                // doSometing();

                return $this->redirect($this->generateUrl('blogger_blogBundle_contact'));
            }
        }

        return array('form' => $form->createView());
    }    
}
