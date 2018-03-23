<?php 
class Code{
	//验证码宽
	private $width;
	//验证码高
	private $height;
	//背景颜色
	private $bgColor;
	//图像资源
	private $img;
	//字体大小
	private $size;
	//验证码长度
	private $len;
	//字体文件
	private $fontfile;
	//种子
	private $seed;
	
	/**
	 * 初始化函数
	 */
	public function __construct($width=NULL,$height=NULL,$bgColor=NULL,$size=NULL,$len=NULL,$fontfile=NULL,$seed=NULL){
		//宽
		$this->width = is_null($width) ? 200 : $width;
		//高
		$this->height = is_null($height) ? 50 : $height;
		//背景颜色
		$this->bgColor = is_null($bgColor) ? '#ffffff' : $bgColor;
		//字体大小
		$this->size = is_null($size) ? '35' : $size;
		//长度
		$this->len = is_null($len) ? C('CODE_LEN') : $len;
		//字体文件
		$this->fontfile = is_null($fontfile) ? FONT_PATH . '/font.ttf' : $fontfile;
		//种子
		$this->seed = is_null($seed) ? 'qwetyuiopasdfghjklzxcvbnm1234567890' : $seed;
	}
	
	/**
	 * 显示验证码
	 */
	public function show(){
		//1.发送头部
		header('Content-type:image/png');
		//2.创建画布 填充颜色
		$this->createBg();
		//3.写字
		$this->write();
		//5.干扰
		$this->makeTrouble();
		//6.输出
		imagepng($this->img);
		//7.销毁
		imagedestroy($this->img);
	}
	
	/**
	 * 创建背景，填充
	 */
	private function createBg(){
		//创建画布
		$img = imagecreatetruecolor($this->width, $this->height);
		//转换颜色16进制转换为10进制，这样就可以被imagefill来使用了		
		$color = hexdec($this->bgColor);
		//填充
		imagefill($img, 0, 0, $color);
		//保存到属性中
		$this->img = $img;
	}
	
	/**
	 * 写字
	 */
	private function write(){
		$code = '';
		//循环写字
		for ($i=0; $i < $this->len; $i++) {
			//字体x坐标
			$x = $i * ($this->width / $this->len) + 10; 
			//字体y坐标
			$y = ($this->height + $this->size) / 2;
			//随机颜色
			$color = imagecolorallocate($this->img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
			//字
			$text = $this->seed[mt_rand(0, strlen($this->seed) - 1)];
			$code .= $text;
			//写字
			imagettftext($this->img, $this->size, mt_rand(-45, 45), $x, $y, $color, $this->fontfile, $text);
		}
		
		$_SESSION['code'] = strtoupper($code);
		
	}
	
	
	private function makeTrouble(){
		for ($i=0; $i < 500; $i++) {
			//随机颜色
			$color = imagecolorallocate($this->img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
			//点
			imagesetpixel($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
		}
	}
	
	
}











 ?>