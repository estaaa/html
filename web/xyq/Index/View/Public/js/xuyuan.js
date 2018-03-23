$(function() {
    var windH = $(window).height();
    var windW = $(window).width();
    var x, y, bg, num, renval, crenqi;
    // 点击使浏览功能增加
    $('.box-1').live('click', function() {
        // 改变元素的层级  
        $(this).css({
            zIndex: 2
        }).siblings('.box-1').css({
            zIndex: 0
        });
        // 获取人气的值
        var v = $(this).find('.renqi').html();
        // 获得当前序号
        var vnum = $(this).index();
        a=$('.login a').html();
        // alert(typeof(a=='登陸'))
         if(a=='登陆'){

            // 判断当获取的num值等于0的时候才发送数据  让num的值变为1 下次再点击的时候条件不成立 就不执行了
        if ($(this).attr('num') == 0) {
            // 让人气值自增1;
            crenqi = $(this).find('.renqi').html(parseInt(v) + 1);
            $.ajax({
                url: APP + "?a=ajax_renqi",
                type: 'post',
                data: {
                    ding: v,
                    indnum: vnum
                },
            })
            // 把num的值变为2
            $(this).attr('num', '2')
        }
        // alert(v)
         }
        
    })
    $('form').submit(function() {
        // 定义许愿模块随机的范围
        x = Math.floor(Math.random() * windW) - 550;
        y = Math.floor(Math.random() * 500);
        if (x <= 0) {
            x = 0;
        }
        // 定义随机背景
        bg = [PUBLIC + '/images/1.gif', PUBLIC + '/images/2.gif', PUBLIC + '/images/3.gif', PUBLIC + '/images/4.gif', PUBLIC + '/images/5.gif'];
        // 定义随机背景下标
        num = Math.floor(Math.random() * bg.length);
        // 抓取所有要提交的内容和绑定的随机数
        var fromData = $(this).serialize() + '&left=' + x + '&top=' + y + '&bg=' + bg[num];
        $.ajax({
            url: APP + "?a=ajax_data",
            type: 'post',
            data: fromData,
            // 把php的数据转换成json格式
            dataType: 'json',
            success: function(phpData) {
                // 判断内容为空
                if (phpData != 0) {
                    var messageStr = '';
                    messageStr += '<div class="box-1" num="0">';
                    /*messageStr += '<div class="dele">';
                    messageStr += '<img src="' + PUBLIC + '/images/red-x.png">';
                    messageStr += '</div>';*/
                    messageStr += '<p>字条编号:' + (phpData.leng + 1) + ' 人气: <span class="renqi">' + 0 + '</span></p>';
                    messageStr += '<img src="' + PUBLIC + '/images/55.gif"/>';
                    messageStr += '<h3>To</h3><h4>' + phpData.wish + '</h4><h5>' + phpData.uname + '</h5><div class="box-buttom"><span>评论(0)条</span><a href="javascript:;">' + phpData.time + '</a></div></div>';
                    $('#box').append(messageStr);
                    $('#box .box-1').eq(phpData.leng).css({
                        left: x,
                        top: y,
                        background: "url(" + bg[num] + ")",
                    })
                    return;
                };
                alert('内容填写不完整');
            }
        })
        // z++;
    })
    // 註冊和登陸
    $('#header .center .list a.dl').click(function() {
        $(this).siblings('div.login_list').show();
    })
     $('#header .center .list a.zc').mouseout(function(){
          $('div.enroll_list').show();
      })
    // 註冊
    $('#header .center .list .enroll_list span').click(function() {
        var enroll_name = $('#header .center .list .enroll_list input[name=enroll_name]').val();
        var enroll_pass = $('#header .center .list .enroll_list input[name=pass]').val();
        var enroll_passed = $('#header .center .list .enroll_list input[name=passed]').val();
        $.ajax({
            url: APP + "?c=login",
            type: 'post',
            data: {
                enroll_name: enroll_name,
                pass: enroll_pass,
                passed: enroll_passed
            },
            dataType: 'json',
            success: function(loginData) {
                if (loginData == 3) {
                    $('#header .center .list .enroll_list h2').show().html('*用户名已存在');
                    return;
                }
                if (loginData == 1) {
                    $('#header .center .list .enroll_list h2').show().html('*信息不全');
                } else if (loginData == 0) {
                    $('#header .center .list .enroll_list h2').show().html('*兩次密碼不一樣');
                } else {
                    $('#header .center .list .enroll_list h2').hide().html('');
                    alert('註冊成功');
                    $('.opc').fadeOut(1000).hide();
                    $('#header .center .list .enroll_list').hide();
                }
            }
        })
    })
    // 登陸
    $('#header .center .list .login_list span.zhuce').click(function() {
        var log_name = $('#header .center .list .login_list input[name=log_name]').val();
        var log_pass = $('#header .center .list .login_list input[name=pass]').val();
        $.ajax({
            url: APP + "?c=login&a=login",
            type: 'post',
            data: {
                log_name: log_name,
                pass: log_pass
            },
            dataType: 'json',
            success: function(loginData) {
                if (loginData == 1) {
                    alert('信息不全');
                } else if (loginData == 0) {
                    alert('用戶名不存在或者密碼錯誤');
                } else if (loginData == 2) {
                    alert('登陸成功');
                    location.href = APP;
                }
            }
        })
    })
    // 處理session
    $('#header .center .list i').click(function() {
        $.ajax({
            url: APP + "?c=login&a=closed",
            type: 'post',
            success: function(loginData) {
                if (loginData == 1) {
                    alert('退出成功');
                    location.href = APP;
                }
            }
        })
    })
    // 拖拽
    $('#box .box-1').live('hover', function() {
        drag('#box', '.box-1', '#box .box-1');
    })
    // 点击贴条功能
    $('#header .center .img').click(function() {
        $('.opc').fadeIn(1000).show();
        $('.form').show().animate({
            left: (windW - 240) / 2,
            top: (windH - 150) / 2
        }, 1000, 'easeInOutCubic');
    })
    // 点击隐藏贴条
    $('.form i img').click(function() {
        $('.form').animate({
            left: -260,
            top: -150
        }, 1000, 'easeInOutCubic');
        $('.opc').fadeOut(1000).hide();
    })
    // 注册效果
    $('#header .center .login a.zc').click(function() {
        $('#header .center .list .enroll_list').animate({
            right: 150
        }, 1000, 'easeInOutCubic');
        $('.opc').fadeIn(1000).show();
    })
    $('#header .center .enroll .enroll_list img').click(function() {
        $(this).parents('.enroll_list').animate({
            right: -370
        }, 1000, 'easeInOutCubic');
        $('.opc').fadeOut(1000).hide();
    })
    // 登陆效果
    $('#header .center .login a.dl').click(function() {
        $('#header .center .list .login_list').animate({
            right: 150
        }, 1000, 'easeInOutCubic');
        $('.opc').fadeIn(1000).show();
    })
    $('#header .center .list .login_list img').click(function() {
        $(this).parents('.login_list').animate({
            right: -370
        }, 1000, 'easeInOutCubic');
        $('.opc').fadeOut(1000).hide();
    })
    // 後台刪除效果
    $('#box .box-1 .dele').click(function() {
        $(this).parents('.box-1').hide();
        var delenum = $(this).parents('#box .box-1').find('p b').html();
        $.ajax({
            url: APP + "?a=delenum",
            type: 'post',
            data: {
                delenum: delenum
            },
        })
    })
})