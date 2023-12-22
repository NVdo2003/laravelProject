const next = document.querySelector('.button-next')
const prev = document.querySelector('.button-prev')
const currentImg = document.querySelector('.current-img img')
const listImg = document.querySelectorAll('.item-img img')
const number = document.querySelector('.number')

let currentIndex = 0

setCurrent(currentIndex)

function setCurrent(index) {
    currentIndex = index
    currentImg.src = listImg[currentIndex].src
    number.innerHTML = `${currentIndex + 1} / ${listImg.length}`
}

listImg.forEach((img, index) => {
    img.addEventListener('click', () => {
        setCurrent(index)
    })
})

next.addEventListener('click', () => {
    if(currentIndex == listImg.length - 1) {
        currentIndex = 0
    } else {
        currentIndex ++
    }

    setCurrent(currentIndex)
})

prev.addEventListener('click', () => {
    if(currentIndex == 0) {
        currentIndex = listImg.length - 1
    } else {
        currentIndex --
    }

    setCurrent(currentIndex)
})

