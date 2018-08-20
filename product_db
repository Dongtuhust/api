use product_db;

CREATE TABLE `category` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `image_uri` varchar(45) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `category` (`id`, `name`, `image_uri`, `title`) VALUES
(1, 'Bắn súng', '../image/img1.jpg', 'Một trải nghiệm góc nhìn'),
(2, 'Thể thao', '../image/img7.jpg', 'Sport is life'),
(3, 'Đối kháng', '../image/img8.jpg', 'Chiến đấu để sống sót'),
(4, 'Nhập vai', '../image/img6.jpg', 'Hòa mình vào các siêu anh hùng'),
(5, 'Kinh dị', '../image/img5.jpg', 'Nỗi sợ hãi bao chùm');
CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `product_image` varchar(40) NOT NULL,
  `detail_image` varchar(20) NOT NULL,
  `category_id` int(10) NOT NULL,
  `distributor` varchar(30) NOT NULL,
  `quantity` int(5) DEFAULT '1',
  `status` varchar(10) NOT NULL,
  `created_time` date NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `purcharse_number` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `products` (`id`, `name`, `price`, `description`, `product_image`, `detail_image`, `category_id`, `distributor`, `quantity`, `status`, `created_time`, `purcharse_number`) VALUES
(1, 'Couter Stricke', 1200000, 'Counter-Strike đã làm ngành công nghiệp game bất ngờ khi MOD không thành công trở thành trò chơi hành động trực tuyến được chơi nhiều nhất trên thế giới gần như ngay lập tức sau khi phát hành vào tháng 8 năm 1999', '../image/img1.jpg', '../image/img1', 1, 'Sony', 135, 'Hot', '0000-00-00', 0),
(2, 'Layers of fear', 700000, 'Đắm chìm trong tâm trí của một nghệ sĩ điên và khám phá những bí ẩn của sự điên rồ của mình, đi qua hành lang là thực hiện chuyển đổi biệt thự Victorian sâu rộng và liên tục. Trải nghiệm những tầm nhìn, nỗi sợ hãi và lo lắng của một họa sĩ thiên tài và hoàn thành kiệt tác, mà nghệ sĩ đã phải vật lộn. ', '../image/img2.jpg', '../image/img2', 5, 'Capcom', 124, 'Mới', '0000-00-00', 1),
(3, 'Amazing Spiderman', 1200000, 'The Amazing Spider-Man 2 là cơ hội của Peter Parker để tỏa sáng. Danh tính của Spider-Man, tất cả quá xấu hổ được dành nhiều thời gian hơn trong sự chú ý của PlayStation 4, điều này có nghĩa là cũng như việc đánh đu, slinging và ngăn chặn tội phạm, bạn sẽ được đào sâu vào nền tảng của một số siêu sao xuất sắc nhất của Marvel, kẻ thù và làm sáng tỏ một âm mưu đe dọa chìm đắm Manhattan.', '../image/img3.jpg', '../image/img3', 4, 'Konami', 65, 'Cũ', '0000-00-00', 0),
(4, 'Hear they lie', 600000, 'Hear they Lie vận chuyển bạn đến một thế giới đáng sợ mà từ đó bạn không thể trốn thoát. Khám phá một thành phố ác mộng, nơi sinh sống của những sinh vật lạ lẫm, độc ác trong trò chơi kinh dị đầu tiên phá vỡ tính tương thích với PlayStation VR.   Cuộc đấu tranh để tồn tại khi bạn vật lộn với cuộc sống hoặc cái chết lựa chọn đạo đức và cố gắng khám phá những bí ẩn của người phụ nữ màu vàng.', '../image/img4.jpg', '../image/img4', 5, 'Sony', 30, 'Hot', '0000-00-00', 0),
(5, 'Resident Evil 7', 1300000, 'Tiếp theo Resident Evil 5 và Resident Evil 6 , Resident Evil 7 sẽ trở lại với rễ kinh dị sống còn của franchise, với sự nhấn mạnh về thăm dò', '../image/img5.jpg', '../image/img5', 5, 'WB Games', 142, 'Hot', '0000-00-00', 0),
(6, 'The Division', 700000, 'Bộ phận The DivisionTM của Tom Clancy là một trải nghiệm RPG thực tế khiến cho thể loại này trở thành một thiết lập quân sự hiện đại lần đầu tiên.', '../image/img6.jpg', '../image/img6', 4, 'Rare', 171, 'Mới', '0000-00-00', 2),
(7, 'Need for speed', 850000, 'Need For Speed phiên bản 2015 hứa hẹn sẽ là một game thỏa mãn cơn khát tốc độ của cộng đồng game thủ, vì game sẽ mang trở lại những yếu tố làm nên tên tuổi của dòng game Need for Speed từ xưa tới nay.', '../image/img7.jpg', '../image/img7', 2, 'Rare', 217, 'Mới', '0000-00-00', 1),
(8, 'Mortal Kombat X', 800000, 'Mortal Kombat X là phần mới nhất của dòng game song đấu đầy bạo lực của NetherRealm Studios. Đây là phiên bản thứ 10 của cả dòng game dự kiến sẽ ra mắt trên mọi hệ máy vào tháng 4 năm 2015 với dàn nhân vật được bổ sung thêm nhằm thay máu cho game.', '../image/img8.jpg', '../image/img8', 3, 'Sony', 179, 'Cũ', '0000-00-00', 0),
(9, 'Fifa 17', 900000, 'FIFA 17 thu hút   bạn trong những trải nghiệm bóng đá đích thực bằng cách tận dụng sự tinh tế của một engine game mới, trong khi giới thiệu bạn với những người chơi bóng đá đầy chiều sâu và cảm xúc và đưa bạn đến những thế giới hoàn toàn mới chỉ có thể truy cập được trong trò chơi. Đổi mới hoàn toàn theo cách mà người chơi nghĩ và di chuyển, tương tác vật lý với đối thủ và thực hiện tấn công cho phép bạn sở hữu mọi khoảnh khắc trên sân.', '../image/img9.jpg', '../image/img9', 2, 'Capcom', 336, 'Hot', '0000-00-00', 0),
(10, 'Street Fighter V', 900000, 'Street Fighter V là phần thứ năm trong seri game chiến đấu Street Fighter của Nhật Bản ra mắt lần đầu vào năm 1987. Tương tự như các phiên bản Street Fighter trước, nó được phát triển bởi Capcom. Mặc dù thực tế cho thấy rằng có rất ít sự khác biệt trong hình ảnh giữa Street Fighter V và các game trước của seri, Street Fighter V có yêu cầu hệ thống hơi lớn hơn. Tuy nhiên, sự khác biệt là không quá lớn để yêu cầu các bạn phải có một máy tính cao cấp. Game sẽ có 16 nhân vật lúc khởi động, trong đó ', '../image/img10.jpg', '../image/img10', 3, 'WB Games', 98, 'Cũ', '0000-00-00', 0),
(11, 'Watch Dogs 2', 700000, 'Nhân vật chính của chúng ta không hề ngạc nhiên vẫn tiếp tục là một hacker sừng sỏ có thể kiểm soát gần như mọi hoạt động trong thành phố chỉ bằng thao tác trên chiếc điện thoại thông minh. Dù vậy Aiden Pearce đã rời khỏi cuộc chơi để nhường chỗ cho Marcus Holloway - một người Mỹ da màu sinh sống ở vùng vịnh Oakland, San Francisco.', '../image/img11.jpg', '../image/img11', 1, 'Sony', 95, 'Cũ', '0000-00-00', 0),
(12, 'Let It Die', 800000, 'Chiến đấu để đạt được vị trí cao nhất trong hành động sống còn hỗn loạn và bong bóng này đang diễn ra tự do để chơi đến một cấp độ hoàn toàn mới. Bắt đầu cuộc hành trình của bạn trong bộ đồ lót của bạn và sống sót bằng bất kỳ phương tiện cần thiết trong khi tham khảo ý kiến <200b><200b>từ Chú chim, một máy gặt ván trượt', '../image/img12.jpg', '../image/img12', 5, 'Konami', 178, 'Cũ', '0000-00-00', 0),
(13, 'Yakuza', 1200000, 'Chiến đấu như địa ngục qua Tokyo và Osaka với nhân vật chính Kazuma Kiryu và hàng loạt Goro Majima bình thường. Chơi với tư cách là Kazuma Kiryu và khám phá cách anh ta thấy mình đang ở trong một thế giới rắc rối khi một bộ sưu tập nợ đơn giản trở nên sai lầm và dấu ấn của anh ấy đã bị sát hại. Sau đó, bước vào đôi giày bạc của Goro Majima và khám phá cuộc sống ', '../image/yakuza.jpg', '../image/yakuza', 4, 'Sony', 119, 'Mới', '0000-00-00', 3);
