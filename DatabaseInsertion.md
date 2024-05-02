## You need to insert these data in order to keep the website run correctly
CREATE DATABASE cisc3003
---
CREATE TABLE `meals` (
  `id` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(45) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
)
---
INSERT INTO `meals` (`id`, `title`, `description`, `image`, `price`) VALUES 
('1', 'Greek Chicken Gyros', 'Made with an Indian twist to easily serve up for weeknight dinners.', 'meal1.avif', '52'), 
('2', 'Naked Chicken Burrito Bowl', 'Full of flavour and simple to put together and will keep you satisfied the whole day through.', 'meal2.avif', '60'), 
('3', 'Air Fryer Chicken Skewers', 'Delicious chicken skewers that can be made any day of the year. Made with a sticky, tasty marinade and completed with a portion of rice and your favourite veg or salsa.', 'meal3.avif', '38'), 
('4', 'Creamy Cajun Chicken Pasta', 'This Cajun chicken pasta is a super tasty way to pack in protein and keep you full and feeling good.', 'meal4.avif', '75'), 
('5', 'Chilli Turkey Burgers', 'These low-cal homemade lime and chilli turkey burgers will spice up your meal prep game and then some, at only 147kcal per burger.', 'meal5.avif', '68'), 
('6', 'Peanut Butter Chicken Curry', 'Peanut butter lovers, this incredible recipe is definitely one to try. Immediately.', 'meal6.avif', '72'), 
('7', 'Creamy Lemon & Thyme Chicken', 'You\'ll be looking forward to your next meal with this creamy lemon and thyme chicken waiting for you.', 'meal7.avif', '55'), 
('8', 'Chicken & Chorizo Paella', 'A summery makeover of the classic chicken and rice meal prep with this traditional Spanish paella.', 'meal8.avif', '58')
