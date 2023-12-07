window.onload = function() {
    //Nhập dữ liệu sản phẩm
    var products = [
        { id: 1, image: 'https://lzd-img-global.slatic.net/g/p/7fc562f294af0757642454970fd0ac03.jpg_720x720q80.jpg', title: 'Sản phẩm 1', description: 'Mô tả sản phẩm 1', price: 40000, tag: "" },
        { id: 2, image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 2', description: 'Mô tả sản phẩm 2', price: 20000, tag: "" },
        { id: 3, image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 3', description: 'Mô tả sản phẩm 3', price: 40000, tag: "" },
        { id: 4, image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 4', description: 'Mô tả sản phẩm 4', price: 20000, tag: "" },
        { id: 5, image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 1', description: 'Mô tả sản phẩm 1', price: 40000, tag: "" },
        { id: 6, image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 2', description: 'Mô tả sản phẩm 2', price: 20000, tag: "" },
        { id: 7, image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 3', description: 'Mô tả sản phẩm 3', price: 40000, tag: "" },
        { id: 8, image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 4', description: 'Mô tả sản phẩm 4', price: 20000, tag: "" },
        { id: 9, image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 1', description: 'Mô tả sản phẩm 1', price: 40000, tag: "" },
        { id: 10, image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 2', description: 'Mô tả sản phẩm 2', price: 20000, tag: "" },
        { id: 11, image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 3', description: 'Mô tả sản phẩm 3', price: 40000, tag: "" },
        { id: 11, image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 4', description: 'Mô tả sản phẩm 4', price: 20000, tag: "" },
        { id: 13, image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 1', description: 'Mô tả sản phẩm 1', price: 40000, tag: "" },
        { id: 14, image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 2', description: 'Mô tả sản phẩm 2', price: 20000, tag: "" },
        { id: 15, image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 3', description: 'Mô tả sản phẩm 3', price: 40000, tag: "" },
        { id: 16, image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 4', description: 'Mô tả sản phẩm 4', price: 20000, tag: "" },
    ];
    //Thêm sản phẩm vào index.html
    var productContainer = document.getElementById('sanpham');
    products.forEach(function(product) {
        var card = document.createElement('div');
        card.className = 'card col-lg-3 col-md-6';
        card.innerHTML = `
            <a href="product_details.php">
                <img class="larger-card-img" src="${product.image}" alt="Card image">
            </a>
            <div class="card-body d-flex flex-column align-items-center">
                <h4><a href="product_details.php" class="card-title">${product.title}</a></h4>
                <p class="card-text">${product.price}đ</p>
                <div class="d-flex justify-content-around w-100">
                    <a href="#" class="btn-buy btn btn-success">Buy</a>
                    <a href="#" class="btn-addtocart btn btn-success"><i class="bi bi-cart"></i></a>
                </div>
            </div>
        `;
        productContainer.appendChild(card);
    });
    

};
