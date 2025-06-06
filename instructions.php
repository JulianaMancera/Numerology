<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructions - Astro Numerology</title>
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
            display: flex;
            flex-direction: column;
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
                radial-gradient(2px 2px at 20px 30px, #eee, transparent),
                radial-gradient(2px 2px at 40px 70px, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 90px 40px, #fff, transparent),
                radial-gradient(1px 1px at 130px 80px, rgba(255,255,255,0.6), transparent),
                radial-gradient(2px 2px at 160px 30px, #fff, transparent);
            background-repeat: repeat;
            background-size: 200px 150px;
            animation: sparkle 12s linear infinite;
        }
        
        @keyframes twinkle {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 0.4; }
        }
        
        @keyframes sparkle {
            from { transform: translateX(0); }
            to { transform: translateX(200px); }
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

        .title-section {
            background: linear-gradient(145deg, rgba(30, 4, 66, 0.95), rgba(45, 7, 89, 0.9));
            border: 2px solid rgba(147, 51, 234, 0.4);
            backdrop-filter: blur(20px);
            box-shadow: 
                0 25px 50px rgba(45, 7, 89, 0.4),
                0 0 100px rgba(147, 51, 234, 0.1);
            width: 100%;
            max-width: none;
            overflow: visible;
        }
        
        .title-glow {
            background: linear-gradient(45deg, #9333ea, #c084fc, #e879f9, #9333ea);
            background-size: 300% 300%;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient-shift 4s ease infinite;
            filter: drop-shadow(0 0 25px rgba(147, 51, 234, 0.6));
            white-space: nowrap;
            overflow: visible;
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .card {
            background: linear-gradient(145deg, rgba(30, 4, 66, 0.95), rgba(45, 7, 89, 0.9));
            border: 2px solid rgba(147, 51, 234, 0.3);
            backdrop-filter: blur(20px);
            box-shadow: 
                0 20px 40px rgba(45, 7, 89, 0.3),
                0 0 80px rgba(147, 51, 234, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(147, 51, 234, 0.1), transparent);
            transition: left 0.8s;
        }
        
        .card:hover::before {
            left: 100%;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 30px 60px rgba(45, 7, 89, 0.5),
                0 0 120px rgba(147, 51, 234, 0.2);
            border-color: rgba(147, 51, 234, 0.5);
        }
        
        .section-title {
            background: linear-gradient(90deg, #c084fc, #e879f9, #c084fc);
            background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
        }
        
        .number-meaning {
            background: linear-gradient(135deg, rgba(45, 7, 89, 0.6), rgba(60, 10, 120, 0.6));
            border: 1px solid rgba(147, 51, 234, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .number-meaning:hover {
            background: linear-gradient(135deg, rgba(60, 10, 120, 0.8), rgba(75, 15, 150, 0.8));
            border-color: rgba(147, 51, 234, 0.5);
            transform: translateX(5px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4c1d95, #7c3aed, #9333ea);
            background-size: 200% 200%;
            border: 2px solid rgba(147, 51, 234, 0.4);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            background-position: 100% 100%;
            transform: translateY(-3px);
            box-shadow: 
                0 15px 30px rgba(147, 51, 234, 0.4),
                0 0 40px rgba(147, 51, 234, 0.2);
            border-color: rgba(147, 51, 234, 0.6);
        }
        
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
            display: inline-block;
            padding: 0.5rem 1rem; 
            background: rgba(30, 4, 66, 0.8); 
            border-radius: 0.5rem; 
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #9333ea, #c084fc);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .nav-link:hover {
            color: #c084fc;
            transform: translateY(-2px);
        }
        
        .footer-container {
            background: linear-gradient(135deg, rgba(20, 4, 45, 0.95), rgba(35, 7, 75, 0.95));
            backdrop-filter: blur(15px);
            border-top: 2px solid rgba(147, 51, 234, 0.3);
            box-shadow: 0 -10px 30px rgba(45, 7, 89, 0.3);;
            padding: 1rem;
            text-align: center;
            margin-top: auto; 
            width: 100%;
        }

        .footer-text {
            background: linear-gradient(90deg, rgba(196, 132, 252, 0.8), rgba(255, 255, 255, 0.6), rgba(196, 132, 252, 0.8));
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .mystical-decoration {
            position: absolute;
            top: 20px;
            right: 20px;
            opacity: 0.3;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(10deg); }
        }
        
        @media (max-width: 768px) {

            .main-container {
                margin: 1rem;
                padding: 2rem 1.5rem;
            }
            
            .title-glow {
                font-size: 1.8rem;
                line-height: 1.2;
                word-wrap: break-word;
                overflow-wrap: break-word;
            }
            
            .title-section {
                padding: 1.5rem;
                margin: 0 0.5rem;
            }
            
            .mystical-decoration {
                display: none;
            }
            
            .card {
                margin: 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .title-glow {
                font-size: 1.5rem;
                line-height: 1.2;
                word-wrap: break-word;
                overflow-wrap: break-word;
            }
            
            .title-section {
                padding: 1rem;
                margin: 0 0.25rem;
            }
        }
        
        @media (max-width: 375px) {
            .title-glow {
                font-size: 1.3rem;
                line-height: 1.2;
            }
        }
        
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(147, 51, 234, 0.1);
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #7c3aed, #9333ea);
            border-radius: 4px;
        }
        
        /* Fallback if violet.gif is missing */
        @media (prefers-reduced-motion: no-preference) {
            .no-gif {
                background: linear-gradient(135deg, #1a0033 0%, #2d0559 25%, #4c1d95 50%, #2d0559 75%, #1a0033 100%);
                background-size: 400% 400%;
                animation: gradient-bg 15s ease infinite;
            }
        }
        
        @keyframes gradient-bg {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
    </style>
</head>
<body class="text-white font-sans flex items-center justify-center min-h-screen">
    <div class="stars"></div>
    <div class="container-main container mx-auto px-4 py-8">
        <div class="title-section rounded-2xl p-8 mb-8 text-center relative">
            <div class="mystical-decoration text-purple-400">
                <i class="fas fa-eye text-3xl"></i>
            </div>
            <i class="fas fa-scroll text-5xl text-purple-400 mb-4 block"></i>
            <h1 class="title-glow text-4xl md:text-6xl font-extrabold mb-4">
                Numerology Guide
            </h1>
            <p class="text-purple-200 text-lg">Master the ancient art of numerical divination</p>
        </div>
        
        <div class="max-w-4xl mx-auto card rounded-2xl p-8 shadow-2xl relative mb-12">
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h2 class="section-title text-3xl font-bold mb-6 flex items-center">
                        <i class="fas fa-book-open mr-3 text-purple-400"></i>
                        How It Works
                    </h2>
                    <p class="text-purple-100 mb-6 leading-relaxed">
                        Numerology reveals the hidden meanings behind your name by assigning numbers to letters and calculating three key aspects of your spiritual identity:
                    </p>
                    
                    <div class="space-y-4">
                        <div class="number-meaning p-4 rounded-xl">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-heart text-purple-400 mr-3"></i>
                                <strong class="text-purple-200">Soul Number</strong>
                            </div>
                            <p class="text-sm text-purple-100 opacity-90">
                                Derived from the vowels in your name, representing your inner desires and spiritual essence.
                            </p>
                        </div>
                        
                        <div class="number-meaning p-4 rounded-xl">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-mask text-purple-400 mr-3"></i>
                                <strong class="text-purple-200">Personality Number</strong>
                            </div>
                            <p class="text-sm text-purple-100 opacity-90">
                                Based on consonants, reflecting how others perceive you and your outer personality.
                            </p>
                        </div>
                        
                        <div class="number-meaning p-4 rounded-xl">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-compass text-purple-400 mr-3"></i>
                                <strong class="text-purple-200">Destiny Number</strong>
                            </div>
                            <p class="text-sm text-purple-100 opacity-90">
                                Calculated from all letters, indicating your life's purpose and ultimate destiny.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 class="section-title text-3xl font-bold mb-6 flex items-center">
                        <i class="fas fa-star text-purple-400 mr-3"></i>
                        Number Meanings
                    </h2>
                    <p class="text-purple-100 mb-6 leading-relaxed">
                        Each number from 1-9 carries unique spiritual vibrations and meanings:
                    </p>
                    
                    <div class="space-y-3 max-h-80 overflow-y-auto">
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-2xl font-bold text-purple-400 mr-4 w-8">1</span>
                            <span class="text-sm text-purple-100">Leadership, independence, pioneering spirit</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-2xl font-bold text-purple-400 mr-4 w-8">2</span>
                            <span class="text-sm text-purple-100">Cooperation, diplomacy, partnership</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-2xl font-bold text-purple-400 mr-4 w-8">3</span>
                            <span class="text-sm text-purple-100">Creativity, expression, joy of living</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-2xl font-bold text-purple-400 mr-4 w-8">4</span>
                            <span class="text-sm text-purple-100">Foundation, stability, hard work</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-2xl font-bold text-purple-400 mr-4 w-8">5</span>
                            <span class="text-sm text-purple-100">Freedom, adventure, dynamic energy</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-2xl font-bold text-purple-400 mr-4 w-8">6</span>
                            <span class="text-sm text-purple-100">Nurturing, responsibility, compassion</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-2xl font-bold text-purple-400 mr-4 w-8">7</span>
                            <span class="text-sm text-purple-100">Spirituality, analysis, inner wisdom</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-2xl font-bold text-purple-400 mr-4 w-8">8</span>
                            <span class="text-sm text-purple-100">Material success, power, achievement</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-2xl font-bold text-purple-400 mr-4 w-8">9</span>
                            <span class="text-sm text-purple-100">Humanitarian service, universal love</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-xl font-bold text-purple-400 mr-3 w-8">11</span>
                            <span class="text-sm text-purple-100">Intuitive master number, spiritual insight</span>
                        </div>
                        <div class="number-meaning p-3 rounded-lg flex items-center">
                            <span class="text-xl font-bold text-purple-400 mr-3 w-8">22</span>
                            <span class="text-sm text-purple-100">Master builder, turning dreams to reality</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 p-6 bg-gradient-to-r from-purple-900/50 to-purple-800/50 rounded-xl border border-purple-500/30">
                <h3 class="text-xl font-bold text-purple-200 mb-3 flex items-center">
                    <i class="fas fa-lightbulb mr-2 text-purple-400"></i>
                    Getting Started
                </h3>
                <p class="text-purple-100 mb-4">
                    Simply enter your full name in the calculator to discover your personal numbers and their meanings. 
                    The results include detailed step-by-step calculations showing how each number is derived from your name.
                </p>
                <div class="text-center">
                    <a href="calculator.php" class="btn-primary text-white font-bold py-3 px-8 rounded-full inline-block relative mb-4">
                        <i class="fas fa-calculator mr-3"></i>Start Your Reading
                    </a>
                    <div>
                        <a href="index.php" class="nav-link text-purple-300 hover:text-purple-100 font-medium text-lg">
                            <i class="fas fa-home mr-3"></i>Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 <footer class="footer-container fixed bottom-0 text-center">
        <p class="footer-text font-medium text-purple-300">
            <i class="fas fa-copyright mr-2"></i>2025 Juliana Mancera <i class="fas fa-star text-purple-300 ml-2"></i> 
        </p>
    </footer>
</body>
</html>