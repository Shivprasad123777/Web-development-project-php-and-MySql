<?php
session_start();

/* =======================
   REMOVE ITEM (FIRST!)
======================= */
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]); // ❌ item delete
    }

    header("Location: cart.php");
    exit;
}

/* =======================
   ADD ITEM
======================= */
if (isset($_GET['id'])) {

    $id    = $_GET['id'];
    $name  = $_GET['name'];
    $price = $_GET['price'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += 1; // ➕ qty वाढ
    } else {
        $_SESSION['cart'][$id] = [
            'name'  => $name,
            'price' => $price,
            'qty'   => 1
        ];
    }

    header("Location: index.php");
    exit;
}
