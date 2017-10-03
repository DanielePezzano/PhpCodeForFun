<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// bootstrap.php
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('SRC', ROOT . 'src' . DIRECTORY_SEPARATOR);
 
spl_autoload_register(function ($class) {
    $file = SRC . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});