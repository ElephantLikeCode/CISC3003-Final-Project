## You need to insert these data in order to keep the website run correctly
CREATE DATABASE cisc3003;

CREATE TABLE `meals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `nutrition` text,
  `image` varchar(45) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO `meals` (`id`, `title`, `description`, `nutrition`, `image`, `price`) VALUES 
('1', 'Greek Chicken Gyros', 'Made with an Indian twist to easily serve up for weeknight dinners.', 'cal=541&protein=40&carbs=52&fat=17', 'meal1.avif', '52'), 
('2', 'Naked Chicken Burrito Bowl', 'Full of flavour and simple to put together and will keep you satisfied the whole day through.', 'cal=278&protein=30&carbs=35&fat=8', 'meal2.avif', '60'), 
('3', 'Air Fryer Chicken Skewers', 'Delicious chicken skewers that can be made any day of the year. Made with a sticky, tasty marinade and completed with a portion of rice and your favourite veg or salsa.', 'cal=356&protein=35&carbs=47&fat=4', 'meal3.avif', '38'), 
('4', 'Creamy Cajun Chicken Pasta', 'This Cajun chicken pasta is a super tasty way to pack in protein and keep you full and feeling good.', 'cal=516&protein=38&carbs=71&fat=8', 'meal4.avif', '75'), 
('5', 'Chilli Turkey Burgers', 'These low-cal homemade lime and chilli turkey burgers will spice up your meal prep game and then some, at only 147kcal per burger.', 'cal=147&protein=17&carbs=10&fat=5', 'meal5.avif', '68'), 
('6', 'Peanut Butter Chicken Curry', 'Peanut butter lovers, this incredible recipe is definitely one to try. Immediately.', 'cal=398&protein=24&carbs=19&fat=24', 'meal6.avif', '72'), 
('7', 'Creamy Lemon & Thyme Chicken', 'You\'ll be looking forward to your next meal with this creamy lemon and thyme chicken waiting for you.', 'cal=398&protein=24&carbs=19&fat=24', 'meal7.avif', '55'), 
('8', 'Chicken & Chorizo Paella', 'A summery makeover of the classic chicken and rice meal prep with this traditional Spanish paella.', 'cal=404&protein=31&carbs=52&fat=7', 'meal8.avif', '58');


CREATE TABLE `meal_comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `meal_id` int NOT NULL,
  `user_name` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `timestamp` varchar(15) NOT NULL,
  PRIMARY KEY (comment_id)
);

INSERT INTO `meal_comment` (`comment_id`, `meal_id`, `user_name`, `title`, `content`, `timestamp`) VALUES
(1, 1, 'admin01', 'Testing', 'This is a testing comment.', '1714816501'),
(3, 1, 'admin02', 'Testing 02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra posuere elementum. Sed in enim turpis. Nunc nibh ligula, sodales.', '1714816501'),
(26, 1, 'admin', 'Test Add', 'I add a comment to this meal!', '1714856825'),
(27, 2, 'admin', 'Testing meal02', 'this is a test :)', '1714857712');


CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `total` float NOT NULL,
  `order_content` text NOT NULL,
  `timestamp` varchar(15) NOT NULL,
  PRIMARY KEY (order_id)
);

INSERT INTO `orders` (`order_id`, `user_name`, `total`, `order_content`, `timestamp`) VALUES
(32, 'admin', 488, 'a:8:{s:5:\"meal0\";s:1:\"4\";s:5:\"meal1\";s:1:\"0\";s:5:\"meal2\";s:1:\"0\";s:5:\"meal3\";s:1:\"0\";s:5:\"meal4\";s:1:\"0\";s:5:\"meal5\";s:1:\"0\";s:5:\"meal6\";s:1:\"5\";s:5:\"meal7\";s:1:\"0\";}', '1714835440');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
`Email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`user_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
PRIMARY KEY (`Email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1443387396@qq.com', '德玛西陈', '20140304Aa');
INSERT INTO `user` VALUES ('1443387397@qq.com', '德玛西陈', '20140304Aa');
INSERT INTO `user` VALUES ('a1443387396@gmail.com', '德玛西陈', '20140304Aa');

DROP TABLE IF EXISTS `bookingrecord`;
CREATE TABLE `bookingrecord`  (
`bookingId` int NOT NULL,
`startDate` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`startTime` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`endDate` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`endTime` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`number` int NOT NULL,
`itemName` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
PRIMARY KEY (`bookingId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

