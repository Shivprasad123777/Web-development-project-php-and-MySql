<?php
$order = $_GET['order'] ?? 'ORD-DEMO-12345';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Track Order</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',Arial;
}

body{
    height:100vh;
    background: linear-gradient(
        135deg,
        #6366f1,
        #22c55e,
        #06b6d4,
        #a855f7
    );
    background-size:400% 400%;
    animation:bgMove 10s ease infinite;
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
}

@keyframes bgMove{
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}

/* floating circles */
.circle{
    position:absolute;
    width:260px;
    height:260px;
    background:rgba(255,255,255,0.15);
    border-radius:50%;
    animation:float 8s infinite alternate;
}
.c1{top:-100px;left:-100px;}
.c2{bottom:-120px;right:-120px;animation-delay:2s;}

@keyframes float{
    from{transform:translateY(0)}
    to{transform:translateY(60px)}
}

/* main box */
.box{
    background:rgba(255,255,255,0.22);
    backdrop-filter:blur(18px);
    padding:50px 60px;
    border-radius:30px;
    text-align:center;
    color:#fff;
    width:90%;
    max-width:420px;
    box-shadow:
        0 0 40px rgba(255,255,255,0.25),
        0 40px 80px rgba(0,0,0,0.35);
    animation:pop 0.8s cubic-bezier(.68,-0.55,.27,1.55);
    z-index:2;
}

@keyframes pop{
    0%{transform:scale(0.6);opacity:0}
    100%{transform:scale(1);opacity:1}
}

h2{
    margin-bottom:8px;
    font-size:28px;
}

.order-id{
    margin:12px 0 25px;
    font-size:16px;
    font-weight:bold;
    background:rgba(255,255,255,0.18);
    padding:10px 16px;
    border-radius:12px;
    display:inline-block;
}

/* status list */
.status{
    text-align:left;
    margin-top:10px;
}

.step{
    display:flex;
    align-items:center;
    gap:12px;
    margin:14px 0;
    font-size:16px;
    animation:slide 0.8s ease forwards;
    opacity:0;
}

.step:nth-child(1){animation-delay:.2s}
.step:nth-child(2){animation-delay:.5s}
.step:nth-child(3){animation-delay:.8s}

@keyframes slide{
    from{transform:translateX(-20px);opacity:0}
    to{transform:translateX(0);opacity:1}
}

.icon{
    width:36px;
    height:36px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

.green{background:#22c55e}
.blue{background:#3b82f6}
.pink{background:#ec4899}

/* buttons */
.actions a{
    display:inline-block;
    margin:20px 8px 0;
    padding:12px 28px;
    background:#fff;
    color:#111827;
    border-radius:30px;
    text-decoration:none;
    font-weight:bold;
    transition:.3s;
}

.actions a:hover{
    transform:scale(1.08);
    box-shadow:0 15px 30px rgba(0,0,0,.3);
}

/* confetti */
.confetti{
    position:absolute;
    width:8px;
    height:8px;
    background:red;
    animation:fall 3s linear infinite;
}

@keyframes fall{
    from{transform:translateY(-100px) rotate(0deg)}
    to{transform:translateY(100vh) rotate(360deg)}
}
</style>
</head>

<body>

<div class="circle c1"></div>
<div class="circle c2"></div>

<div class="box">
    <h2>📦 Track Order</h2>

    <div class="order-id">
        Order ID: <?= htmlspecialchars($order) ?>
    </div>

    <div class="status">
        <div class="step">
            <div class="icon green">✔</div>
            Order Confirmed
        </div>
        <div class="step">
            <div class="icon blue">🚚</div>
            Shipping Soon
        </div>
        <div class="step">
            <div class="icon pink">📍</div>
            Out for Delivery
        </div>
    </div>

    <div class="actions">
        <a href="index.php">Continue Shopping</a>
    </div>
</div>

<script>
for(let i=0;i<50;i++){
    const c=document.createElement("div");
    c.className="confetti";
    c.style.left=Math.random()*100+"%";
    c.style.background=`hsl(${Math.random()*360},90%,60%)`;
    c.style.animationDuration=2+Math.random()*3+"s";
    document.body.appendChild(c);
}
</script>

</body>
</html>
