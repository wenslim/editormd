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
    'markdown' => 'Enjoy this editor',
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
    // Editormd.php 存储类型 default / upyun
    'saveType' => 'default',
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