<?php
$session = \Config\Services::session();
?>

<?php if ($session->get('privUser') == 1) { ?>
    <!-- Nav Item - Dashboard -->
    <li class="<?php if ($bttn == 'dtpemohon') {
                    echo 'nav-item active';
                } else {
                    echo 'nav-item';
                } ?>">
        <a class="nav-link my-1 py-1" href="/pemohon/dtpemohon">
            <i class="fa-fw fas fa-user-tie"></i>
            <span>Data Pemohon </span></a>
    </li>
    <li class="<?php if ($bttn == 'alur_bantuan') {
                    echo 'nav-item active';
                } else {
                    echo 'nav-item';
                } ?>">
        <a class="nav-link my-1 py-1" href="/kelurahan/alur_bantuan">
            <i class="fab fa-stumbleupon-circle fa-fw"></i>
            <span>Alur Bantuan</span>
        </a>
    </li>
    <li class="<?php if ($bttn == 'ajuanbantuan') {
                    echo 'nav-item active';
                } else {
                    echo 'nav-item';
                } ?> ">
        <a class="nav-link my-1 py-1" href="/pemohon/ajuanbantuan">
            <i class="fas fa-list-alt fa-fw"></i>
            <span>Ajuan Bantuan</span></a>
    </li>
    <li class="<?php if ($bttn == 'syarat_ketentuan') {
                    echo 'nav-item active';
                } else {
                    echo 'nav-item';
                } ?>">
        <a class="nav-link my-1 py-1" href="/kelurahan/syarat_ketentuan">
            <i class="fas fa-hands-helping fa-fw"></i>
            <span>Ajukan Bantuan</span></a>
    </li>


<?php } ?>

<!-- Menu Kelurahan -->
<hr class="sidebar-divider my-0">
<?php if ($session->get('privUser') == 2) { ?>
    <!-- <div class="sidebar-heading">
                    Halaman Kelurahan
                </div> -->

    <li class="nav-item active">
        <a class="nav-link collapsed my-1 py-1" href="#" data-toggle="collapse" data-target="#collapseKel" aria-expanded="true" aria-controls="collapseKel">
            <i class="fa-fw far fa-address-book"></i>
            <span>Daftar Pemohon</span>
        </a>
        <div id="collapseKel" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar Pemohon:</h6>
                <a class="collapse-item" href="/kelurahan/dftrpemohon_i">Pemohon Individu</a>
                <a class="collapse-item" href="/kelurahan/dftrpemohon_l">Pemohon Lembaga</a>
            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link my-1 py-1" href="/kelurahan/alur_bantuan">
            <i class="fab fa-stumbleupon-circle fa-fw"></i>
            <span>Alur Bantuan</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link collapsed my-1 py-1" href="#" data-toggle="collapse" data-target="#kel_ajuan" aria-expanded="true" aria-controls="kel_ajuan">
            <i class="fa-fw far fa-list-alt"></i>
            <span>Daftar Ajuan</span>
        </a>
        <div id="kel_ajuan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar Ajuan:</h6>
                <a class="collapse-item" href="/kelurahan/dftrajuan_i">Ajuan Individu</a>
                <a class="collapse-item" href="/kelurahan/dftrajuan_l">Ajuan Lembaga</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link my-1 py-1" href="/kelurahan/syarat_ketentuan">
            <i class="fas fa-hands-helping fa-fw"></i>
            <span>Ajukan Bantuan</span></a>
    </li>


<?php } ?>

<?php if ($session->get('privUser') == 3) { ?>
    <!-- Menu Dinsos -->
    <hr class="sidebar-divider my-0">
    <div class="sidebar-heading">
        Halaman Dinsos
    </div>

    <li class="nav-item active">
        <a class="nav-link collapsed my-1 py-1" href="#" data-toggle="collapse" data-target="#dinSub" aria-expanded="true" aria-controls="dinSub">
            <i class="fa-fw far fa-list-alt"></i>
            <span>Daftar Ajuan</span>
        </a>
        <div id="dinSub" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar Ajuan:</h6>
                <a class="collapse-item" href="/dinsos/dftrajuan_i">Ajuan Individu</a>
                <a class="collapse-item" href="/dinsos/dftrajuan_l">Ajuan Lembaga</a>
            </div>
        </div>
    </li>
<?php } ?>

<?php if ($session->get('privUser') == 4) { ?>
    <!-- Menu Kesra -->
    <hr class="sidebar-divider my-0">
    <div class="sidebar-heading">
        Halaman Kesra
    </div>

    <li class="nav-item active">
        <a class="nav-link collapsed my-1 py-1" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-fw far fa-list-alt"></i>
            <span>Daftar Ajuan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar Ajuan:</h6>
                <a class="collapse-item" href="/kesra/dftrajuan_i">Ajuan Individu</a>
                <a class="collapse-item" href="/kesra/dftrajuan_l">Ajuan Lembaga</a>
            </div>
        </div>
    </li>
<?php } ?>
<?php if ($session->get('privUser') == 5) { ?>
    <!-- Menu Mitra -->
    <hr class="sidebar-divider my-0">
    <div class="sidebar-heading">
        Halaman Mitra
    </div>

    <li class="nav-item active">
        <a class="nav-link collapsed my-1 py-1" href="#" data-toggle="collapse" data-target="#mitraSub" aria-expanded="true" aria-controls="mitraSub">
            <i class="fa-fw far fa-list-alt"></i>
            <span>Daftar Ajuan</span>
        </a>
        <div id="mitraSub" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar Ajuan:</h6>
                <a class="collapse-item" href="/mitra/dftrajuan_i">Ajuan Individu</a>
                <a class="collapse-item" href="/mitra/dftrajuan_l">Ajuan Lembaga</a>
            </div>
        </div>
    </li>
<?php } ?>

<li class="nav-item">
    <a class="nav-link my-1 py-1" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-fw"></i>
        <span>Logout</span></a>
</li>