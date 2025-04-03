@push('css')

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 20px;
    }
    .btn-open-login {
        background-color: #0d6efd;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-weight: 500;
    }
    .modal-login .modal-content {
        border-radius: 10px;
        border: none;
    }
    .hospital-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .hospital-header h2 {
        color: #0d6efd;
        font-weight: 600;
    }
    .hospital-header p {
        color: #6c757d;
    }
    .btn-login {
        background-color: #0d6efd;
        border: none;
        width: 100%;
        padding: 10px;
        font-weight: 500;
    }
    .btn-login:hover {
        background-color: #0b5ed7;
    }
    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>

@endpush

 <!-- Bouton pour ouvrir la modal -->
 <button type="button" class="btn-open-login" data-bs-toggle="modal" data-bs-target="#loginModal">
    Se connecter
</button>

<!-- Modal de connexion -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="hospital-header">
                    <h2>Hello,</h2>
                    <h2>Welcome back</h2>
                    <p class="mt-3">Connectez-vous à votre compte</p>
                </div>

                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Entrez votre email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Se souvenir de moi</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login">Se connecter</button>

                    <div class="text-center mt-3">
                        <a href="#">Mot de passe oublié ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

