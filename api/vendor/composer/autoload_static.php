<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit11755b588ec8d10a3223bc2e3ba12916
{
    public static $files = array (
        'e8aa6e4b5a1db2f56ae794f1505391a8' => __DIR__ . '/..' . '/amphp/amp/lib/functions.php',
        '76cd0796156622033397994f25b0d8fc' => __DIR__ . '/..' . '/amphp/amp/lib/Internal/functions.php',
        '6cd5651c4fef5ed6b63e8d8b8ffbf3cc' => __DIR__ . '/..' . '/amphp/byte-stream/lib/functions.php',
        'bcb7d4fc55f4b1a7e10f5806723e9892' => __DIR__ . '/..' . '/amphp/sync/src/functions.php',
        'e187e371b30897d6dc51cac6a8c94ff6' => __DIR__ . '/..' . '/amphp/sync/src/ConcurrentIterator/functions.php',
        '3da389f428d8ee50333e4391c3f45046' => __DIR__ . '/..' . '/amphp/serialization/src/functions.php',
        '8dc56fe697ca93c4b40d876df1c94584' => __DIR__ . '/..' . '/amphp/process/lib/functions.php',
        '430de19db8b7ee88fdbe5c545d82d33d' => __DIR__ . '/..' . '/amphp/parallel/lib/Context/functions.php',
        '888e1afeed2e8d13ef5a662692091e6e' => __DIR__ . '/..' . '/amphp/parallel/lib/Sync/functions.php',
        '384cf4f2eb4d2f896db72315a76066ad' => __DIR__ . '/..' . '/amphp/parallel/lib/Worker/functions.php',
        '538ca81a9a966a6716601ecf48f4eaef' => __DIR__ . '/..' . '/opis/closure/functions.php',
        '861372841bb4b8ba9fdd215894666f40' => __DIR__ . '/..' . '/amphp/parallel-functions/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Opis\\Closure\\' => 13,
        ),
        'A' => 
        array (
            'Amp\\Sync\\' => 9,
            'Amp\\Serialization\\' => 18,
            'Amp\\Process\\' => 12,
            'Amp\\Parser\\' => 11,
            'Amp\\Parallel\\' => 13,
            'Amp\\ParallelFunctions\\' => 22,
            'Amp\\ByteStream\\' => 15,
            'Amp\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Opis\\Closure\\' => 
        array (
            0 => __DIR__ . '/..' . '/opis/closure/src',
        ),
        'Amp\\Sync\\' => 
        array (
            0 => __DIR__ . '/..' . '/amphp/sync/src',
        ),
        'Amp\\Serialization\\' => 
        array (
            0 => __DIR__ . '/..' . '/amphp/serialization/src',
        ),
        'Amp\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/amphp/process/lib',
        ),
        'Amp\\Parser\\' => 
        array (
            0 => __DIR__ . '/..' . '/amphp/parser/lib',
        ),
        'Amp\\Parallel\\' => 
        array (
            0 => __DIR__ . '/..' . '/amphp/parallel/lib',
        ),
        'Amp\\ParallelFunctions\\' => 
        array (
            0 => __DIR__ . '/..' . '/amphp/parallel-functions/src',
        ),
        'Amp\\ByteStream\\' => 
        array (
            0 => __DIR__ . '/..' . '/amphp/byte-stream/lib',
        ),
        'Amp\\' => 
        array (
            0 => __DIR__ . '/..' . '/amphp/amp/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit11755b588ec8d10a3223bc2e3ba12916::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit11755b588ec8d10a3223bc2e3ba12916::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit11755b588ec8d10a3223bc2e3ba12916::$classMap;

        }, null, ClassLoader::class);
    }
}
