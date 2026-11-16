<?php

require_once __DIR__ . '/../../config/auth.php';

?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Kendaraan - Parkirin</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <header class="topbar fade-in">
            <div class="logo">PARKIRIN</div>
            <a href="controller/logout.php" onclick="return confirm('Anda yakin ingin logout dari akun ini?');">⇥ Logout</a>
        </header>
        <div class="layout">
            <aside class="sidebar fade-in">
                <div class="profile">
                    <h3><?= htmlspecialchars($_SESSION['nama']); ?></h3>
                    <span>● <?= ucfirst(htmlspecialchars($_SESSION['level'])); ?></span>
                </div>
                <div class="nav-title">MAIN NAVIGATION</div>
                <nav>
                    <?php renderNavigation(); ?>
                </nav>
            </aside>
            <main class="content">
                <div class="form-card">
                    <h2>Tambah Data Kendaraan</h2>
                    <form method="POST" action="index.php?page=kendaraan&aksi=simpan">
                        <div class="form-row">
                            <label for="plat_nomor">Plat Nomor</label>
                            <input id="plat_nomor" type="text" name="plat_nomor" placeholder="Contoh: B1234AA" required>
                        </div>
                        <div class="form-row">
                            <label for="jenis_kendaraan">Jenis Kendaraan</label>
                            <select id="jenis_kendaraan" name="jenis_kendaraan" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option value="motor">Motor</option>
                                <option value="mobil">Mobil</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="warna">Warna</label>
                            <input id="warna" type="text" name="warna" placeholder="Contoh: Hitam" required>
                        </div>
                        <div class="form-row">
                            <label for="pemilik">Nama Pemilik Kendaraan</label>
                            <input id="pemilik" type="text" name="pemilik" placeholder="Masukkan nama pemilik kendaraan" required>
                        </div>
                        <div class="form-row">
                            <label for="kategori_pemilik">Kategori Pemilik Kendaraan</label>
                            <select id="kategori_pemilik" name="kategori_pemilik" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="owner">Owner</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                                <option value="penghuni_tetap">Penghuni Hotel Tetap</option>
                                <option value="tamu_pendatang">Tamu / Pendatang</option>
                            </select>
                        </div>
                        <div class="form-buttons">
                            <button class="btn btn-green" type="submit">Simpan</button>
                            <a class="btn btn-back" href="index.php?page=kendaraan">Kembali</a>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>
