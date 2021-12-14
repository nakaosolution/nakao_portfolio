"use strict";

window.onload = function () { //html読み込んだ後に実行される。
    
    
}

// $(function() {
//     $("#btn-1").click(function() {
//         $("#bg").css("background-color","pink");
//     })

//     $("#btn-2").click(function() {
//         $("h1").css("font-size","56px");
//     })

//     $("#btn-3").click(function() {
//         $("h1").css("color","blue");
//     })


// 長方形の面積
function rectangular (x,y) {
    return x*y;
}
// 正方形の面積
function square (x) {
    return x*x;
}
// 円形の面積
function circle (r) {
    return r*r*3.14;
}
// 三角形
function triangle (x,y) {
    console.log();
    return x*y/2;
}
// // 台形
function trapezoid (x,y,h) {
    return (x+y)*h/2;
}
// // ひし形
function rhombus (x,y) {
    console.log();
    return x*y/2;
}
function func (e) {
    // データの取得
    let width = parseFloat(document.getElementById("math-1").value,10);
    let height = parseFloat(document.getElementById("math-2").value,10);
    let OneSideOfSquare = parseFloat(document.getElementById("math-3").value,10);
    let radius = parseFloat(document.getElementById("math-4").value,10);
    let triangleBottom = parseFloat(document.getElementById("math-5").value,10);
    let triangleHeight = parseFloat(document.getElementById("math-6").value,10);
    let theTopSide = parseFloat(document.getElementById("math-7").value,10);
    let theBottomSide = parseFloat(document.getElementById("math-8").value,10);
    let trapezoidHeight = parseFloat(document.getElementById("math-9").value,10);
    let diamondDiagonal1 = parseFloat(document.getElementById("math-10").value,10);
    let diamondDiagonal2 = parseFloat(document.getElementById("math-11").value,10);
    // 分岐,変数の定義,代入,出力
    switch (e) {
        case 1:
        let _rectangular = rectangular(width,height);
        document.getElementById("rectangular").innerHTML = _rectangular;
        break;
        case 2:
        let _square = square(OneSideOfSquare);
        document.getElementById("square").innerHTML = _square;
        break;
        case 3:
        let _circle = circle(radius);
        document.getElementById("circle").innerHTML = _circle;
        break;
        case 4:
        let _triangle = triangle(triangleBottom,triangleHeight);
        document.getElementById("triangle").innerHTML = _triangle;
        break;
        case 5:
        let _trapezoid = trapezoid(theTopSide,theBottomSide,trapezoidHeight);
        if(theTopSide>0 && theBottomSide>0 &&trapezoidHeight>0 && _trapezoid>=0 && !isNaN(_trapezoid)) {
            //出力
            document.getElementById("trapezoid").innerHTML = _trapezoid;
        }else {
            document.getElementById("trapezoid").innerHTML = "??";
        }
        
        
        break;
        case 6:
        let _rhombus = rhombus(diamondDiagonal1,diamondDiagonal2);
        document.getElementById("rhombus").innerHTML = _rhombus;
        break;        

    }
    
    
    
    
    
    
}