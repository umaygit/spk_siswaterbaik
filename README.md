<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

<h1 align="center">Sistem Pendukung Keputusan (SPK) | Metode SMART</h1>

<p align="center">
  Aplikasi berbasis Laravel untuk menentukan keputusan terbaik berdasarkan kriteria dan subkriteria menggunakan metode SMART (Simple Multi Attribute Rating Technique).
</p>

---

## 📷 Tampilan Aplikasi

- **Halaman Login**
- **Dashboard**
- **Form Penilaian**
- **Hasil Perhitungan SMART**
- **Laporan / Cetak PDF**

> *(Gambar-gambar dapat ditambahkan di sini menggunakan tag markdown `![alt](link_gambar)` jika tersedia)*
> ![Login Page](https://github.com/umaygit/spk_siswaterbaik/a.png)


---

## 🚀 Fitur-Fitur Utama

| Fitur                 | Deskripsi                                                                 |
|----------------------|---------------------------------------------------------------------------|
| 🔐 **Login Sistem**        | Autentikasi pengguna/admin agar sistem lebih aman.                     |
| 🧮 **Input Penilaian**     | Input nilai berdasarkan sub-kriteria per alternatif.                   |
| 📊 **Metode SMART**        | Perhitungan otomatis menggunakan metode SMART.                         |
| 📈 **Hasil & Ranking**     | Menampilkan alternatif terbaik berdasarkan total utility.              |
| 📥 **Manajemen Data**      | CRUD Data Alternatif, Kriteria, dan Sub-Kriteria.                      |
| 🖨️ **Cetak Laporan (PDF)** | Laporan hasil penilaian bisa dicetak atau diunduh dalam format PDF.    |
| ⚙️ **Dashboard Dinamis**   | Statistik dan shortcut menu dalam satu tampilan ringkas.               |
| 🎨 **Desain Responsif**    | Tampilan modern berbasis Tailwind CSS / Bootstrap.                    |

---

## 🛠️ Teknologi yang Digunakan

- [Laravel Framework](https://laravel.com)
- MySQL / MariaDB
- Blade Template Engine
- Tailwind CSS / Bootstrap
- JavaScript (AJAX & DOM Interactions)
- Laravel DomPDF (jika menggunakan cetak PDF)

---

## 📚 Cara Menjalankan Proyek

```bash
# Clone repositori
git clone https://github.com/umaygit/spk_siswaterbaik.git
cd spk_siswaterbaik

# Install dependency
composer install

# Salin file .env
cp .env.example .env

# Generate key
php artisan key:generate

# Atur konfigurasi database di file .env
DB_DATABASE=nama_db
DB_USERNAME=root
DB_PASSWORD=

# Migrasi tabel
php artisan migrate

# Jalankan server lokal
php artisan serve


---

### 🔧 Petunjuk
- Ganti `https://github.com/umaygit/spk_siswaterbaik.git` dengan link repository kamu (jika berubah).
- Jika kamu punya **screenshot**, tambahkan dengan markdown:
  
```markdown
![Login](public/screenshots/login.png)
![Dashboard](public/screenshots/dashboard.png)

