// hamburger icon 的切換
$(function(){
            
    $("button.hamburger").on("click", function(){
        $(this).toggleClass("is-active");
        $('.nav_list').slideToggle();
    });
});
