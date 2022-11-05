<?php

/* calc_view.html */
class __TwigTemplate_42381941e1df7b9ce88ed134e9c2079c1a0611ca62e08bc6443f75cca7c10845 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE HTML>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"pl\" lang=\"pl\">
<head>
<meta charset=\"utf-8\" />
<title>Kalkulator</title>
</head>
<body>

<form action=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["_APP_URL"]) ? $context["_APP_URL"] : null), "html", null, true);
        echo "\" method=\"post\">
\t<label for=\"amount\">Kwota: </label>
\t<input id=\"amount\" type=\"text\" name=\"amount\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : null), "html", null, true);
        echo "\" /><br />
\t<label for=\"years\">Lata: </label>
\t<input id=\"years\" type=\"text\" name=\"years\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["years"]) ? $context["years"] : null), "html", null, true);
        echo "\" /><br />
\t<label for=\"interest\">Oprocentowanie: </label>
\t<input id=\"interest\" type=\"text\" name=\"interest\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["interest"]) ? $context["interest"] : null), "html", null, true);
        echo "\" /><br />
\t<input type=\"submit\" value=\"Oblicz\" />
</form>";
        // line 19
        if ((twig_length_filter($this->env, (isset($context["messages"]) ? $context["messages"] : null)) > 0)) {
            echo " \t
\t\t<ol style=\"margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;\">";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 22
                echo "\t\t\t<li>";
                echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
                echo " </li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "\t\t</ol>";
        }
        // line 26
        if ((isset($context["result"]) ? $context["result"] : null)) {
            // line 27
            echo "<div style=\"margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;\">\t
\tMiesięczna rata:";
            // line 28
            echo twig_escape_filter($this->env, (isset($context["result"]) ? $context["result"] : null), "html", null, true);
            echo " \t
</div>";
        }
        // line 31
        echo "</body>
</html>";
    }

    public function getTemplateName()
    {
        return "calc_view.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 31,  73 => 28,  70 => 27,  68 => 26,  65 => 24,  57 => 22,  53 => 21,  49 => 19,  44 => 15,  39 => 13,  34 => 11,  29 => 9,  19 => 1,);
    }
}
/* <!DOCTYPE HTML>*/
/* <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">*/
/* <head>*/
/* <meta charset="utf-8" />*/
/* <title>Kalkulator</title>*/
/* </head>*/
/* <body>*/
/* */
/* <form action="{{_APP_URL}}" method="post">*/
/* 	<label for="amount">Kwota: </label>*/
/* 	<input id="amount" type="text" name="amount" value="{{ amount }}" /><br />*/
/* 	<label for="years">Lata: </label>*/
/* 	<input id="years" type="text" name="years" value="{{ years }}" /><br />*/
/* 	<label for="interest">Oprocentowanie: </label>*/
/* 	<input id="interest" type="text" name="interest" value="{{ interest  }}" /><br />*/
/* 	<input type="submit" value="Oblicz" />*/
/* </form>	*/
/* */
/* {% if messages | length >0 %} 	*/
/* 		<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">*/
/* 			{% for msg in messages %}*/
/* 			<li> {{msg}} </li>*/
/* 		{% endfor %}*/
/* 		</ol>*/
/* {% endif %}*/
/* {% if result %}*/
/* <div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">	*/
/* 	Miesięczna rata: {{result}} 	*/
/* </div>*/
/* 	{% endif %}*/
/* </body>*/
/* </html>*/
