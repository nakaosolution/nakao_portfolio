"use strict";

let x = 'main.jsを読み込みました。';
console.log(x);

// jQuery().ready(function($) {
    
//   });
// スクロールトップ定義
const scrollTop = window.screenY;

// エラーは出ないが何故か動かない
// MyCSS定義
function MyCSS(thisNode, styleObj) {
 
    /*
        使い方
        MyCSS(Node要素, {'float':'right','z-index':'2'} );
    */
    Object.keys(styleObj).forEach(function (key) {

        thisNode.style[key] = styleObj[key];

        //console.log(key + "は" + styleObj[key] + "です。");
    });
}

// ID＆class取得
const header = document.querySelector('#header').style;
const h1_text = document.querySelector('#h1_text').style;
const menuicon = document.querySelector('.menu-icon').style;

// エラーは出ないが何故か動かない
const gnav_ul = document.querySelectorAll('#gnav_ul');


// styleオブジェクト定義
const header_Style = {
    background: 'linear-gradient(135deg,white,white)',
}
const header_text_Style = {
    color: '#333',
}

// エラーは出ないが何故か動かない
const header_ul_Style = {
    'color': '#333',
}


if(scrollTop==0) {
    // #headerのcss変更
    for(var prop in header_Style) {
        header[prop] = header_Style[prop];
    }

    // #headerの子のcss変更
    for(var prop in header_text_Style) {
        h1_text[prop] = header_text_Style[prop];
        menuicon[prop] = header_text_Style[prop];
    }

    // エラーは出ないが何故か動かない
    let i=0;
    for( i=0; i < gnav_ul.length; i++ ) {
        MyCSS(gnav_ul[i], header_ul_Style);
    }

    // h1_text.style.color = '#333';
    // menuicon.style.color = '#333';
    // gnav_ul.style.color = '#333';
}