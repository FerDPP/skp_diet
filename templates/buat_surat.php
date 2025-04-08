<?php
// Include the database connection file

if (isset($_POST['download'])) {
    // Check if all required POST variables are set
    if (isset($_POST['makanan'], $_POST['olahraga'], $_POST['goldar'], $_POST['waktum'], $_POST['resiko'])) {
        $W1 = $_POST['makanan'];
        $W2 = $_POST['olahraga'];
        $W3 = $_POST['goldar'];
        $W4 = $_POST['waktum'];
        $W5 = $_POST['resiko'];

        // Ensure the database connection is established
        if ($conn) {
            $sql = "SELECT * FROM data_diet WHERE makanan = '$W1'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $surat = file_get_contents('surat_keputusan.rtf');

                // Replace placeholders with form values
                $surat = str_replace('#MAKANAN', $W1, $surat);
                $surat = str_replace('#OLAHRAGA', $W2, $surat);
                $surat = str_replace('#GOLDAR', $W3, $surat);
                $surat = str_replace('#WAKTU MAKAN', $W4, $surat);
                $surat = str_replace('#RESIKO DIET', $W5, $surat);

                header('Content-type: application/msword');
                header('Content-disposition: inline; filename=surat_spk.doc');
                header('Content-length: ' . strlen($surat));
                echo $surat;
            } else {
                echo "<script>alert('Query error: " . mysqli_error($conn) . "')</script>";
                header('location:./data-hasil.php');
            }
        } else {
            echo "<script>alert('Database connection error')</script>";
            header('location:./data-hasil.php');
        }
    } else {
        echo "<script>alert('Please fill in all fields.')</script>";
        header('location:./data-hasil.php');
    }
} else {
    echo "<script>alert('Download request not set.')</script>";
    header('location:./data-hasil.php');
}
?>
