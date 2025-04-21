
# 📦 Sistem Manajemen Inventaris Barang (CRUD PHP Native)

Sistem manajemen inventaris ini dibuat sebagai proyek Uji Kompetensi Keahlian (UKK) untuk jurusan Rekayasa Perangkat Lunak (RPL). Proyek ini merupakan aplikasi berbasis web dengan fitur CRUD (Create, Read, Update, Delete) menggunakan **PHP Native** dan **MySQL**, serta desain antarmuka menggunakan **Bootstrap**.

---

## 📁 Fitur Utama

✅ CRUD Data Barang  
✅ CRUD Data Kategori  
✅ Pencarian Barang berdasarkan Nama  
✅ Filter Barang berdasarkan Kategori  
✅ Validasi Input Form  
✅ Navigasi Halaman (Pagination)  
✅ Export Data ke **Excel** dan **PDF**  
✅ Notifikasi berhasil saat CRUD  
✅ Antarmuka Bootstrap yang responsive

---

## 📂 Struktur Folder

```
inventaris/
│
├── barang/           # CRUD Barang
├── kategori/         # CRUD Kategori
├── config/           # Koneksi database
├── export/           # Export ke Excel & PDF
├── assets/           # Bootstrap CSS & JS
├── vendor/           # (opsional) DOMPDF jika digunakan
├── index.php         # Halaman beranda
```

---

## 🛠️ Cara Install & Menjalankan

1. **Clone atau Ekstrak** project ini ke dalam folder `htdocs` (jika menggunakan XAMPP) atau `www` (jika Laragon).
2. **Import database** `inventaris_db.sql` ke MySQL (bisa pakai phpMyAdmin).
3. **Konfigurasi koneksi** database ada di `config/db.php`:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db   = "inventaris_db";
   ```
4. Jalankan aplikasi melalui browser:
   ```
   http://localhost/inventaris barang
   ```

---

## 💾 Struktur Tabel Database

### Tabel `kategori`

| Field         | Tipe          |
|---------------|---------------|
| id_kategori   | INT (AUTO_INCREMENT, PK) |
| nama_kategori | VARCHAR(100)  |

### Tabel `barang`

| Field         | Tipe           |
|---------------|----------------|
| id_barang     | INT (AUTO_INCREMENT, PK) |
| nama_barang   | VARCHAR(100)   |
| id_kategori   | INT (FK)       |
| jumlah_stok   | INT            |
| harga_barang  | DECIMAL(10,2)  |
| tanggal_masuk | DATE           |

---

## 📤 Fitur Export

- **Export ke Excel:** Menghasilkan file `.xls` yang bisa dibuka di Microsoft Excel / LibreOffice.
- **Export ke PDF:** Menggunakan DOMPDF (render HTML langsung ke PDF).
  > 📌 Pastikan folder `vendor/` tersedia jika menggunakan DOMPDF, atau install lewat Composer:
  ```
  composer require dompdf/dompdf
  ```

---

## ✅ Bonus Fitur

- Validasi form input seperti nama barang, harga, dan stok.
- Notifikasi sukses ketika data berhasil ditambah/diedit/dihapus.
- Navigasi sederhana di setiap halaman dengan Bootstrap navbar.

---

## 📸 Tampilan Aplikasi

![image](https://github.com/user-attachments/assets/a547216a-54f5-4ab2-b562-3c440737deee)k
![image](https://github.com/user-attachments/assets/17082fe2-c642-46c5-be6e-e0f75fc377e5)
![image](https://github.com/user-attachments/assets/954f32a0-5b60-4348-8ec8-a440ad8b7892)

---

## 🙋‍♂️ Kontributor

- **Nama:** Ghifari Noer Rahman
- **Sekolah:** SMK Negeri 2 Padang
- **Jurusan:** Rekayasa Perangkat Lunak

---

## 📜 Lisensi

Project ini dibuat sebagai bagian dari tugas Uji Kompetensi Keahlian (UKK). Bebas digunakan untuk tujuan edukasi.
