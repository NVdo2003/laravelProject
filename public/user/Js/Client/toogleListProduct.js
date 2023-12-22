var toogleBtns = document.querySelectorAll('.toogle-btn')
var bundledProducts = document.querySelectorAll('.bundled-products')

bundledProducts.forEach((bundledProduct, index) => {
        toogleBtns[index].onclick = () => {
            bundledProduct.style = 'animation: fadeInTop 0.5s ease;'
            bundledProduct.classList.toggle('show-hide')
        }
})