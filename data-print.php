<?php 
    if ($i == 9) {
    echo '<button onclick="printPage()" class="btn btn-secondary mt-3">Print Halaman</button>';
    echo '<h2> Halo </h2>';
    }
?>

<script>
function printPage() {
    window.print();
}
</script>