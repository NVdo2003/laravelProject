var input = document.querySelector('.product-quantity input')
var plus = document.querySelector('.plus')
var minus = document.querySelector('.minus')

plus.onclick = () => {
    let value = Number(input.getAttribute('value'))
    value++
    input.setAttribute('value', value)
    input.value = value
}

minus.onclick = () => {
    let value = Number(input.getAttribute('value'))
    value--
    input.setAttribute('value', value)
    input.value = value
}

input.onblur = () => {
    input.setAttribute('value', input.value)
}