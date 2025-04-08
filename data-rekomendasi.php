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

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include './templates/sidebar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include './templates/navbar.php'; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <?= generatePageTitle('Data Rekomendasi'); ?>
                    <!-- Tabel Rekomendasi -->
                    <?php include './templates/table-rekomendasi.php'; ?>    
                                    


<?php include './templates/js.php'; ?>

</html>