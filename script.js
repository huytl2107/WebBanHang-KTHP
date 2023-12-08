
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