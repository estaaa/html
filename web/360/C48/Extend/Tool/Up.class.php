<?php
//创建一个类
class Up  extends Controller{
	//	文件类型
	private $mold;
	//	文件被允许上传的大小
	private $size;
	//	保存错误信息
	private $Error;
	//	上传路径
	private $path;
	//	声明构造函数  用户传递的参数保存在 构造函数里面
	public function __construct($size = NULL, $mold = NULL, $path = NULL) {
		header("Content-type:text/html;charset=utf-8");
		$this -> path =  C('path');
		$this -> mold = C('mold');
		$this -> size = C('size');
	}

	//	组合方法实现功能
	public function group()
{
	
		//		接收方法 并把数组赋值给$arr
		$arr = $this -> newarr();
		$temp = array();
		//		把错误循环出来
		foreach ($arr as $k => $v) {
			//		把单个错误循环出来
			for ($i = 0; $i < count($arr); $i++) {
				if ($arr[$i]['name'] == "") {
					$this -> error('您有部分文件没有上传 请重新上传');
					die;
				}
			}
			if (!$this -> filter($v)){
				$this -> error($this->Error);
			}
			
			//如果能走到下面，则可以上传
			$temp[] = $this->movefile($v);
			
			
	}
	return $temp;
}

	/*
	 * 重组数组
	 * */
	private function newarr() {
		$arr = array();
		//		循环里面的值
		foreach ($_FILES as $v) {
			//			判断$v里面的元素是不是数组 是数组就再次循环
			if (is_array($v['name'])){
				foreach ($v['name'] as $k => $value) {
					$arr[] = array('name' => $value, 'type' => $v['type'][$k], 'tmp_name' => $v['tmp_name'][$k], 'error' => $v['error'][$k], 'size' => $v['size'][$k], );
				}
			}else{
				$arr[] = $v;
			}

		}
		//		最后把数组返回去
		return $arr;
	}

	/*
	 * 筛选功能
	 * */
	private function filter($v) {
	
		$str = ltrim(strrchr($v['name'], '.'),'.');
		switch(true) {
			case !is_uploaded_file($v['tmp_name']):
				$this -> Error = "您上传的文件是不合法的";
				return false;
				
			case !in_array($str,$this->mold):
				$this -> Error = '您上传的格式不被支持';
				return false;
			case $v['size'] > $this->size :
				$this -> Error = '上传文件超过网站配置大小';
				return false;
			//4.4种错误
			case $v['error'] == 1 :
				$this -> Error = '大小超过了 php.ini 中 upload_max_filesize 限制值';
				return false;
			case $v['error'] == 2 :
				$this -> Error = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
				return false;
			case $v['error'] == 3 :
				$this -> Error = '文件只有部分被上传';
				return false;
			case $v['error'] == 4 :
				$this -> Error = '没有文件被上传';
				return false;
			default :
				return true;
		}
	}

	/*
	 * 移动文件
	 * */
	private function movefile($v) {
		$path = rtrim(str_replace('\\', '/', $this -> path), '/');

		is_dir($path) || mkdir($path, 0777, true);

		$type = ltrim(strrchr($v['name'], '.'), '.');
		//组合路径
		$dest = $path . '/' . time() . mt_rand(0, 9999) . '.' . $type;
		//移动上传
		move_uploaded_file($v['tmp_name'], $dest);
		$v['path'] = $dest;
		return $v;
	}

}
?>