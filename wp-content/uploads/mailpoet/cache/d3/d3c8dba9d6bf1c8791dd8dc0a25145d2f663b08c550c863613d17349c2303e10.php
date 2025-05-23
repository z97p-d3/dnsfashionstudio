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

/* emails/newSubscriberNotification.txt */
class __TwigTemplate_46b9d1102060f21cb71944c747fdf188f293bffeb2ba0266bebc2f235e4172fc extends Template
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
        echo $this->extensions['MailPoet\Twig\I18n']->translate("Howdy,");
        echo "

";
        // line 3
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_replace_filter($this->extensions['MailPoet\Twig\I18n']->translate("The subscriber %1\$s has just subscribed to your list %2\$s!"), ["%1\$s" =>         // line 4
($context["subscriber_email"] ?? null), "%2\$s" => ($context["segments_names"] ?? null)]), "html", null, true);
        // line 5
        echo "

";
        // line 7
        echo $this->extensions['MailPoet\Twig\I18n']->translate("Cheers,");
        echo "
";
        // line 8
        echo $this->extensions['MailPoet\Twig\I18n']->translate("The MailPoet Plugin");
        echo "

";
        // line 10
        echo $this->extensions['MailPoet\Twig\I18n']->translate("You can disable these emails in your MailPoet Settings.");
        echo "
";
        // line 11
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["link_settings"] ?? null), "html", null, true);
        echo "

";
        // line 13
        if ((-1 === \MailPoetVendor\twig_compare(\MailPoetVendor\twig_date_format_filter($this->env, "now", "Y-m-d"), \MailPoetVendor\twig_date_format_filter($this->env, "2018-11-30", "Y-m-d")))) {
            // line 14
            echo "    ";
            echo $this->extensions['MailPoet\Twig\I18n']->translate("PS. MailPoet annual plans are nearly half price for a limited time. Find out more in the Premium page in your admin.");
            echo "
    ";
            // line 15
            echo \MailPoetVendor\twig_escape_filter($this->env, ($context["link_premium"] ?? null), "html", null, true);
            echo "
";
        }
        // line 17
        echo "
";
    }

    public function getTemplateName()
    {
        return "emails/newSubscriberNotification.txt";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 17,  74 => 15,  69 => 14,  67 => 13,  62 => 11,  58 => 10,  53 => 8,  49 => 7,  45 => 5,  43 => 4,  42 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "emails/newSubscriberNotification.txt", "/home/u223292802/domains/designypatronesdns.com/public_html/wp-content/plugins/mailpoet/views/emails/newSubscriberNotification.txt");
    }
}
