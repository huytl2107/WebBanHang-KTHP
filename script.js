window.onload = function() {
    //Nhập dữ liệu sản phẩm
    var products = [
        { image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 1', description: 'Mô tả sản phẩm 1' },
        { image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 2', description: 'Mô tả sản phẩm 2' },
        { image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 3', description: 'Mô tả sản phẩm 3' },
        { image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 4', description: 'Mô tả sản phẩm 4' },
        { image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 1', description: 'Mô tả sản phẩm 1' },
        { image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 2', description: 'Mô tả sản phẩm 2' },
        { image: 'https://a.cdn-hotels.com/gdcs/production0/d1513/35c1c89e-408c-4449-9abe-f109068f40c0.jpg?impolicy=fcrop&w=800&h=533&q=medium', title: 'Sản phẩm 3', description: 'Mô tả sản phẩm 3' },
        { image: 'https://www.thephotoargus.com/wp-content/uploads/2021/04/food-photography-tips-for-toast_AFTER-1024x682.jpeg', title: 'Sản phẩm 4', description: 'Mô tả sản phẩm 4' },
    ];
    //Thêm sản phẩm vào index.html
    var productContainer = document.getElementById('sanpham');
    products.forEach(function(product) {
        var card = document.createElement('div');
        card.className = 'card col-lg-3 col-md-6';
        card.innerHTML = `
            <img class="card-img" src="${product.image}" alt="Card image">
            <div class="card-body d-flex flex-column align-items-center">
                <h4 class="card-title">${product.title}</h4>
                <p class="card-text">${product.description}</p>
                <div class="d-flex justify-content-between w-100">
                    <a href="#" class="btn btn-primary">Buy</a>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        `;
        productContainer.appendChild(card);
    });
};
