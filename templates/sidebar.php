<?php
require_once 'includes/functions.php';
$status_pengguna = $_SESSION['status_pengguna'] ?? '';
$pages = [
    [
    'name' => 'Dashboard',
    'link' => 'dashboard',
    'icon' => 'fas fa-fw fa-tachometer-alt',
    'show' => ($status_pengguna !== '')
    ],
    [
        'name' => 'Alternatif & Kriteria',
        'link' => 'data-kriteria',
        'icon' => 'fas fa-fw fa-list-alt', // Icon yang lebih relevan untuk Alternatif & Kriteria
        'show' => ($status_pengguna === 'admin')
    ],
    [
        'name' => 'Data Rekomendasi',
        'link' => 'data-rekomendasi',
        'icon' => 'fas fa-fw fa-thumbs-up', // Icon yang lebih relevan untuk Data Rekomendasi
        'show' => ($status_pengguna !== '')
    ],
    [
        'name' => 'Data Hasil',
        'link' => 'data-hasil',
        'icon' => 'fas fa-fw fa-chart-bar', // Icon yang lebih relevan untuk Data Hasil
        'show' => ($status_pengguna !== '')
    ],

    // [
    //     'name' => 'Diagnosis',
    //     'link' => '#',
    //     'icon' => 'fas fa-fw fa-stethoscope',
    //     'show' => ($status_pengguna !== ''),
    //     'sub_pages' => [
    //         ['name' => 'Diagnosis', 'link' => 'diagnosis', 'icon' => 'fas fa-fw fa-stethoscope'],
    //         ['name' => 'Riwayat Diagnosis', 'link' => 'data-diagnosis', 'icon' => 'fas fa-fw fa-file-medical-alt']
    // ],
        
    [
        'name' => 'Profil',
        'link' => 'profil',
        'icon' => 'fas fa-fw fa-user',
        'show' => ($status_pengguna !== '')
    ],
    [
        'name' => 'Panduan',
        'link' => 'panduan',
        'icon' => 'fas fa-fw fa-question-circle',
        'show' => true
    ],
    
    [
        'name' => 'Data Pengguna',
        'link' => 'data-pengguna',
        'icon' => 'fas fa-fw fa-users',
        'show' => ($status_pengguna === 'admin')
    ],
    
    [
        'name' => 'Keluar',
        'link' => 'login',
        'icon' => 'fas fa-fw fa-sign-out-alt',
        'show' => ($status_pengguna !== ''),
        'modal' => 'logoutModal'
    ],
    [
        'name' => 'Daftar Akun',
        'link' => 'register',
        'icon' => 'fas fa-fw fa-user-plus',
        'show' => ($status_pengguna !== 'admin' && $status_pengguna !== "user")
    ]
];
?>
<style>
    .navbar-nav .nav-item .nav-link:hover {
    background-color: #f6b93b ;
    color: white;
}

.navbar-nav .nav-item.active .nav-link {
    background-color: #1cc88a;
    color: white;
}
.bg-gradient-custom {
    background: linear-gradient(180deg, #4e73df 10%, #6a5acd 100%);
}



</style>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar" style="z-index:1200">


    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
    <div class="sidebar-brand-icon">
        <i class="fas fa-weight"></i> <!-- Ikon yang berhubungan dengan berat badan -->
    </div>
    <div class="sidebar-brand-text mx-1">SiDiet</div>
</a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php foreach ($pages as $page): ?>
        <?php if ($page['show']): ?>
            <?php if (isset($page['sub_pages'])): ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?php echo str_replace(' ', '', $page['name']); ?>" aria-expanded="true" aria-controls="collapse<?php echo str_replace(' ', '', $page['name']); ?>">
                        <i class="<?php echo $page['icon']; ?>"></i>
                        <span><?php echo $page['name']; ?></span>
                    </a>
                    <div id="collapse<?php echo str_replace(' ', '', $page['name']); ?>" class="collapse" aria-labelledby="heading<?php echo str_replace(' ', '', $page['name']); ?>" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php foreach ($page['sub_pages'] as $sub_page): ?>
                                <a class="collapse-item" href="<?php echo $sub_page['link']; ?>"><?php echo $sub_page['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                
            <?php else: ?>
                <li class="nav-item <?php echo isActivePage($current_page, $page['link']); ?>">
                    <a class="nav-link" href="<?php echo $page['link'] ?>" <?php if (isset($page['modal'])) echo ' data-toggle="modal" data-target="#' . $page['modal'] . '"'; ?>>
                        <i class="<?php echo $page['icon'] ?>"></i>
                        <span><?php echo $page['name'] ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>


<!-- End of Sidebar -->
