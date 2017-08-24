<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit791f96a2e5e91d36228865c412de14f0
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit791f96a2e5e91d36228865c412de14f0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit791f96a2e5e91d36228865c412de14f0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
