<?php

namespace Knp\IpsumBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

class IpsumExtension extends \Twig_Extension
{
    protected $loader;
    protected $controller;

    public function __construct(FilesystemLoader $loader)
    {
        $this->loader = $loader;
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
        $controller = preg_replace('/^\s{4}/m', '', $this->cleanCode($this->getControllerCode()));
        $template = $this->getTemplateCode($template);

        // remove the code block
        $template = str_replace('{% set code = code(_self) %}', '', $template);
        
        $template = $this->cleanCode($template);
        
        return <<<EOF
<h3>Controller Code</h3>
<pre class="code_block"><code>$controller</code></pre>

<h3>Template Code</h3>
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

    protected function getTemplateCode($template)
    {
        return $this->loader->getSource($template->getTemplateName());
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
