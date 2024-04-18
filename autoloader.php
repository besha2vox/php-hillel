<?php

spl_autoload_register(
    function (string $className) {
        $classFilePath ='src' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className);
        require_once(__DIR__ .DIRECTORY_SEPARATOR . $classFilePath . '.php');
    }
);