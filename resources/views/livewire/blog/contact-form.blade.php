<div>
    <form wire:submit='sendMessage' role="form" class="php-email-form">
        @csrf
        @if (session()->has('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-error mt-3">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 form-group">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Votre nom complet*"
                        wire:model="name">

                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 form-group">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Adresse email*"
                        wire:model='email'>

                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 form-group">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-phone"></i></span>
                    <input type="text" class="form-control" name="phone" placeholder="Numéro de téléphone*"
                        wire:model='phone'>

                </div>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 form-group">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-list"></i></span>
                    <input type="text" class="form-control" name="subject" placeholder="Sujet de votre message*"
                        wire:model='subject'>

                </div>
                @error('subject')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                    <textarea class="form-control" name="message" rows="6" placeholder="Votre message*" wire:model='message'></textarea>

                </div>
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-center my-4">
                <button type="submit" class="btn" wire:loading.attr="disabled">
                    <span wire:loading class="spinner-border spinner-border-sm"></span>Envoyer le message</button>
            </div>
        </div>
    </form>

</div>
