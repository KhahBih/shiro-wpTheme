<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef3f2449036a79bfeed13ee4316cd3d2
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Extendify\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Extendify\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitef3f2449036a79bfeed13ee4316cd3d2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef3f2449036a79bfeed13ee4316cd3d2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
