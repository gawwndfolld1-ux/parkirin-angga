USE parkirin;

ALTER TABLE tb_kendaraan
ADD COLUMN kategori_pemilik ENUM('owner','admin','petugas','penghuni_tetap','tamu_pendatang') NOT NULL DEFAULT 'tamu_pendatang'
AFTER pemilik;

UPDATE tb_kendaraan
SET kategori_pemilik = 'tamu_pendatang'
WHERE kategori_pemilik IS NULL OR kategori_pemilik = '';
