
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style-extra.css">
    <title>About Us | TechHub</title>
</head>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Poppins, Arial, sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#667eea,#764ba2,#22c55e);
    background-size:300% 300%;
    display:flex;
    justify-content:center;
    align-items:center;
    animation:bgMove 10s ease infinite alternate;
}

/* background animation */
@keyframes bgMove{
    from{background-position:0% 50%;}
    to{background-position:100% 50%;}
}

/* container */
.about-wrapper{
    width:90%;
    max-width:1000px;
    padding:60px;
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(20px);
    border-radius:30px;
    box-shadow:0 40px 80px rgba(0,0,0,0.35);
    text-align:center;
    color:#fff;
    animation:fadeUp .9s ease;
}

@keyframes fadeUp{
    from{opacity:0; transform:translateY(40px);}
    to{opacity:1; transform:translateY(0);}
}

.about-wrapper h1{
    font-size:42px;
    margin-bottom:20px;
}

.about-wrapper h1 span{
    background:linear-gradient(90deg,#facc15,#fb7185,#a855f7);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.about-wrapper p{
    font-size:17px;
    line-height:1.8;
    opacity:.95;
    max-width:800px;
    margin:0 auto 50px;
}

/* stats */
.stats{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:30px;
}

.stat-box{
    background:rgba(255,255,255,0.22);
    border-radius:22px;
    padding:30px 20px;
    transition:.4s;
    animation:pop .8s ease;
}

.stat-box:hover{
    transform:translateY(-12px) scale(1.07);
    box-shadow:0 25px 45px rgba(0,0,0,.35);
}

@keyframes pop{
    from{transform:scale(.6);opacity:0;}
    to{transform:scale(1);opacity:1;}
}

.stat-box h2{
    font-size:36px;
    margin-bottom:6px;
}

.stat-box span{
    font-size:14px;
    letter-spacing:1px;
    opacity:.9;
}

.icon{
    font-size:34px;
    margin-bottom:10px;
}

/* buttons */
.actions{
    margin-top:50px;
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
}

.actions a{
    padding:14px 38px;
    border-radius:30px;
    font-weight:bold;
    text-decoration:none;
    color:#fff;
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    transition:.4s;
}

.actions a.back{
    background:linear-gradient(135deg,#22c55e,#16a34a);
}

.actions a:hover{
    transform:scale(1.12);
    box-shadow:0 20px 40px rgba(0,0,0,.4);
}

/* responsive */
@media(max-width:768px){
    .about-wrapper{
        padding:40px 25px;
    }
    .stats{
        grid-template-columns:1fr;
    }
}
</style>
</head>

<body>

<div class="about-wrapper">
    <h1>About <span>E-commerce</span></h1>

    <p>
        Welcome to <b>E-commerce</b>, your one-stop destination for premium gadgets and
        modern technology. We focus on quality, innovation, and customer satisfaction,
        delivering products that make your life smarter and easier.
    </p>

    <div class="stats">
        <div class="stat-box">
            <div class="icon">😊</div>
            <h2>10K+</h2>
            <span>Happy Clients</span>
        </div>

        <div class="stat-box">
            <div class="icon">🛠️</div>
            <h2>24/7</h2>
            <span>Expert Support</span>
        </div>

        <div class="stat-box">
            <div class="icon">✅</div>
            <h2>100%</h2>
            <span>Genuine Products</span>
        </div>
    </div>

    <!-- BUTTONS -->
    <div class="actions">
        <a href="index.php" class="back">← Back to Home</a>
        <a href="contact.php">Contact Us</a>
    </div>
</div>

</body>
</html>
