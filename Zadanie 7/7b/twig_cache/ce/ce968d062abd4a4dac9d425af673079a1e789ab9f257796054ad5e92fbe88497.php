<?php

/* LoginView.html */
class __TwigTemplate_68e2e29c75cf34ec06e9dac2f0fba5fa2db9d8d35bb5ad975f3dd956b55f85e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("main.html", "LoginView.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "main.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "
<form action=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conf"]) ? $context["conf"] : null), "action_url", array()), "html", null, true);
        echo "login\" method=\"post\"  class=\"pure-form pure-form-aligned bottom-margin\">
\t<legend>Logowanie do systemu</legend>
\t<fieldset>
        <div class=\"pure-control-group\">
\t\t\t<label for=\"id_login\">login: </label>
\t\t\t<input id=\"id_login\" type=\"text\" name=\"login\"/>
\t\t</div>
        <div class=\"pure-control-group\">
\t\t\t<label for=\"id_pass\">pass: </label>
\t\t\t<input id=\"id_pass\" type=\"password\" name=\"pass\" /><br />
\t\t</div>
\t\t<div class=\"pure-controls\">
\t\t\t<input type=\"submit\" value=\"zaloguj\" class=\"pure-button pure-button-primary\"/>
\t\t</div>
\t</fieldset>
</form>";
    }

    public function getTemplateName()
    {
        return "LoginView.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends "main.html" %}*/
/* {% block content  %}*/
/* */
/* <form action="{{conf.action_url}}login" method="post"  class="pure-form pure-form-aligned bottom-margin">*/
/* 	<legend>Logowanie do systemu</legend>*/
/* 	<fieldset>*/
/*         <div class="pure-control-group">*/
/* 			<label for="id_login">login: </label>*/
/* 			<input id="id_login" type="text" name="login"/>*/
/* 		</div>*/
/*         <div class="pure-control-group">*/
/* 			<label for="id_pass">pass: </label>*/
/* 			<input id="id_pass" type="password" name="pass" /><br />*/
/* 		</div>*/
/* 		<div class="pure-controls">*/
/* 			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>*/
/* 		</div>*/
/* 	</fieldset>*/
/* </form>	*/
/* */
/* */
/* {% endblock %}*/
/* */
