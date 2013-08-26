<?php

namespace SymfonyWorkshop\FilesystemRoutingBundle\Routing;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use SymfonyWorkshop\FilesystemRoutingBundle\Util\ClassNameExtraction;

class FilesystemLoader extends FileLoader
{
    public function load($resource, $type = null)
    {
        $routes = new RouteCollection();

        $baseDir = new \RecursiveDirectoryIterator($resource);
        $iterator = new \RecursiveIteratorIterator($baseDir);

        foreach ($iterator as $path => $splFileInfo) {
            if ('php' !== $splFileInfo->getExtension()) {
                continue;
            }

            // remove the base directory and the php extension from the path
            // also transform windows backslashes to forward slashes
            $path = str_replace('\\', '/', substr($splFileInfo->getPathname(), strlen($resource), -4));

            // we simply give the route the same name as the path but with underscores
            $routeName = str_replace('/', '_', $path);

            $controller = ClassNameExtraction::getClassNameInFile($splFileInfo->getPathname()) . '::' . 'getAction';

            $route = new Route($path, array('_controller' => $controller));
            $route->setMethods('GET');
            $routes->add($routeName, $route);
        }

        return $routes;
    }

    public function supports($resource, $type = null)
    {
        return 'filesystem' === $type;
    }
}
