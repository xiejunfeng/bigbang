<?php
/* clistrap.php --- 
 * 
 * Filename: clistrap.php
 * Description: 
 * Author: Gu Weigang
 * Maintainer: 
 * Created: Tue Feb 19 16:10:36 2013 (+0800)
 * Version: master
 * Last-Updated: Thu Dec  5 10:34:19 2013 (+0800)
 *           By: Gu Weigang
 *     Update #: 12
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
 * the Baidu Campus NO.10 Shangdi 10th Street Haidian District, Beijing The Peaple's
 * Republic of China, 100085.
 */

/* Code: */
$dir = dirname(dirname(__DIR__));
$system = $dir.'/skeleton';
require_once $system.'/apps/Bootstrap.php';
$boostrap = new Bootstrap();
$boostrap->execCliforTest();
$GLOBALS["modules"] = array(
    'sample' => array(
        'className' => 'BullSoft\Sample\Task',
        'path'      => $dir.'/sample/Task.php'
    ),
);

function registerTask($module_name)
{
    $module = $GLOBALS['modules'][$module_name];
    require($module["path"]);
    $obj = new $module["className"];
    $obj->registerAutoloaders();
    $obj->registerServices(getDI());
}

// registerTask($module_name);

/* clistrap.php ends here */