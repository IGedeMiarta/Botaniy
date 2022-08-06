  <!-- start services -->
  <section class="section" id="service">
      <div class="container">
          <div class="row justify-content-center text-center">
              <div class="col-12 mb-4">
                  <h4 class="fw-semibold mb-3">Catalog Tanaman</h4>
                  <h5 class="text-muted fw-normal">Kami memiliki berbagasi tanaman, ada yang membuatmu tertarik?</h5>
              </div>
          </div>
          <div class="row">
              @foreach ($tanaman as $t)
                  <div class="col-md-4 mt-4 pt-2">
                      <div class="card service rounded px-4 py-md-5 py-3 border">
                          <img class="card-img-top" src="{{ asset('/') . $t->gambar }}" alt="Card image cap"
                              style="max-width: 300px">
                          <h6 class="my-4">{{ $t->nama }}</h6>
                          <p class="text-muted mb-4">
                              Tanaman yang berjenis {{ $t->jenis->nama }},
                              {{ $t->jenis->detail }}
                              <br>
                              Memiliki
                              khasiat sebagai
                              {{ $t->khasiat }}
                          </p>
                          <div class="ser-link"><a href="{{ url('find/' . $t->slug) }}"
                                  class="fs-15 text-dark fw-medium">Read More <i data-feather="arrow-right"
                                      class="icon-xs"></i></a></div>
                      </div>
                  </div>
              @endforeach

          </div>
      </div>
  </section>
  <!-- end servies -->
