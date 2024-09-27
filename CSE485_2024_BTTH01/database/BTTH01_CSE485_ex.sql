/*a*/
SELECT baiviet.*
FROM baiviet
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
WHERE theloai.ten_tloai = 'Nhạc trữ tình';

/*b*/
SELECT baiviet.*
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
WHERE tacgia.ten_tgia = 'Nhacvietplus';

/*c*/
SELECT theloai.*
FROM theloai
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
WHERE baiviet.ma_tloai IS NULL;

/*d*/
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

/*e*/
SELECT theloai.ten_tloai, COUNT(baiviet.ma_bviet) AS so_bai_viet
FROM baiviet
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
GROUP BY theloai.ten_tloai
ORDER BY so_bai_viet DESC
LIMIT 1;

/*f*/
SELECT tacgia.ten_tgia, COUNT(baiviet.ma_bviet) AS so_bai_viet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
GROUP BY tacgia.ten_tgia
ORDER BY so_bai_viet DESC
LIMIT 2;

/*g*/
SELECT *
FROM baiviet
WHERE ten_bhat LIKE '%yêu%'
   OR ten_bhat LIKE '%thương%'
   OR ten_bhat LIKE '%anh%'
   OR ten_bhat LIKE '%em%';

/*h*/
SELECT *
FROM baiviet
WHERE tieude LIKE '%yêu%'
   OR tieude LIKE '%thương%'
   OR tieude LIKE '%anh%'
   OR tieude LIKE '%em%'
   OR ten_bhat LIKE '%yêu%'
   OR ten_bhat LIKE '%thương%'
   OR ten_bhat LIKE '%anh%'
   OR ten_bhat LIKE '%em%';

/*i*/
CREATE VIEW vw_Music AS
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, tacgia.ten_tgia, baiviet.ngayviet
FROM baiviet
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;

/*j*/
DELIMITER //
CREATE PROCEDURE sp_DSBaiViet(IN tenTheLoai VARCHAR(100))
BEGIN
    -- Trả về danh sách bài viết nếu thể loại tồn tại
    SELECT baiviet.*
    FROM baiviet
    JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
    WHERE theloai.ten_tloai = tenTheLoai;
    
    -- Nếu không có bài viết nào phù hợp, câu truy vấn trả về kết quả rỗng.
END //
DELIMITER ;


/*k*/
ALTER TABLE theloai ADD COLUMN SLBaiViet INT DEFAULT 0;
DELIMITER //
CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
    UPDATE theloai
    SET SLBaiViet = SLBaiViet + 1
    WHERE ma_tloai = NEW.ma_tloai;
END //
DELIMITER ;

/*l*/
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(55) NOT NULL
);