// JavaScript Document
/**powered By 千百度 2015/4/22
 * [drag 用于同一页面多个同名Class安放拖拽事件]
 * @param  {[type]} parent [父级元素名]
 * @param  {[type]} child  [子集元素名]
 * @param  {[type]} path   [父级+子集完整路径]
 *
 *demo:   drag("#main",'.box','#main .box');
 * 
 */

	function drag(parent,child,path){
		// 鼠标移入时判断下鼠标所在位置的index();
		$(parent).find(child).hover(function() {
		// 记录元素index()
		 l= $(this).index(path);
		// 拖拽事件
		 $(path).eq(l).mousedown(function(event) {
			// 获取鼠标按下时的xy坐标
			oldMouseX=event.pageX;
			oldMouseY=event.pageY;
			// 获取记录元素的默认初始值
			oldBlockX=$(this).offset().left;
			oldBlockY=$(this).offset().top;
			$(document).mousemove(function(e) {
				// alert('')
				// 获取移动鼠标位置
				var newMouseX = e.pageX;
				var newMouseY = e.pageY;

				// 新的鼠标位置- 就得鼠标位置 的出移动距离
				diffX = newMouseX -oldMouseX;
				diffY = newMouseY -oldMouseY;

				// 计算新的区块位置
				newBlockX = oldBlockX + diffX;
				newBlockY = oldBlockY + diffY-200;
				// alert(newBlockX)
				// 获取页面最大可视区域宽高
				windowW = document.documentElement.clientWidth;
				windowH = document.documentElement.clientHeight;
				// 获取区块宽高
				blockW = $(path).eq(l).outerWidth() ;
				blockH = $(path).eq(l).outerHeight() ;

				// 获取最大也移动宽高
				bigW = windowW - blockW;
				bigH = windowH - blockH;
				// 位置判断 是否超出边界
				if(newBlockX<=0){
					newBlockX=0;
				}

				if(newBlockX>=bigW){
					newBlockX = bigW;
				}
				if(newBlockY<=0){
					newBlockY=0;
				}
				if(newBlockY>=bigH){
					newBlockY = bigH;
				}

				// 把差值赋默认区块位置
				$(path).eq(l).css({'left':newBlockX +'px','top':newBlockY +'px'});
			})

		})
		// 鼠标按键抬起清楚事件
		$(document).mouseup(function() {
			$(document).off('mousemove');
		});

	})
}	