var listAdditionalImg = document.querySelectorAll('.additional-img img')
var showImg = document.querySelector('.main-img img')

listAdditionalImg.forEach(additionalImg => {
    additionalImg.addEventListener('click', () => {
        showImg.src = additionalImg.src
    })
});