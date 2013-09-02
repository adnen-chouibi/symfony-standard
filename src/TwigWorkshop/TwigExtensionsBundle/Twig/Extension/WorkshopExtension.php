<?php

namespace TwigWorkshop\TwigExtensionsBundle\Twig\Extension;

use TwigWorkshop\TwigExtensionsBundle\Twig\TokenParser\SleepParser;

class WorkshopExtension extends \Twig_Extension
{
    /**
     * Returns a list of global functions to add to the existing list.
     *
     * @return array An array of global functions
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('class_attribute', 'TwigWorkshop\TwigExtensionsBundle\Twig\Extension\classAttribute', array(
                'needs_environment' => true,
                'is_safe' => array('html')
           )),
        );
    }

    /**
     * Returns a list of tests to add to the existing list.
     *
     * @return array An array of tests
     */
    public function getTests()
    {
        return array(
            new \Twig_SimpleTest('matchingregex', 'TwigWorkshop\TwigExtensionsBundle\Twig\Extension\isMatchingRegex'),
        );
    }

    /**
     * Returns the token parser instance to add to the existing list.
     *
     * @return array An array of \Twig_TokenParser instances
     */
    public function getTokenParsers()
    {
        return array(
            new SleepParser(),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'twig_extensions_workshop';
    }
}

/**
 * Transforms an array (usually a hash in twig) to a class attribute class="..."
 * with the array keys as class names if the corresponding value evaluates to true.
 *
 * If no classes are applied then the class attribute is also not returned
 * because an empty class attribute is invalid html.
 *
 * Example usage
 *
 * <pre>
 * {{ class_attribute({
 *     'promoted': loop.index <= league.promotedNumber,
 *     'relegated': loop.revindex <= league.relegatedNumber,
 *     'withdrawn': teamStanding.withdrawn
 * }) }}
 * </pre>
 *
 * Instead of the traditional version which is verbose and problematic because
 * of whitespace (either hard to read expression sequences or 'spaceless' tag)
 * and empty class attribute (invalid html):
 *
 * <pre>
 * class="{%
 *     if loop.index <= league.promotedNumber %}promoted {% endif %}{%
 *     if loop.revindex <= league.relegatedNumber %}relegated {% endif %}{%
 *     if teamStanding.withdrawn %}withdrawn{% endif %}"
 * </pre>
 *
 * @param \Twig_Environment $env   A Twig_Environment instance
 * @param array             $array The hash to convert to a class attribute
 *
 * @return string
 */
function classAttribute(\Twig_Environment $env, $array)
{
    $classNames = trim(implode(' ', array_keys(array_filter($array))));

    // escape " and ' so the HTML cannot be broken
    // reuse the twig escape filter or alternatively do: htmlspecialchars($classNames, ENT_QUOTES);
    // article about allowed characters in id and class attribute: http://mathiasbynens.be/notes/html5-id-class
    $classNames = twig_escape_filter($env, $classNames, 'html');

    return ('' === $classNames) ? '' : 'class="' . $classNames . '"';
}

/**
 * Tests whether a string matches a regex pattern.
 *
 * <pre>
 * {% if 'foobar' is matchingregex('#^fo{2}#') %}yes{% endif %}
 * </pre>
 *
 * @param string $subject
 * @param string $pattern
 *
 * @return boolean|integer
 */
function isMatchingRegex($subject, $pattern)
{
    return preg_match($pattern, $subject);
}
