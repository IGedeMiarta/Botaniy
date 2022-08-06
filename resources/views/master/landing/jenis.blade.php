   <section class="service-section">
       <div class="container">
           <div class="row justify-content-center text-center">
               <div class="col-12 mb-4">
                   <h4 class="fw-semibold mb-3">Jenis Tanaman</h4>
                   <h5 class="text-muted fw-normal">Kami memiliki berbagai jenis tanaman, tertarik?</h5>
               </div>
           </div>
           <div class="row text-center">
               <div class="col-lg-12">
                   <div class="feature-slider d-flex justify-content-center">
                       @foreach ($jenis as $j)
                           <div>
                               <div class="mt-4 pt-2">
                                   <div class="solution border rounded position-relative px-4 py-5">
                                       <img src="{{ asset('/') . $j->gambar }}" alt="gambar" style="max-width: 100px">
                                       <h5 class="lh-base fs-16 mb-2">{{ $j->nama }}</h5>
                                       <a class="text-muted">{{ $j->detail }}</a>
                                   </div>
                               </div>
                           </div>
                       @endforeach

                   </div>
               </div>
           </div>
       </div>
   </section>
