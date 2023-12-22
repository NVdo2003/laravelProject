var swipper = document.querySelector(".swipper")
const widthItem = document.querySelector(".swipper-slide").offsetWidth

var btnNext = document.getElementById("next")
var btnPrev = document.getElementById("prev")

btnNext.onclick = function () {
    swipper.scrollLeft += (widthItem * 4);
};

btnPrev.onclick = function () {
    swipper.scrollLeft -= (widthItem * 4);
};


// ----------------------------------------

var swipper2 = document.querySelector(".swipper-2")
const widthItem2 = document.querySelector(".swipper-slide-2").offsetWidth

var btnNext2 = document.getElementById("next-2")
var btnPrev2 = document.getElementById("prev-2")

btnNext2.onclick = function () {
    swipper2.scrollLeft += (widthItem2 * 4);
};
btnPrev2.onclick = function () {
    swipper2.scrollLeft -= (widthItem2 * 4);
};