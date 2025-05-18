<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Extension\SandboxExtension;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* newsletter/templates/blocks/social/blockIcon.hbs */
class __TwigTemplate_477f6a0c38bab49a339edc1cfd024381d8696eb45d4447c63d8e462a85f61689 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<a href=\"{{ link }}\" onClick=\"return false;\"><img src=\"{{#ifCond image '!=' ''}}{{ image }}{{ else }}{{ imageMissingSrc }}{{/ifCond}}\" onerror=\"if (this.src != '{{ imageMissingSrc }}') this.src = '{{ imageMissingSrc }}';\" alt=\"{{ text }}\" style=\"width: {{ width }}; height: {{ height }};\"/></a>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/social/blockIcon.hbs";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/social/blockIcon.hbs", "/home/u223292802/domains/designypatronesdns.com/public_html/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/social/blockIcon.hbs");
    }
}
