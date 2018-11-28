<h1 align="center">Editor.md in Laravel</h1>

## 简介
Editor.md 编辑器基于 Markdown
整体界面干净整洁, 功能全面很适合做后台发文等编辑器
> 官网地址: http://localhost/sdk/editor.md/examples/
## 演示
![image](https://images.iiiku.com/iiiku/articles/content/20181122TdEpVWEOsi.png)
## 使用
为方便今后开发使用，简化成包，欢迎 star.  
上传图片新增对 upyun「又拍云」 的支持.

### 版本
Laravel version 5.5+
### 安装
```php
$ composer require wenslim/editormd
```
### 生成配置
```php
$ php artisan vendor:publish
...
[x] Provider: Wenslim\editormd\EditorServiceProvider

> x
```
> 说明：选择包的序号

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
    // 开启 emoji 支持
    'emoji' => true,
    // 开启图片上传
    'imageUpload' => true,
    // 自定义存储目录
    'imageSavePath' => 'uploads/images/' . date('Ymd', time()),
    // 允许的图片大小 kb
    'imageSize' => '100',
    /**
     * upyun 设置
     * 
     * 如最终图片位置为 https://images.iiiku.com/test/test_xxxxxxx.png
     * 
     * 注意：请参考下面案例写法，path 不要有多余的 '/'
     */
    // upyun 保存图片的前缀，按照自己喜欢定义
    'savePrefix' => 'test_',
    // upyun 存储地址，如绑定 CNAME 后的二级域名，没有申请 SSL 请用 http://
    'savePath' => 'https://images.iiiku.com',
    // upyun 写入地址，相对 savePath的地址
    'writePath' => '/test/',
];
```
### 发布时
<code>resources / views / articles / create.blade.php</code>
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
> 说明：
1. 请在资源脚本之前引入 Jquery
2. 请为 textarea 的父级元素指明 id 选择器

> 注意：若使用了 laravel mix 项目默认会生成 app.js，其中包含了 jQuery，此时只需要在脚本引入之前加载 app.js 即可，若未使用，可以采取上述引入 cdn 的方式

### 存储时
<code>app / Http / Controllers / ArticlesController.php</code>
```php
use App\Models\Article;

public function store(ArticleRequest $request, Article $article)
{
    $article -> fill($request -> all());
    ...
    $article -> markdown = $request -> input('editor-html-code');
    $article -> save();
}
```
> 说明：
1. 默认存储 content 的原始内容
2. 新增 markdown 字段存储编译后的内容

### 显示时
<code>resources / views / articles / show.blade.php</code>
```php
{!! $article -> markdown !!}
```
> 说明：用于修改时，请读取 content 的内容