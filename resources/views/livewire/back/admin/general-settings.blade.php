<div>
    <div class="d-flex align-items-center gap-2 menu-link" role="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
        <i class="menu-icon tf-icons bx bx-cog fs-5"></i>
        <div class="fw-semibold text-truncate" data-i18n="Settings">Paramètres</div>
    </div>

    <!-- End Offcanvas -->
    <div class="col-lg-3 col-md-6">
        <div class="mt-4">
            <div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
                aria-labelledby="offcanvasEndLabel" data-bs-backdrop="false" data-bs-scroll="true">
                <div class="offcanvas-header">
                    <h5 id="offcanvasEndLabel" class="offcanvas-title">Paramètres du Site</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="container py-4">
                    <!-- resources/views/livewire/site-settings.blade.php -->

                    <form wire:submit.prevent="updateSettings">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="siteTitle" class="form-label">Site title</label>
                                <input type="text" class="form-control @error('siteTitle') is-invalid @enderror"
                                    id="siteTitle" placeholder="Enter site title" wire:model.defer="siteTitle">
                                @error('siteTitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="siteEmail" class="form-label">Site email</label>
                                <input type="email" class="form-control @error('siteEmail') is-invalid @enderror"
                                    id="siteEmail" placeholder="Enter site email" wire:model.defer="siteEmail">
                                @error('siteEmail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sitePhone" class="form-label">Site phone number <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control @error('sitePhone') is-invalid @enderror"
                                    id="sitePhone" placeholder="Enter site contact phone" wire:model.defer="sitePhone">
                                @error('sitePhone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="siteKeywords" class="form-label">Site Meta Keywords <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control @error('siteKeywords') is-invalid @enderror"
                                    id="siteKeywords" placeholder="Eg: ecommerce, free api, laravel"
                                    wire:model.defer="siteKeywords">
                                @error('siteKeywords')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="siteDescription" class="form-label">Site Meta Description <span
                                        class="text-muted">(Optional)</span></label>
                                <textarea class="form-control h-240 @error('siteDescription') is-invalid @enderror" id="siteDescription" rows="4"
                                    placeholder="Type site meta description..." wire:model.defer="siteDescription"></textarea>
                                @error('siteDescription')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading class="spinner-border spinner-border-sm"></span>
                                Save Changes
                            </button>

                        </div>

                        @if (session()->has('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>


                </div>

            </div>
        </div>
    </div>

</div>
