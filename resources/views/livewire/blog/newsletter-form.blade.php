  <!-- Call To Action Section -->
  <section id="call-to-action-0" class="call-to-action-0 section">
      <div class="container" wire:ignore.self data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4 justify-content-between align-items-center">
              <div class="col-lg-6">
                  <div class="cta-content"wire:ignore.self data-aos="fade-up" data-aos-delay="200">
                      <h2>Restez Connecté avec Nos Dernières Innovations Médicales</h2>
                      <p>Abonnez-vous à notre newsletter pour recevoir les dernières actualités médicales, conseils de
                          santé et innovations en soins médicaux, directement dans votre boîte de réception.</p>
                      <form wire:submit='subscription' class="php-email-form cta-form" data-aos="fade-up"
                          wire:ignore.self data-aos-delay="300">
                          <div class="input-group mb-3">
                              <input type="email" class="form-control" placeholder="Adresse e-mail..."
                                  wire:model='email' aria-label="Email address" aria-describedby="button-subscribe">
                              <button class="btn btn-primary" type="submit"
                                  id="button-subscribe" wire:loading.attr="disabled">
                                  <span wire:loading class="spinner-border spinner-border-sm"></span>S'abonner</button>
                          </div>
                          @error('email')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </form>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="cta-image" wire:ignore.self data-aos="zoom-out" data-aos-delay="200">
                      <img src="assets/images/newsletter.png" alt="Image informative sur la santé" class="img-fluid">
                  </div>
              </div>
          </div>
      </div>
  </section><!-- /Call To Action Section -->
