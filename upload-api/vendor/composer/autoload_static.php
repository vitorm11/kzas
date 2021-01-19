<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc6be96b7bee18183f67ed7bba6b00662
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc6be96b7bee18183f67ed7bba6b00662::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc6be96b7bee18183f67ed7bba6b00662::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc6be96b7bee18183f67ed7bba6b00662::$classMap;

        }, null, ClassLoader::class);
    }
}