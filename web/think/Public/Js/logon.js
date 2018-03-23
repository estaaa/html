// 注册验证
$(function(){
    // 注册
    $("#logon .data p img").click(function () {
        var url = CONTROL + "?rand=" + Math.random();
        $(this).attr("src", url);
    })





    //表单验证
    $(function () {

          
        // alert($("input[name='clause']").attr('checked'));
        $("form").submit(function () {

            return form();
        })
            
            $('#logon .data p .f1').css({background:'#EEEEEE'});
            setInterval(function(){
               var str = $("[name='password']").val();
                var num = /^\d*$/i;  
                var re=/^[a-z]*$/;  
                var he=/(?!^\d+$)(?!^[a-zA-Z]+$)[0-9a-zA-Z]{6,100}/ig;   
              /*  (?!^\d+$)  排除全数字
                (?!^[a-zA-Z]+$) 排除全字母*/
                var q= /[^0-9a-z]/ig;
                
                 if(num.test(str) || re.test(str)){
                    $('#logon .data p .f1').css({background:'#FF0000',color:'#fff'});
                     $('#logon .data p .f2').css({background:'#EEEEEE',color:'#aaaaaa'});
                 }else if(he.test(str)){
                     $('#logon .data p .f1').css({background:'#F1D93A',color:'#F1D93A'});
                     $('#logon .data p .f2').css({background:'#F1D93A',color:'#fff'});
                      $('#logon .data p .f3').css({background:'#EEEEEE',color:'#aaaaaa'});
                     if(q.test(str)){
                       $('#logon .data p .f1').css({background:'#63B418',color:'#63B418'});
                       $('#logon .data p .f2').css({background:'#63B418',color:'#63B418'});
                       $('#logon .data p .f3').css({background:'#63B418',color:'#fff'});
                     }
                 }else{
                    $('#logon .data p .f1').css({background:'#EEEEEE',color:'#aaaaaa'});
                     $('#logon .data p .f2').css({background:'#EEEEEE',color:'#aaaaaa'});
                      $('#logon .data p .f3').css({background:'#EEEEEE',color:'#aaaaaa'});
                 } 
               
            },0)
           
           
          
        
        
    })





    //验证字段是否为空
    function form() {
         
        if ($("input[name='username']").val() == "") {
            error("您还没有输入帐号！");
            return false;
        }
        if($("input[name='username']").val().length<6 || $("input[name='username']").val().length >20){
            error("账号长度为6-20位");
            return false;
        }
        if ($("[name='password']").val() == "") {
            error("您还没有输入密码！");
            return false;
        }
        if($("input[name='password']").val().length<6){
            error("密码长度最少为6位");
            return false;
        }
        if($("[name='passwd']").val() == "") {
            error("您还没有输入确认密码！");
            return false;
        }
       
        if($("[name='password']").val() != $("[name='passwd']").val()) {
            error("两次密码输入不一致");
            return false;
        }
        if($("input[name='code']").val() == "验证码") {
            error("您还没有输入验证码！");
            return false;
        }
        if($("input[name='code']").val() == "") {
            error("您还没有输入验证码！");
            return false;
        }
        if($("input[name='clause']").attr('checked') != "checked") {
            error("您还没有同意条款！");
            return false;
        }
        $("#error").css("display", "none").hide();
        return true;
    }





var t=0;
    function error(msg) {
         // alert('message')
        $("#err_m").html(msg);
        $("#error").show();
        clearTimeout(t);
        t = setTimeout(function () {
            $("#error").hide();
        }, 3000);
    }
})
