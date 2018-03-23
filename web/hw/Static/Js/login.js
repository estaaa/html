$(function(){
    $('form').submit(function() {
       login();
    });
    
})

function login(){
    if($("input[name='username']").val==''){
        error('名字不能为空');
    }
}

function error(msg){
    $('#err_m').val(msg);
}