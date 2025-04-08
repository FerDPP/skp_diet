<?php
include 'includes/functions.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $kata_sandi = $_POST['konfirmasi_password'];

    tambahPenggunaBaru($nama, $email, $no_telepon, $kata_sandi);
}
?>
<!-- Logout Modal-->
<div class="modal fade" id="radminModal" tabindex="-1" role="dialog" aria-labelledby="modalRadmin" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="user-select-none modal-header bg-primary text-white">
                <h5 class="modal-title" id="radminModalLabel">Apakah anda akan menambah data Pengguna?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>
            <div class="modal-body">Tambah Pengguna</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="./register.php">Tambahkan</a>
            </div>
        </div>
    </div>
</div>