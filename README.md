Symfony Techtalk Edition
========================

[![Build Status](https://secure.travis-ci.org/liip-forks/symfony-standard.png?branch=techtalk)](http://travis-ci.org/liip-forks/symfony-standard)

This is a fork of the Symfony Standard Edition that adds various Bundles
and configuration options that I use for demo purposes.

You can read the original README.md here:
https://github.com/symfony/symfony-standard/blob/master/README.md

Installation instructions:
--------------------------

After cloning make sure to switch to the ``techtalk`` branch

```
git checkout techtalk
```

Then follow the installation instructions at the above url.

As a reminder, make sure to ensure that the ``app/cache`` and ``app/logs``
directories are write-able for the web server (and also for the CLI):
http://symfony.com/doc/current/book/installation.html#configuration-and-setup

Please also make the ``web`` dir writeable if you want to try out the
LiipImagineBundle.

Install the FOSUserBundle schema:
```
app/console doctrine:schema:create
```

And the PHPCR Doctrine DBAL schema:
```
app/console doctrine:phpcr:init:dbal
app/console doctrine:phpcr:repository:init
```

List of additional bundles and libs:
------------------------------------

    * doctrine-phpcr-odm, jackalope, jackalope-doctrine-dbal, phpcr, phpcr-utils

    * DoctrinePHPCRBundle
    * DoctrineFixturesBundle

    * FOSUserBundle
    * FOSRestBundle
    * FOSHttpCacheBundle

    * LiipContainerWrapperBundle
    * LiipHelloBundle
    * LiipHyphenatorBundle (and OrgHeiglHyphenator)
    * LiipThemeBundle
    * LiipImagineBundle (and imagine lib)
    * LiipFunctionalTestBundle
    * LiipMonitorBundle
    * LiipCodeBundle

    * JMSAopBundle (and cg-library)
    * JMSSerializerBundle
    * JMSDebuggingBundle

    * NelmioApiDocBundle

    * IncenteevParameterHandler

Example URLs to call:
---------------------

HTML output:
http://symfony-standard.lo/app_dev.php/liip/hello/foo

JSON output:
http://symfony-standard.lo/app_dev.php/liip/hello/foo.json

XML output:
http://symfony-standard.lo/app_dev.php/liip/hello/foo.xml

Redirect to the '_welcome' route:
http://symfony-standard.lo/app_dev.php/liip/hello

JSON (actually JSON-LD) output using a custom serialization handler:
http://symfony-standard.lo/app_dev.php/liip/serializer.json
XML output using a custom serialization handler:
http://symfony-standard.lo/app_dev.php/liip/serializer.xml

Requires PHPCR ODM and Jackrabbit to be installed:
http://symfony-standard.lo/app_dev.php/liip/phpcr/bar

Using a parameter converter (after calling the previous url):
http://symfony-standard.lo/app_dev.php/liip/phpcr/convert/bar

Using the SensioFrameworkExtraBundle together with the RestBundle view layer:
http://symfony-standard.lo/app_dev.php/liip/extra/foo

Using the SensioFrameworkExtraBundle together with the RestBundle view layer outputting json:
http://symfony-standard.lo/app_dev.php/liip/extra/foo.json

Using the SensioFrameworkExtraBundle together with the RestBundle view layer to redirect to the '_welcome' route:
http://symfony-standard.lo/app_dev.php/liip/extra

Using the FOSRestBundle routing generation
http://symfony-standard.lo/app_dev.php/liip/hello/rest/articles
http://symfony-standard.lo/app_dev.php/liip/hello/rest/article
http://symfony-standard.lo/app_dev.php/liip/hello/rest/articles/new

Using the FOSRestBundle ExceptionController
http://symfony-standard.lo/app_dev.php/liip/exception.html

Using the FOSRestBundle to handle a failed validation
http://symfony-standard.lo/app_dev.php/liip/validation_failure.json

Using the FOSRestBundle to handle a jsonp request
http://symfony-standard.lo/app_dev.php/liip/jsonp?callback=lala

Using the LiipHyphenatorBundle
http://symfony-standard.lo/app_dev.php/liip/hyphenator

Using a custom handler with FOSRestBundle to generate RSS
http://symfony-standard.lo/app_dev.php/liip/customHandler.rss

Using the LiipImagineBundle
http://symfony-standard.lo/app_dev.php/liip/imagine

Using the NelmioApiDocBundle
http://symfony-standard.lo/app_dev.php/api/doc/
http://symfony-standard.lo/app_dev.php/liip/hello/rest/articles?_doc=1
