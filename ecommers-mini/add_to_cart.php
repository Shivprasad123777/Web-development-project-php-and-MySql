<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $price = $_GET['price'];

    // जर आधीच कार्टमध्ये असेल तर फक्त क्वांटिटी वाढवा
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += 1;
    } else {
        // नवीन प्रॉडक्ट ॲड करा
        $_SESSION['cart'][$id] = [
            'name' => $name,
            'price' => $price,
            'qty' => 1
        ];
    }
}
?>