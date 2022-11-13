<?php

/* calc_view.html */
class __TwigTemplate_5d02ee7ce82da094e45af4fce06fc2717c48ee9075b9f9ebbf2ee0dd9df76062 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("main.html", "calc_view.html", 1);
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
        echo twig_escape_filter($this->env, (isset($context["_APP_URL"]) ? $context["_APP_URL"] : null), "html", null, true);
        echo "\" method=\"post\">
\t<label for=\"amount\">Kwota: </label>
\t<input id=\"amount\" type=\"text\" name=\"amount\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : null), "html", null, true);
        echo "\" /><br />
\t<label for=\"years\">Lata: </label>
\t<input id=\"years\" type=\"text\" name=\"years\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["years"]) ? $context["years"] : null), "html", null, true);
        echo "\" /><br />
\t<label for=\"interest\">Oprocentowanie: </label>
\t<input id=\"interest\" type=\"text\" name=\"interest\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["interest"]) ? $context["interest"] : null), "html", null, true);
        echo "\" /><br />
\t<input type=\"submit\" value=\"Oblicz\" />
    <input type=\"hidden\" name=\"action\" value=\"calcCompute\">
</form>";
        // line 15
        if ((isset($context["messages"]) ? $context["messages"] : null)) {
            // line 16
            if ((twig_length_filter($this->env, (isset($context["messages"]) ? $context["messages"] : null)) > 0)) {
                echo " \t
\t\t<ol style=\"margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;\">";
                // line 18
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                    // line 19
                    echo "\t\t\t<li>";
                    echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
                    echo " </li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 21
                echo "\t\t</ol>";
            }
        }
        // line 24
        if ((isset($context["result"]) ? $context["result"] : null)) {
            // line 25
            echo "<div style=\"margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;\">\t
\tMiesięczna rata:";
            // line 26
            echo twig_escape_filter($this->env, (isset($context["result"]) ? $context["result"] : null), "html", null, true);
            echo " \t
</div>";
        }
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
        return array (  82 => 26,  79 => 25,  77 => 24,  73 => 21,  65 => 19,  61 => 18,  57 => 16,  55 => 15,  49 => 10,  44 => 8,  39 => 6,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends "main.html" %}*/
/* {% block content  %}*/
/* */
/* <form action="{{_APP_URL}}" method="post">*/
/* 	<label for="amount">Kwota: </label>*/
/* 	<input id="amount" type="text" name="amount" value="{{ amount }}" /><br />*/
/* 	<label for="years">Lata: </label>*/
/* 	<input id="years" type="text" name="years" value="{{ years }}" /><br />*/
/* 	<label for="interest">Oprocentowanie: </label>*/
/* 	<input id="interest" type="text" name="interest" value="{{ interest  }}" /><br />*/
/* 	<input type="submit" value="Oblicz" />*/
/*     <input type="hidden" name="action" value="calcCompute">*/
/* </form>	*/
/* */
/* {% if messages %}*/
/* {% if messages | length >0 %} 	*/
/* 		<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">*/
/* 			{% for msg in messages %}*/
/* 			<li> {{msg}} </li>*/
/* 		{% endfor %}*/
/* 		</ol>*/
/* {% endif %}*/
/* {% endif %}*/
/* {% if result %}*/
/* <div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">	*/
/* 	Miesięczna rata: {{result}} 	*/
/* </div>*/
/* 	{% endif %}*/
/* */
/* 		{% endblock %}*/
