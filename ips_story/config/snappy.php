<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Snappy PDF / Image Configuration
    |--------------------------------------------------------------------------
    |
    | This option contains settings for PDF generation.
    |
    | Enabled:
    |
    |    Whether to load PDF / Image generation.
    |
    | Binary:
    |
    |    The file path of the wkhtmltopdf / wkhtmltoimage executable.
    |
    | Timout:
    |
    |    The amount of time to wait (in seconds) before PDF / Image generation is stopped.
    |    Setting this to false disables the timeout (unlimited processing time).
    |
    | Options:
    |
    |    The wkhtmltopdf command options. These are passed directly to wkhtmltopdf.
    |    See https://wkhtmltopdf.org/usage/wkhtmltopdf.txt for all options.
    |
    | Env:
    |
    |    The environment variables to set while running the wkhtmltopdf process.
    |
    */

    'pdf' => [
        'enabled' => true,
        // 'binary'  => '"/usr/bin/wkhtmltopdf"', // default
        'binary'  => env('SERVER_LINUX') ?
            base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64') :  // As composer dependency for ubuntu 64 bit
            base_path('vendor/wemersonjanuario/wkhtmltopdf-windows/bin/64bit/wkhtmltopdf.exe'), // As composer dependency for Windows 64 bit
        'timeout' => false,
        'options' => [],
        'env'     => [],



    ],

    'image' => [
        'enabled' => true,
        // 'binary'  => '"/usr/bin/wkhtmltoimage"', // default
        'binary'  => env('SERVER_LINUX') ?
            base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltoimage-amd64') : // As composer dependency for ubuntu 64 bit
            base_path('vendor/wemersonjanuario/wkhtmltopdf-windows/bin/64bit/wkhtmltoimage.exe'), // As composer dependency for Windows 64 bit
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],
];
