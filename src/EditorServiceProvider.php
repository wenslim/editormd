<?php

namespace Wenslim\editormd;
use Illuminate\Support\ServiceProvider;

class EditorServiceProvider extends ServiceProvider
{
    // php artisan vendor:publish --tag=editormd
    public function boot()
    {
        // 发布资源文件 - 标签 editormd
        $this -> publishes([
            __DIR__ . '/../public/' => public_path('/'),
        ]);

        // 发布配置文件
        $this -> publishes([
            __DIR__ . '/../config/editormd.php' => config_path('editormd.php'),
        ]);

        // 发布路由
        $this -> loadRoutesFrom(__DIR__ . '/../bootstrap/route.php');
    }

    public function register()
    {
        $this -> app -> singleton(Editor::class, function(){
            return new Editor(
                config('services.editormd.upyun.name'), 
                config('services.editormd.upyun.user'),
                config('services.editormd.upyun.password')
            );
        });
    }
}