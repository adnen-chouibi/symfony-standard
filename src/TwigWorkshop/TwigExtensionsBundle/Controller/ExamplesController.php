<?php

namespace TwigWorkshop\TwigExtensionsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExamplesController extends Controller
{
    /**
     * @Route("/classattribute", name="twig_workshop_classattribute")
     */
    public function classAttributeAction()
    {
        return $this->render('TwigWorkshopTwigExtensionsBundle::class_attribute.html.twig');
    }

    /**
     * @Route("/matchingregex", name="twig_workshop_matchingregex")
     */
    public function matchingRegexAction()
    {
        return $this->render('TwigWorkshopTwigExtensionsBundle::matchingregex.html.twig');
    }

    /**
     * @Route("/sleep", name="twig_workshop_sleep")
     */
    public function sleepAction()
    {
        return $this->render('TwigWorkshopTwigExtensionsBundle::sleep.html.twig');
    }
}
