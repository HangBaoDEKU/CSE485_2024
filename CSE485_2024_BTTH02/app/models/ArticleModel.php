<?php
class ArticleModel {
    private $tieude;
    private $tomtat;
    private $ma_tloai;
    private $ma_bviet;
    private $ten_bhat;
    private $ma_tgia;
    private $ngayviet;
    private $hinhanh;

    public function __construct($tieude, $tenbhat, $ma_tloai, $ma_bviet, $tomtat, $ma_tgia, $ngayviet, $hinhanh) {
        $this->tieude = $tieude;
        $this->ten_bhat = $tenbhat;
        $this->ma_tloai = $ma_tloai;
        $this->ma_bviet = $ma_bviet;
        $this->tomtat = $tomtat;
        $this->ma_tgia = $ma_tgia;
        $this->ngayviet = $ngayviet;
        $this->hinhanh = $hinhanh;
    }

    public function getTieude() {
        return $this->tieude;
    }

    public function getTomtat() {
        return $this->tomtat;
    }

    public function getMaTloai() {
        return $this->ma_tloai;
    }

    public function getMaBviet() {
        return $this->ma_bviet;
    }

    public function getTenBhat() {
        return $this->ten_bhat;
    }

    public function getMaTgia() {
        return $this->ma_tgia;
    }

    public function getNgayviet() {
        return $this->ngayviet;
    }

    public function getHinhanh() {
        return $this->hinhanh;
    }
}
?>
