<?php

namespace TwigWorkshop\TwigExtensionsBundle\Twig\Node;

class SleepNode extends \Twig_Node
{
    public function __construct(\Twig_Node_Expression $time = null, $lineno = 0, $tag = null)
    {
        parent::__construct(array('time' => $time), array(), $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param \Twig_Compiler A Twig_Compiler instance
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $compiler->addDebugInfo($this);

        $compiler->write("sleep(");

        if (null === $this->getNode('time')) {
            $compiler->write("rand(1,5)");
        } else {
            $compiler->subcompile($this->getNode('time'));
        }

        $compiler->raw(");\n");
    }
}
