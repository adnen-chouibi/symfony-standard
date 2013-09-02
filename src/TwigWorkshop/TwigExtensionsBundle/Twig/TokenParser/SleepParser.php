<?php

namespace TwigWorkshop\TwigExtensionsBundle\Twig\TokenParser;

use TwigWorkshop\TwigExtensionsBundle\Twig\Node\SleepNode;

class SleepParser extends \Twig_TokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param \Twig_Token $token A Twig_Token instance
     *
     * @return \Twig_NodeInterface A Twig_NodeInterface instance
     */
    public function parse(\Twig_Token $token)
    {
        $lineno = $token->getLine();

        $expr = null;
        if (!$this->parser->getStream()->test(\Twig_Token::BLOCK_END_TYPE)) {
            $expr = $this->parser->getExpressionParser()->parseExpression();
        }
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

        return new SleepNode($expr, $lineno, $this->getTag());
    }

    /**
     * Gets the tag name associated with this token parser.
     *
     * @param string The tag name
     */
    public function getTag()
    {
        return 'sleep';
    }
}
