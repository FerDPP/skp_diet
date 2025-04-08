<?php
session_start();
include 'includes/functions.php';
if (!isset($_SESSION['email'])) {
    header('Location: login');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<?php include './templates/header.php'; ?>

<style>
    .case-description {
        display: none;
    }

    @media print {
        .case-description {
            display: block;
        }
    }
</style>

<body id="page-top">
    <div id="wrapper">
        <?php include './templates/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include './templates/navbar.php'; ?>
                <div class="container-fluid">
                    <?= generatePageTitle('Data Hasil'); ?>
                    <?php include './templates/table-hasil.php'; ?>
                    <main class="container py-5">
                        <center>
                            <div class="col-6">
                                <form action="templates/buat_surat.php" method="post">
                                    <div class="card-header">
                                        <h2>
                                            <?php
                                            $testmax = max($nilaiV);
                                            $dietName = '';
                                            for ($i = 0; $i < count($nilaiV); $i++) { 
                                                if ($nilaiV[$i] == $testmax) {
                                                    $query = mysqli_query($koneksi, "SELECT * FROM data_diet WHERE id_diet = " . ($i + 1));
                                                    if ($user = mysqli_fetch_array($query)) {
                                                        echo $dietName = $user['nama_diet'];
                                                    }
                                                    break;
                                                }
                                            }
                                            ?>
                                        </h2>
                                        <input type="hidden" name="nama_diet" value="<?php echo $dietName; ?>" />
                                    </div>
                                    <div class="card-body">
                                        <span>Skor :</span>
                                        <h2><?php echo $testmax; ?></h2>
                                        <input type="hidden" name="skor" value="<?php echo $testmax; ?>" />
                                    </div>
                                    <button type="button" onclick="printPage()" class="btn btn-secondary mt-3">Print Halaman</button>
                                </form>
                                <br>
                                <div class="case-description">
                                    <?php
                                    switch ($i + 1) {
                                        case 1:
                                            echo '<article></article>';
                                            break;
                                        case 2:
                                            echo '<h2>Diet karnivora hanya memperbolehkan konsumsi daging...</h2>';
                                            break;
                                        case 3:
                                            echo '<h2>Diet ini biasanya disarankan untuk orang yang obesitas...</h2>';
                                            break;
                                        case 4:
                                            echo '<h2>Diet karnivora hanya memperbolehkan konsumsi daging...</h2>';
                                            break;
                                        case 5:
                                            echo '<article>
                                            <p>
                                                Pola makan ini melibatkan mengatur waktu makan dan puasa secara bergantian.
                                                Anda dapat mengikuti berbagai jenis puasa, seperti puasa 16/8 (makan selama
                                                8 jam dan berpuasa selama 16 jam), puasa 5:2 (makan secara normal selama 5
                                                hari dan membatasi asupan kalori selama 2 hari yang tidak menghasilkan
                                                hasil), atau puasa penuh (berpuasa selama satu atau beberapa hari).
                                            </p>
                                            <p>
                                                Makanan yang dianjurkan: Makanan Seimbang. Membatasi asupan kalori agar
                                                tidak berlebih
                                            </p>
                                            <p>
                                                Olahraga yang dianjurkan Olahraga Sedang. Contohnya adalah jogging,
                                                bersepeda santai, atau berenang.
                                            </p>
                                            <p>Cocok untuk golongan darah: O.</p>
                                            <p>
                                                Pola waktu makan: Kurang dari 3x Sehari. Dan seperti puasa 16/8 (makan
                                                selama 8 jam dan berpuasa selama 16 jam), puasa 5:2 (makan secara normal
                                                selama 5 hari
                                            </p>
                                            <p>
                                                Diet dengan beberapa resiko. Diet yang mungkin memiliki beberapa risiko
                                                kesehatan atau efek samping sedang. Biasanya agak sulit menjalani diawal
                                                awal.
                                            </p>
                                            </article>';
                                            break;
                                        case 6:
                                            echo '<h2>Diet karnivora hanya memperbolehkan konsumsi daging...</h2>';
                                            break;
                                        case 7:
                                            echo '<h2>Diet ini biasanya disarankan untuk orang yang obesitas...</h2>';
                                            break;
                                        case 8:
                                            echo '<h2>Diet karnivora hanya memperbolehkan konsumsi daging...</h2>';
                                            break;
                                        // Tambahkan case lain sesuai kebutuhan
                                        default:
                                            echo '<h2>Deskripsi diet tidak ditemukan.</h2>';
                                            break;
                                    }
                                    ?>
                                </div>
                            </div>
                        </center>
                    </main>

                    <?php include './templates/js.php'; ?>

                    <script>
                    function printPage() {
                        window.print();
                    }
                    </script>

</body>
</html>
