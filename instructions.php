<?php
// No PHP logic needed for the instructions page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructions - Cosmic Numerology</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: url('violet.gif') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
        }
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            z-index: 0;
            animation: twinkle 5s infinite;
        }
        @keyframes twinkle {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 0.3; }
        }
        .card {
            background: rgba(72, 34, 139, 0.9); /* Adjusted to a softer violet */
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .footer-container {
            background: rgba(54, 25, 104, 0.9); /* Darker adjusted violet for footer */
        }
        /* Fallback if violet.gif is missing */
        @media (prefers-reduced-motion: no-preference) {
            .no-gif {
                background: linear-gradient(180deg, #1a0933 0%, #2c1b5a 100%);
            }
        }
    </style>
</head>
<body class="text-gray-200 font-sans flex items-center justify-center min-h-screen">
    <div class="stars"></div>
    <div class="container mx-auto px-4 py-12 relative z-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-center mb-8 text-purple-300">How to Use the Numerology Calculator</h1>
        <div class="max-w-3xl mx-auto card rounded-xl p-6 shadow-lg">
            <h2 class="text-2xl font-bold mb-4 text-purple-200">Instructions</h2>
            <p class="mb-4">Numerology reveals the hidden meanings behind your name by assigning numbers to letters and calculating key numbers:</p>
            <ul class="list-disc list-inside mb-6">
                <li><strong>Soul Number</strong>: Derived from the vowels in your name, representing your inner self.</li>
                <li><strong>Personality Number</strong>: Based on consonants, reflecting how others perceive you.</li>
                <li><strong>Destiny Number</strong>: Calculated from all letters, indicating your life's purpose.</li>
            </ul>
            <p class="mb-4">Enter your full name in the calculator to discover your numbers and their meanings. The results include step-by-step calculations for clarity.</p>
            <h2 class="text-2xl font-bold mb-4 text-purple-200">Number Meanings</h2>
            <p class="mb-4">Each number carries unique traits, from leadership (1) to creativity (3) to spiritual intuition (11). Explore your results to learn more!</p>
            <div class="text-center">
                <a href="calculator.php" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 inline-block">Go to Calculator</a>
            </div>
        </div>
        <div class="text-center mt-6">
            <a href="index.php" class="text-purple-400 hover:text-purple-600">Back to Home</a>
        </div>
    </div>
    <footer class="footer-container absolute bottom-0 w-full text-center py-4 text-gray-400">
        © 2025 Juliana Mancera
    </footer>
</body>
</html>