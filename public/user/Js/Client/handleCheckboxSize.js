var listInp = document.querySelectorAll('.product-options input[type="checkbox"]');
const currentURL = new URL(window.location.href);
let checkedInput = null; // Khởi tạo biến lưu trữ ô input được chọn gần nhất

listInp.forEach(input => {
    const size = input.value;
    input.onclick = () => {
        if (checkedInput !== null) {
            checkedInput.checked = false; // Loại bỏ thuộc tính "checked" của ô input cũ trước đó
        }
        currentURL.searchParams.delete('size');
        currentURL.searchParams.set('size', size);
        redirectURL = `?redirect=cart&action=add&prd_id=<?= $prd['prd_id'] ?>&size=${size}`; // Cập nhật redirectURL với size mới
        document.querySelector('.button-cart a').href = redirectURL; // Thay đổi href của thẻ a
        window.location.href = currentURL.toString(); // Gán href thẻ a bằng URL hiện tại
    };

    const urlParams = new URLSearchParams(window.location.search);
    const prd_id = urlParams.get('prd_id');

    const sizeParam = currentURL.searchParams.get('size');
    if(sizeParam === size) { // Nếu size param = value size của input thì checked
        checkedInput = input; // Cập nhật ô input mới được chọn gần nhất
        input.checked = true; // Thêm thuộc tính "checked" vào ô input mới được chọn
        redirectURL = `?redirect=cart&action=add&prd_id=${prd_id}&size=${sizeParam}`; // Cập nhật redirectURL với size hiện tại
        document.querySelector('.button-cart a').href = redirectURL; // Thay đổi href của thẻ a
    }
});



