<?php

/* BloggerBlogBundle:Comment:create.html.twig */
class __TwigTemplate_bcbe69385e6b0b24a463babd0c110248160517ec48b0e9cdb1d1720d822762fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BloggerBlogBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BloggerBlogBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Add Comment";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Add comment for blog post \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "blog", array()), "title", array()), "html", null, true);
        echo "\"</h1>
    ";
        // line 7
        $this->env->loadTemplate("BloggerBlogBundle:Comment:form.html.twig")->display(array_merge($context, array("form" => (isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")))));
    }

    public function getTemplateName()
    {
        return "BloggerBlogBundle:Comment:create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 7,  38 => 6,  35 => 5,  29 => 3,);
    }
}
