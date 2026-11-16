<?php

class Kendaraan
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT k.*, u.nama_lengkap AS pencatat, u.role AS role_pencatat
                FROM tb_kendaraan k
                LEFT JOIN tb_user u ON k.id_user = u.id_user
                ORDER BY k.id_kendaraan DESC";

        return mysqli_query($this->conn, $sql);
    }

    public function getById($id)
    {
        $id = (int) $id;
        $sql = "SELECT k.*, u.nama_lengkap AS pencatat, u.role AS role_pencatat
                FROM tb_kendaraan k
                LEFT JOIN tb_user u ON k.id_user = u.id_user
                WHERE k.id_kendaraan = $id
                LIMIT 1";

        $result = mysqli_query($this->conn, $sql);
        return $result ? mysqli_fetch_assoc($result) : false;
    }

    public function tambah($plat, $jenis, $warna, $pemilik, $kategoriPemilik, $idUser)
    {
        $plat = strtoupper(trim($plat));
        $plat = mysqli_real_escape_string($this->conn, $plat);
        $jenis = mysqli_real_escape_string($this->conn, trim($jenis));
        $warna = mysqli_real_escape_string($this->conn, trim($warna));
        $pemilik = mysqli_real_escape_string($this->conn, trim($pemilik));
        $kategoriPemilik = mysqli_real_escape_string($this->conn, trim($kategoriPemilik));
        $idUser = (int) $idUser;

        $kategoriValid = array('owner', 'admin', 'petugas', 'penghuni_tetap', 'tamu_pendatang');
        if (!in_array($kategoriPemilik, $kategoriValid, true) || $plat === '' || $pemilik === '') {
            return false;
        }

        $sql = "INSERT INTO tb_kendaraan
                (plat_nomor, jenis_kendaraan, warna, pemilik, kategori_pemilik, id_user)
                VALUES ('$plat', '$jenis', '$warna', '$pemilik', '$kategoriPemilik', $idUser)";

        return mysqli_query($this->conn, $sql);
    }

    public function edit($id, $plat, $jenis, $warna, $pemilik, $kategoriPemilik)
    {
        $id = (int) $id;
        $plat = strtoupper(trim($plat));
        $plat = mysqli_real_escape_string($this->conn, $plat);
        $jenis = mysqli_real_escape_string($this->conn, trim($jenis));
        $warna = mysqli_real_escape_string($this->conn, trim($warna));
        $pemilik = mysqli_real_escape_string($this->conn, trim($pemilik));
        $kategoriPemilik = mysqli_real_escape_string($this->conn, trim($kategoriPemilik));

        $kategoriValid = array('owner', 'admin', 'petugas', 'penghuni_tetap', 'tamu_pendatang');
        if (!in_array($kategoriPemilik, $kategoriValid, true) || $plat === '' || $pemilik === '') {
            return false;
        }

        $sql = "UPDATE tb_kendaraan
                SET plat_nomor = '$plat',
                    jenis_kendaraan = '$jenis',
                    warna = '$warna',
                    pemilik = '$pemilik',
                    kategori_pemilik = '$kategoriPemilik'
                WHERE id_kendaraan = $id";

        return mysqli_query($this->conn, $sql);
    }

    public function hapus($id)
    {
        $id = (int) $id;
        return mysqli_query($this->conn, "DELETE FROM tb_kendaraan WHERE id_kendaraan=$id");
    }
}

?>
