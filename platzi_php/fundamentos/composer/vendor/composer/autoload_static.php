<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3fe10c0ee2b673f2ff259b1bc55de30d
{
    public static $files = array (
        '7df5c205f056903d05209ffafff172c8' => __DIR__ . '/../..' . '/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Text\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Text\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3fe10c0ee2b673f2ff259b1bc55de30d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3fe10c0ee2b673f2ff259b1bc55de30d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
