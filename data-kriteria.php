<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login');
    exit();
}
if ($_SESSION['status_pengguna'] !== 'admin') {
    header('Location: 404');
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
                    <?= generatePageTitle('Data Alternatif & Kriterianya'); ?>
                    <!-- Tabel Kriteria -->
                    <?php include './templates/table-kriteria.php'; ?>    
                    <?php include './templates/footer.php'; ?>                


<?php include './templates/js.php'; ?>

</html>