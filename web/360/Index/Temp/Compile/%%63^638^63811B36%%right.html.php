<?php /* Smarty version 2.6.26, created on 2015-05-31 17:15:04
         compiled from ../Common/right.html */ ?>
<!-- 右侧 -->
      
      <div id='right'>
      <?php if ($_SESSION['name']): ?>
      <div class='userinfo'>
         <dl>
            <dt>
               <a href="<?php echo @__APP__; ?>
?c=member"><img src="<?php if ($this->_tpl_vars['path']): ?><?php echo $this->_tpl_vars['path']; ?>
<?php else: ?><?php echo @__PUBLIC__; ?>
/Images/noface.gif<?php endif; ?>" width='48' height='48' alt="占位符"/></a>
            </dt>
            <dd class='username'>
               <a href="">
                  <b></b>
               </a>
               <a href="">
                  <i class='level lv1' title='Level 1'></i>
               </a>
            </dd>
            <dd>金币：<a href="" style="color: #888888;"><?php echo $this->_tpl_vars['user']['point']; ?>
<b class='point'></b></a></dd>
            <dd>经验值：<?php echo $this->_tpl_vars['user']['exp']; ?>
</dd>
         </dl>
         <table>
            <tr>
               <td>回答数</td>
               <td>采纳率</td>
               <td class='last'>提问数</td>
            </tr>
            <tr>
               <td><a href="<?php echo @__APP__; ?>
?c=member&a=ask"><?php echo $this->_tpl_vars['user']['answer']; ?>
</a></td>
               <td><a href="<?php echo @__APP__; ?>
?c=member"><?php echo $this->_tpl_vars['userr']['cai']; ?>
</a></td>
               <td class='last'><a href="<?php echo @__APP__; ?>
?c=member&a=answer"><?php echo $this->_tpl_vars['user']['ask']; ?>
</a></td>
            </tr>
         </table>
         <ul>
            <li><a href="<?php echo @__APP__; ?>
?c=member&a=ask">我提问的</a></li>
            <li><a href="<?php echo @__APP__; ?>
?c=member&a=answer">我回答的</a></li>
         </ul>
      </div>
    
<?php else: ?>
      <div id='right'>
     <div class='r-login'>
         <span class='login'><i></i>&nbsp;登录</span>
         <span class='register'><i></i>&nbsp;注册</span>
      </div>
      </div>
      <?php endif; ?>
      <!-- <div class='r-login'>
         <span class='login'><i></i>&nbsp;登录</span>
         <span class='register'><i></i>&nbsp;注册</span>
      </div> -->
<div class='clear'></div>
   <div class='star'>
      <p class='title'>后盾问答之星</p>
      <span class='star-name'>本日回答问题最多的人</span>
         <div class='star-info'>
            <div>
               <a href="" class='star-face'>
                  <img src="<?php if ($this->_tpl_vars['moreDay']['face'] != ''): ?><?php echo $this->_tpl_vars['moreDay']['face']; ?>
<?php else: ?><?php echo @__PUBLIC__; ?>
/Images/noface.gif<?php endif; ?>" width='48px' height='48px' alt="头像站位"/>
               </a>
               <ul>
                  <li><a href=""><?php echo $this->_tpl_vars['moreDay']['username']; ?>
</a></li>
                  <i class='level lv1' title='Level 1'></i>
               </ul>
            </div>
            <ul class='star-count'>
               <li>回答数：<span><?php echo $this->_tpl_vars['moreDay']['answer']; ?>
</span></li>
               <li>采纳率：<span><?php echo $this->_tpl_vars['moreDay']['cai']; ?>
</span></li>
            </ul>
         </div>
      <span class='star-name'>历史回答问题最多的人</span>

       <div class='star-info'>
            <div>
               <a href="" class='star-face'>
                  <img src="<?php if ($this->_tpl_vars['oldDay']['face'] != ''): ?><?php echo $this->_tpl_vars['oldDay']['face']; ?>
<?php else: ?><?php echo @__PUBLIC__; ?>
/Images/noface.gif<?php endif; ?>" width='48px' height='48px' alt="头像站位"/>
               </a>
               <ul>
                  <li><a href=""><?php echo $this->_tpl_vars['oldDay']['username']; ?>
</a></li>
                  <i class='level lv1' title='Level 1'></i>
               </ul>
            </div>
            <ul class='star-count'>
               <li>回答数：<span><?php echo $this->_tpl_vars['oldDay']['answer']; ?>
</span></li>
               <li>采纳率：<span><?php echo $this->_tpl_vars['oldDay']['cai']; ?>
</span></li>
            </ul>
         </div>
   </div>
   <div class='star-list'>
      <p class='title'>后盾问答助人光荣榜</p>
      <div>
         <ul class='ul-title'>
            <li>用户名</li>
            <li style='text-align:right;'>帮助过的人数</li>
         </ul>
         <ul class='ul-list'>
         <?php $_from = $this->_tpl_vars['maxask']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
            <li>
               <a href=""><i class='rank r1'></i><?php echo $this->_tpl_vars['v']['username']; ?>
</a>
               <span><?php echo $this->_tpl_vars['v']['accept']; ?>
</span>
            </li>
           <?php endforeach; endif; unset($_from); ?>
         </ul>
      </div>
   </div>
</div>

<!-- ---右侧结束---- -->