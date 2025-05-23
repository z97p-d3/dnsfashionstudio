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

/* newsletter/templates/blocks/woocommerceContent/new_account.hbs */
class __TwigTemplate_52cb22c008df7bd90e0c20f6f8bec778496e48c43b1e7259e61f0ea078bd0242 extends Template
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
        echo "<div class=\"mailpoet_tools\"></div>
<div class=\"mailpoet_woocommerce_content_overlay\">
  <p>";
        // line 3
        echo $this->extensions['MailPoet\Twig\I18n']->translate("Autogenerated content by WooCommerce");
        echo "</p>
</div>
<div class=\"mailpoet_content mailpoet_woocommerce_content\" data-automation-id=\"woocommerce_content\">
<p style=\"margin:0 0 16px\">";
        // line 6
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_sprintf($this->extensions['MailPoet\Twig\I18n']->translate("Hi %s,", "woocommerce"), "Elon"), "html", null, true);
        echo "</p>
<p style=\"margin:0 0 16px\">";
        // line 7
        echo \MailPoetVendor\twig_sprintf($this->extensions['MailPoet\Twig\I18n']->translate("Thanks for creating an account on %1\$s. Your username is %2\$s. You can access your account area to view orders, change your password, and more at: %3\$s", "woocommerce"), "{{siteName}}", "<strong>elon.musk</strong>", "<a href=\"http://{{siteAddress}}\" style=\"font-weight:normal;text-decoration:underline\" target=\"_blank\">{{siteAddress}}</a>");
        echo "</p>
<p style=\"margin:0 0 16px\">";
        // line 8
        echo $this->extensions['MailPoet\Twig\I18n']->translate("We look forward to seeing you soon.", "woocommerce");
        echo "</p>
</div>
<div class=\"mailpoet_block_highlight\"></div>";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/woocommerceContent/new_account.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 8,  51 => 7,  47 => 6,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/woocommerceContent/new_account.hbs", "/home/u223292802/domains/designypatronesdns.com/public_html/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/woocommerceContent/new_account.hbs");
    }
}
