<?php
/* default-micro.php --- 
 * 
 * Filename: default-micro.php
 * Description: 
 * Author: Gu Weigang  * Maintainer: 
 * Created: Fri Nov  8 13:48:21 2013 (+0800)
 * Version: 
 * Last-Updated: Fri Nov  8 14:43:31 2013 (+0800)
 *           By: Gu Weigang
 *     Update #: 25
 * 
 */

/* Change Log:
 * 
 * 
 */

/* This program is part of "Baidu Darwin PHP Software"; you can redistribute it and/or
 * modify it under the terms of the Baidu General Private License as
 * published by Baidu Campus.
 * 
 * You should have received a copy of the Baidu General Private License
 * along with this program; see the file COPYING. If not, write to
 * the Baidu Campus NO.10 Shangdi 10th Street Haidian District, Beijing The People's
 * Republic of China, 100085.
 */

/* Code: */

require $system."/loads/default.php";

$di->set('router', function() {
    $router = new \Phalcon\Mvc\Router();
    return $router;
});

$di->set('request', function() {
    return new Phalcon\Http\Request();
});

$application->get('/default', function() use ($application)  {
    echo "Hello, Micro APP";
});