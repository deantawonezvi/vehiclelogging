$(document).ready(function () {
    $('#anim-img').hover(function () {
        window.animatelo.slideInLeft(this);
    });
    $('#anim-img1').hover(function () {
        window.animatelo.pulse(this);
    })
});