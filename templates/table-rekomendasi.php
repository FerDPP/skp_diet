

    <div class="container">
        <div class="section-card">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-4">
                        <div class="card-header text-center">
                            <h4>Masukkan Bobot</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="./data-hasil.php">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>Jenis Makanan</b></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" required name="i_makanan">
                                            <option value="" disabled selected>-- Jenis Makanan --</option>
                                            <option value="1">Sangat Tidak Penting (1)</option>
                                            <option value="2">Tidak Penting (2)</option>
                                            <option value="3">Cukup Penting (3)</option>
                                            <option value="4">Penting (4)</option>
                                            <option value="5">Sangat Penting (5)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>Aktifitas Fisik</b></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" required name="i_olahraga">
                                            <option value="" disabled selected>-- Aktifitas Fisik --</option>
                                            <option value="1">Sangat Tidak Penting (1)</option>
                                            <option value="2">Tidak Penting (2)</option>
                                            <option value="3">Cukup Penting (3)</option>
                                            <option value="4">Penting (4)</option>
                                            <option value="5">Sangat Penting (5)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>Asupan Kalori</b></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" required name="i_goldar">
                                            <option value="" disabled selected>-- Asupan Kalori --</option>
                                            <option value="1">Sangat Tidak Penting (1)</option>
                                            <option value="2">Tidak Penting (2)</option>
                                            <option value="3">Cukup Penting (3)</option>
                                            <option value="4">Penting (4)</option>
                                            <option value="5">Sangat Penting (5)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>Interval Makan</b></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" required name="i_waktum">
                                            <option value="" disabled selected>-- Interval Makan --</option>
                                            <option value="1">Sangat Tidak Penting (1)</option>
                                            <option value="2">Tidak Penting (2)</option>
                                            <option value="3">Cukup Penting (3)</option>
                                            <option value="4">Penting (4)</option>
                                            <option value="5">Sangat Penting (5)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>Intensitas Diet</b></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" required name="i_resiko">
                                            <option value="" disabled selected>-- Intensitas Diet --</option>
                                            <option value="1">Sangat Tidak Penting (1)</option>
                                            <option value="2">Tidak Penting (2)</option>
                                            <option value="3">Cukup Penting (3)</option>
                                            <option value="4">Penting (4)</option>
                                            <option value="5">Sangat Penting (5)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Hitung</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include './templates/footer.php'; ?>
<script>
    $(document).ready(function() {
        $('select').formSelect(); // Jika Anda menggunakan Materialize CSS
        $('.modal').modal(); // Jika Anda menggunakan modal
    });
</script>
