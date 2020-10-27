// hamburger icon 的切換
$(function(){
            
    $("button.hamburger").on("click", function(){
        $(this).toggleClass("is-active");
        $('.nav_list').slideToggle();
    });
});

// 首頁滑鼠移動效果
var scene = document.getElementById('scene');
var parallax = new Parallax(scene);



