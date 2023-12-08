<?php
class Product {
    // Thuộc tính của đối tượng Product
    public $id;
    public $tenSP;
    public $moTa;
    public $giaSP;
    public $id_type;
    public $img;
    public $img2=null;

    // Phương thức nhập thông tin
    public function setProductInfo($id, $tenSP, $moTa, $giaSP, $id_type, $img, $img2 = null) {
        $this->id = $id;
        $this->tenSP = $tenSP;
        $this->moTa = $moTa;
        $this->giaSP = $giaSP;
        $this->id_type = $id_type;
        $this->img = $img;
        $this->img2 = $img2;
    }
    public function luuThongTinProduct(){

        // Chuyển đối tượng thành mảng
        $productData = [
            'id' => $this->id,
            'tenSP' => $this->tenSP,
            'moTa' => $this->moTa,
            'giaSP' => $this->giaSP,
            'id_type' => $this->id_type,
            'img' => $this->img,
            'img2' => $this->img2,
        ];
        
    }
        }
?>