<?php /* Smarty version 2.6.26, created on 2015-05-31 14:46:56
         compiled from ../Common/ask.html */ ?>
<!-- 左侧 -->
<div id='left'>
      <div class='userinfo'>
         <dl>
            <dt>
               <a href=""><img src="<?php if ($this->_tpl_vars['path']): ?><?php echo $this->_tpl_vars['path']; ?>
<?php else: ?><?php echo @__PUBLIC__; ?>
/Images/noface.gif<?php endif; ?>" width='48' height='48' alt="占位符"/></a>
            </dt>
            <dd class='username'>
               <a href=""><b>后盾网</b>
               </a>
               <a href="">
                  <i class='level lv1' title='Level 1'></i>
               </a>
            </dd>
            <dd>金币：<a href="" style="color: #888888;"><b class='point'><?php echo $this->_tpl_vars['userr']['point']; ?>
</b></a></dd>
            <dd>经验值：<?php echo $this->_tpl_vars['userr']['exp']; ?>
</dd>
         </dl>
         <table>
            <tr>
               <td>回答数</td>
               <td>采纳率</td>
               <td class='last'>提问数</td>
            </tr>
            <tr>
               <td><a href=""><?php echo $this->_tpl_vars['userr']['answer']; ?>
</a></td>
               <td><a href=""><?php echo $this->_tpl_vars['userr']['cai']; ?>
</a></td>
               <td class='last'><a href=""><?php echo $this->_tpl_vars['userr']['ask']; ?>
</a></td>
            </tr>
         </table>
      </div>

   <ul>
      <li class='myhome <?php if ($_GET['a'] == null): ?>cur<?php endif; ?>'>
         <a href="<?php echo @__APP__; ?>
?c=member">我的首页</a>
      </li>
      <li class='myask <?php if ($_GET['a'] == ask): ?>cur<?php endif; ?>'>
         <a href="<?php echo @__APP__; ?>
?c=member&a=ask">我的提问</a>
      </li>
      <li class='myanswer <?php if ($_GET['a'] == answer): ?>cur<?php endif; ?>'>
         <a href="<?php echo @__APP__; ?>
?c=member&a=answer">我的回答</a>
      </li>
      <li class='mylevel <?php if ($_GET['a'] == level): ?>cur<?php endif; ?>'>
         <a href="<?php echo @__APP__; ?>
?c=member&a=level">我的等级</a>
      </li>
      <li class='mygold <?php if ($_GET['a'] == point): ?>cur<?php endif; ?>'>
         <a href="<?php echo @__APP__; ?>
?c=member&a=point">我的金币</a>
      </li>
      <li class='myface <?php if ($_GET['a'] == face): ?>cur<?php endif; ?>'>
         <a href="<?php echo @__APP__; ?>
?c=member&a=face">上传头像</a>
      </li>

      <li style="background:none"></li>
   </ul>
</div>