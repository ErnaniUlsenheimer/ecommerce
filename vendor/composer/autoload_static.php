<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd4abc31e1d6670b2d4de8222558da0be
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Ernaniulsenheimer\\Ecommerce\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ernaniulsenheimer\\Ecommerce\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd4abc31e1d6670b2d4de8222558da0be::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd4abc31e1d6670b2d4de8222558da0be::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd4abc31e1d6670b2d4de8222558da0be::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd4abc31e1d6670b2d4de8222558da0be::$classMap;

        }, null, ClassLoader::class);
    }
}
