<?php
// FORM SUBMIT झाल्यावर HOME PAGE ला redirect
if($_SERVER["REQUEST_METHOD"] == "POST"){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style-extra.css">
    <title>Contact Us</title>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Contact Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, Arial, sans-serif;
}

/* BACKGROUND */
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#7c3aed,#ec4899,#22d3ee);
    background-size:300% 300%;
    animation:bgMove 10s ease infinite;
}

@keyframes bgMove{
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}

/* CARD */
.contact-card{
    width:100%;
    max-width:420px;
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(18px);
    border-radius:25px;
    padding:35px;
    box-shadow:0 30px 60px rgba(0,0,0,0.3);
    animation:fadeUp 0.9s ease;
}

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(30px) scale(0.95);
    }
    to{
        opacity:1;
        transform:translateY(0) scale(1);
    }
}

/* TITLE */
.contact-card h2{
    text-align:center;
    color:#fff;
    font-size:28px;
    margin-bottom:25px;
}
.contact-card h2 span{
    color:#fde047;
}

/* INPUTS */
.form-group{
    margin-bottom:18px;
}

.form-group input,
.form-group textarea{
    width:100%;
    padding:14px 16px;
    border-radius:14px;
    border:none;
    outline:none;
    background:rgba(255,255,255,0.15);
    color:#ffffff;
    font-size:15px;
    transition:0.4s;
}

.form-group input::placeholder,
.form-group textarea::placeholder{
    color:rgba(255,255,255,0.75);
}

.form-group input:focus,
.form-group textarea:focus{
    background:rgba(255,255,255,0.25);
    transform:scale(1.02);
}

textarea{
    resize:none;
    caret-color:#ffffff;
}

/* BUTTON */
.btn-submit{
    width:100%;
    padding:14px;
    border:none;
    border-radius:18px;
    background:linear-gradient(135deg,#6366f1,#ec4899);
    color:#fff;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.4s;
}

.btn-submit:hover{
    transform:translateY(-3px) scale(1.03);
    box-shadow:0 15px 30px rgba(0,0,0,0.35);
}

@media(max-width:480px){
    .contact-card{
        margin:20px;
    }
}
</style>
</head>

<body>

<div class="contact-card">
    <h2>Contact <span>Us</span></h2>

    <form method="POST">
        <div class="form-group">
            <input type="text" name="name" placeholder="Your Name" required>
        </div>

        <div class="form-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
            <textarea rows="4" name="message" placeholder="Your Message" required></textarea>
        </div>

        <button type="submit" class="btn-submit">
            Send Message 🚀
        </button>
    </form>
</div>

</body>
</html>
