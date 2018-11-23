<?php

/**
 * 加载 css
 */
if (!function_exists("editormd_style")) {
    function editormd_style ()
    {
        return <<<style
           <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
           <link rel="stylesheet" href="/vendor/editormd/css/editormd.css"/>
           <link rel="stylesheet" href="/vendor/editormd/css/editormd.preview.css">
style;
    }
}

/**
 * 加载 js
 */
if (!function_exists("editormd_script")) {
    function editormd_script()
    {
        $id = config('editormd.id');
        $width = config('editormd.width');
        $height = config('editormd.height');
        $path = config('editormd.path');
        $theme = config('editormd.theme');
        $previewTheme = config('editormd.previewTheme');
        $editorTheme = config('editormd.editorTheme');
        $markdown = config('editormd.markdown');
        $codeFold = config('editormd.codeFold') == '1' ? 'true' : 'false';
        $syncScrolling = config('editormd.syncScrolling') == '1' ? 'true' : 'false';
        $saveHTMLToTextarea = config('editormd.saveHTMLToTextarea') == '1' ? 'true' : 'false';
        $searchReplace = config('editormd.searchReplace') == '1' ? 'true' : 'false';
        $emoji = config('editormd.emoji') == '1' ? 'true' : 'false';
        $imageUpload = config('editormd.imageUpload') == '1' ? 'true' : 'false';
        $imageUploadURL = config('editormd.imageUploadURL');

        // js 字符串
        $script = <<<script
        <script src="/vendor/editormd/js/editormd.js"></script>
        <script src="/vendor/editormd/lib/marked.min.js"></script>
        <script src="/vendor/editormd/lib/prettify.min.js"></script>
        <script src="/vendor/editormd/lib/raphael.min.js"></script>
        <script src="/vendor/editormd/lib/underscore.min.js"></script>
        <script src="/vendor/editormd/lib/sequence-diagram.min.js"></script>
        <script src="/vendor/editormd/lib/flowchart.min.js"></script>
        <script src="/vendor/editormd/lib/jquery.flowchart.min.js"></script>

        <script>
    let editor;
    $(function () {
        editormd.emoji = {
            path: "//staticfile.qnssl.com/emoji-cheat-sheet/1.0.0/",
            ext: ".png"
        };
        editor = editormd({
            id: '{$id}',
            width: '{$width}',
            height: '{$height}',
            path : '{$path}',
            theme : '{$theme}',
            editorTheme: "{$editorTheme}",
            previewTheme: '{$previewTheme}',
            markdown: '{$markdown}',
            codeFold: {$codeFold},
            syncScrolling: {$syncScrolling},
            saveHTMLToTextarea: {$saveHTMLToTextarea},
            searchReplace: {$searchReplace},
            emoji: {$emoji},
            imageUpload: {$imageUpload},
            imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL: '/wenslim/editormd/uploadImage',
        });
    })
</script>
script;
        
        return $script;
    }
}