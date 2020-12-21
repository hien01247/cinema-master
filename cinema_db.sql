-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 05:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tao_ghe` (IN `ma_suat_chieu` INT)  NO SQL
BEGIN
	declare i INT(11) DEFAULT 0;
	declare loaighe VARCHAR(255) DEFAULT '';
	set i=1;
    set loaighe=set_loai_ghe(ma_suat_chieu);
	while(i<=12) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('A',i),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;

	while(i>12 and i<=24) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('B',i-12),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;

	while(i>24 and i<=36) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('C',i-24),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;

	while(i>36 and i<=48) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('D',i-36),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;

	while(i>48 and i<=60) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('E',i-48),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;

	while(i>60 and i<=72) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('F',i-60),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;

	while(i>72 and i<=84) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('G',i-72),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;

	while(i>84 and i<=96) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('H',i-84),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;

	while(i>96 and i<=108) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('I',i-96),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;

	while(i>108 and i<=120) Do
	INSERT INTO `ghe_ngoi` (`maghe`, `soghe`, `masuatchieu`, `tenloai`, `tinhtrang`) VALUES
	(Null,CONCAT('J',i-108),ma_suat_chieu , loaighe, 0);
	set i=i+1;
	END WHILE;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `set_loai_ghe` (`ma_suat_chieu` INT) RETURNS VARCHAR(60) CHARSET utf8mb4 NO SQL
BEGIN
	declare loai_ghe VARCHAR(60) DEFAULT '';
    declare loai_phong VARCHAR(60) DEFAULT '';
	set loai_phong=(select loai_phong.tenloai from phong_chieu,suat_chieu,loai_phong where phong_chieu.maphong=suat_chieu.maphong and suat_chieu.masuatchieu= ma_suat_chieu and loai_phong.tenloai=phong_chieu.tenloai);
   SET loai_ghe=CONCAT('Ghế ',loai_phong);
	return loai_ghe;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dich_vu`
--

CREATE TABLE `dich_vu` (
  `madv` int(11) NOT NULL,
  `loaidv` varchar(50) DEFAULT NULL,
  `tendv` varchar(50) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dich_vu`
--

INSERT INTO `dich_vu` (`madv`, `loaidv`, `tendv`, `gia`) VALUES
(1, 'Thức ăn', 'Bỏng ngô', 10000),
(2, 'Thức ăn', 'Khoai tây chiên', 15000),
(3, 'Thức uống', 'Coca Cola', 10000),
(4, 'Thức uống', 'Trà sữa', 20000),
(5, 'Thức uống', 'Sinh tố trái cây', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `dien_vien`
--

CREATE TABLE `dien_vien` (
  `maphim` int(11) NOT NULL,
  `dienvien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dien_vien`
--

INSERT INTO `dien_vien` (`maphim`, `dienvien`) VALUES
(1, ' Lim Won Hee'),
(1, 'Jo Woo Jin'),
(1, 'Lee Je Hoon'),
(1, 'Shin Hye Sun'),
(2, 'Alexander Ludwig'),
(2, 'Fetherstonhaugh'),
(2, 'Karen Gillan'),
(2, 'Mitch  Aniley'),
(3, 'Catherine Keener'),
(3, 'Emma Stone'),
(3, 'Kelly Marie Tran'),
(3, 'Nicolas Cage'),
(3, 'Ryan Reynolds'),
(4, 'Hồng Ánh'),
(4, 'Hứa Vỹ Văn'),
(4, 'Thái Hoà'),
(4, 'Đức Thịnh'),
(5, 'Kim Dae Myeong'),
(5, 'Kim Eui Sung'),
(5, 'Song Yun A'),
(6, 'Alexander Siddig'),
(6, 'Lindsey Morgan'),
(6, 'Rhona Mitra'),
(7, ' Jin Sun-kyu'),
(7, ' Lee Dong-hwi'),
(7, 'Gong Myoung'),
(7, 'Jim Gaffigan'),
(7, 'Lance Lim'),
(8, 'Kiera Alle'),
(8, 'Sarah Paulson'),
(9, ' John Lynch'),
(9, 'Anya McKenna-Bruce'),
(9, 'Jessica Brown Findlay'),
(9, 'John Heffernan'),
(9, 'Sean Harris'),
(10, 'Han Ji Min'),
(10, 'Lance Lim'),
(10, 'Nam Joo Hyuk'),
(11, 'George Bailey'),
(11, 'H.D. Quinn'),
(11, 'Marc Thompson'),
(11, 'Mike Pollock'),
(11, 'Sondra James'),
(12, 'Alden Ehrenreich'),
(12, 'Emilia Clarke'),
(12, 'Thandie Newton'),
(13, 'Kakazu Yumi'),
(13, 'Kimura Subaru'),
(13, 'Mizuta Wasabi'),
(13, 'Ohara Megumi'),
(14, 'Ngọc Trai'),
(14, 'Đại Nghĩa'),
(15, 'Dwayne Johnson'),
(15, 'Neve Campbell'),
(15, 'Pablo Schreiber'),
(16, 'Jason Statham'),
(16, 'Rainn Wilson'),
(16, 'Ruby Rose'),
(17, ' Thu Trang'),
(17, 'Anh Tú'),
(17, 'Kiều Minh Tuấn'),
(17, 'Tiến Luật'),
(18, 'Charlize Theron'),
(18, 'Jim Parrack'),
(18, 'John Cena'),
(19, 'Hoàng Yến Chibi'),
(19, 'Karen Nguyễn'),
(19, 'Thái Hòa'),
(19, 'Thanh Thuý'),
(19, 'Trần Ngọc Vàng'),
(21, 'Connie Nielsen'),
(21, 'Gal Gadot'),
(21, 'Kristen Wiig'),
(21, 'Pedro Pascal'),
(22, ' Duy Khánh'),
(22, 'Katleen Phan Võ'),
(22, 'MLee'),
(22, 'Tiến Hoàng'),
(23, ' Josh Helman'),
(23, 'Diego Boneta'),
(23, 'Meagan Good'),
(23, 'Milla Jovovich'),
(24, ' Daniel Craig'),
(24, 'Léa Seydoux'),
(24, 'Rami Malek');

-- --------------------------------------------------------

--
-- Table structure for table `ghe_ngoi`
--

CREATE TABLE `ghe_ngoi` (
  `maghe` int(11) NOT NULL,
  `soghe` varchar(10) DEFAULT NULL,
  `masuatchieu` int(11) NOT NULL,
  `tenloai` varchar(10) NOT NULL,
  `tinhtrang` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `mahoadon` int(11) NOT NULL,
  `tongtien` varchar(20) NOT NULL DEFAULT '0',
  `ngayxuat` date DEFAULT NULL,
  `idkh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`mahoadon`, `tongtien`, `ngayxuat`, `idkh`) VALUES
(1, '126000', '2020-12-12', NULL),
(2, '180000', '2020-12-12', NULL),
(7, '55000 VNĐ', '2020-12-21', 8),
(8, '55000 VNĐ', '2020-12-21', 8),
(9, '45000 VNĐ', '2020-12-21', 8),
(10, '60000 VNĐ', '2020-12-21', 8);

-- --------------------------------------------------------

--
-- Table structure for table `khung_gio`
--

CREATE TABLE `khung_gio` (
  `makhunggio` int(11) NOT NULL,
  `batdau` varchar(10) DEFAULT NULL,
  `ketthuc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khung_gio`
--

INSERT INTO `khung_gio` (`makhunggio`, `batdau`, `ketthuc`) VALUES
(1, '09:30', '12:00'),
(2, '12:00', '14:30'),
(3, '14:30', '17:00'),
(4, '17:00', '19:30'),
(5, '19:30', '22:00'),
(6, '22:00', '00:30');

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `makm` int(10) NOT NULL,
  `tenkhuyenmai` text NOT NULL,
  `mota` varchar(200) NOT NULL,
  `hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`makm`, `tenkhuyenmai`, `mota`, `hinhanh`) VALUES
(1, 'COMBO BIG STAR - ƯU ĐÃI THỨ BA', 'Combo BIG STAR ưu đãi vào ngày thứ Ba hàng tuần, bao gồm: 1 vé xem phim, 1 ly nước 22oz, 1 bắp 44oz\r\n\r\nGiá combo áp dụng: \r\n\r\n- Tại Cinestar Sinh Viên, Mỹ Tho và Huế: 79,000đ \r\n\r\n- Tại Cinestar Hai Bà', 'https://cinestar.com.vn/pictures/big-star-_-trang-ch%E1%BB%A7-web.jpg'),
(2, 'TẸT GA 45K SUỐT TUẦN TOÀN HỆ THỐNG', 'ÁP DỤNG MỨC GIÁ 45K / VÉ 2D - CẢ TUẦN - TOÀN HỆ THỐNG\r\n✔️ KHÔNG đắn đo về giá vé\r\n✔️ KHÔNG nhức đầu nghĩ điểm hẹn cuối tuần\r\n✔️ KHÔNG cần miệt mài lựa chọn phim\r\n\r\nÁp dụng dành cho giáo viên, giảng vi', 'https://cinestar.com.vn/pictures/H%C3%ACnh%20n%E1%BB%81n%20CTKM/hssv.jpg'),
(3, 'C\'MONDAY - CINESTAR HAPPY DAY', '- Áp dụng cho tất cả các suất chiếu ngày Thứ Hai hàng tuần.\r\n\r\n- Giá vé ưu đãi: 45.000 đ/vé 2D và 55.000 đ/vé 3D.', 'https://cinestar.com.vn/pictures/c_monday.jpg'),
(4, 'C\'TEN - KHUYẾN MÃI TẠI MỐC 10H', '- Áp dụng cho mỗi vé xem phim vào các suất trước 10h và sau 22h hàng ngày\r\n\r\n- Mua vé giá ưu đãi: 45.000 đ / vé 2D, 55.000 đ / vé 3D', 'https://cinestar.com.vn/pictures/c_ten.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loai_ghe`
--

CREATE TABLE `loai_ghe` (
  `tenloai` varchar(10) NOT NULL,
  `gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_ghe`
--

INSERT INTO `loai_ghe` (`tenloai`, `gia`) VALUES
('', NULL),
('Ghế 3D', 150000),
('Ghế Imax', 250000),
('Ghế Thường', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `loai_phong`
--

CREATE TABLE `loai_phong` (
  `tenloai` varchar(10) NOT NULL,
  `gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_phong`
--

INSERT INTO `loai_phong` (`tenloai`, `gia`) VALUES
('3D', 60000),
('Imax', 200000),
('Thường', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `phim`
--

CREATE TABLE `phim` (
  `maphim` int(11) NOT NULL,
  `tenphim` varchar(50) DEFAULT NULL,
  `daodien` varchar(100) DEFAULT NULL,
  `doituong` varchar(10) DEFAULT NULL,
  `ngonngu` varchar(100) DEFAULT NULL,
  `batdau` date DEFAULT NULL,
  `ketthuc` date DEFAULT NULL,
  `mota` varchar(1000) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `thoiluong` varchar(20) DEFAULT NULL,
  `hinhanh` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phim`
--

INSERT INTO `phim` (`maphim`, `tenphim`, `daodien`, `doituong`, `ngonngu`, `batdau`, `ketthuc`, `mota`, `trailer`, `thoiluong`, `hinhanh`) VALUES
(1, 'KẺ SĂN MỘ', 'David Leitch', 'C18', 'Tiếng Anh với phụ đề tiếng Việt', '2020-04-12', '2021-01-10', 'Kang Dong-goo (Lee Je Hoon) là một thiên tài săn mộ khi có thể tìm ra kho báu chỉ bằng cách ngửi mùi đất. Cùng với các đồng là đội là tiến sĩ Jones (Jo Woo Jin) - chuyên gia nghiên cứu tranh cổ mộ, và Sabdari (Lim Won Hee) - huyền thoại đào mộ, Kang Dong-goo lập thành một bộ ba hoàn hảo cùng thực hiện những phi vụ cướp mộ đầy nguy hiểm và ly kỳ. Tài năng của Dong-goo đã lọt vào tầm ngắm của Yoon Sae-hee (Shin Hae Sun) - người quản lý cấp cao của Viện trưng bày cổ vật. Cô đưa ra đề nghị hấp dẫn mời nhóm của Dong-goo hợp tác trong phi vụ tìm kiếm một kho báu thời cổ đại.', 'https://www.youtube.com/watch?v=xq3mBAUdS10', '119 phút', 'https://cinestar.com.vn/pictures/Cinestar/12-2020/kesanmo.jpg'),
(2, 'ĐỘI DO THÁM', 'Anthony Russo, Joe Russo', 'C16', 'Tiếng Anh với phụ đề tiếng Việt', '2018-12-04', '2018-01-12', 'Sau chuyến hành trình độc nhất vô nhị không ngừng mở rộng và phát triển vụ trũ điện ảnh Marvel, bộ phim Avengers: Cuộc Chiến Vô Cực sẽ mang đến màn ảnh trận chiến cuối cùng khốc liệt nhất mọi thời đại. Biệt đội Avengers và các đồng minh siêu anh hùng của họ phải chấp nhận hy sinh tất cả để có thể chống lại kẻ thù hùng mạnh Thanos trước tham vọng hủy diệt toàn bộ vũ trụ của hắn.', 'https://www.youtube.com/watch?v=-DocKgwhRxM&feature=emb_logo', '116 phút', 'https://cinestar.com.vn/pictures/Cinestar/12-2020/doidotham.jpg'),
(3, 'Gia đình Croods: Kỉ nguyên mới', 'Chris Pratt, Bryce Dallas Howard, Vincent Onofrio, Judy Greer,...', '', 'Tiếng Anh với phụ đề tiếng Việt', '2020-11-25', '2021-01-05', 'Bối cảnh của Jurassic World là hơn 20 năm sau kể từ sự kiện công viên kỷ Jura (1993). Isla Nublar - một hòn đảo ngoài khơi Thái Bình Dương thuộc khu vực Trung Mỹ - hiện là thế giới khủng long thật sự. Các nhà di truyền học tại đây vừa tạo ra loài khủng long lai mang tên Indominus Rex, nhằm thu hút khách du lịch hơn. Nhưng chính việc làm đó biến con người có nguy cơ thành món mồi cho quái thú.', 'https://www.youtube.com/watch?v=i-1-az6lmRE&feature=emb_logo', '96 phút', 'https://booking.bhdstar.vn/CDN/media/entity/get/FilmPosterGraphic/HO00002202?referenceScheme=HeadOffice&allowPlaceHolder=true&height=500'),
(4, 'TIỆC TRĂNG MÁU', 'Nguyễ Quang Dũng', 'Null', 'Tiếng Việt', '2020-10-20', '2010-12-20', 'Trong một buổi tiệc họp mặt bạn bè vào đêm trăng máu, nhân vật do nữ diễn viên Hồng Ánh thể hiện đã đề nghị một trò chơi với tên gọi “công khai bí mật từ điện thoại”. Cuộc tụ tập của nhóm bạn đã trở thành một thử thách căng thẳng với luật chơi tưởng như đơn giản nhẹ nhàng. Những tin nhắn, cuộc gọi bất ngờ hé lộ bí mật sâu kín họ muốn chôn giấu. Tình bạn mấy chục năm có nguy cơ tan vỡ... ', 'https://www.youtube.com/watch?v=VY4wLeReeGo&feature=emb_logo', '118 phút', 'https://booking.bhdstar.vn/CDN/media/entity/get/FilmPosterGraphic/HO00002125?referenceScheme=HeadOffice&allowPlaceHolder=true&height=500'),
(5, 'TỘI ÁC LẶNG THINH', 'Kim Jung Sik', 'C13', 'Tiếng Việt với phụ đề Tiếng Anh', '2020-12-11', '2021-02-01', 'Do bị thiểu năng, nên chàng thanh niên Seokgu có tính tình lẫn trí tuệ chẳng khác nào đứa trẻ vừa lên 8. Một ngày nọ, cô bé Eunji, người mà anh xem như bạn tri kỉ, được phát hiện trong tình trạng không mảnh vải che thân tại nhà Seokgu. Vì vậy, người dân trong làng đều nghi ngờ Seokgu là thủ phạm và bắt đầu xua đuổi, kì thị cậu ta. Liệu sự thật có được phơi bày?', 'https://www.youtube.com/watch?v=c2moD-W_hBA&feature=emb_logo', '99 phút', 'https://cinestar.com.vn/pictures/Cinestar/12-2020/tatl.gif'),
(6, 'CUỘC CHIẾN HỦY DIỆT', 'Franck Dubosc', 'C18', 'Tiếng Anh - Phụ đề Tiếng Việt', '2020-12-11', '2018-02-10', 'SKYLIN3S - phim hành động giả tưởng, xoay quanh cuộc xâm lăng Trái Đất của một chủng tộc người ngoài hành tinh. 15 năm sau kết thúc của phần hai, một loại virus mới đã xuất hiện và xâm nhập vào những người ngoài hành tinh đang sinh sống trên Trái Đất. Loại virus này khiến những sinh vật từ thân thiện trở nên hung hãn và chống lại con người. Đội trưởng Rose Corley phải lãnh đạo một đội lính đánh thuê tinh thuệ, tham gia nhiệm vụ đến thế giới ngoài hành tinh để cứu những gì còn lại của nhân loại.', 'https://www.youtube.com/watch?v=zeQAQK3g0kw&feature=emb_logo', '108 phút', 'https://cinestar.com.vn/pictures/Cinestar/12-2020/cuocchien.jpg'),
(7, 'NGHỀ SIÊU KHÓ', 'Lee Byeong-heon', 'C18', 'Tiếng Hàn - Phụ đề Tiếng Việt', '2020-12-15', '2021-01-31', 'Nhóm điều tra do đội trưởng Ko (Ryu Seung-yong) lãnh đạo đứng trước nguy cơ giải tán nhờ chuỗi “thành tích” thất bại đáng nể. Cơ hội cuối cùng để cứu vớt sự nghiệp của họ chính là phải triệt phá một băng đảng buôn bán ma tuý tầm cỡ quốc tế. Để làm được điều đó, đội trưởng Ko và các thành viên trong nhóm đã cải trang thành những nhân viên bán gà tại một quán ăn ngay đối diện hang ổ của kẻ địch. Trớ trêu thay, món gà rán của họ quá ngon và nhà hàng bỗng chốc nổi như cồn, căn cứ địa có nguy cơ bại lộ khiến 5 cảnh sát chìm rơi vào những nguy hiểm khó lường.', 'https://www.youtube.com/watch?v=wEunhJFDPuw&feature=emb_logo', '91 phút', 'https://cinestar.com.vn/pictures/Cinestar/12-2020/nghesieukho.jpg'),
(8, 'TRỐN CHẠY', 'Eli Roth', 'C16', 'Tiếng Anh với phụ đề tiếng Việt', '2020-11-20', '2021-01-03', 'Được MGM làm lại dựa trên bộ phim gốc cùng tên năm 1974, nội dung phim tập trung vào Paul Kersey (Bruce Willis vào vai), một bác sĩ phẫu thuật sống tại Chicago, người đã nhận thấy thành phố nơi ông đang sinh sống luôn bị bao trùm bởi những hành động bạo lực và phi nhân tính mà trong đó vợ và cô con gái của Paul cũng là nạn nhân. Lực lượng cảnh sát không thể khống chế được hết những tên tội phạm trong thành phố, vậy nên đây chính là lúc Paul trả thù và làm người hùng.', 'https://www.youtube.com/watch?v=4njwSo51I5M&feature=emb_logo', '108 phút', 'https://en.wikipedia.org/wiki/Run_(2020_American_film)?fbclid=IwAR3MGvRGhi6LFqhn1VaFDkI35J0p_Tfu5WaDsUC1tWkpSAvasZdv_XMOupk#/media/File:Run_poster.jpeg'),
(9, 'TRỤC QUỶ', 'Christopher Smith', 'C18', 'Tiếng Anh - Phụ đề Tiếng Việt', '2020-12-04', '2021-01-10', 'Câu chuyện cảm động về tình yêu khi người em (Ngân) yêu thầm người anh nuôi (Khanh). Trong khi đó, Khanh chỉ xem Ngân như là người thân duy nhất, người em nũng nịu của mình mà thôi. Và tình yêu, Khanh chỉ dành duy nhất cho Lê Trinh.', 'https://www.youtube.com/watch?v=Pdcbdi_a_Y8&feature=emb_logo', '90 phút', 'https://cinestar.com.vn/pictures/Cinestar/12-2020/tq.gif'),
(10, 'JOSÉE, NÀNG THƠ CỦA TÔI', 'Kim Jong Kwan', 'C16', 'Tiếng Hàn với phụ đề tiếng Việt ', '2020-12-18', '2020-01-31', 'Bộ phim là câu chuyện tình nên thơ của cậu sinh viên Young Seok (Nam Joo Hyuk) và Josée (Han Ji Min), một cô gái khuyết tật phải ngồi xe lăn vào mùa đông lạnh lẽo. Cuộc gặp gỡ đã khiến thế giới của Josée thay đổi, những ngày tháng đẹp nhất trong cuộc đời họ bắt đầu. Josée muốn được bước ra thế giới bên ngoài, cùng Young Seok đến nơi thật xa nhưng giữa họ có quá nhiều trở ngại. Liệu Young Seok có bên cạnh Josée đi đến tận cùng', 'https://www.youtube.com/watch?v=5GNzx0_ETwM&feature=emb_logo', '107 phút', 'https://cinestar.com.vn/pictures/Cinestar/12-2020/jose.gif'),
(11, 'Kikoriki Du Hành Vượt Thời Gian', 'Denis Chernov', 'P', 'Tiếng Anh với phụ đề và lồng tiếng Việt', '2020-05-18', '2020-06-02', 'Chú thỏ Kikoriki muốn tặng món quà bất ngờ trong ngày sinh nhật của người bạn thân Barry bằng việc liên hệ với Déjà vu – một công ty du lịch xuyên thời gian để đặt một chuyến du lịch thám hiểm. Kém may mắn thay, cả phi hành đoàn trong chuyến đi đều bị thất lạc và rơi vào những khoảng không thời gian khác nhau. KIKORIKI phải làm gì để trở về thời gian hiện tại và cứu lấy Barry và những người bạn?', 'https://www.youtube.com/watch?v=zY8YYaLy6hU', '85 phút', 'https://www.cgv.vn/media/catalog/product/cache/1/small_image/190x260/052b7e4a4f6d2886829431e534ef7a43/k/i/kikoriki-flyer-front_240.jpg'),
(12, 'Solo: Star Wars Ngoại Truyện', 'Ron Howard', 'P', 'Tiếng Anh với phụ đề tiếng Việt', '2020-05-25', '2020-06-10', 'Bộ phim Solo: Star Wars Ngoại truyện của Lucasfilm sẽ dẫn dắt người xem đến với chuyến phiêu lưu của Han Solo, thanh niên lông bông được yêu mến nhất trong lịch sử điện ảnh. Qua những phi vụ liều lĩnh, anh gặp được đồng bọn chí cốt Chewbacca và đụng độ tay cờ bạc khét tiếng Lando Calrissian. Làm thế nào từ gã trai kiêu ngạo, Han Solo trở thành người anh hùng của loạt phim Star Wars?', 'https://www.youtube.com/watch?v=eLq53DPwjP4', '108 phút', 'https://www.cgv.vn/media/catalog/product/cache/1/small_image/190x260/052b7e4a4f6d2886829431e534ef7a43/s/o/solo-payoff_poster_240.png'),
(13, 'Phim Doraemon: Nobita Và Đảo Giấu Vàng', 'Imai Kazuaki', 'P', 'Tiếng Nhật với phụ đề tiếng Việt, tiếng Anh', '2020-05-25', '2020-06-10', '“Tớ sẽ tìm ra hòn đảo kho báu!”… Quyết tâm thực hiện bằng được kế hoạch sau khi hùng hồn tuyên bố với nhóm bạn Jaian, Suneo và Shizuka, nhờ bảo bối “Bản đồ truy tìm kho báu” của Doraemon, Nobita đã tìm thấy một hòn đảo mới đột nhiên xuất hiện giữa Thái Bình Dương…Nobita cùng các bạn bắt đầu chuyến phiêu lưu hướng tới đảo kho báu trên con tàu mang tên “Vầng hào quang Nobita”. Thế nhưng, chưa kịp cập bến, cả nhóm đã bị hải tặc tấn công! Trong lúc chống trả lại kẻ địch, Shizuka đã bị hải tặc bắt cóc lên tàu của chúng! Sau khi chạy thoát khỏi đám hải tặc, nhóm bạn Nobita tình cờ gặp cậu bé Flock trôi dạt trên biển cùng con vẹt robot tên Quiz. Flock vốn là một thợ cơ khí vừa trốn thoát khỏi tàu của lũ hải tặc, cậu biết được bí mật quan trọng của hòn đảo kho báu! Liệu Nobita cùng những người bạn có thể giải cứu Shizuka khỏi tay bè lũ hải tặc xấu xa và khám phá ra bí mật ẩn giấu trên hòn đảo kho báu đang ngủ yên hay không!?', 'https://www.youtube.com/watch?v=5o9nCd67o6U', '117 phút', 'https://www.cgv.vn/media/catalog/product/cache/1/small_image/190x260/052b7e4a4f6d2886829431e534ef7a43/d/o/doraemon240x355_2.jpg'),
(14, 'Giải Cứu Tí Nị', 'Shen Yu & Wang Yan', 'P', 'Lồng tiếng Việt với phụ đề tiếng Anh', '2020-05-28', '2020-06-13', 'Bé con nào cũng đều có một người bạn thú nhồi bông đáng yêu và thân thiết bên cạnh bảo vệ, chúng được xem là những “Hộ Vệ Tuổi Thơ” của bọn trẻ. Cho đến khi… các loại trò chơi công nghệ xuất hiện, chúng “hút” dần các “Năng Lượng Tuổi Thơ” của các bé. “GIẢI CỨU TÍ NỊ” chính là hành trình mạo hiểm của bạn thú bông dũng cảm Hổ Con, đồng hành cùng thú bông hàng xóm Răng Sún, anh Rô-bô và bạn Nấm Nhí; cùng nhau giành lại “Năng Lượng Tuổi Thơ” cho cô chủ nhỏ Tí Nị.', 'https://www.youtube.com/watch?v=FzegFPjVinE', '108 phút', 'https://www.cgv.vn/media/catalog/product/cache/1/small_image/190x260/052b7e4a4f6d2886829431e534ef7a43/p/o/poster_chinh_thuc_240.jpg'),
(15, 'Skyscraper', 'Rawson Marshall Thurber', 'C16', 'Tiếng Anh với phụ đề tiếng Việt', '2020-07-13', NULL, 'Dwayne Johnson (The Rock) sẽ vào vai cựu quân nhân và cựu trưởng nhóm đặc nhiệm giải cứu của FBI Will Ford đầy dũng cảm. Không may trong một nhiệm vụ nguy hiểm, tai nạn khủng khiếp xảy đến với Will làm anh mất đi chân trái của mình. Kể từ đó, Will Ford từ bỏ công việc tại FBI và trở thành chuyên gia đánh giá an ninh cho các tòa nhà. Trong một lần làm việc, Tòa nhà cao 240 tầng với hệ thống an ninh tối tân đột nhiên bị cháy lớn ở tầng 96. Những con người, cạm bẫy và thế lực nào đứng sau thảm họa này chắc chắn đang nhắm vào cựu quân nhân và lấy gia đình anh ra làm con tin. Với kinh nghiệm, sự gan dạ của một người lính cùng tình yêu gia đình mãnh liệt, liệu Will Ford có tìm ra được kẻ chủ mưu và cứu lấy gia đình của anh?', 'https://www.youtube.com/watch?v=t9QePUT-Yt8', '118 phút', 'https://www.cgv.vn/media/catalog/product/cache/1/small_image/190x260/052b7e4a4f6d2886829431e534ef7a43/s/k/sky240x355.jpg'),
(16, 'Cá Mập Siêu Bạo Chúa', 'Jon Turteltaub', 'C16', 'Tiếng Anh với phụ đề tiếng Việt', '2020-08-10', NULL, 'Dự kiến khởi chiếu ngày 10.8.2018', 'https://www.youtube.com/watch?v=dfNqTShwypw', NULL, 'https://www.cgv.vn/media/catalog/product/cache/1/small_image/190x260/052b7e4a4f6d2886829431e534ef7a43/m/e/meg240x355.jpg'),
(17, 'CHỊ MƯỜI BA: 3 NGÀY SINH TỬ', 'Tô Gia Tuấn, Khương Ngọc', 'C18', 'Tiếng Việt - Phụ đề Tiếng Anh', '2020-12-25', '2021-02-04', 'Chị Mười Ba đưa Kẽm Gai, tay đàn em cũ vừa mới ra tù, lên Đà Lạt để làm việc cho tiệm Gara của mình. Tại đây, Kẽm Gai dường như đã tìm lại được sự bình yên và hạnh phúc. Tuy vậy, anh sớm trở thành đối tượng bị tình nghi giết hại Đức Mát - em trai của đại ca Thắng Khùng khét tiếng đất Đà Lạt - và phải trốn chạy. Với thời hạn chỉ ba ngày, liệu Chị Mười Ba có minh oan được cho Kẽm Gai và cứu anh em An Cư Nghĩa Đoàn khỏi mối đe doạ mới? Liệu có bí mật khủng khiếp nào khác đang được che giấu? Tất cả sẽ được hé lộ vào ngày 27/03/2020', 'https://www.youtube.com/watch?v=HmBvoXsU83Q&feature=emb_logo', NULL, 'https://cinestar.com.vn/pictures/Cinestar/02-2020/chi13.jpg'),
(18, 'FAST & FURIOUS 9', 'Justin Lin', 'C16', 'Tiếng Anh với phụ đề tiếng Việt', '2021-02-04', NULL, 'Plot unknown. The ninth installment of the \'Fast and Furious\' franchise.', 'https://www.youtube.com/watch?v=SwwlFvOwkhA&feature=emb_logo', NULL, 'https://www.cinestar.de/media/cache/poster/media//filmbilder/f/fast-furious-9/fast-furious-9-3758f30b43412f615b6a832690ae03ab_poster.jpg'),
(19, 'NGƯỜI CẦN QUÊN PHẢI NHỚ', 'Đỗ Đức Thịnh', 'P', 'Tiếng Việt', '2020-12-25', '2021-02-01', 'Người Cần Quên Phải Nhớ xoay quanh Loan, một nữ phóng viên năng động và nhạy bén. Nghi ngờ cái chết đột ngột của cha mình, cô quyết tâm sử dụng kiến thức nghiệp vụ nhằm vén màn bí mật bằng mọi giá. Trên hành trình “phá án”, Loan đã vô ý khiến Bình, gã giang hồ tưởng ngầu mà dễ mến bị chấn thương rồi mất trí nhớ. Trải qua hàng loạt tình huống dở khóc dở cười, hai người họ dần nảy sinh tình cảm với nhau.', 'https://www.youtube.com/watch?v=RfLnQkiD3iQ&feature=emb_logo', '110 phút', 'https://booking.bhdstar.vn/CDN/media/entity/get/FilmPosterGraphic/HO00002225?referenceScheme=HeadOffice&allowPlaceHolder=true&height=500'),
(20, 'PHIM DORAEMON: NOBITA VÀ NHỮNG BẠN KHỦNG LONG MỚI', ' Kazuaki Imai', 'P', 'Tiếng Anh với phụ đề tiếng Việt', '2020-12-28', '2021-01-30', 'Trong lúc đang tham gia hoạt động khảo cổ ở một cuộc triễn lãm khủng long, Nobita tình cờ tìm thấy một viên hóa thạch và cậu tin rằng đây là trứng khủng long. Nobita liền mượn bảo bối thần kỳ \"khăn trùm thời gian\" của Doraemon để giúp viên hóa thạch trở lại thời của chúng nhưng ngay sau đó, quả trứng liền nở ra một cặp khủng long song sinh. Ngạc nhiên hơn hết, đây lại là loài khủng long mới hoàn toàn và chưa từng được phát hiện.', 'https://www.youtube.com/watch?v=2vdLzk15Z0w&feature=emb_logo', '110 phút', 'https://cinestar.com.vn/pictures/Cinestar/11-2020/doramon.jpg'),
(21, 'WONDER WOMAN 1984', '\r\n\r\nPatty Jenkins', 'C13', 'Tiếng Nhật - Phụ đề Tiếng Việt; Lồng tiếng', '2020-12-25', '2021-01-25', 'Ở đoạn kết Wonder Woman, chàng phi công Steve Trevor đã hy sinh một cách anh hùng còn nàng Diana Prince trở thành nữ thần công lý Wonder Woman. Nhiều năm sau, bằng cách nào đó, Steve Trevor xuất hiện. Bí ẩn gì đằng sau việc Steve chết đi sống lại? Đây là âm mưu nhắm vào Wonder Woman? Tất cả hãy còn rối rắm. Khán giả chỉ biết rằng, ở năm 1984 này, nữ thần sẽ phải đối đầu với ít nhất hai kẻ thù – Max Lord và Cheetah. Có rất nhiều đồn đoán về sự hồi sinh kỳ lạ của Steve Trevor. Từng có giả thiết cho rằng, Wonder Woman 1984 sẽ học theo phim truyền hình cùng tên – đây không phải Steve Trevor mà là con anh ta. Tuy nhiên, từ những gì xảy ra trong trailer, khả năng đó bị bác bỏ. Có thể anh du hành vượt thời gian, chứng minh qua việc Steve ngơ ngác với vật dụng thời hiện đại. Khả năng cao hơn, Steve này là do phản diện tạo ra để ám hại Diana. Xem thêm tại: https://www.galaxycine.vn/dat-ve/wonder-woman-1984', 'https://www.youtube.com/watch?v=mXgjCeCGMDI&feature=emb_logo', '151 phút', 'https://cinestar.com.vn/pictures/Cinestar/12-2020/ww.gif'),
(22, 'Võ Sinh ĐAỊ CHIẾN', 'Bá Cường', 'P', 'Tiếng Việt', '2021-01-01', '2021-02-05', 'Khoa (Tiến Hoàng) từ Bình Định vào Tp. Hồ Chí Minh nhập học. Tại ngôi trường mới, cậu chàng đăng ký xin vào cậu lạc bộ Võ Ta và phải lòng ngay Khánh Trang (Katleen Phan) - hot girl làng võ đang được bao chàng trai theo đuổi. Cũng từ đây, những rắc rối không kém phần hài hước bắt đầu diễn ra...', 'https://www.youtube.com/watch?v=VTF15uAq5sI&feature=emb_logo', 'NULL', 'https://cinestar.com.vn/pictures/Cinestar/12-2020/vosinhdaichien.gif'),
(23, 'THỢ SĂN QUÁI VẬT', 'Phan Gia Nhật Linh', 'P', 'Tiếng Anh phụ đề tiếng việt', '2021-02-12', NULL, '\r\nNgay từ khi trailer được hé lộ, công chúng đã vô cùng thích thú bởi tạo hình nhân vật gần như sát ', 'https://www.youtube.com/watch?v=iQQjZ3VIFPs', NULL, 'https://cinestar.com.vn/pictures/Cinestar/12-2020/tsqv.gif'),
(24, 'NO TIME TO DIE', 'Cary Joji Fukunaga\r\n', 'C13', 'Tiếng Anh phụ đề tiếng việt', '2021-02-04', NULL, 'Trong \"No Time To Die\", Bond không còn hoạt động tình báo mà đang tận hưởng cuộc sống yên bình ở Jamaica. Tuy nhiên, quãng thời gian nghỉ ngơi của anh không kéo dài được lâu khi người bạn cũ Felix Leiter từ CIA xuất hiện, cầu xin sự giúp đỡ. Bond sẽ thực hiện nhiệm vụ giải cứu nhà khoa học bị bắt cóc, và từ đó dẫn anh đến với tên ác nhân sở hữu một loại công nghệ nguy hiểm.\r\n', 'https://www.youtube.com/watch?v=vw2FOYjCz38', NULL, 'https://cinestar.com.vn/pictures/Cinestar/6-2020/notime.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phong_chieu`
--

CREATE TABLE `phong_chieu` (
  `maphong` int(11) NOT NULL,
  `marap` int(11) NOT NULL,
  `soghe` int(11) DEFAULT NULL,
  `tenloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phong_chieu`
--

INSERT INTO `phong_chieu` (`maphong`, `marap`, `soghe`, `tenloai`) VALUES
(1, 1, 120, '3D'),
(2, 1, 120, 'Thường'),
(3, 1, 120, 'Imax'),
(4, 2, 120, 'Thường'),
(5, 2, 120, 'Imax'),
(6, 2, 120, '3D');

-- --------------------------------------------------------

--
-- Table structure for table `rap_chieu`
--

CREATE TABLE `rap_chieu` (
  `marap` int(11) NOT NULL,
  `tenrap` varchar(50) DEFAULT NULL,
  `daichi` varchar(100) DEFAULT NULL,
  `sodt` varchar(20) DEFAULT NULL,
  `soluongphong` int(11) DEFAULT NULL,
  `giomo` time DEFAULT NULL,
  `giodong` time DEFAULT NULL,
  `mota` varchar(200) DEFAULT NULL,
  `hinh_anh` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rap_chieu`
--

INSERT INTO `rap_chieu` (`marap`, `tenrap`, `daichi`, `sodt`, `soluongphong`, `giomo`, `giodong`, `mota`, `hinh_anh`) VALUES
(1, 'SHTEAM Cinema Golden Plaza', 'Lầu 4, Trung tâm thương mại Golden Plaza, 465 Hồng Bàng, Phường 14, Quận 5, Hồ Chí Minh', '1900 6017', 3, NULL, NULL, NULL, 'http://cdn01.diadiemanuong.com/ddau/640x/gioi-tre-do-xo-xem-phim-mien-phi-tai-cgv-golden-plaza-vua-moi-khai-truong-2d4d58c5636263113300801696.jpg'),
(2, 'SHTEAM Cinema Nhà văn hóa sinh viên', 'Tầng 5, Nhà văn hóa sinh viên, Dĩ An ,Bình Dương', '1900 6017', 3, NULL, NULL, NULL, 'https://i.ytimg.com/vi/-NezpZKihgw/maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `suat_chieu`
--

CREATE TABLE `suat_chieu` (
  `masuatchieu` int(11) NOT NULL,
  `ngaychieu` date DEFAULT NULL,
  `makhunggio` int(11) NOT NULL,
  `maphim` int(11) NOT NULL,
  `maphong` int(11) NOT NULL,
  `marap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `suat_chieu`
--
DELIMITER $$
CREATE TRIGGER `kt_suat_chieu` AFTER INSERT ON `suat_chieu` FOR EACH ROW BEGIN
	DECLARE khoi_chieu DATE;
    SET khoi_chieu = (select p.batdau from phim as p 
    	where p.maphim = new.maphim                
    );
    IF new.ngaychieu < khoi_chieu THEN
    	delete from suat_chieu where suat_chieu.masuatchieu = new.masuatchieu;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kt_suat_chieu_1` BEFORE INSERT ON `suat_chieu` FOR EACH ROW BEGIN
    DECLARE done INT DEFAULT FALSE;
	DECLARE ma_khung_gio int;
	DECLARE ma_phim int;
	DECLARE ma_phong int;
	DECLARE ma_rap int;
	DECLARE my_cursor CURSOR FOR select sc.makhunggio,sc.maphim,sc.maphong,sc.marap from suat_chieu as sc;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	OPEN my_cursor;
    read_loop: LOOP
		FETCH my_cursor into ma_khung_gio,ma_phim,ma_phong,ma_rap;
		IF done THEN
 		     LEAVE read_loop;
		END IF;
		IF(ma_phim=new.maphim and ma_khung_gio=new.makhunggio and ma_rap=new.marap and ma_phong=new.maphong)THEN
		delete from suat_chieu where suat_chieu.masuatchieu = new.masuatchieu;
		END IF;
	END LOOP;
	CLOSE my_cursor;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tao_ghe_ngoi` AFTER INSERT ON `suat_chieu` FOR EACH ROW BEGIN
    declare ma_suat_chieu int;
	set ma_suat_chieu=new.masuatchieu;
    call tao_ghe(ma_suat_chieu);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `su_dung_dich_vu`
--

CREATE TABLE `su_dung_dich_vu` (
  `mahoadon` int(11) NOT NULL,
  `madv` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `su_dung_dich_vu`
--

INSERT INTO `su_dung_dich_vu` (`mahoadon`, `madv`, `soluong`) VALUES
(1, 2, 1),
(1, 3, 2),
(2, 4, 2),
(2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `the_loai`
--

CREATE TABLE `the_loai` (
  `maphim` int(11) NOT NULL,
  `theloai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `the_loai`
--

INSERT INTO `the_loai` (`maphim`, `theloai`) VALUES
(1, 'Hành động'),
(1, 'Phiêu lưu'),
(2, 'Phiêu lưu'),
(3, 'Hài'),
(3, 'Hoạt Hình'),
(4, 'Hài'),
(4, 'Tâm lí'),
(5, 'Tâm lý'),
(6, 'Hành động'),
(6, 'Khoa học viễn tưởng'),
(7, 'Hài'),
(7, 'Hành động'),
(8, 'Tội phạm'),
(9, 'Kinh dị'),
(9, 'Tâm lý'),
(10, 'Tâm lí'),
(10, 'Tình cảm'),
(11, 'Hoạt hình'),
(11, 'Phiêu lưu'),
(12, 'Hành Động'),
(12, 'Phiêu lưu'),
(13, 'Hoạt hình'),
(14, 'Hoạt hình'),
(14, 'Phiêu lưu'),
(15, 'Hành động'),
(15, 'Tội phạm'),
(16, 'Hành động'),
(16, 'Kinh dị'),
(17, 'Hài'),
(17, 'Hành động'),
(18, 'Hành động'),
(18, 'Phiêu lưu'),
(19, 'Hài'),
(19, 'Tình cảm'),
(20, 'Hoạt hình'),
(21, 'Hành động'),
(21, 'Thần thoại\r\n'),
(22, 'Hài'),
(22, 'Tình câm\r\n'),
(23, 'Hành động'),
(23, 'Khoa học viễn tưởng\r\n'),
(24, 'Hành động');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(400) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT NULL,
  `sodt` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cmnd` varchar(10) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `ngaysinh`, `gioitinh`, `sodt`, `name`, `cmnd`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'nhuttan@gmail.com', 'nhuttan', '1998-03-08', 1, '0168425933', 'Trần Nhựt Tân', '321456987', NULL, NULL, NULL),
(2, 'tiencuong@gmail.com', 'tiencuong', '1997-09-12', 1, '0125866977', 'Văn Tiến Cường', '312569874', NULL, NULL, NULL),
(3, 'nhuy@gmail.com', 'nhuy', '1995-08-15', 0, '0147569823', 'Nguyễn Thị Như Ý', '326587419', NULL, NULL, NULL),
(4, 'ducmanh@gmail.com', 'ducmanh', '1995-11-12', 1, '0169852365', 'Lê Đức Mạnh', '312478555', NULL, NULL, NULL),
(5, 'thaiminh@gmail.com', 'thaiminh', '1990-06-01', 0, '0125866347', 'Trương Thị Thái Minh', '325144696', NULL, NULL, NULL),
(6, 'thuyhang@gmail.com', 'thuyhang', '1999-04-30', 0, '0153698742', 'Lê Thúy Hằng', '312546985', NULL, NULL, NULL),
(7, 'tuankiet@gmail.com', 'tuankiet', '1998-04-30', 1, '0121355655', 'Lương Tuấn Kiệt', '312564888', NULL, NULL, NULL),
(8, 'hien01247@gmail.com', '$2y$10$XwVM1bh8ZbKMflo.Yut9HOIMj1zVWB/c0ojooGvjXU3FQiSCbmSaC', '2000-11-09', 0, '0975475289', 'Nguyễn Hiền', '197435935', '2020-12-21', '2020-12-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ve`
--

CREATE TABLE `ve` (
  `mave` int(11) NOT NULL,
  `masuatchieu` int(11) NOT NULL,
  `maghe` int(11) NOT NULL,
  `mahoadon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `ve`
--
DELIMITER $$
CREATE TRIGGER `kt_nhatquan_rapchieu` AFTER INSERT ON `ve` FOR EACH ROW BEGIN
	declare marap_ve, marap_sc int;
	set marap_ve = (select gn.marap from ghe_ngoi as gn
    	where gn.maghe = new.maghe             
    );
	set  marap_sc=(select sc.marap from suat_chieu as sc
		where sc.masuatchieu = new.masuatchieu);
	IF marap_ve <> marap_sc 
    THEN 
    	DELETE FROM ve where ve.mave = new.mave;
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD PRIMARY KEY (`madv`);

--
-- Indexes for table `dien_vien`
--
ALTER TABLE `dien_vien`
  ADD PRIMARY KEY (`maphim`,`dienvien`);

--
-- Indexes for table `ghe_ngoi`
--
ALTER TABLE `ghe_ngoi`
  ADD PRIMARY KEY (`maghe`),
  ADD KEY `tenloai` (`tenloai`),
  ADD KEY `masuatchieu` (`masuatchieu`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`mahoadon`),
  ADD KEY `matk_kh` (`idkh`);

--
-- Indexes for table `khung_gio`
--
ALTER TABLE `khung_gio`
  ADD PRIMARY KEY (`makhunggio`);

--
-- Indexes for table `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`makm`);

--
-- Indexes for table `loai_ghe`
--
ALTER TABLE `loai_ghe`
  ADD PRIMARY KEY (`tenloai`);

--
-- Indexes for table `loai_phong`
--
ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`tenloai`);

--
-- Indexes for table `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`maphim`);

--
-- Indexes for table `phong_chieu`
--
ALTER TABLE `phong_chieu`
  ADD PRIMARY KEY (`maphong`,`marap`),
  ADD KEY `tenloaiphong` (`tenloai`),
  ADD KEY `marap` (`marap`);

--
-- Indexes for table `rap_chieu`
--
ALTER TABLE `rap_chieu`
  ADD PRIMARY KEY (`marap`);

--
-- Indexes for table `suat_chieu`
--
ALTER TABLE `suat_chieu`
  ADD PRIMARY KEY (`masuatchieu`),
  ADD KEY `makhunggio` (`makhunggio`),
  ADD KEY `maphim` (`maphim`),
  ADD KEY `maphong` (`maphong`),
  ADD KEY `marap` (`marap`);

--
-- Indexes for table `su_dung_dich_vu`
--
ALTER TABLE `su_dung_dich_vu`
  ADD PRIMARY KEY (`mahoadon`,`madv`),
  ADD KEY `su_dung_dich_vu_ibfk_1` (`madv`);

--
-- Indexes for table `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`maphim`,`theloai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ve`
--
ALTER TABLE `ve`
  ADD PRIMARY KEY (`mave`),
  ADD KEY `masuatchieu` (`masuatchieu`),
  ADD KEY `maghe` (`maghe`),
  ADD KEY `mahoadon` (`mahoadon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dich_vu`
--
ALTER TABLE `dich_vu`
  MODIFY `madv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ghe_ngoi`
--
ALTER TABLE `ghe_ngoi`
  MODIFY `maghe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `mahoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `khung_gio`
--
ALTER TABLE `khung_gio`
  MODIFY `makhunggio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `makm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phim`
--
ALTER TABLE `phim`
  MODIFY `maphim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `phong_chieu`
--
ALTER TABLE `phong_chieu`
  MODIFY `maphong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rap_chieu`
--
ALTER TABLE `rap_chieu`
  MODIFY `marap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suat_chieu`
--
ALTER TABLE `suat_chieu`
  MODIFY `masuatchieu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ve`
--
ALTER TABLE `ve`
  MODIFY `mave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dien_vien`
--
ALTER TABLE `dien_vien`
  ADD CONSTRAINT `dien_vien_ibfk_1` FOREIGN KEY (`maphim`) REFERENCES `phim` (`maphim`);

--
-- Constraints for table `ghe_ngoi`
--
ALTER TABLE `ghe_ngoi`
  ADD CONSTRAINT `ghe_ngoi_ibfk_1` FOREIGN KEY (`masuatchieu`) REFERENCES `suat_chieu` (`masuatchieu`),
  ADD CONSTRAINT `ghe_ngoi_ibfk_2` FOREIGN KEY (`tenloai`) REFERENCES `loai_ghe` (`tenloai`);

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`idkh`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `phong_chieu`
--
ALTER TABLE `phong_chieu`
  ADD CONSTRAINT `phong_chieu_ibfk_1` FOREIGN KEY (`marap`) REFERENCES `rap_chieu` (`marap`),
  ADD CONSTRAINT `phong_chieu_ibfk_2` FOREIGN KEY (`tenloai`) REFERENCES `loai_phong` (`tenloai`);

--
-- Constraints for table `suat_chieu`
--
ALTER TABLE `suat_chieu`
  ADD CONSTRAINT `suat_chieu_ibfk_1` FOREIGN KEY (`makhunggio`) REFERENCES `khung_gio` (`makhunggio`),
  ADD CONSTRAINT `suat_chieu_ibfk_2` FOREIGN KEY (`maphim`) REFERENCES `phim` (`maphim`),
  ADD CONSTRAINT `suat_chieu_ibfk_3` FOREIGN KEY (`maphong`) REFERENCES `phong_chieu` (`maphong`),
  ADD CONSTRAINT `suat_chieu_ibfk_4` FOREIGN KEY (`marap`) REFERENCES `rap_chieu` (`marap`);

--
-- Constraints for table `su_dung_dich_vu`
--
ALTER TABLE `su_dung_dich_vu`
  ADD CONSTRAINT `su_dung_dich_vu_ibfk_1` FOREIGN KEY (`madv`) REFERENCES `dich_vu` (`madv`) ON UPDATE CASCADE,
  ADD CONSTRAINT `su_dung_dich_vu_ibfk_2` FOREIGN KEY (`mahoadon`) REFERENCES `hoa_don` (`mahoadon`);

--
-- Constraints for table `the_loai`
--
ALTER TABLE `the_loai`
  ADD CONSTRAINT `the_loai_ibfk_1` FOREIGN KEY (`maphim`) REFERENCES `phim` (`maphim`);

--
-- Constraints for table `ve`
--
ALTER TABLE `ve`
  ADD CONSTRAINT `ve_ibfk_1` FOREIGN KEY (`masuatchieu`) REFERENCES `suat_chieu` (`masuatchieu`),
  ADD CONSTRAINT `ve_ibfk_2` FOREIGN KEY (`maghe`) REFERENCES `ghe_ngoi` (`maghe`),
  ADD CONSTRAINT `ve_ibfk_3` FOREIGN KEY (`mahoadon`) REFERENCES `hoa_don` (`mahoadon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
