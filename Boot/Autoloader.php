<?php

use Components\Exceptions\ClassNotFoundException;

/**
 * Register all classes in a PSR4 compatible manner
 */
spl_autoload_register(
     function ($class) {
         if ($class[0] == '\\') { // if loaded on abstract manner, remove the \
             $class = substr($class, 1);
         }

         // for the being time, we can assume all classes are on a PSR4 compatible
         // folders, without any prefix folders.
         $ds        = DIRECTORY_SEPARATOR;
         $className = strtr($class, "\\", $ds);
         $class     = __DIR__ . "{$ds}..{$ds}{$className}.php";

         if (file_exists($class)) {
             require_once $class;
         }
     }
);

