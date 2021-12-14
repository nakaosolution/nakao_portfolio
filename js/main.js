"use strict";

let x = 'main.jsを読み込みました。';
console.log(x);

jQuery(document).ready(function(){
    //jQueryで実行する内容
    // $('#h1_text').css({
    //     'color' : 'red',
    // });

    $(function(){
        $('.menu-icon').on('click', function () {
            $('.menu-icon, .nav').toggleClass('fa-times');
            $('.menu-icon, .nav').toggleClass('fa-bars');
            $('.menu').toggleClass('is-active');
        });
    })
    
});