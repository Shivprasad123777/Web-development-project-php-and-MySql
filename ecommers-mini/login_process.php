<?php
session_start();
// db_connect.php फाईल समाविष्ट करा
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // फॉर्ममधून आलेला डेटा सुरक्षितपणे मिळवा
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // डेटाबेसमध्ये युजर शोधा
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // पासवर्डची पडताळणी करा (जर तुम्ही password_hash वापरला असेल तर)
        // जर तुम्ही साधा पासवर्ड वापरत असाल तर: if ($password == $user['password']) वापरा
        if (password_verify($password, $user['password']) || $password == $user['password']) {
            
            // सेशनमध्ये युजरची माहिती साठवा
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            
            // यशस्वी लॉगिननंतर होम पेजवर पाठवा
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('चुकीचा पासवर्ड!'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('युजरनेम सापडले नाही!'); window.location='login.php';</script>";
    }
}
?>