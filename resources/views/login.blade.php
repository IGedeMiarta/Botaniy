<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" name="myForm" action="{{ route('login') }}">
                    @csrf
                    <span id="error-msg"></span>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <!-- end col -->
                                <div class="col-md-12 mb-3">
                                    <label class="fw-medium form-label" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Your email"
                                        id="email" />
                                </div>
                                <!-- end col -->
                                <div class="col-md-12 mb-3">
                                    <label class="fw-medium form-label" for="subject">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        id="password" />
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="d-grid gap-2">
                                        <input type="submit" class="btn btn-primary mt-2 btn-block" value="Sign In" />
                                        <span class="text-center"> Belum Punya Akun?, <a href="#"
                                                class="register">Register</a></span>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $('.register').on('click', function() {
            $('#RegistModal').modal('show');
            $('#exampleModal').modal('hide');
        })
    </script>
@endpush
