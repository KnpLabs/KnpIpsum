<?php

namespace Knp\IpsumBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

class IpsumExtension extends \Twig_Extension
{
    protected $loader;
    protected $controller;
    protected $environment;

    public function __construct(FilesystemLoader $loader, $environment)
    {
        $this->loader      = $loader;
        $this->environment = $environment;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'code' => new \Twig_Function_Method($this, 'getCode', array('is_safe' => array('html'))),
        );
    }

    protected function cleanCode($code)
    {
        return rtrim(preg_replace('@^( *\n)*(.*)@s', '$2', htmlspecialchars($code, ENT_QUOTES, 'UTF-8')), "\n\t \r");
    }

    public function getCode($template)
    {
        if ('test' === $this->environment) {
            return;
        }

        $controllerPath = $this->getControllerPath();
        $templatePath = $this->getTemplatePath($template);

        $controller = preg_replace('/^\s{4}/m', '', $this->cleanCode($this->getControllerCode()));
        $template = $this->getTemplateCode($template);

        // remove the code block
        $template = str_replace('{% set code = code(_self) %}', '', $template);
        $template = $this->cleanCode($template);

        $featureName = preg_replace('/^.*Controller\/([^\/]+)Controller\.php\:\d+$/', '$1', $controllerPath);
        $featurePath = realpath(__DIR__ . '/../../Features/'.$featureName.'.feature');
        if (file_exists($featurePath)) {
            $feature = htmlspecialchars(file_get_contents($featurePath), ENT_QUOTES, 'UTF-8');
            $featurePath = preg_replace('/^.*(src\/Knp\/IpsumBundle\/Features)/', '$1', $featurePath);
            $featureContent = <<<FEATURE
<h1>User Story</h1>
<span class="code_path">$featurePath</span>
<pre class="code_block"><code>$feature</code></pre>
FEATURE;
        } else {
            $featureContent = '';
        }

        return <<<EOF
$featureContent
<h1>Controller Code</h1>
<span class="code_path">$controllerPath</span>
<pre class="code_block"><code>$controller</code></pre>

<h1>Template Code</h1>
<span class="code_path">$templatePath</span>
<pre class="code_block"><code>$template</code></pre>
EOF;
    }

    protected function getControllerCode()
    {
        $r = new \ReflectionClass($this->controller[0]);
        $m = $r->getMethod($this->controller[1]);

        $code = file($r->getFilename());

        return '    '.$m->getDocComment()."\n".implode('', array_slice($code, $m->getStartline() - 1, $m->getEndLine() - $m->getStartline() + 1));
    }

    protected function getControllerPath()
    {
        $r = new \ReflectionClass($this->controller[0]);
        $m = $r->getMethod($this->controller[1]);

        return preg_replace('/^.*(src\/Knp\/IpsumBundle\/Controller)/', '$1', $r->getFilename()) . ':' . $m->getStartline();
    }

    protected function getTemplateCode($template)
    {
        return $this->loader->getSource($template->getTemplateName());
    }

    protected function getTemplatePath($template)
    {
        return preg_replace('/Knp([^:]+)\:([^:]+)\:/', 'src/Knp/$1/Resources/views/$2/', $template->getTemplateName());
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'ipsum';
    }
}
