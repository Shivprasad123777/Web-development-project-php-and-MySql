<?php
session_start();

/* 🛒 Cart Count Logic */
$cartCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        if (is_array($item)) {
            $cartCount += $item['qty'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>E-Commerce</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
}

/* 🔹 Navbar */
.navbar{
    background:linear-gradient(135deg,#020617,#0f172a);
    padding:16px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:#fff;
}

/* 🔹 Menu */
.navbar a{
    color:#fff;
    text-decoration:none;
    margin-left:25px;
    font-weight:bold;
    position:relative;
}

/* 🔴 Cart Badge */
.badge{
    position:absolute;
    top:-8px;
    right:-14px;
    background:#ef4444;
    color:#fff;
    font-size:12px;
    padding:3px 7px;
    border-radius:50%;
    animation:pulse 0.8s ease;
}

@keyframes pulse{
    0%{transform:scale(0.6);}
    100%{transform:scale(1);}
}
</style>
</head>

<body>

<!-- 🔹 NAVBAR -->
<div class="navbar">
    <div class="logo">
        <a href="index.php">🛍 MyShop</a>
    </div>

    <div class="menu">
        <a href="index.php">Home</a>

        <a href="cart.php">
            Cart
            <?php if($cartCount > 0): ?>
                <span class="badge"><?= $cartCount ?></span>
            <?php endif; ?>
        </a>
    </div>
</div>
