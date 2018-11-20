<?php

namespace Wenslim\editormd;
use Illuminate\Support\ServiceProvider;

class EditorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 发布资源文件 - 标签 editormd
        // php artisan vendor:publish --tag=editormd
        $this -> publishes([
            __DIR__ . '/../public/' => public_path('/'),
        ], 'editormd');

        // 发布配置文件
        $this -> publishes([
            __DIR__ . '/../config/editormd.php' => config_path('editormd.php'),
        ]);
    }
}