<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4deaac7dc3c3a4191b283202e33d2cb3
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4deaac7dc3c3a4191b283202e33d2cb3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4deaac7dc3c3a4191b283202e33d2cb3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}