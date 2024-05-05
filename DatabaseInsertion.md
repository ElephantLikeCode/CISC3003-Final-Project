## You need to insert these data in order to keep the website run correctly
CREATE DATABASE cisc3003

CREATE TABLE `meals` (
  `id` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(45) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
)


INSERT INTO `meals` (`id`, `title`, `description`, `image`, `price`) VALUES 
('1', 'Greek Chicken Gyros', 'Made with an Indian twist to easily serve up for weeknight dinners.', 'meal1.avif', '52'), 
('2', 'Naked Chicken Burrito Bowl', 'Full of flavour and simple to put together and will keep you satisfied the whole day through.', 'meal2.avif', '60'), 
('3', 'Air Fryer Chicken Skewers', 'Delicious chicken skewers that can be made any day of the year. Made with a sticky, tasty marinade and completed with a portion of rice and your favourite veg or salsa.', 'meal3.avif', '38'), 
('4', 'Creamy Cajun Chicken Pasta', 'This Cajun chicken pasta is a super tasty way to pack in protein and keep you full and feeling good.', 'meal4.avif', '75'), 
('5', 'Chilli Turkey Burgers', 'These low-cal homemade lime and chilli turkey burgers will spice up your meal prep game and then some, at only 147kcal per burger.', 'meal5.avif', '68'), 
('6', 'Peanut Butter Chicken Curry', 'Peanut butter lovers, this incredible recipe is definitely one to try. Immediately.', 'meal6.avif', '72'), 
('7', 'Creamy Lemon & Thyme Chicken', 'You\'ll be looking forward to your next meal with this creamy lemon and thyme chicken waiting for you.', 'meal7.avif', '55'), 
('8', 'Chicken & Chorizo Paella', 'A summery makeover of the classic chicken and rice meal prep with this traditional Spanish paella.', 'meal8.avif', '58')

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(45) NOT NULL,
  `links` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
)

INSERT INTO `news` (`id`, `title`, `description`, `image`, `links`) VALUES
('1', 'Squats', 'Squats are a compound, full-body exercise that is a staple for training the leg muscles. The deeper you squat, the more lung capacity you need, thus enhancing cardiovascular function.', 'gif (1).webp', 'https://youtube.com/shorts/gslEzVggur8?si=Q476sNWri3D_nl0L'), 
('2', 'Pull-ups', 'As a bodyweight exercise, pull-ups are one of the fundamental exercises for training the back. To enhance your training, opt for a wide grip, which helps balance your arm muscles and develop the back.', 'gif (2).webp', 'https://youtube.com/shorts/dvG8B2OjfWk?si=IDfbYIqfUvZXIrbI'), 
('3', 'Machine Shoulder Press', 'Machine shoulder press primarily targets the deltoid muscles and is suitable for beginners to feel the muscles and exert force. It stimulates the entire shoulder area and requires coordination from the triceps and core. If you want to train your shoulders effectively, this exercise is perfect!', 'gif (3).webp', 'https://youtube.com/shorts/a4ZUOE6Arfk?si=1YcfhlRCv5B-XNt-'), 
('4', 'Seated Cable Rows', 'The back is the strongest muscle group in our body, and back training mainly revolves around pulling movements. Seated cable rows effectively target the entire back and concentrate on stimulating the upper body, including the arms and even the core.', 'gif (4).webp', 'https://youtube.com/shorts/fPbfYDgzIgA?si=tnFW5TmumxHuOw92'), 
('5', 'Barbell Curls', 'Barbell curls are indispensable for building strong arms. When performing this exercise to train the biceps, you can easily feel the muscles working. It is the most effective method for training the biceps and forearm muscles.', 'gif (5).webp', 'https://youtube.com/shorts/N6paU6TGFWU?si=ODEVWRHpENcanPlP'), 
('6', 'Barbell Deadlifts', 'Barbell deadlifts are one of the best strength training exercises. Besides blasting your back, they also effectively stimulate the glutes, involving more muscles. In other words, practicing deadlifts can make your entire body stronger.', 'gif (6).webp', 'https://youtube.com/shorts/vfKwjT5-86k?si=FdkBk-0pGdJr5-hk'), 
('7', 'Weighted Crunches', 'Crunches are the most common abdominal exercise, mainly targeting the rectus abdominis. If your abs are still not well-defined after training for some time and you feel the results are mediocre, you can try adding weights to experience stronger muscle stimulation in the abdominal region.', 'gif (7).webp', 'https://youtube.com/shorts/OHXg_93MiKE?si=wozcGp-0YCi-wrVg'), 
('8', 'Triceps Dips', 'Triceps dips, also known as arm dips, are a classic bodyweight exercise that provides maximum stimulation to the chest, triceps, and deltoids. If you want to have strong and well-defined arms, choosing this exercise is crucial.', 'gif (8).webp', 'https://youtube.com/shorts/SpSE_A5L-YA?si=HfLT4tb6OsCQw34g');
