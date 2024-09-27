<?php
class DetailModel {
    private $tieude;
    private $ten_bhat;
    private $ten_tloai;
    private $tomtat;
    private $noidung;
    private $ten_tgia;
    private $hinhanh;

    public function __construct($tieude, $tenbhat, $ten_tloai, $tomtat, $noidung, $ten_tgia, $hinhanh) {
        $this->tieude = $tieude;
        $this->ten_bhat = $tenbhat;
        $this->ten_tloai = $ten_tloai;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->ten_tgia = $ten_tgia;
        $this->hinhanh = $hinhanh;
    }

    public function getTieude() {
        return $this->tieude;
    }

    public function getTenBhat() {
        return $this->ten_bhat;
    }

    public function getTenTloai() {
        return $this->ten_tloai;
    }

    public function getTomtat() {
        return $this->tomtat;
    }


    public function getNoidung() {
        return $this->noidung;
    }

    public function getTenTgia() {
        return $this->ten_tgia;
    }

    public function getHinhanh() {
        return $this->hinhanh;
    }
}
?>