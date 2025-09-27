<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Agent System - Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --neon-blue: #0ff0fc;
            --neon-pink: #ff2a6d;
            --ai-green: #00ff9d;
            --ai-teal: #00e1ff;
            --ai-purple: #b300ff;
            --dark-bg: #0c0c17;
            --darker-bg: #06060d;
            --text-bright: rgba(255,255,255,0.95);
            --text-dim: rgba(255,255,255,0.6);
            --glass-blur: 20px;
        }

        @font-face {
            font-family: 'Cyber';
            src: url('https://fonts.cdnfonts.com/css/cyberpunk-is-not-dead') format('woff2');
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
            font-family: 'Cyber', 'Courier New', monospace;
            overflow-x: hidden;
        }

        body {
            background: var(--darker-bg);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(0, 255, 157, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(179, 0, 255, 0.15) 0%, transparent 50%);
            position: relative;
            padding: 20px;
        }

        /* AI Neural Network Background */
        .ai-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(0, 255, 157, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(179, 0, 255, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: -3;
            opacity: 0.5;
        }

        /* AI Data Stream Effect */
        .scanline {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to bottom,
                transparent 0%,
                rgba(0, 255, 157, 0.03) 50%,
                transparent 100%
            );
            background-size: 100% 8px;
            z-index: -2;
            animation: scan 4s linear infinite;
            pointer-events: none;
        }

        @keyframes scan {
            0% { background-position: 0 0; }
            100% { background-position: 0 100%; }
        }

        /* AI Glowing Nodes */
        .ai-node {
            position: absolute;
            border-radius: 50%;
            filter: blur(1px);
            z-index: -1;
            animation: pulse 3s infinite alternate;
        }

        @keyframes pulse {
            0% { opacity: 0.3; transform: scale(0.95); }
            100% { opacity: 0.7; transform: scale(1.05); }
        }

        .otp-container {
            max-width: 480px;
            width: 100%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        .ai-terminal {
            background: rgba(12, 12, 23, 0.7);
            backdrop-filter: blur(var(--glass-blur));
            -webkit-backdrop-filter: blur(var(--glass-blur));
            border-radius: 12px;
            border: 1px solid rgba(0, 255, 157, 0.2);
            box-shadow: 
                0 0 15px rgba(0, 255, 157, 0.1),
                0 0 30px rgba(179, 0, 255, 0.1),
                inset 0 0 20px rgba(0, 255, 157, 0.05);
            padding: 50px 40px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            width: 100%;
        }

        .ai-terminal:hover {
            box-shadow: 
                0 0 25px rgba(0, 255, 157, 0.2),
                0 0 45px rgba(179, 0, 255, 0.2),
                inset 0 0 30px rgba(0, 255, 157, 0.1);
            transform: translateY(-5px);
        }

        .ai-terminal::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(0, 255, 157, 0.1),
                transparent
            );
            transition: all 0.6s ease;
        }

        .ai-terminal:hover::before {
            left: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .logo {
            font-size: 3.5rem;
            color: transparent;
            background: linear-gradient(135deg, var(--ai-green), var(--ai-purple));
            -webkit-background-clip: text;
            background-clip: text;
            margin-bottom: 15px;
            text-shadow: 0 0 10px rgba(0, 255, 157, 0.3);
        }

        .title {
            font-size: 2.2rem;
            color: var(--text-bright);
            margin-bottom: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            background: linear-gradient(90deg, var(--ai-green), var(--ai-purple));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .subtitle {
            font-size: 0.9rem;
            color: var(--text-dim);
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--ai-green);
            font-size: 1.1rem;
        }

        .form-control {
            background: rgba(6, 6, 13, 0.7);
            border: 1px solid rgba(0, 255, 157, 0.2);
            color: var(--text-bright);
            border-radius: 8px;
            padding: 15px 45px 15px 45px;
            font-size: 1rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: inset 0 0 10px rgba(0, 255, 157, 0.05);
            text-align: center;
        }

        .form-control:focus {
            background: rgba(6, 6, 13, 0.9);
            border-color: var(--ai-purple);
            box-shadow: 
                inset 0 0 15px rgba(0, 255, 157, 0.1),
                0 0 15px rgba(0, 255, 157, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-dim);
            letter-spacing: 1px;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--ai-green), var(--ai-purple));
            color: black;
            border: none;
            border-radius: 8px;
            padding: 15px;
            width: 100%;
            font-size: 1.1rem;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 255, 157, 0.3);
        }

        .btn-submit:hover {
            box-shadow: 0 0 25px rgba(0, 255, 157, 0.5);
            transform: translateY(-3px);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: all 0.5s ease;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .footer-links {
            margin-top: 25px;
            text-align: center;
            font-size: 0.85rem;
        }

        .footer-links span {
            color: var(--text-dim);
        }

        .login-link {
            position: relative;
            display: inline-block;
            color: var(--ai-teal);
            text-decoration: none;
            transition: all 0.3s ease;
            margin-left: 5px;
        }

        .login-link i {
            margin-right: 6px;
            transition: all 0.3s ease;
        }

        .login-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 1px;
            background: var(--ai-purple);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .login-link:hover {
            color: var(--ai-purple);
            text-shadow: 0 0 5px rgba(179, 0, 255, 0.3);
        }

        .login-link:hover i {
            transform: translateX(3px);
        }

        .login-link:hover::after {
            width: 100%;
            background: var(--ai-teal);
            box-shadow: 0 0 5px var(--ai-teal);
        }

        .alert {
            background: rgba(255, 42, 109, 0.15);
            border: 1px solid var(--neon-pink);
            color: #ff8fab;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 25px;
            position: relative;
            letter-spacing: 1px;
        }

        .alert::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: var(--neon-pink);
        }

        .alert-success {
            background: rgba(0, 255, 157, 0.15);
            border: 1px solid var(--ai-green);
            color: #80ffd0;
        }

        .alert-success::before {
            background: var(--ai-green);
        }

        /* AI Terminal Border Effect */
        .ai-border {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .ai-border::before,
        .ai-border::after {
            content: '';
            position: absolute;
            background: linear-gradient(90deg, var(--ai-green), var(--ai-purple));
            animation: borderGlow 3s linear infinite;
        }

        .ai-border::before {
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            box-shadow: 0 0 10px var(--ai-green);
        }

        .ai-border::after {
            bottom: 0;
            right: 0;
            width: 1px;
            height: 100%;
            box-shadow: 0 0 10px var(--ai-purple);
        }

        @keyframes borderGlow {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }

        /* Responsive design */
        @media (max-width: 576px) {
            .ai-terminal {
                padding: 40px 25px;
            }
            
            .title {
                font-size: 1.8rem;
            }
            
            .logo {
                font-size: 3rem;
            }
        }

        .otp-instructions {
            color: var(--text-dim);
            font-size: 0.85rem;
            text-align: center;
            margin-bottom: 20px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <!-- AI Neural Network Background -->
    <div class="ai-grid"></div>
    <div class="scanline"></div>
    
    <!-- AI Glowing Nodes -->
    <div class="ai-node" style="width: 300px; height: 300px; background: radial-gradient(circle, var(--ai-green) 0%, transparent 70%); top: -150px; left: -150px; animation-delay: 0.5s;"></div>
    <div class="ai-node" style="width: 200px; height: 200px; background: radial-gradient(circle, var(--ai-purple) 0%, transparent 70%); bottom: -100px; right: -100px; animation-delay: 1s;"></div>
    
    <div class="otp-container">
        <div class="ai-terminal">
            <div class="ai-border"></div>
            
            <div class="header">
                <div class="logo">
                    <i class="fas fa-brain"></i>
                </div>
                <h1 class="title">AI AGENT SYSTEM</h1>
                <p class="subtitle">SECURITY VERIFICATION</p>
            </div>

            <p class="otp-instructions">We've sent a verification code to your email. Please enter it below to continue.</p>
            
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
            <?php
            if(isset($errors) && count($errors) > 0){
                ?>
                <div class="alert">
                    <?php
                    foreach($errors as $showerror){
                        echo $showerror;
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            
            <form action="user-otp.php" method="POST" autocomplete="off">
                <div class="form-group">
                    <i class="fas fa-shield-alt input-icon"></i>
                    <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                </div>
                <div class="form-group">
                    <input class="btn-submit" type="submit" name="check" value="Verify Code">
                </div>
            </form>

            <div class="footer-links">
                <span>Need help? </span>
                <a href="login-user.php" class="login-link">
                    <i class="fas fa-question-circle"></i>Contact support
                </a>
            </div>
        </div>
    </div>

    <script>
        // AI Terminal Input Effects
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentNode.querySelector('.input-icon').style.color = 'var(--ai-purple)';
                this.parentNode.querySelector('.input-icon').style.textShadow = '0 0 5px var(--ai-purple)';
            });
            
            input.addEventListener('blur', function() {
                this.parentNode.querySelector('.input-icon').style.color = 'var(--ai-green)';
                this.parentNode.querySelector('.input-icon').style.textShadow = 'none';
            });
        });

        // AI Sound Effects (Optional)
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-submit') || 
                e.target.classList.contains('form-control')) {
                const clickSound = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-modern-click-box-check-1120.mp3');
                clickSound.volume = 0.3;
                clickSound.play();
            }
        });

        // Auto-focus on OTP input
        document.addEventListener('DOMContentLoaded', function() {
            const otpInput = document.querySelector('input[name="otp"]');
            if (otpInput) {
                otpInput.focus();
            }
        });
    </script>
</body>
</html>