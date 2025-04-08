
<!-- Logout Modal-->
<div class="modal fade" id="ladminModal" tabindex="-1" role="dialog" aria-labelledby="modalLadmin" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="user-select-none modal-header bg-primary text-white">
                <h5 class="modal-title" id="ladminModalLabel">Apakah anda akan menambah data Pengguna?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>
            <div class="modal-body"><form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="email"
                                                id="email" placeholder="Masukkan email atau no. telepon..." required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group.border-0">
                                                <input type="password" class="form-control form-control-user"
                                                    name="password" id="password" placeholder="Masukkan kata sandi..."
                                                    required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-rounded" type="button" id="show-password-btn"
                                                        data-action='show-password'>
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-rounded" type="button" id="hide-password-btn"
                                                        data-action='hide-password'>
                                                        <i class="fas fa-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex justify-content-end">
                                            <a href="forgot-password" class="text-decoration-underline text-muted">Lupa
                                                kata sandi?</a>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                        <div class="my-2 text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="custom-border flex-grow-1"></div>
                                                <div class="px-2 text-secondary">atau</div>
                                                <div class="custom-border flex-grow-1"></div>
                                            </div>
                                        </div>
                                        <a href="diagnosis" class="btn btn-primary btn-user btn-block">
                                            Masuk sebagai tamu
                                        </a>
                                        <div class="mt-4 text-center">
                                            <a href="register" class="text-decoration-none text-muted">
                                                <u>Buat akun baru!</u></a>
                                        </div>
                                    </form>
                                </div>
        </div>
    </div>
</div>