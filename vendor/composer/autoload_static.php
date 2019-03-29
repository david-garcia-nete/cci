<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc26a88ac0de0db66cf6774cda7505b70
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cci\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cci\\' => 
        array (
            0 => __DIR__ . '/../..' . '/examples',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc26a88ac0de0db66cf6774cda7505b70::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc26a88ac0de0db66cf6774cda7505b70::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}