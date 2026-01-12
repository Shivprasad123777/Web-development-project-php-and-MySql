<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['qty'];
}

if (isset($_POST['place_order'])) {

    // ✅ Generate Order ID
    $_SESSION['order_id'] = "ORD" . time() . rand(100,999);

    $_SESSION['order_success'] = true;
    $_SESSION['cart'] = [];

    header("Location: order_success.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css">

<style>
body{
    min-height:100vh;
    background: linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    align-items:center;
    justify-content:center;
}

.checkout-box{
    background:#fff;
    width:90%;
    max-width:900px;
    border-radius:20px;
    padding:35px;
    display:grid;
    grid-template-columns: 1fr 1fr;
    gap:30px;
    box-shadow:0 25px 50px rgba(0,0,0,0.3);
}

.checkout-box h2{
    margin-bottom:20px;
}

.order-summary{
    background:#f8fafc;
    border-radius:15px;
    padding:25px;
}

.order-summary h3{
    margin-bottom:15px;
}

.order-item{
    display:flex;
    justify-content:space-between;
    margin-bottom:10px;
}

.total{
    font-size:18px;
    font-weight:bold;
    border-top:1px solid #ddd;
    padding-top:10px;
    margin-top:10px;
}

.checkout-form input,
.checkout-form textarea{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border-radius:8px;
    border:1px solid #ccc;
    font-size:14px;
}

.checkout-form textarea{
    resize:none;
    height:90px;
}

.checkout-form button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:30px;
    background:#10b981;
    color:#fff;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.checkout-form button:hover{
    background:#059669;
    transform:scale(1.05);
}

@media(max-width:768px){
    .checkout-box{
        grid-template-columns:1fr;
    }
}
</style>
</head>

<body>

<div class="checkout-box">

    <!-- LEFT : FORM -->
    <div>
        <h2>🚚 Shipping Details</h2>

        <form method="POST" class="checkout-form">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <textarea name="address" placeholder="Delivery Address" required></textarea>

            <button type="submit" name="place_order">
                Place Order ₹<?= number_format($total) ?>
            </button>
        </form>
    </div>

    <!-- RIGHT : SUMMARY -->
    <div class="order-summary">
        <h3>🛒 Order Summary</h3>

        <?php foreach($_SESSION['cart'] as $item): ?>
            <div class="order-item">
                <span><?= $item['name'] ?> × <?= $item['qty'] ?></span>
                <span>₹ <?= number_format($item['price'] * $item['qty']) ?></span>
            </div>
        <?php endforeach; ?>

        <div class="total">
            Total: ₹ <?= number_format($total) ?>
        </div>
    </div>

</div>

</body>
</html>
