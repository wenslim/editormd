<?php

namespace Wenslim\editormd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class Editor
{
    public function uploadImage(Request $request)
    {
        // editormd 返回值
        $arr = [
            'success' => 0,
            'message' => '',
            'url' => '',
        ];
        // 上传图片的表单 name 为 editormd-image-file
        if ($request -> hasFile('editormd-image-file')) {
            // 验证
            $validator = Validator::make($request -> all(), [
                'editormd-image-file' => 'max:' . config('editormd.imageSize')
            ]);

            if ($validator -> fails()) {
                return [
                    'success' => 0,
                    'message' => '图片不能大于 ' . config('editormd.imageSize') . 'kb',
                    'url' => ''
                ];
            }

            // 获取文件对象
            $file = $request -> file('editormd-image-file');
            // 后缀
            $ext = $file -> getClientOriginalExtension();
            // 保存地址
            $savePath = config('editormd.imageSavePath');
            // 创建目录
            if (!is_dir($savePath)) {
                Storage::makeDirectory($savePath);
            }
            $finalPath = $savePath . '/' . uniqid() . '.' . $ext;
            // 移动文件
            $file -> move($savePath, $finalPath);
            return [
                'success' => 1,
                'message' => '上传成功',
                'url' => $finalPath
            ];
        }
    }
}