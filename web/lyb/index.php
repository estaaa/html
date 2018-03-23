<?php
header('Content-type:text/html;charset=utf-8');
include 'into.php';

// 提交的结果不为空的时候
   $arr[]=array();
//$arr = include 'img.php';
$arr = include 'date.php';

//	print_r($_FILES);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Document</title>
<script src="jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/new_file.css" />
</head>
<style>
</style>
<body>
	<div id="top">
		<div class="center">
			<div class="left">
				<a href="" class="bg1"></a>
				<a href="" class="bg2"></a>
			</div>
			<div class="top_right">
				<a href="" class="bg3">登陆</a>
				<a href="" class="bg34">|</a>
				<a href="" class="bg4">注册</a>
				<p>
					<a href="" class="bg5"></a>
				</p>

				<p class="border">
					<a href="" class="bg6"></a>
				</p>

			</div>
		</div>
	</div>
	<div id="nav">
		<div class="nav_cen">
			<ul>
				<li>
					<a href="">首页</a>
				</li>
				<li>
					<a href="">精选版块</a>
				</li>
				<li>
					<a href="">论坛帮助</a>
				</li>
				<li>
					<a href="">论坛牛人</a>
				</li>
				<li>
					<a href="">论坛地图</a>
				</li>
				<li>
					<a href="">专家问答</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="cen">
 		<?php foreach($arr as $k=>$v): ?>
 		
 			<div class="bor">
			<div class="left">
				<a href=""><!---->
					<img src="images/<?php echo $arr[$k]['fi']['file']['name'];?>" alt="" />
				</a>
				<p><?php echo htmlspecialchars(addslashes($v['uername'])); ?></p>
			</div>
			<div class="right">
				<p>回复于：<?php echo $v['mytime'] ?> </p>
				<h1><?php
    
    $str = $v['content'];
    
    $str = explode(',', $str);
    foreach ($str as $t => $i) {
        $zeng = strchr($str[$t], "/");
        $zeng = substr($zeng, 1, 2);
        // echo ceil($zeng);
        if ($zeng != 0) {
            
            $str[$t] = "<img src='" . $str[$t] . "' />";
            // is_int($str[$t])?$str[$t]:$str[$t];
            echo $str[$t];
        } else {
            echo $str[$t];
        }
    }
    
    // echo htmlspecialchars(addslashes($v['content']));
    ?></h1>
				<h2>
					<a href="javascript:compile(<?php echo $k; ?>)">編輯</a>
					<a href="javascript:href(<?php echo $k; ?>)">刪除</a>
					<a href="javascript:zen(<?php echo $k; ?>)" class="zen">
						对我有用[
						<span><?php echo $arr[$k]['num']=isset($arr[$k]['num'])?$arr[$k]['num']:0; ?></span>
						]
					</a>
					<a href="javascript:jian(<?php echo $k; ?>)" class="jian">
						丢个板砖[
						<span><?php echo $arr[$k]['jian']=isset($arr[$k]['jian'])?$arr[$k]['jian']:0; ?></span>
						]
					</a>
				</h2>
			</div>
		</div>
		 <?php endforeach  ?>
		 <div class="last">
			<div class="moren">
				<img src="images/<?php echo $arr[$k]['fi']['file']['name'];?>" name="img" />
				

			</div>
			<form action="" method="post" enctype="multipart/form-data">
			<input type="button" class="gen_gen" value='更换头像' id="but"/>	
			<input type="file" name='file' class="gen" value='' />
			
				<!--<input type="text" name="jianxiao" class="jianxiao" value='0'/>-->
				<input type="text" name="ico" class="zenjia" />
				<input type="text" name="img_num" class="img_num" value='11' />
				<input type="text" name='mytime' class='time'
					value="<?php date_default_timezone_set('PRC');$mytime=date('Y-m-d H:i:s');$arr[]= $mytime;echo $mytime;?>" />
				<div>
					<p>昵称:</p>
					<input type="text" name="uername" class="name" />
				</div>
				<div class="huif">
					<p>留言:</p>
					<textarea name="content" class="input"></textarea>
				</div>
				<div class="su">
					<input type="submit" class="sub" value="回复" />
				</div>
				<div class="ico">
					<script>
					
		 		$('.last').hover(function(){
		 						$(this).stop().animate({'right':'0px',});
		 					},function(){
		 						$(this).stop().animate({'right':'-800px'});
		 					})
		 		for(var i=1;i<70;i++){
		 						document.write("<img type='image' src=\"qq/"+i+".gif\"/>" )
		 					}
		 				
		 		$(".ico img").click(function(){
		 					var img = $(this).attr('src');
//		 					alert(img)
							$newval=$('.huif .input').val()+","+img+",";
							$('.huif .input').val($newval)
		 				})
		 				
 			$('.last .moren .gen').click(function(){
 				var num= Math.ceil(Math.random()*10);
// 				alert(num)
 				$(this).siblings().attr('src',"img/"+num+".jpg");
   				$(this).parents('.last').find('form .img_num').attr('value',num)
 			})
		 			</script>

				</div>
			</form>
		</div>

	</div>
	<script>
 	
 		function zen(num){
				var a = $('.right h2 a.zen').eq(num).find('span').html();
				a++; 				
   				$('.right h2 a.zen').eq(num).find('span').html(a);
   				location.href="xen.php?num="+num+'.'+a;				
 		}
 			
 		function jian(num){
				var a = $('.right h2 a.jian').eq(num).find('span').html();
				a++; 				
   				$('.right h2 a.jian').eq(num).find('span').html(a);
   				location.href="jian.php?num="+num+'.'+a;				
 		}
 		function href(k){
 				if(confirm('您確定要刪除嗎')){
 					location.href="del.php?k="+k;
 				}
 				
 			}
 	   function compile(k){
 				if(confirm('您確定要编辑嗎')){
 					location.href='compile.php?k='+k;
 				}
 			}
 		
 	
 		</script>
</body>
</html>