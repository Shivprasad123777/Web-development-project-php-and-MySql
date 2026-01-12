
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// जर युजर लॉगिन नसेल, तर त्याला login.php वर पाठवा
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$cartCount = 0;
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $item){
        if(is_array($item)) $cartCount += $item['qty'];
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>E-Commerce Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css">
</head>
<!-- CART POPUP -->
 <div id="cartOverlay"></div>
<div id="cartPopup">
    <div class="popup-icon-wrapper">
        <div class="popup-icon-circle">
            <span class="icon-anim">✨</span>
            <span class="cart-icon">🛒</span>
        </div>
    </div>
    <h3 class="popup-title">Wonderful Choice!</h3>
    <p class="popup-text">The product has been added to your shopping bag.</p>
    <div class="popup-buttons">
        <a href="cart.php" class="btn-view">View My Bag</a>
        <button onclick="closeMyPopup()" class="btn-continue">Keep Shopping</button>
    </div>
</div>


<body>
<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">
         <span></span>
    </div>

    <div class="nav-links">
        <a href="index.php" class="active">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php" class="logout-btn">Logout</a>

        <a href="cart.php" class="cart-wrapper">
            🛒 Cart
            <span class="cart-count"><?= $cartCount ?></span>
        </a>
    </div>
</div>
<div class="products">
    <div class="card glass orange" data-url="session_add.php?id=1&name=Smart%20Watch&price=15000">
        <div class="img-box" style="height: 140px; padding: 10px;">
            <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=300&q=80" alt="Smart Watch" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="card-info" style="padding: 15px;">
            <h3 style="font-size: 16px;">Smart Watch</h3>
            <p class="price" style="font-size: 18px; margin: 5px 0;">₹ 15,000</p>
            <button class="add-btn" style="padding: 8px;">Add to Cart</button>
        </div>
    </div>

    <div class="card glass blue" data-url="session_add.php?id=2&name=Wired%20Earphones&price=2500">
        <div class="img-box" style="height: 140px; padding: 10px;">
            <img src="https://images.unsplash.com/photo-1608156639585-b3a032ef9689?auto=format&fit=crop&w=300&q=80" alt="Earphones" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="card-info" style="padding: 15px;">
            <h3 style="font-size: 16px;">Wired Earphones</h3>
            <p class="price" style="font-size: 18px; margin: 5px 0;">₹ 2,500</p>
            <button class="add-btn" style="padding: 8px;">Add to Cart</button>
        </div>
    </div>

    <div class="card glass purple" data-url="session_add.php?id=3&name=HD%20Monitor&price=45000">
        <div class="img-box" style="height: 140px; padding: 10px;">
            <img src="https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=300&q=80" alt="Monitor" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="card-info" style="padding: 15px;">
            <h3 style="font-size: 16px;">HD Monitor</h3>
            <p class="price" style="font-size: 18px; margin: 5px 0;">₹ 45,000</p>
            <button class="add-btn" style="padding: 8px;">Add to Cart</button>
        </div>
    </div>

    <div class="card glass green" data-url="session_add.php?id=4&name=Gaming%20Headphones&price=12000">
        <div class="img-box" style="height: 140px; padding: 10px;">
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=300&q=80" alt="Gaming Headphones" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="card-info" style="padding: 15px;">
            <h3 style="font-size: 16px;">Gaming Headphones</h3>
            <p class="price" style="font-size: 18px; margin: 5px 0;">₹ 12,000</p>
            <button class="add-btn" style="padding: 8px;">Add to Cart</button>
        </div>
    </div>

    <div class="card glass yellow" data-url="session_add.php?id=5&name=Wireless%20Keyboard&price=3500">
        <div class="img-box" style="height: 140px; padding: 10px;">
            <img src="https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=300&q=80" alt="Keyboard" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="card-info" style="padding: 15px;">
            <h3 style="font-size: 16px;">Wireless Keyboard</h3>
            <p class="price" style="font-size: 18px; margin: 5px 0;">₹ 3,500</p>
            <button class="add-btn" style="padding: 8px;">Add to Cart</button>
        </div>
    </div>

    <div class="card glass gray" data-url="session_add.php?id=6&name=Digital%20Camera&price=35000">
        <div class="img-box" style="height: 140px; padding: 10px;">
            <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=300&q=80" alt="Camera" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="card-info" style="padding: 15px;">
            <h3 style="font-size: 16px;">Digital Camera</h3>
            <p class="price" style="font-size: 18px; margin: 5px 0;">₹ 35,000</p>
            <button class="add-btn" style="padding: 8px;">Add to Cart</button>
        </div>
    </div>
</div>
<!-- JS -->
<script>
document.querySelectorAll(".card button").forEach(btn=>{
    btn.addEventListener("click",function(e){
        e.stopPropagation();

        const card = this.closest(".card");
        const url  = card.dataset.url;

        card.classList.add("clicked");

        // AJAX add to cart
        fetch(url)
        .then(()=>{
            const popup = document.getElementById("cartPopup");
            popup.classList.add("show");

            setTimeout(()=>{
                popup.classList.remove("show");
                card.classList.remove("clicked");
                location.reload(); // update cart count
            },1200);
        });
    });
});
</script>

</body>
</html>
