
<?php
// FEEDBACK SUBMIT झाल्यावर HOME PAGE ला redirect
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
    <title>Feedback</title>
</head>
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
    background:linear-gradient(135deg,#6366f1,#22d3ee,#f472b6);
    background-size:300% 300%;
    animation:bgMove 10s ease infinite;
}

@keyframes bgMove{
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}

/* CARD */
.feedback-card{
    width:100%;
    max-width:420px;
    background:rgba(255,255,255,0.2);
    backdrop-filter:blur(18px);
    border-radius:25px;
    padding:35px;
    box-shadow:0 30px 60px rgba(0,0,0,0.35);
    text-align:center;
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
.feedback-card h2{
    color:#fff;
    font-size:28px;
    margin-bottom:6px;
}
.feedback-card p{
    color:#e5e7eb;
    margin-bottom:20px;
}

/* STARS */
.stars{
    display:flex;
    justify-content:center;
    gap:10px;
    margin-bottom:20px;
}

.stars input{
    display:none;
}

.stars label{
    font-size:34px;
    color:#e5e7eb;
    cursor:pointer;
    transition:0.3s;
}

.stars label:hover,
.stars label:hover ~ label{
    color:#fde047;
}

.stars input:checked ~ label{
    color:#fde047;
}

/* TEXTAREA */
textarea{
    width:100%;
    height:90px;
    padding:14px;
    border-radius:14px;
    border:none;
    outline:none;
    background:rgba(255,255,255,0.18);
    color:#ffffff;
    font-size:15px;
    resize:none;
    transition:0.3s;
}

textarea::placeholder{
    color:rgba(255,255,255,0.8);
}

textarea:focus{
    background:rgba(255,255,255,0.28);
    transform:scale(1.02);
}

/* BUTTON */
.btn-submit{
    width:100%;
    margin-top:20px;
    padding:14px;
    border:none;
    border-radius:18px;
    background:linear-gradient(135deg,#4f46e5,#ec4899);
    color:#fff;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.4s;
}

.btn-submit:hover{
    transform:translateY(-3px) scale(1.04);
    box-shadow:0 15px 30px rgba(0,0,0,0.35);
}

@media(max-width:480px){
    .feedback-card{
        margin:20px;
    }
}
</style>
</head>

<body>

<div class="feedback-card">
    <h2>Feedback</h2>
    <p>How was your experience?</p>

    <form method="POST">
        <div class="stars">
            <input type="radio" name="rating" id="star5" value="5"><label for="star5">★</label>
            <input type="radio" name="rating" id="star4" value="4"><label for="star4">★</label>
            <input type="radio" name="rating" id="star3" value="3"><label for="star3">★</label>
            <input type="radio" name="rating" id="star2" value="2"><label for="star2">★</label>
            <input type="radio" name="rating" id="star1" value="1"><label for="star1">★</label>
        </div>

        <textarea name="message" placeholder="Tell us more..." required></textarea>

        <button type="submit" class="btn-submit">
            Submit Feedback ⭐
        </button>
    </form>
</div>

</body>
</html>