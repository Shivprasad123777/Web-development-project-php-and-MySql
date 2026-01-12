<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['order_success']) || !isset($_SESSION['order_id'])) {
    header("Location: index.php");
    exit;
}

$orderId = $_SESSION['order_id'];

// clear session
unset($_SESSION['order_success']);
unset($_SESSION['order_id']);
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Success</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Poppins,Arial;}
body{
    height:100vh;
    background: linear-gradient(135deg,#22c55e,#4ade80,#16a34a);
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
}

/* floating bg bubbles */
.circle{
    position:absolute;
    width:300px;
    height:300px;
    background:rgba(255,255,255,0.15);
    border-radius:50%;
    animation: float 10s infinite alternate;
}
.c1{top:-100px;left:-100px;}
.c2{bottom:-120px;right:-120px;animation-delay:2s;}

@keyframes float{
    from{transform:translateY(0);}
    to{transform:translateY(50px);}
}

.box{
    background:rgba(255,255,255,0.2);
    backdrop-filter:blur(14px);
    padding:60px 70px;
    border-radius:30px;
    text-align:center;
    color:#fff;
    box-shadow:0 40px 80px rgba(0,0,0,0.3);
    animation: pop 0.8s ease;
    z-index:2;
}

@keyframes pop{
    0%{transform:scale(0.6);opacity:0;}
    100%{transform:scale(1);opacity:1;}
}

.check{
    width:90px;height:90px;
    border-radius:50%;
    background:#fff;
    color:#16a34a;
    font-size:46px;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 20px;
    animation:bounce 0.6s;
}
@keyframes bounce{
    0%{transform:scale(0);}
    70%{transform:scale(1.3);}
    100%{transform:scale(1);}
}

h1{font-size:34px;margin-bottom:8px;}
p{opacity:0.9;}

.order-id{
    margin:15px 0;
    font-size:18px;
    font-weight:bold;
}

.actions a{
    display:inline-block;
    margin:15px 10px 0;
    padding:14px 36px;
    background:#fff;
    color:#16a34a;
    border-radius:30px;
    text-decoration:none;
    font-weight:bold;
    transition:.3s;
}
.actions a:hover{
    transform:scale(1.08);
    box-shadow:0 15px 30px rgba(0,0,0,.25);
}

/* CONFETTI */
.confetti{
    position:absolute;
    width:10px;
    height:10px;
    background:red;
    animation: fall 3s linear infinite;
}
@keyframes fall{
    from{transform:translateY(-100px) rotate(0deg);}
    to{transform:translateY(100vh) rotate(360deg);}
}
</style>
</head>

<body>

<div class="circle c1"></div>
<div class="circle c2"></div>

<div class="box">
    <div class="check">✔</div>
    <h1>Order Placed Successfully</h1>
    <p>Thank you for shopping with us</p>

    <div class="order-id">🧾 Order ID: <?= $orderId ?></div>

    <div class="actions">
        <a href="track_order.php?order=<?= $orderId ?>">Track Order</a>
        <a href="index.php">Continue Shopping</a>
    </div>
</div>

<!-- CONFETTI -->
<script>
for(let i=0;i<40;i++){
    const c=document.createElement("div");
    c.className="confetti";
    c.style.left=Math.random()*100+"%";
    c.style.background=`hsl(${Math.random()*360},80%,60%)`;
    c.style.animationDelay=Math.random()*3+"s";
    document.body.appendChild(c);
}
</script>

</body>
</html>
