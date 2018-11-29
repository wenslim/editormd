<?php

namespace Wenslim\editormd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Upyun\Upyun;
use Upyun\Config;

class Editor
{
    // 配置
    private $name;
    private $user;
    private $password;

    public function __construct($name = '', $user = '', $password = '')
    {
        $this -> name = $name;
        $this -> user = $user;
        $this -> password = $password;
    }

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

            $saveType = config('editormd.saveType');
            if ($saveType == 'default') {
                // 保存地址 - 本地
                $savePath = config('editormd.imageSavePath');
                // 创建目录
                if (!is_dir($savePath)) {
                    Storage::makeDirectory($savePath);
                }
                $finalPath = $savePath . '/' . uniqid() . '.' . $ext;
                // 移动文件
                $file -> move($savePath, $finalPath);
                $url = $finalPath;
            } else if ($saveType == 'upyun') {
                // 初始化配置
                $config = new Config($this -> name, $this -> user, $this -> password);
                $client = new Upyun($config);
                // 保存 upyun
                $savePrefix = config('editormd.savePrefix');
                $savePath = config("editormd.savePath");
                $writePath = config("editormd.writePath");
                $filename = $savePrefix . uniqid();
                $url = $savePath . $writePath. $filename . '.' . $ext;
                $client -> write($writePath . $filename . '.' . $ext, file_get_contents($file), ['x-gmkerl-thumb' => '/format/png']);
            }

            // 返回提示
            return [
                'success' => 1,
                'message' => '上传成功',
                'url' => $url
            ];
        }
    }
}