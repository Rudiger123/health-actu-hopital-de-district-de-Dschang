<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôpital - Maintenance en Cours</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #2563eb;
            --secondary-blue: #3b82f6;
            --light-blue: #dbeafe;
            --accent-green: #10b981;
            --light-green: #d1fae5;
            --medical-red: #ef4444;
            --warm-white: #fefefe;
            --soft-gray: #f8fafc;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --shadow-light: rgba(0, 0, 0, 0.05);
            --shadow-medium: rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--soft-gray) 0%, var(--light-blue) 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Medical Background Pattern */
        .medical-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.03;
            background-image:
                radial-gradient(circle at 20% 20%, var(--primary-blue) 2px, transparent 2px),
                radial-gradient(circle at 80% 80%, var(--accent-green) 2px, transparent 2px),
                radial-gradient(circle at 40% 60%, var(--medical-red) 1px, transparent 1px);
            background-size: 100px 100px, 80px 80px, 60px 60px;
            animation: medicalFloat 20s infinite linear;
        }

        @keyframes medicalFloat {
            0% {
                transform: translateX(0) translateY(0);
            }

            100% {
                transform: translateX(-50px) translateY(-50px);
            }
        }

        /* Floating Medical Icons */
        .medical-icons {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .medical-icon {
            position: absolute;
            font-size: 2rem;
            color: var(--primary-blue);
            opacity: 0.1;
            animation: floatUpDown 15s infinite ease-in-out;
        }

        @keyframes floatUpDown {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        /* Main Container */
        .maintenance-container {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Hospital Card */
        .hospital-card {
            background: var(--warm-white);
            border-radius: 24px;
            padding: 3rem;
            box-shadow:
                0 20px 40px var(--shadow-light),
                0 10px 20px var(--shadow-medium);
            max-width: 800px;
            width: 100%;
            text-align: center;
            position: relative;
            animation: slideInScale 1.2s ease-out;
            border: 1px solid rgba(37, 99, 235, 0.1);
        }

        @keyframes slideInScale {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Hospital Logo */
        .hospital-logo {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, gray, white);
            border-radius: 50%;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            animation: pulse 3s infinite;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.3);
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .hospital-logo::before {
            content: '';
            position: absolute;
            width: 140px;
            height: 140px;
            border: 2px solid var(--light-blue);
            border-radius: 50%;
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        .hospital-logo img {
            height: 80px;
            /* taille de l'image */
            z-index: 0;
        }

        /* Typography */
        .hospital-title {
            color: var(--text-primary);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .hospital-subtitle {
            color: var(--primary-blue);
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .maintenance-message {
            color: var(--text-secondary);
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Medical Services Status */
        .services-status {
            background: var(--soft-gray);
            border-radius: 16px;
            padding: 2rem;
            margin: 2rem 0;
            border-left: 4px solid var(--accent-green);
        }

        .services-title {
            color: var(--text-primary);
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .services-title i {
            margin-right: 10px;
            color: var(--accent-green);
        }

        .service-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .service-item:last-child {
            border-bottom: none;
        }

        .service-name {
            color: var(--text-primary);
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .service-name i {
            margin-right: 10px;
            color: var(--primary-blue);
            width: 20px;
        }

        .service-status {
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-available {
            background: var(--light-green);
            color: var(--accent-green);
        }

        .status-limited {
            background: #fef3c7;
            color: #d97706;
        }

        /* Emergency Contact */
        .emergency-contact {
            background: linear-gradient(135deg, var(--medical-red), #dc2626);
            color: white;
            border-radius: 16px;
            padding: 2rem;
            margin: 2rem 0;
            animation: emergencyPulse 4s infinite;
        }

        @keyframes emergencyPulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
            }

            50% {
                box-shadow: 0 0 0 20px rgba(239, 68, 68, 0);
            }
        }

        .emergency-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .emergency-title i {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        .emergency-numbers {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .emergency-item {
            text-align: center;
        }

        .emergency-number {
            font-size: 1.5rem;
            font-weight: 700;
            display: block;
            margin-bottom: 0.5rem;
        }

        .emergency-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Progress Indicator */
        .maintenance-progress {
            margin: 2rem 0;
        }

        .progress-label {
            color: var(--text-primary);
            font-weight: 500;
            margin-bottom: 1rem;
            text-align: left;
        }

        .progress {
            height: 12px;
            background: var(--soft-gray);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: inset 0 2px 4px var(--shadow-light);
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-green));
            animation: progressFlow 3s ease-in-out infinite, loadProgress 5s ease-out;
            border-radius: 10px;
            position: relative;
        }

        @keyframes progressFlow {

            0%,
            100% {
                background: linear-gradient(90deg, var(--primary-blue), var(--accent-green));
            }

            50% {
                background: linear-gradient(90deg, var(--accent-green), var(--primary-blue));
            }
        }

        @keyframes loadProgress {
            0% {
                width: 0%;
            }

            100% {
                width: 78%;
            }
        }

        /* Estimated Time */
        .estimated-time {
            background: var(--light-blue);
            border-radius: 12px;
            padding: 1.5rem;
            margin: 2rem 0;
            border: 1px solid rgba(37, 99, 235, 0.2);
        }

        .time-title {
            color: var(--primary-blue);
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .time-title i {
            margin-right: 10px;
        }

        .countdown-display {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .time-unit {
            background: white;
            border-radius: 12px;
            padding: 1rem;
            min-width: 80px;
            box-shadow: 0 4px 6px var(--shadow-light);
        }

        .time-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-blue);
            display: block;
        }

        .time-label {
            font-size: 0.8rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            font-weight: 500;
        }

        /* Footer Info */
        .footer-info {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .hospital-info {
            color: var(--text-secondary);
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hospital-card {
                padding: 2rem;
                margin: 1rem;
            }

            .hospital-title {
                font-size: 2rem;
            }

            .emergency-numbers {
                flex-direction: column;
                gap: 1rem;
            }

            .countdown-display {
                flex-wrap: wrap;
            }

            .time-unit {
                min-width: 60px;
                padding: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Medical Background Pattern -->
    <div class="medical-background"></div>

    <!-- Floating Medical Icons -->
    <div class="medical-icons">
        <i class="fas fa-heartbeat medical-icon" style="top: 10%; left: 10%; animation-delay: 0s;"></i>
        <i class="fas fa-stethoscope medical-icon" style="top: 20%; right: 15%; animation-delay: 2s;"></i>
        <i class="fas fa-pills medical-icon" style="bottom: 30%; left: 20%; animation-delay: 4s;"></i>
        <i class="fas fa-ambulance medical-icon" style="bottom: 20%; right: 10%; animation-delay: 6s;"></i>
        <i class="fas fa-user-md medical-icon" style="top: 60%; left: 5%; animation-delay: 8s;"></i>
        <i class="fas fa-hospital medical-icon" style="top: 40%; right: 5%; animation-delay: 10s;"></i>
    </div>

    <div class="maintenance-container">
        <div class="hospital-card">
            <!-- Hospital Logo -->
            <div class="hospital-logo">
                <img src="{{ asset('favicon.png') }}" alt="Logo Hôpital">
            </div>

            <!-- Main Content -->
            <h1 class="hospital-title">Hôpital Regional Annexe de Dschang</h1>
            <p class="hospital-subtitle">Système en Maintenance</p>

            <p class="maintenance-message">
                Notre système informatique fait l'objet d'une maintenance programmée pour améliorer nos services.
                Pendant cette période, certaines fonctionnalités en ligne peuvent être temporairement indisponibles.
                Nos équipes médicales restent mobilisées pour assurer la continuité des soins.
            </p>

            <!-- Services Status -->
            <div class="services-status">
                <h3 class="services-title">
                    <i class="fas fa-clipboard-check"></i>
                    État des Services
                </h3>

                <div class="service-item">
                    <div class="service-name">
                        <i class="fas fa-ambulance"></i>
                        Services d'Urgence
                    </div>
                    <span class="service-status status-available">Disponible 24h/24</span>
                </div>

                <div class="service-item">
                    <div class="service-name">
                        <i class="fas fa-user-md"></i>
                        Consultations
                    </div>
                    <span class="service-status status-available">Maintenues</span>
                </div>

                <div class="service-item">
                    <div class="service-name">
                        <i class="fas fa-calendar-alt"></i>
                        Prises de RDV en ligne
                    </div>
                    <span class="service-status status-limited">Temporairement indisponible</span>
                </div>

                <div class="service-item">
                    <div class="service-name">
                        <i class="fas fa-file-medical"></i>
                        Dossiers médicaux
                    </div>
                    <span class="service-status status-limited">Accès limité</span>
                </div>
            </div>

            <!-- Emergency Contact -->
            <div class="emergency-contact">
                <h3 class="emergency-title">
                    <i class="fas fa-phone-alt"></i>
                    Contacts d'Urgence
                </h3>
                <div class="emergency-numbers">
                    <div class="emergency-item">
                        <span class="emergency-number">15</span>
                        <span class="emergency-label">SAMU</span>
                    </div>
                    <div class="emergency-item">
                        <span class="emergency-number">+237 XXX XX XX XX</span>
                        <span class="emergency-label">Accueil Hôpital</span>
                    </div>
                    <div class="emergency-item">
                        <span class="emergency-number">+237 XXX XX XX XX</span>
                        <span class="emergency-label">Urgences</span>
                    </div>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="maintenance-progress">
                <div class="progress-label">
                    <i class="fas fa-tools"></i>
                    Progression de la maintenance
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar"></div>
                </div>
            </div>

            <!-- Estimated Time -->
            <div class="estimated-time">
                <h3 class="time-title">
                    <i class="fas fa-clock"></i>
                    Temps estimé de rétablissement
                </h3>
                <div class="countdown-display">
                    <div class="time-unit">
                        <span class="time-number" id="hours">01</span>
                        <span class="time-label">Heures</span>
                    </div>
                    <div class="time-unit">
                        <span class="time-number" id="minutes">45</span>
                        <span class="time-label">Minutes</span>
                    </div>
                    <div class="time-unit">
                        <span class="time-number" id="seconds">30</span>
                        <span class="time-label">Secondes</span>
                    </div>
                </div>
            </div>

            <!-- Footer Info -->
            <div class="footer-info">
                <div class="hospital-info">
                    <p><strong>Hôpital Regional Annexe de Dschang</strong></p>
                    <p>Nous nous excusons pour la gêne occasionnée et vous remercions de votre compréhension.</p>
                    <p><i class="fas fa-envelope"></i> contact@hradschang.org | <i class="fas fa-globe"></i>
                        www.hradschang.org</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Countdown Timer
        function initCountdown() {
            const now = new Date().getTime();
            const targetTime = now + (1 * 60 * 60 * 1000) + (45 * 60 * 1000) + (30 * 1000); // 1h 45m 30s

            const interval = setInterval(() => {
                const currentTime = new Date().getTime();
                const distance = targetTime - currentTime;

                if (distance < 0) {
                    clearInterval(interval);
                    document.getElementById('hours').textContent = '00';
                    document.getElementById('minutes').textContent = '00';
                    document.getElementById('seconds').textContent = '00';
                    return;
                }

                const hours = Math.floor(distance / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
            }, 1000);
        }

        // Animate medical icons
        function animateMedicalIcons() {
            const icons = document.querySelectorAll('.medical-icon');
            icons.forEach((icon, index) => {
                icon.style.animationDelay = (index * 2) + 's';

                // Add random movement
                setInterval(() => {
                    const randomX = Math.random() * 20 - 10;
                    const randomY = Math.random() * 20 - 10;
                    icon.style.transform = `translate(${randomX}px, ${randomY}px)`;
                }, 5000 + (index * 1000));
            });
        }

        // Add hover effects to service items
        function addServiceHoverEffects() {
            const serviceItems = document.querySelectorAll('.service-item');
            serviceItems.forEach(item => {
                item.addEventListener('mouseenter', () => {
                    item.style.background = 'rgba(37, 99, 235, 0.05)';
                    item.style.transform = 'translateX(5px)';
                    item.style.transition = 'all 0.3s ease';
                });

                item.addEventListener('mouseleave', () => {
                    item.style.background = 'transparent';
                    item.style.transform = 'translateX(0)';
                });
            });
        }

        // Initialize everything
        document.addEventListener('DOMContentLoaded', () => {
            initCountdown();
            animateMedicalIcons();
            addServiceHoverEffects();
        });

        // Emergency contact animation
        document.querySelector('.emergency-contact').addEventListener('click', () => {
            navigator.vibrate && navigator.vibrate([100, 50, 100]);
        });
    </script>
</body>

</html>
