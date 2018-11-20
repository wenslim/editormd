<?php

/**
 * 加载 css
 */
if (!function_exists("editormd_style")) {
    function editormd_style ()
    {
        return '
           <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
           <link rel="stylesheet" href="/vendor/editormd/css/editormd.css"/>
           <link rel="stylesheet" href="/vendor/editormd/css/editormd.preview.css">
           <link rel="stylesheet" href="/vendor/editormd/css/customer.css">
        ';
    }
}

/**
 * 加载 js
 */
if (!function_exists("editormd_script")) {
    function editormd_script ()
    {
        return "
<script src='/vendor/editormd/js/editormd.js'></script>
<script src='/vendor/editormd/lib/marked.min.js'></script>
<script src='/vendor/editormd/lib/prettify.min.js'></script>
<script src='/vendor/editormd/lib/raphael.min.js'></script>
<script src='/vendor/editormd/lib/underscore.min.js'></script>
<script src='/vendor/editormd/lib/sequence-diagram.min.js'></script>
<script src='/vendor/editormd/lib/flowchart.min.js'></script>
<script src='/vendor/editormd/lib/jquery.flowchart.min.js'></script>
<script>
    let editormd;
    $(function () {
        editormd.emoji = {
            path: '//staticfile.qnssl.com/emoji-cheat-sheet/1.0.0/',
            ext: '.png'
        };
        editormd = editormd({
            id: 'editormd',
            width: {config('editormd.width')},
            height: {config('editormd.height')},
            path: {config('editormd.path')},
            theme: {config('editormd.theme')},
            previewTheme: {config('editormd.previewTheme')},
            editorTheme: {config('editormd.editorTheme')},
            markdown: {config('editormd.markdown')},
            codeFold: {config('editormd.codeFold')},
            saveHTMLToTextarea: {config('editormd.saveHTMLToTextarea')},
            searchReplace: {config('editormd.searchReplace')},
            htmlDecode: {config('editormd.htmlDecode')},
            emoji: {config('editormd.emoji')},
            tocm: {config('editormd.tocm')},
            tex: {config('editormd.tex')},
            flowChart: {config('editormd.flowChart')},
            sequenceDiagram: {config('editormd.sequenceDiagram')},
            imageUpload: {config('editormd.imageUpload')},
            imageFormats: {config('editormd.imageFormats')},
            imageUploadURL: {config('editormd.imageUploadURL')},
        });
    })
</script>";
    }
}