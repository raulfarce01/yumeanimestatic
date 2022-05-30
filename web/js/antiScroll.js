// var nav = document.getElementById("nav");
// var html = document.getElementById("html");

var nav = document.getElementsByTagName("nav")[0];
var html = document.getElementsByTagName("html")[0];

if(nav.style.right == 0){
    html.style.overflowY = 'hidden';
}else{
    html.style.overflowY = 'scroll';
}