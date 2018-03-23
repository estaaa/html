<?php
namespace Think;
class Moreup{
    public $targetDir=NULL;
    public $uploadDir=NULL;
    public $imgArr=NULL;
    public function group(){
        // 执行头部声明
        $this->header();
        // 判断提交方式
        $this->isPost();
        // 配置文件储存路径
        $this->targetDir = 'upload_tmp';
        $this->uploadDir = './Uploads/Content/';
        $this->toError();
        $this->resultImg();
    }
    /**
     * 声明
     * @return [type] [description]
     */
    public function header(){
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }
    public function isPost(){
        // 判断提交数据的比如post方式 
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit;
        }

        // $_REQUEST是一组数据 包含上传的图片名字 默认是没有debug的 
        if ( !empty($_REQUEST['debug']) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }


        // 设置程序脚本执行的时间数 括号里边的数字是执行时间，如果为零说明永久执行直到程序结束，如果为大于零的数字，则不管程序是否执行完成，到了设定的秒数，程序结束。 
        @set_time_limit(5 * 60);

        // 延长五秒执行
        usleep(2000);
    }


    public function toError(){
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds


        // 判断是不是一个文件
        if (!file_exists($this->targetDir)) {
            @mkdir($this->targetDir);
        }
        // 判断是不是一个文件
        if (!file_exists($this->uploadDir)) {
            @mkdir($this->uploadDir);
        }

        // $_REQUEST["name"]就是上传的文件名字
        // 为变量时说明是单文件上传 
        // 不为空说明是数组
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }

        $md5File = @file('md5list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $md5File = $md5File ? $md5File : array();

        if (isset($_REQUEST["md5"]) && array_search($_REQUEST["md5"], $md5File ) !== FALSE ) {
            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id", "exist": 1}');
        }
        // 组合上传路径
        $filePath = $this->targetDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath = $this->uploadDir . DIRECTORY_SEPARATOR .time().rand(10,100).'.'.basename($_REQUEST['type']);
        // 把图片路径存入一个数组中
        $this->imgArr = basename($uploadPath);
        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


        // 判断目录是否存在
        if ($cleanupTargetDir) {
            if (!is_dir($this->targetDir) || !$dir = opendir($this->targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "上传目录不存在"}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                // $tmpfilePath=upload_tmp\.就是得到的这样的结果
                $tmpfilePath = $this->targetDir . DIRECTORY_SEPARATOR . $file;
                
                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }
               
                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


        // Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }

                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }

                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }

                flock($out, LOCK_UN);
            }
            @fclose($out);
        }
        
    }

    public function resultImg(){
        return $this->imgArr;
    }

}