<?php
session_start();
// जर युजर आधीच लॉगिन असेल, तर त्याला थेट होम पेजवर पाठवा
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TechHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style-extra.css">
</head>
<body class="bg-animated flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md glass p-10 rounded-3xl shadow-2xl transform transition duration-500">
        <div class="text-center mb-8">
            <h2 class="text-4xl font-black text-gray-800">Welcome Back</h2>
            <p class="text-gray-500 mt-2">Login to your TechHub account</p>
        </div>

        <form action="login_process.php" method="POST" class="space-y-6">
            <div class="relative">
                <input type="text" name="username" required
                       class="w-full px-5 py-4 bg-white/50 rounded-2xl outline-none focus:ring-2 focus:ring-purple-500 border-none transition"
                       placeholder="username">
            </div>

            <div class="relative">
                <input type="password" name="password" required
                       class="w-full px-5 py-4 bg-white/50 rounded-2xl outline-none focus:ring-2 focus:ring-purple-500 border-none transition"
                       placeholder="Password">
            </div>

            <div class="flex justify-between items-center text-sm">
                <label class="flex items-center gap-2 cursor-pointer text-gray-600">
                    <input type="checkbox" class="rounded text-purple-600"> Remember me
                </label>
                <a href="#" class="text-purple-600 font-semibold hover:underline">Forgot Password?</a>
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white py-4 rounded-2xl font-bold text-lg hover:shadow-xl hover:opacity-90 transition transform active:scale-95">
                Login Now
            </button>
        </form>

        <p class="text-center mt-8 text-gray-600">
            Don't have an account? 
            <a href="register.php" class="text-blue-600 font-bold hover:underline">Sign Up</a>
        </p>
        
        <div class="mt-6 text-center">
            <a href="index.php" class="text-sm text-gray-400 hover:text-gray-600 transition">← Back to Home</a>
        </div>
    </div>

</body>
</html>