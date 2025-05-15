<div class="d-flex align-items-center gap-2 flex-wrap" id='switch'>
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-2 menu-link"
                type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            @if($this->currentLocale === 'fr')
                🇫🇷 Français
            @else
                🇺🇸 English
            @endif
        </button>

        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
            <li>
                <button wire:click="switch('en')" class="dropdown-item d-flex align-items-center gap-2">
                    🇺🇸 English
                </button>
            </li>
            <li>
                <button wire:click="switch('fr')" class="dropdown-item d-flex align-items-center gap-2">
                    🇫🇷 Français
                </button>
            </li>
        </ul>
    </div>

    @push('adminjs')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('language-changed', (event) => {
                window.location.reload();
            });
        });
    </script>
    @endpush
</div>
