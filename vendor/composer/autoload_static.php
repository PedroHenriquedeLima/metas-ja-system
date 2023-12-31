<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad23897e8b86fd80377eab38dcb2fb83
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad23897e8b86fd80377eab38dcb2fb83::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad23897e8b86fd80377eab38dcb2fb83::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitad23897e8b86fd80377eab38dcb2fb83::$classMap;

        }, null, ClassLoader::class);
    }
}
