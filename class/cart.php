<?php
class Cart {
    // Thuộc tính của đối tượng Cart
    public $productIds = array();

    // Phương thức thêm ID sản phẩm vào giỏ hàng
    public function addProductId($productId) {
        $this->productIds[] = $productId;
    }

    // Phương thức lấy danh sách ID sản phẩm trong giỏ hàng
    public function getProductIds() {
        return $this->productIds;
    }

    // Phương thức xóa ID sản phẩm khỏi giỏ hàng
    public function removeProductId($productId) {
        $key = array_search($productId, $this->productIds);
        if ($key !== false) {
            unset($this->productIds[$key]);
        }
    }
}
?>