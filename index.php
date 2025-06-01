<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astro Numerology</title>
    <link rel="website icon" type="png" href="moon.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('violet.gif') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            overflow-x: hidden;
            margin: 0;
        }
        
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            z-index: 0;
            animation: twinkle 8s infinite;
        }
        
        .stars::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(3px 3px at 20px 30px, #eee, transparent),
                radial-gradient(3px 3px at 40px 70px, rgba(255,255,255,0.9), transparent),
                radial-gradient(2px 2px at 90px 40px, #fff, transparent),
                radial-gradient(2px 2px at 130px 80px, rgba(255,255,255,0.7), transparent),
                radial-gradient(3px 3px at 160px 30px, #fff, transparent),
                radial-gradient(1px 1px at 300px 120px, rgba(255,255,255,0.8), transparent),
                radial-gradient(2px 2px at 250px 60px, #fff, transparent);
            background-repeat: repeat;
            background-size: 300px 200px;
            animation: sparkle 15s linear infinite;
        }
        
        @keyframes twinkle {
            0%, 100% { opacity: 0.9; }
            50% { opacity: 0.3; }
        }
        
        @keyframes sparkle {
            from { transform: translateX(0); }
            to { transform: translateX(300px); }
        }
        
        .main-container {
            background: linear-gradient(145deg, rgba(30, 4, 66, 0.95), rgba(45, 7, 89, 0.9));
            border: 3px solid rgba(147, 51, 234, 0.4);
            backdrop-filter: blur(25px);
            box-shadow: 
                0 30px 80px rgba(45, 7, 89, 0.6),
                0 0 120px rgba(147, 51, 234, 0.2),
                inset 0 2px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
            margin-bottom: 120px;
            width: 90%; 
            margin-top: 40px;
        }
        
        .main-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, rgba(147, 51, 234, 0.1), transparent);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .content-wrapper {
            position: relative;
            z-index: 2;
        }
        
        .title-main {
            background: linear-gradient(45deg, #9333ea, #c084fc, #e879f9, #9333ea);
            background-size: 300% 300%;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient-flow 4s ease infinite;
            filter: drop-shadow(0 0 30px rgba(147, 51, 234, 0.7));
            position: relative;
        }
        
        @keyframes gradient-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .subtitle {
            background: linear-gradient(90deg, rgba(196, 132, 252, 0.9), rgba(255, 255, 255, 0.8), rgba(196, 132, 252, 0.9));
            background-size: 200% 200%;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: subtle-glow 3s ease-in-out infinite;
        }
        
        @keyframes subtle-glow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4c1d95, #7c3aed, #9333ea, #8b5cf6);
            background-size: 300% 300%;
            border: 2px solid rgba(147, 51, 234, 0.5);
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.8s;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            background-position: 100% 100%;
            transform: translateY(-4px) scale(1.05);
            box-shadow: 
                0 20px 40px rgba(147, 51, 234, 0.5),
                0 0 60px rgba(147, 51, 234, 0.3);
            border-color: rgba(147, 51, 234, 0.8);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, transparent, rgba(147, 51, 234, 0.1));
            border: 2px solid rgba(147, 51, 234, 0.6);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        
        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(147, 51, 234, 0.2), transparent);
            transition: left 0.6s;
        }
        
        .btn-secondary:hover::before {
            left: 100%;
        }
        
        .btn-secondary:hover {
            background: linear-gradient(135deg, rgba(147, 51, 234, 0.2), rgba(147, 51, 234, 0.1));
            border-color: rgba(196, 132, 252, 0.8);
            color: #e879f9;
            transform: translateY(-4px) scale(1.05);
            box-shadow: 
                0 15px 30px rgba(147, 51, 234, 0.3),
                0 0 40px rgba(147, 51, 234, 0.2);
        }
        
        .mystical-icons {
            position: absolute;
            top: 20px;
            right: 20px;
            opacity: 0.6;
        }
        
        .mystical-icons i {
            animation: float 8s ease-in-out infinite;
            margin: 0 10px;
        }
        
        .mystical-icons i:nth-child(2) {
            animation-delay: -2s;
        }
        
        .mystical-icons i:nth-child(3) {
            animation-delay: -4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-15px) rotate(5deg); }
            50% { transform: translateY(-10px) rotate(-5deg); }
            75% { transform: translateY(-20px) rotate(3deg); }
        }
        
        .footer-container {
            background: linear-gradient(135deg, rgba(20, 4, 45, 0.95), rgba(35, 7, 75, 0.95));
            backdrop-filter: blur(15px);
            border-top: 2px solid rgba(147, 51, 234, 0.3);
            box-shadow: 0 -10px 30px rgba(45, 7, 89, 0.3);
        }
        
        .footer-text {
            background: linear-gradient(90deg, rgba(196, 132, 252, 0.8), rgba(255, 255, 255, 0.6), rgba(196, 132, 252, 0.8));
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        @media (max-width: 768px) {
            .main-container {
                margin: 1rem;
                padding: 2rem 1.5rem;
            }
            
            .title-main {
                font-size: 3rem;
            }
            
            .subtitle {
                font-size: 1.25rem;
            }
            
            .mystical-icons {
                display: none;
            }
        }
        
        /* Fallback if violet.gif is missing */
        @media (prefers-reduced-motion: no-preference) {
            .no-gif {
                background: linear-gradient(135deg, #1a0033 0%, #2d0559 25%, #4c1d95 50%, #2d0559 75%, #1a0033 100%);
                background-size: 400% 400%;
                animation: gradient-bg 20s ease infinite;
            }
        }
        
        @keyframes gradient-bg {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .pulse-glow {
            animation: pulse-glow 4s ease-in-out infinite;
        }
        
        @keyframes pulse-glow {
            0%, 100% { 
                transform: scale(1);
                filter: drop-shadow(0 0 20px rgba(147, 51, 234, 0.4));
            }
            50% { 
                transform: scale(1.05);
                filter: drop-shadow(0 0 40px rgba(147, 51, 234, 0.8));
            }
        }
    </style>
</head>
<body class="text-white font-sans flex items-center justify-center min-h-screen">
    <div class="stars"></div>
    <div class="main-container max-w-5xl mx-auto px-10 py-3 text-center rounded-3xl shadow-3xl relative">
        <div class="mystical-icons text-purple-400">
            <i class="fas fa-star text-2xl"></i>
            <i class="fas fa-moon text-2xl"></i>
            <i class="fas fa-sun text-2xl"></i>
        </div>
        
        <div class="content-wrapper">
            <div class="pulse-glow mb-8">
                <i class="fas fa-infinity text-6xl text-purple-400 mb-6 block"></i>
            </div>
            
            <h1 class="title-main text-5xl md:text-8xl font-extrabold mb-8 leading-tight">
               Astro Numerology
            </h1>
            
            <p class="subtitle text-xl md:text-2xl mb-12 max-w-2xl mx-auto leading-relaxed">
                Unlock the secrets of your name through the ancient art of numerology and discover your mystical destiny written in the stars.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="calculator.php" class="btn-primary text-white font-bold py-4 px-8 rounded-full transition duration-300 relative z-10 min-w-[200px]">
                    <i class="fas fa-calculator mr-2"></i>
                    Try the Calculator
                </a>
                <a href="instructions.php" class="btn-secondary text-purple-300 font-bold py-4 px-8 rounded-full transition duration-300 relative z-10 min-w-[200px]">
                    <i class="fas fa-scroll mr-2"></i>
                    Learn More
                </a>
            </div>
            
            <div class="mt-16 opacity-70">
                <div class="flex justify-center space-x-8 text-purple-300">
                    <div class="text-center">
                        <i class="fas fa-heart text-3xl mb-2 block"></i>
                        <span class="text-sm">Soul Number</span>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-mask text-3xl mb-2 block"></i>
                        <span class="text-sm">Personality</span>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-compass text-3xl mb-2 block"></i>
                        <span class="text-sm">Destiny</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer-container fixed bottom-0 w-full text-center py-6">
       <p class="footer-text font-medium text-purple-300">
            <i class="fas fa-copyright mr-2"></i>2025 Juliana Mancera <i class="fas fa-star text-purple-300 ml-2"></i> 
        </p>
    </footer>
</body>
</html>