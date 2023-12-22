const zoomIn = document.querySelector('.control .zoom-in')
const zoomOut = document.querySelector('.control .zoom-out')
const close = document.querySelector('.control .close')

const imgMain = document.querySelector('.main-img')
const site = document.querySelector('.site-wrapper')
const slide = document.querySelector('.slide-show')
const imgCurrent = document.querySelector('.current-img img')
const mid = document.querySelector('.mid')

let currentSize = 623;
const defaultSize = 623;

const defaultimage = imgCurrent.src;


close.addEventListener('click', () => {
    slide.style.opacity = 0
    slide.style.visibility = `hidden`
    document.querySelector('.current-img').style.display = `none`
    site.style.visibility = `visible`
    site.style.opacity = 1
    // slide.style.display = `none`
    // site.style.display = `block`
})

imgMain.onclick = () => {
    site.style.opacity = 0
    site.style.visibility = `hidden`
    document.querySelector('.current-img').style.display = `block`
    slide.style.visibility = `visible`
    slide.style.opacity = 1
    // site.style.display = `none`
    // slide.style.display = `block`

    mid.style = `position: none` // reset lại thuộc tính

    imgCurrent.src = defaultimage // reset lại ảnh gốc về ảnh đầu

    currentSize = defaultSize; // reset lại giá trị của currentSize về kích thước ban đầu
    imgCurrent.style = `
    width: ${currentSize}px;
    height: ${currentSize}px;
    object-fit: contain;
  `;
}

zoomIn.addEventListener('click', () => {
  mid.style =`
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
  `;
  currentSize += 100;
  imgCurrent.style = `
    width: ${currentSize}px;
    height: ${currentSize}px;
    object-fit: contain;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  `;
});

zoomOut.addEventListener('click', () => {
  if (currentSize > defaultSize) {
    currentSize -= 100;
    imgCurrent.style = `
      width: ${currentSize}px;
      height: ${currentSize}px;
      object-fit: contain;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    `;
  }
});


