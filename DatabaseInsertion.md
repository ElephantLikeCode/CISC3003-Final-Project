## You need to insert these data in order to keep the website run correctly
CREATE DATABASE cisc3003;
USE cisc3003;

CREATE TABLE `meals` (
  `id` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(45) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO `meals` (`id`, `title`, `description`, `image`, `price`) VALUES 
('1', 'Greek Chicken Gyros', 'Made with an Indian twist to easily serve up for weeknight dinners.', 'meal1.avif', '52'), 
('2', 'Naked Chicken Burrito Bowl', 'Full of flavour and simple to put together and will keep you satisfied the whole day through.', 'meal2.avif', '60'), 
('3', 'Air Fryer Chicken Skewers', 'Delicious chicken skewers that can be made any day of the year. Made with a sticky, tasty marinade and completed with a portion of rice and your favourite veg or salsa.', 'meal3.avif', '38'), 
('4', 'Creamy Cajun Chicken Pasta', 'This Cajun chicken pasta is a super tasty way to pack in protein and keep you full and feeling good.', 'meal4.avif', '75'), 
('5', 'Chilli Turkey Burgers', 'These low-cal homemade lime and chilli turkey burgers will spice up your meal prep game and then some, at only 147kcal per burger.', 'meal5.avif', '68'), 
('6', 'Peanut Butter Chicken Curry', 'Peanut butter lovers, this incredible recipe is definitely one to try. Immediately.', 'meal6.avif', '72'), 
('7', 'Creamy Lemon & Thyme Chicken', 'You\'ll be looking forward to your next meal with this creamy lemon and thyme chicken waiting for you.', 'meal7.avif', '55'), 
('8', 'Chicken & Chorizo Paella', 'A summery makeover of the classic chicken and rice meal prep with this traditional Spanish paella.', 'meal8.avif', '58');

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(45) NOT NULL,
  `links` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `news` (`id`, `title`, `description`, `image`, `links`) VALUES
('1', 'Squats', 'Squats are a compound, full-body exercise that is a staple for training the leg muscles. The deeper you squat, the more lung capacity you need, thus enhancing cardiovascular function.', 'gif (1).webp', 'https://youtube.com/shorts/gslEzVggur8?si=Q476sNWri3D_nl0L'), 
('2', 'Pull-ups', 'As a bodyweight exercise, pull-ups are one of the fundamental exercises for training the back. To enhance your training, opt for a wide grip, which helps balance your arm muscles and develop the back.', 'gif (2).webp', 'https://youtube.com/shorts/dvG8B2OjfWk?si=IDfbYIqfUvZXIrbI'), 
('3', 'Machine Shoulder Press', 'Machine shoulder press primarily targets the deltoid muscles and is suitable for beginners to feel the muscles and exert force. It stimulates the entire shoulder area and requires coordination from the triceps and core. If you want to train your shoulders effectively, this exercise is perfect!', 'gif (3).webp', 'https://youtube.com/shorts/a4ZUOE6Arfk?si=1YcfhlRCv5B-XNt-'), 
('4', 'Seated Cable Rows', 'The back is the strongest muscle group in our body, and back training mainly revolves around pulling movements. Seated cable rows effectively target the entire back and concentrate on stimulating the upper body, including the arms and even the core.', 'gif (4).webp', 'https://youtube.com/shorts/fPbfYDgzIgA?si=tnFW5TmumxHuOw92'), 
('5', 'Barbell Curls', 'Barbell curls are indispensable for building strong arms. When performing this exercise to train the biceps, you can easily feel the muscles working. It is the most effective method for training the biceps and forearm muscles.', 'gif (5).webp', 'https://youtube.com/shorts/N6paU6TGFWU?si=ODEVWRHpENcanPlP'), 
('6', 'Barbell Deadlifts', 'Barbell deadlifts are one of the best strength training exercises. Besides blasting your back, they also effectively stimulate the glutes, involving more muscles. In other words, practicing deadlifts can make your entire body stronger.', 'gif (6).webp', 'https://youtube.com/shorts/vfKwjT5-86k?si=FdkBk-0pGdJr5-hk'), 
('7', 'Weighted Crunches', 'Crunches are the most common abdominal exercise, mainly targeting the rectus abdominis. If your abs are still not well-defined after training for some time and you feel the results are mediocre, you can try adding weights to experience stronger muscle stimulation in the abdominal region.', 'gif (7).webp', 'https://youtube.com/shorts/OHXg_93MiKE?si=wozcGp-0YCi-wrVg'), 
('8', 'Triceps Dips', 'Triceps dips, also known as arm dips, are a classic bodyweight exercise that provides maximum stimulation to the chest, triceps, and deltoids. If you want to have strong and well-defined arms, choosing this exercise is crucial.', 'gif (8).webp', 'https://youtube.com/shorts/SpSE_A5L-YA?si=HfLT4tb6OsCQw34g');

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

-- ----------------------------
-- Records of bookingrecord
-- ----------------------------
INSERT INTO `bookingrecord` VALUES (1, '2024-04-29', '17:27', '2024-05-29', '14:31', 2, 'Spinning-Bike', '');

-- ----------------------------
-- Table structure for meal_comment
-- ----------------------------
DROP TABLE IF EXISTS `meal_comment`;
CREATE TABLE `meal_comment`  (
`comment_id` int NOT NULL AUTO_INCREMENT,
`meal_id` int NOT NULL,
`user_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`timestamp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
PRIMARY KEY (`comment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of meal_comment
-- ----------------------------
INSERT INTO `meal_comment` VALUES (1, 1, 'admin01', 'Testing', 'This is a testing comment.', '1714816501');
INSERT INTO `meal_comment` VALUES (3, 1, 'admin02', 'Testing 02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra posuere elementum. Sed in enim turpis. Nunc nibh ligula, sodales.', '1714816501');
INSERT INTO `meal_comment` VALUES (26, 1, 'admin', 'Test Add', 'I add a comment to this meal!', '1714856825');
INSERT INTO `meal_comment` VALUES (27, 2, 'admin', 'Testing meal02', 'this is a test :)', '1714857712');

-- ----------------------------
-- Table structure for meals
-- ----------------------------
DROP TABLE IF EXISTS `meals`;
CREATE TABLE `meals`  (
`id` int NOT NULL AUTO_INCREMENT,
`title` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`nutrition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
`image` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`price` int NOT NULL,
PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of meals
-- ----------------------------
INSERT INTO `meals` VALUES (1, 'Greek Chicken Gyros', 'Made with an Indian twist to easily serve up for weeknight dinners.', 'cal=541&protein=40&carbs=52&fat=17', 'meal1.avif', 52);
INSERT INTO `meals` VALUES (2, 'Naked Chicken Burrito Bowl', 'Full of flavour and simple to put together and will keep you satisfied the whole day through.', 'cal=278&protein=30&carbs=35&fat=8', 'meal2.avif', 60);
INSERT INTO `meals` VALUES (3, 'Air Fryer Chicken Skewers', 'Delicious chicken skewers that can be made any day of the year. Made with a sticky, tasty marinade and completed with a portion of rice and your favourite veg or salsa.', 'cal=356&protein=35&carbs=47&fat=4', 'meal3.avif', 38);
INSERT INTO `meals` VALUES (4, 'Creamy Cajun Chicken Pasta', 'This Cajun chicken pasta is a super tasty way to pack in protein and keep you full and feeling good.', 'cal=516&protein=38&carbs=71&fat=8', 'meal4.avif', 75);
INSERT INTO `meals` VALUES (5, 'Chilli Turkey Burgers', 'These low-cal homemade lime and chilli turkey burgers will spice up your meal prep game and then some, at only 147kcal per burger.', 'cal=147&protein=17&carbs=10&fat=5', 'meal5.avif', 68);
INSERT INTO `meals` VALUES (6, 'Peanut Butter Chicken Curry', 'Peanut butter lovers, this incredible recipe is definitely one to try. Immediately.', 'cal=398&protein=24&carbs=19&fat=24', 'meal6.avif', 72);
INSERT INTO `meals` VALUES (7, 'Creamy Lemon & Thyme Chicken', 'You\'ll be looking forward to your next meal with this creamy lemon and thyme chicken waiting for you.', 'cal=398&protein=24&carbs=19&fat=24', 'meal7.avif', 55);
INSERT INTO `meals` VALUES (8, 'Chicken & Chorizo Paella', 'A summery makeover of the classic chicken and rice meal prep with this traditional Spanish paella.', 'cal=404&protein=31&carbs=52&fat=7', 'meal8.avif', 58);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
`order_id` int NOT NULL AUTO_INCREMENT,
`user_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`total` float NOT NULL,
`order_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`timestamp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
PRIMARY KEY (`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (32, 'admin', 488, 'a:8:{s:5:\"meal0\";s:1:\"4\";s:5:\"meal1\";s:1:\"0\";s:5:\"meal2\";s:1:\"0\";s:5:\"meal3\";s:1:\"0\";s:5:\"meal4\";s:1:\"0\";s:5:\"meal5\";s:1:\"0\";s:5:\"meal6\";s:1:\"5\";s:5:\"meal7\";s:1:\"0\";}', '1714835440');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
`Email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`user_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
`isadmin` boolean CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
PRIMARY KEY (`Email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1443387396@qq.com', '德玛西陈', '20140304Aa');
INSERT INTO `user` VALUES ('1443387397@qq.com', '德玛西陈', '20140304Aa');
INSERT INTO `user` VALUES ('a1443387396@gmail.com', '德玛西陈', '20140304Aa');
