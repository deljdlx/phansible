<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit465ced96bd79adc87068400777083d80
{
    public static $files = array (
        '1e249af8e9a5384dbff09ea858cfe5c7' => __DIR__ . '/../..' . '/source/helper/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Yaml\\' => 23,
        ),
        'P' => 
        array (
            'Phansible\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Phansible\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mustache' => 
            array (
                0 => __DIR__ . '/..' . '/mustache/mustache/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit465ced96bd79adc87068400777083d80::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit465ced96bd79adc87068400777083d80::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit465ced96bd79adc87068400777083d80::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}