<h1 align="center">Editor.md in Laravel</h1>

## 简介
Editor.md 编辑器基于 Markdown
整体界面干净整洁, 功能全面很适合做后台发文等编辑器
> 官网地址: http://localhost/sdk/editor.md/examples/
## 演示
![image](https://github.com/wenslim/editormd/raw/master/images/editormd.png)
## 使用
### 版本
Laravel version 5.5+
### 安装
```php
$ composer require wenslim/editormd
```
### 生成配置
```php
$ php artisan vendor:publish
```

<code>config / editormd.php</code>
```php
<?php

return [
    // textarea 容器的 id
    "id" => 'editor',
    // 编辑器宽高
    'width' => '100%',
    'height' => '500',
    // lib 类库地址
    'path' => '/vendor/editormd/lib/',
    // 顶部工具栏主题 白 - default | 黑 - dark
    'theme' => 'default',
    // 编辑区域主题 - 更多主题 vendor / editormd / lib / codemirror / theme 的 css 名称
    'editorTheme'=> 'default',
    // 显式区域主题 白 - default | 黑 - dark
    'previewTheme'=> 'default',
    // 编辑器初始化内容
    'markdown' => 'md',
    // 代码折叠
    'codeFold' => true,
    // 实时同步
    'syncScrolling' => true,
    // 保存 HTML 到 Textarea
    'saveHTMLToTextarea' => true,
    // 搜索替换
    'searchReplace' => true,
    // 开启图片上传
    'imageUpload' => true,
    // 自定义存储目录
    'imageSavePath' => 'uploads/images/' . date('Ymd', time())
];
```
### 模版使用
<code>resources / views / xxx.blade.php</code>
```php
<head>
{!! editormd_style() !!}
</head>
<body>
    <div id="editor">
        <textarea></textarea>
    </div>
    <script src="https://cdn.bootcss.com/jquery/2.2.3/jquery.js"></script>
    {!! editormd_script() !!}
</body>
``` 
> 说明：在 {!! editormd_script() !!} 之前需要引入 jquery, 如果使用 Laravel Mix 默认会加载 jquery
若不适用, 可以通过上述 cdn 方式
