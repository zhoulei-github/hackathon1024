<?php
/**
 * hackathon1024
 *
 * Author: zhoulei <zhoulei.way@gmail.com>
 * Date: 2015/10/24 14:37:37
 */

class ApiDispatcherController extends BaseController
{
    public function dispatch($path)
    {
        $paths = explode('/', $path);

        if ($paths <= 1) {
            return '';
        }

        $method = array_pop($paths);
        $controller = array_pop($paths);

        $controller = new $controller;
        return $controller->$method();
    }
}