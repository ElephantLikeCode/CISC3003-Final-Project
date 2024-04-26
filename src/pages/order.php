<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/public.css" type="text/css" rel="stylesheet">
    <link href="style/order.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Elephant Fitting Club | Order Menu</title>
</head>
<body>
    <?php include "includes/header.php";?>
    <main>
        <form>
        <section class="order">
            <h2>Meal Order</h2>
            <div class="flex-container rows-4">
                <div class="meal col1">
                    <div class="meal-img" style="background-image: url('images/meal1.avif');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Greek Chicken Gyros
                        </div>
                        <div class="meal-desc">
                            Made with an Indian twist to easily serve up for weeknight dinners. 
                        </div>
                    </div>
                    <div class="meal-cart">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <span class="meal-count">0</span>
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="meal col2">
                    <div class="meal-img" style="background-image: url('images/meal2.avif');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Naked Chicken Burrito Bowl
                        </div>
                        <div class="meal-desc">
                            Full of flavour and simple to put together and will keep you satisfied the whole day through.
                        </div>
                    </div>
                    <div class="meal-cart">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <span class="meal-count">0</span>
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="meal col3">
                    <div class="meal-img" style="background-image: url('images/meal3.avif');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Air Fryer Chicken Skewers
                        </div>
                        <div class="meal-desc">
                            Delicious chicken skewers that can be made any day of the year. 
                            Made with a sticky, tasty marinade and completed with a portion of rice and your favourite veg or salsa.
                        </div>
                    </div>
                    <div class="meal-cart">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <span class="meal-count">0</span>
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="meal col4">
                    <div class="meal-img" style="background-image: url('images/meal4.avif');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Creamy Cajun Chicken Pasta
                        </div>
                        <div class="meal-desc">
                        This Cajun chicken pasta is a super tasty way to pack in protein and keep you full and feeling good. 
                        </div>
                    </div>
                    <div class="meal-cart">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <span class="meal-count">0</span>
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="flex-container rows-4">
                <div class="meal col1">
                    <div class="meal-img" style="background-image: url('images/meal1.avif');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Greek Chicken Gyros
                        </div>
                        <div class="meal-desc">
                            Made with an Indian twist to easily serve up for weeknight dinners. 
                        </div>
                    </div>
                    <div class="meal-cart">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <span class="meal-count">0</span>
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="meal col2">
                    <div class="meal-img" style="background-image: url('images/meal2.avif');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Naked Chicken Burrito Bowl
                        </div>
                        <div class="meal-desc">
                            Full of flavour and simple to put together and will keep you satisfied the whole day through.
                        </div>
                    </div>
                    <div class="meal-cart">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <span class="meal-count">0</span>
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="meal col3">
                    <div class="meal-img" style="background-image: url('images/meal3.avif');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Air Fryer Chicken Skewers
                        </div>
                        <div class="meal-desc">
                            Delicious chicken skewers that can be made any day of the year. 
                            Made with a sticky, tasty marinade and completed with a portion of rice and your favourite veg or salsa.
                        </div>
                    </div>
                    <div class="meal-cart">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <span class="meal-count">0</span>
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="meal col4">
                    <div class="meal-img" style="background-image: url('images/meal4.avif');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Creamy Cajun Chicken Pasta
                        </div>
                        <div class="meal-desc">
                        This Cajun chicken pasta is a super tasty way to pack in protein and keep you full and feeling good. 
                        </div>
                    </div>
                    <div class="meal-cart">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <span class="meal-count">0</span>
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>
        </form>
    </main>
    <?php include "includes/footer.php";?>

    <script src="js/order.js"></script>
</body>
</html>