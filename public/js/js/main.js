$(function () {
    $('[data-toggle="popover"]').popover()
  })


  function mycopy(name){
    var range = document.createRange();
    range.selectNode(document.getElementById(name))
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand('copy');
    window.getSelection().removeAllRanges();

   }

$(document).ready(function(){  
   
});  