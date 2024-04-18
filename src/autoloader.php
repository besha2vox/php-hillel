<?php

spl_autoload_register(
    function (string $className) {
        list($_, $classname) = explode('\\', $className);
        $classFilePath = DIRECTORY_SEPARATOR . "classes/$classname";
        require_once(__DIR__ .DIRECTORY_SEPARATOR . $classFilePath . '.php');
    }
);