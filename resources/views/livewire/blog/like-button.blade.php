<div>
    <button class="action-btn like-btn {{ $liked ? 'liked' : '' }}" wire:click="toggleLike" id="likeButton">
        <i class="bi bi-hand-thumbs-up"></i>
        <span class="counter">{{ $count }}</span>
    </button>

    <style>
        .action-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .like-btn {
            background: #f0f2f5;
            border: none;
            padding: 8px 12px;
            border-radius: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            outline: none;
        }

        .like-btn:hover {
            background: #e4e6eb;
        }

        .like-btn.liked {
            color: #1877f2;
        }

        .like-btn .bi-hand-thumbs-up {
            transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .like-btn.liked .bi-hand-thumbs-up {
            transform: scale(1.2);
            animation: thumbsUp 0.6s ease;
        }

        .counter {
            transition: all 0.3s ease;
        }

        .like-btn.liked .counter {
            font-weight: bold;
            animation: counterBounce 0.6s ease;
        }

        @keyframes thumbsUp {
            0% {
                transform: scale(1) rotate(0deg);
            }

            25% {
                transform: scale(1.3) rotate(-15deg);
            }

            50% {
                transform: scale(1.2) rotate(15deg);
            }

            75% {
                transform: scale(1.3) rotate(-5deg);
            }

            100% {
                transform: scale(1.2) rotate(0deg);
            }
        }

        @keyframes counterBounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        /* Effets de particules */
        .particle {
            position: absolute;
            background-color: #1877f2;
            border-radius: 50%;
            pointer-events: none;
            animation: particle-pop 1s forwards;
            will-change: transform, opacity;
        }

        @keyframes particle-pop {
            0% {
                opacity: 0;
                transform: translate(0, 0) scale(0);
            }

            20% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translate(var(--x), var(--y)) scale(1);
            }
        }
    </style>

    <script>
        function initLikeButton() {
            const likeButton = document.getElementById('likeButton');
            if (!likeButton) return;

            // Supprimer les anciens event listeners
            const newButton = likeButton.cloneNode(true);
            likeButton.parentNode.replaceChild(newButton, likeButton);

            newButton.addEventListener('click', function(e) {
                if (!newButton.classList.contains('liked')) {
                    createParticles(newButton, e.clientX, e.clientY);
                }
            });
        }

        function createParticles(button, x, y) {
            const rect = button.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;

            // Limiter le nombre de particules pour de meilleures performances
            const particleCount = Math.min(5, window.innerWidth < 768 ? 3 : 5);

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('span');
                particle.classList.add('particle');

                const angle = Math.random() * Math.PI * 2;
                const distance = 20 + Math.random() * 30;
                const size = 3 + Math.random() * 4;

                particle.style.left = `${rect.width / 2}px`;
                particle.style.top = `${rect.height / 2}px`;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.setProperty('--x', `${Math.cos(angle) * distance}px`);
                particle.style.setProperty('--y', `${Math.sin(angle) * distance}px`);

                button.appendChild(particle);

                // Nettoyer les particules après l'animation
                setTimeout(() => {
                    if (particle.parentNode === button) {
                        particle.remove();
                    }
                }, 1000);
            }
        }

        // Initialisation au chargement
        document.addEventListener('DOMContentLoaded', initLikeButton);

        // Réinitialisation après les mises à jour Livewire
        document.addEventListener('livewire:load', function() {
            initLikeButton();
        });

        // Réinitialisation après chaque mise à jour Livewire
        document.addEventListener('livewire:update', function() {
            initLikeButton();
        });
    </script>

</div>
