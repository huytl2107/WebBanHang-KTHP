
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
function laygiaSP(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'laygiasp.php?productId=' + productId, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var productPrice = xhr.responseText;
            alert('Tổng số tiền cần thanh toán: ' + productPrice + ',000đ');
        }
    };

    // Gửi yêu cầu để lấy giá tiền của sản phẩm
    xhr.send();
}

function showUserTable() {
    fetch('load_user_table.php', {
        method: 'POST',
    })
        .then(response => response.text())
        .then(data => {
            // data chứa nội dung HTML trả về từ PHP
            // Cập nhật nội dung trang web với dữ liệu mới
            document.getElementById('userTableContainer').innerHTML = data;
            document.getElementById('userTableContainer').classList.remove('d-none');
            document.getElementById('productsTableContainer').classList.add('d-none');
        })
        .catch(error => {
            console.error('Có lỗi xảy ra trong quá trình tải dữ liệu:', error);
            alert('Có lỗi xảy ra trong quá trình tải dữ liệu.');
        });
}
function deleteUser(userId) {
    // Tạo một đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Thiết lập phương thức và địa chỉ URL
    xhr.open('POST', 'delete_user.php', true);

    // Thiết lập header để báo hiệu gửi dữ liệu dưới dạng form data
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Xử lý sự kiện khi trạng thái của yêu cầu thay đổi
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            // Kiểm tra xem yêu cầu có thành công hay không (status 200)
            if (xhr.status === 200) {
                // Cập nhật lại bảng người dùng nếu xóa thành công
                document.getElementById('userTableContainer').innerHTML = xhr.responseText;
                // Thông báo xóa thành công
                alert('Xóa người dùng thành công!');

            } else {
                // Hiển thị thông báo nếu có lỗi
                alert('Có lỗi xảy ra trong quá trình xóa người dùng.');
            }
        }
    };

    // Gửi dữ liệu đến server
    xhr.send('userId=' + userId);
}
function showProductsTable(page) {
    fetch('load_products_table.php?page=' + page, {
        method: 'POST',
    })
        .then(response => response.text())
        .then(data => {
            // data chứa nội dung HTML trả về từ PHP
            // Cập nhật nội dung trang web với dữ liệu mới
            document.getElementById('productsTableContainer').innerHTML = data;
            document.getElementById('userTableContainer').classList.add('d-none');
            document.getElementById('productsTableContainer').classList.remove('d-none');
        })
        .catch(error => {
            console.error('Có lỗi xảy ra trong quá trình tải dữ liệu:', error);
            alert('Có lỗi xảy ra trong quá trình tải dữ liệu.');
        });
}
function deleteProduct(productId) {
    // Tạo một đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Thiết lập phương thức và địa chỉ URL
    xhr.open('POST', 'delete_product.php', true);

    // Thiết lập header để báo hiệu gửi dữ liệu dưới dạng form data
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Xử lý sự kiện khi trạng thái của yêu cầu thay đổi
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            // Kiểm tra xem yêu cầu có thành công hay không (status 200)
            if (xhr.status === 200) {
                // Cập nhật lại bảng sản phẩm nếu xóa thành công
                showProductsTable(1);
                // Thông báo xóa thành công
                alert('Xóa sản phẩm thành công!');

            } else {
                // Hiển thị thông báo nếu có lỗi
                alert('Có lỗi xảy ra trong quá trình xóa sản phẩm.');
            }
        }
    };

    // Gửi dữ liệu đến server
    xhr.send('productId=' + productId);
}
