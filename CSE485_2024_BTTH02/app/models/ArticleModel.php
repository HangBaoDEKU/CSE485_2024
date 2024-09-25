
<?php

class ArticleModel {
    private $tieude;
    private $tomtat;
    private $ma_tloai;
    public $ma_bviet;
    public $ten_bhat;
    public $ma_tgia;
    public $ngayviet;

    public function __construct($tieude, $tomtat, $ma_tloai,$ma_bviet,$ten_bhat,$ma_tgia,$ngayviet) {
        $this->tieude = $tieude;
        $this->tomtat = $tomtat;
        $this->ma_tloai = $ma_tloai;
        $this->ma_bviet = $ma_bviet;
        $this->ten_bhat = $ten_bhat;
        $this->ma_tgia = $ma_tgia;
        $this->ngayviet = $ngayviet;

    }

    public function getTieude() {
        return $this->tieude;
    }

    public function getTomtat() {
        return $this->tomtat;
    }

    public function getMatloai() {
        return $this->ma_tloai;
    }

    public function getMabviet() {
        return $this->ma_bviet;
    }

    public function getTenbhat() {
        return $this->ten_bhat;
    }

    public function getMatgia() {
        return $this->ma_tgia;
    }

    public function getNgayviet() {
        return $this->ngayviet;
    }
}
?>
