
// Fetch and include login modal
fetch('login-modal.html')
    .then(response => response.text())
    .then(data => {
        document.body.insertAdjacentHTML('beforeend', data);
    });
fetch('signup-modal.html')
    .then(response => response.text())
    .then(data => {
        document.body.insertAdjacentHTML('beforeend', data);
    });
// Fetch and include addproduct modal
fetch('addproduct-modal.html')
    .then(response => response.text())
    .then(data => {
        document.body.insertAdjacentHTML('beforeend', data);
    });
function clearCart() {
    // Sử dụng Ajax để gửi yêu cầu xóa giỏ hàng đến trang xử lý PHP
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'clearCart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Xóa thành công, có thể hiển thị thông báo hoặc làm gì đó khác nếu cần
            console.log('Cart cleared successfully');
            // Reload trang để cập nhật giao diện
            location.reload();
        }
    };

    // Gửi yêu cầu xóa giỏ hàng
    xhr.send();
}
function addToCart(productId) {
    // Sử dụng Ajax để gửi ID sản phẩm đến trang xử lý PHP
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'addtocart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Định dạng dữ liệu cần gửi
    var data = 'productId=' + productId;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log('Product ID added to cart:', productId);
            alert('Đã thêm sản phẩm vào giỏ hàng');
        }
    };

    // Gửi dữ liệu
    xhr.send(data);
}
