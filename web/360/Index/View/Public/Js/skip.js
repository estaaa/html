$(function(){
   $('#verify-img').click(function() {
      $(this).attr('src', APP + '?a=code&rand=' + Math.random()*100);
   });
})