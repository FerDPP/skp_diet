

<?php

    if (isset($_POST['register'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $no_telepon = $_POST['no_telepon'];
        $kata_sandi = $_POST['konfirmasi_password'];

        modalTambahBaru($nama, $email, $no_telepon, $kata_sandi);
    }
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#radminModal">
                        Registrasi Admin
                    </button>

<!-- Logout Modal-->
<div class="modal fade" id="radminModal" tabindex="-1" role="dialog" aria-labelledby="modalRadmin" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="user-select-none modal-header bg-primary text-white">
                <h5 class="modal-title" id="radminModalLabel">Menu Registrasi Admin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>
            <div class="modal-body"><form class="user" onsubmit="return validateForm();" method="post" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama"
                                                name="nama" placeholder="Masukkan nama lengkap..." pattern="[a-zA-Z\s]+"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email"
                                                name="email" placeholder="Masukkan email..." onkeyup="validateEmail()"
                                                required>
                                            <p class="ml-2 mt-3 m-0 font-weight-bold text-danger" id="error-email"
                                                style="font-size: 0.8rem; display: none;">
                                                Email tidak valid</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" id="no_telepon"
                                                name="no_telepon" placeholder="Contoh: 081234567890"
                                                onkeyup="validatePhoneNumber()" style="display: none;">
                                            <p class="ml-2 mt-3 m-0 font-weight-bold text-danger" id="error-no-telepon"
                                                style="font-size: 0.8rem; display: none;">
                                                Nomor telepon harus terdiri dari 10 hingga 13 angka</p>
                                        </div>
                                        <div class="mb-3 d-flex justify-content-end">
                                            <a href="#" class="text-sm" id="toggleEmailPhone"
                                                style="font-size: 0.8rem">Gunakan No. Telepon</a>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group.border-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="password" name="password" placeholder="Masukkan kata sandi..."
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
                                        <div class="mb-3 ml-2">
                                            <p id="8char" class="m-0 font-weight-bold text-success"
                                                style="font-size: 0.8rem; display: none">
                                                &bull; Harus berisi minimal 8 karakter</p>
                                            <p id="textChar" class="m-0 font-weight-bold text-danger"
                                                style="font-size: 0.8rem; display: none">&bull;
                                                Harus mengandung huruf & angka</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group.border-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="konfirmasi-password" name="konfirmasi_password"
                                                    placeholder="Ulangi kata sandi..." required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-rounded" type="button"
                                                        id="show-password-btn2" data-action='show-password'>
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-rounded" type="button"
                                                        id="hide-password-btn2" data-action='hide-password'>
                                                        <i class="fas fa-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 ml-2">
                                            <span id="pwMatch" class="m-0 font-weight-bold text-danger"
                                                style="font-size: 0.8rem; display: none;">
                                                Kata sandi tidak sama. Silahkan coba lagi.</span>
                                        </div>
                                        <div class="form-group d-flex justify-content-between">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                    required>
                                                <label class="custom-control-label" for="customCheck"
                                                    style="font-size: 0.8rem">Dengan mengeklik "Daftar", maka Anda
                                                    menyetujui <a href="#" data-toggle="modal"
                                                        data-target="#kebijakanPrivasiModal"
                                                        class="text-decoration-none text-muted"><u>Kebijakan
                                                            Privasi</u></a> kami.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                <button type="submit" name="register"
                                            class="btn btn-primary btn-user btn-block">
                                            Daftar
                                        </button>
            </div>
                                    </form>
                                </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let toggleEmailPhone = document.getElementById('toggleEmailPhone');
        let emailInput = document.getElementById('email');
        let phoneInput = document.getElementById('no_telepon');
        let phoneLengthMessage = document.getElementById("error-no-telepon");
        let emailMessage = document.getElementById("error-email");
        toggleEmailPhone.addEventListener('click', function (event) {
            event.preventDefault();

            // Mengosongkan value saat switcher diklik
            emailInput.value = "";
            phoneInput.value = "";

            emailMessage.style.display = "none";
            phoneLengthMessage.style.display = "none";

            if (emailInput.style.display === 'none') {
                emailInput.setAttribute('required', '');
                phoneInput.removeAttribute('required');
                emailInput.style.display = 'block';
                phoneInput.style.display = 'none';
                toggleEmailPhone.textContent = 'Gunakan No. Telepon';
                emailInput.setAttribute('type', 'email');
            } else {
                phoneInput.setAttribute('required', '');
                emailInput.removeAttribute('required');
                emailInput.style.display = 'none';
                phoneInput.style.display = 'block';
                toggleEmailPhone.textContent = 'Gunakan Email';
                phoneInput.setAttribute('type', 'number');
            }
        });
    });

    let pwInput = document.getElementById("password");
    let confirmPwInput = document.getElementById("konfirmasi-password");

    // Mendapatkan elemen pesan validasi
    let passwordLengthMessage = document.getElementById("8char");
    let passwordContentMessage = document.getElementById("textChar");
    let passwordMatchMessage = document.getElementById("pwMatch");

    function validateForm() {
        let isValid = true;

        // Cek apakah nomor telepon diisi atau email diisi
        let phoneInput = document.getElementById("no_telepon");
        let emailInput = document.getElementById("email");

        if (phoneInput.style.display !== "none" && !validatePhoneNumber()) {
            isValid = false;
        }

        if (emailInput.style.display !== "none" && !validateEmail()) {
            isValid = false;
        }

        // Lakukan validasi password dan konfirmasi password
        if (!validatePassword() || !validatePasswordConfirmation()) {
            isValid = false;
        }
        return isValid;
    }

    function validateEmail() {
        let input = document.getElementById("email").value;
        let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let errorElement = document.getElementById("error-email");
        if (!regex.test(input)) {
            errorElement.classList.remove("text-success");
            errorElement.classList.add("text-danger");
            errorElement.style.display = "block";
            return false;
        } else {
            errorElement.classList.remove("text-danger");
            errorElement.classList.add("text-success");
            setTimeout(function () {
                errorElement.style.display = "none";
            }, 1000);
            return true;
        }
    }

    function validatePhoneNumber() {
        let input = document.getElementById("no_telepon").value;
        let regex = /^\d{10,13}$/;
        let errorElement = document.getElementById("error-no-telepon");
        if (!regex.test(input)) {
            errorElement.classList.remove("text-success");
            errorElement.classList.add("text-danger");
            errorElement.style.display = "block";
            return false;
        } else {
            errorElement.classList.remove("text-danger");
            errorElement.classList.add("text-success");
            setTimeout(function () {
                errorElement.style.display = "none";
            }, 1000);
            return true;
        }
    }

    // Menambahkan event listener pada saat input password berubah
    pwInput.addEventListener("input", validatePassword);
    confirmPwInput.addEventListener("input", validatePasswordConfirmation);

    function validatePassword() {
        let password = pwInput.value;
        let isValid = true;

        // Validasi panjang password
        if (password.length >= 8) {
            passwordLengthMessage.classList.remove("text-danger");
            passwordLengthMessage.classList.add("text-success");
        } else {
            passwordLengthMessage.classList.remove("text-success");
            passwordLengthMessage.classList.add("text-danger");
            passwordLengthMessage.style.display = "block";
            isValid = false;
        }

        // Validasi kombinasi huruf dan angka
        if (/\d/.test(password) && /[a-zA-Z]/.test(password)) {
            passwordContentMessage.classList.remove("text-danger");
            passwordContentMessage.classList.add("text-success");
        } else {
            passwordContentMessage.classList.remove("text-success");
            passwordContentMessage.classList.add("text-danger");
            passwordContentMessage.style.display = "block"; isValid = false;
        }

        return isValid;
    }

    function validatePasswordConfirmation() {
        let password = pwInput.value;
        let confirmPassword = confirmPwInput.value;
        let isValid = true;

        if (password === confirmPassword && confirmPassword !== "") {
            passwordMatchMessage.classList.remove("text-danger");
            passwordMatchMessage.classList.add("text-success");

            // Menunda perubahan display menjadi none selama 1 detik
            setTimeout(function () {
                passwordMatchMessage.style.display = "none";
            }, 1000);
        } else {
            passwordMatchMessage.classList.remove("text-success");
            passwordMatchMessage.classList.add("text-danger");
            passwordMatchMessage.style.display = "block";
            isValid = false;
        }

        return isValid;
    }
</script>
</div>