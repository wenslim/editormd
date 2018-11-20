<?php

return [
    // 宽高
    'width' => '100%',
    'height' => '700',
    // Autoload modules mode, codemirror, marked... dependents libs path
    'path' => '/vendor/editormd/lib/',
    // 主题 default | dark
    'theme' => "dark",
    // 显式与编辑区域主题
    'previewTheme'=> "dark",
    'editorTheme'=> "pastel-on-dark",
    'markdown' => md,
    // 代码折叠
    'codeFold' => true,
    // syncScrolling : false,
    // 保存 HTML 到 Textarea
    'saveHTMLToTextarea' => true,
    // 搜索替换
    'searchReplace' => true,
    // 关闭实时预览
    // watch : false,
    // 开启 HTML 标签解析，为了安全性，默认不开启
    'htmlDecode' => "style,script,iframe|on*",  
    // toolbar  : false, //关闭工具栏
    // 关闭预览 HTML 的代码块高亮，默认开启
    // previewCodeHighlight : false,
    'emoji' => true,
    'taskList' => true,
    'tocm' => true,                  // Using [TOCM]
    'tex' => true,                   // 开启科学公式TeX语言支持，默认关闭
    'flowChart' => true,             // 开启流程图支持，默认关闭
    'sequenceDiagram' => true,       // 开启时序/序列图支持，默认关闭,
    //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
    //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
    //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
    //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
    //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff

    /**
     * 图片相关操作
     */
    'imageUpload' => true,
    'imageFormats' => ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
    'imageUploadURL' => "./php/upload.php",
];