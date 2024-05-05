<header class="header">
    <nav class="nav">
        <a href="menu.php">
            <img id="logo" src="images/banner.png" alt="banner">
        </a>
        <div id="topMenu">
            <span><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hide-for-mobile">Home</span></a></span>
            <span class="hide-for-mobile"><a href="news.php">News</a></span>
            <span class="hide-for-mobile"><a href="booking.php">Booking</a></span>
            <span class="hide-for-mobile"><a href="order.php" id="orderLink">Order</a></span>
            <span><a href="cart.php" id="cartLink"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-for-mobile">Cart</span></a></span>
            <?php if(isset($_COOKIE["accountInfo"])):?>
                <span><a href="includes/logout.php"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="hide-for-mobile">Logout</span></a></span>
            <?php else:?>
                <span><a href="login.html"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="hide-for-mobile">Login</span></a></span>
            <?php endif;?>
            
            <a href="#" id="btnHamburger" class="header-toggle hide-for-desktop">
                    <span></span>
                    <span></span>
                    <span></span>
            </a>

            <div id="hamburgerMenu">
                <a href="news.php">News</a>
                <a href="booking.php">Booking</a>
                <a href="order.php">Order</a>
            </div>
        </div>
    </nav>
</header>