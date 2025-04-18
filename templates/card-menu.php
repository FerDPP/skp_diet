<?php
require_once 'includes/functions.php';
$status_pengguna = $_SESSION['status_pengguna'] ?? '';
$menu = [
   
    [
        'url' => 'profil',
        'title' => 'Profil',
        'color' => 'bg-info'
    ],
    [
        'url' => 'panduan',
        'title' => 'Panduan',
        'color' => 'bg-warning'
    ],
    [
        'url' => 'data-rekomendasi',
        'title' => 'Data Rekomendasi',
        'color' => 'bg-danger',
        'condition' => ($status_pengguna !== '')
    ],
    [
        'url' => 'data-kriteria',
        'title' => 'Data Kriteria',
        'color' => 'bg-danger',
        'condition' => ($status_pengguna === 'admin')
    ],
    [
        'url' => 'data-hasil',
        'title' => 'Data Hasil',
        'color' => 'bg-danger',
        'condition' => ($status_pengguna === 'admin')
    ],
    [
        'url' => 'data-pengguna',
        'title' => 'Data Pengguna',
        'color' => 'bg-danger',
        'condition' => ($status_pengguna === 'admin')
    ]
];
?>

<div class="user-select-none row">
    <?php foreach ($menu as $item): ?>
    <?php if (isset($item['condition']) && !$item['condition'])
            continue; ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card <?= $item['color'] ?> text-white shadow py-3">
            <a class="text-white text-decoration-none" href="<?= $item['url'] ?>">
                <div class="card-body">
                    <?= $item['title'] ?>
                </div>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>