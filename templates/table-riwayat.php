<?php

// Menghubungkan ke database
include 'includes/koneksi.php';

// Memastikan koneksi berhasil
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_SESSION['email'];

// Panggil fungsi getRekomenDataByEmail() untuk mendapatkan data diagnosis
$diagnosis_data = getRekomenDataByEmail($email);

function getRekomenDataByEmail($email)
{
    global $koneksi; // Gunakan koneksi dari luar fungsi

    // Query untuk mendapatkan id_pengguna berdasarkan email atau no_telepon
    $query_pengguna = "SELECT id_pengguna FROM tbl_pengguna WHERE email = '$email' OR no_telepon = '$email'";
    $result_pengguna = mysqli_query($koneksi, $query_pengguna);
    
    if ($result_pengguna && mysqli_num_rows($result_pengguna) > 0) {
        $row_pengguna = mysqli_fetch_assoc($result_pengguna);
        $id_pengguna = $row_pengguna['id_pengguna'];

        // Query untuk mendapatkan hasil diet berdasarkan id_pengguna
        $query_hasil_diet = "SELECT * FROM tbl_hasil_diet WHERE id_pengguna = '$id_pengguna' ORDER BY nilai_v DESC";
        $result_hasil_diet = mysqli_query($koneksi, $query_hasil_diet);

        if ($result_hasil_diet && mysqli_num_rows($result_hasil_diet) > 0) {
            return mysqli_fetch_all($result_hasil_diet, MYSQLI_ASSOC); // Kembalikan hasil sebagai array
        } else {
            return null; // Tidak ada hasil diet yang ditemukan
        }
    } else {
        return null; // Pengguna tidak ditemukan
    }
}

// Cek apakah form hapus dikirim
if (isset($_POST['hapus'])) {
    // Ambil data yang dipilih untuk dihapus
    $id_hasil_diet = $_POST['id_hasil_diet'];

    // Query untuk menghapus data
    $query_hapus = "DELETE FROM tbl_hasil_diet WHERE id = '$id_hasil_diet'";
    mysqli_query($koneksi, $query_hapus);
    
    // Agar JavaScript di bawah ini dapat menampilkan ulang halaman
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = './profil.php'; // Redirect ke halaman profil setelah penghapusan
          </script>";
    exit;
}

// Cek apakah data diagnosis ditemukan
if ($diagnosis_data !== null) {
    ?>
    <table id="table_id" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th><center>Nilai Preferensi "V"</center></th>
                <th><center>Nilai</center></th>
                <th><center>Tanggal</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diagnosis_data as $row): ?>
            <tr>
                <td><center><?php echo "V".$row['id_diet']; ?></center></td>
                <td><center><?php echo $row['nilai_v']; ?></center></td>
                <td><center><?php echo $row['tanggal']; ?></center></td>
                <td>
                    <center>
                        <form method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <input type="hidden" name="id_hasil_diet" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="hapus" class="btn btn-danger rounded px-2 py-1">
                                <i class="fas fa-trash text-white"></i>
                            </button>
                        </form>
                    </center>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
} else {
    echo "<p>Data tidak ditemukan untuk pengguna ini.</p>";
}
?>
