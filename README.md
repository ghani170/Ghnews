# 📰 GhNews - Neubrutalism News Platform

GhNews adalah sebuah platform portal berita berbasis **Laravel** yang mengusung gaya desain **Neubrutalism (Neo-Brutalism)**. Dibuat dengan antarmuka yang agresif, mencolok, tebal, dan memiliki kontras tinggi, website ini memberikan pengalaman membaca berita yang *anti-mainstream* dipadukan dengan fitur-fitur dinamis.

---

## ✨ Fitur Utama

### 🎨 Desain Murni Neubrutalism
- **Hard Shadows & Thick Borders:** Menggunakan bayangan solid tanpa *blur* dan garis tepi yang sangat tebal (khas retro/komik).
- **High Contrast Colors:** Palet warna *eye-catching* seperti Hijau Neon, Kuning, Biru Cerah, dan Pink.
- **Dark & Light Mode:** Terintegrasi penuh dengan pergantian mode gelap/terang tanpa merusak komposisi warna brutalism.
- **Hover Animations:** Efek 3D fisik saat tombol atau *card* ditekan (translasi sumbu X & Y).

### 📝 Manajemen Konten Dinamis
- Artikel berita menggunakan tipe data **JSON** sehingga admin dapat menambahkan atau menghapus paragraf secara dinamis.
- Sistem secara otomatis mengambil paragraf pertama sebagai cuplikan (*excerpt*).

### 🎵 Floating Retro Music Player
- Pemutar musik mengambang di sudut halaman.
- Mendukung file MP3 lokal dari perangkat pengguna.
- Musik akan tetap berjalan karena berita dibuka pada tab baru (`target="_blank"`).

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|-----------|------------|
| Laravel | Backend Framework |
| PHP | Bahasa Pemrograman |
| Blade | Template Engine |
| Tailwind CSS | Styling |
| JavaScript | Interaktivitas |
| MySQL / MariaDB | Database |
| Vite | Asset Bundler |

---

# ⚙️ Panduan Instalasi

## 1. Persyaratan Sistem

Pastikan perangkat telah terpasang:

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL / MariaDB
- Git

---

## 2. Clone Repository

```bash
git clone https://github.com/username-github-anda/ghnews.git
cd ghnews
```

---

## 3. Install Dependency

Install dependency PHP dan Node.js.

```bash
composer install
npm install
```

---

## 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

```bash
cp .env.example .env
```

Untuk Windows CMD:

```cmd
copy .env.example .env
```

Lalu generate application key.

```bash
php artisan key:generate
```

---

## 5. Konfigurasi Database

Buat database baru di MySQL, misalnya:

```
ghnews
```

Kemudian buka file **.env** dan ubah konfigurasi berikut.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi MySQL Anda.

---

## 6. Jalankan Migration

```bash
php artisan migrate
```

Jika project memiliki seeder:

```bash
php artisan db:seed
```

---

## 7. Compile Asset

Untuk development:

```bash
npm run dev
```

Untuk production:

```bash
npm run build
```

---

## 8. Menjalankan Server

```bash
php artisan serve
```

Kemudian buka browser.

```
http://127.0.0.1:8000
```

---

# 📂 Struktur Folder

```
ghnews/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── layoutAdmin/
│       ├── layoutAuth/
│       ├── layout/
│       ├── admin/
│       └── user/
│
├── routes/
│   ├── console.php
│   └── web.php
│
├── storage/
│
├── tests/
│
├── vendor/
│
├── .env
├── artisan
├── composer.json
├── package.json
└── vite.config.js
```

---

# 🚀 Cara Penggunaan

1. Jalankan server Laravel.

```bash
php artisan serve
```

2. Jalankan Vite.

```bash
npm run dev
```

3. Buka browser.

```
http://127.0.0.1:8000
```

4. Login sebagai admin untuk mengelola berita.

5. Tambahkan berita beserta paragraf dinamis.

6. Pengunjung dapat membaca berita dan menggunakan floating music player.

---

# 📸 Preview

Tambahkan screenshot aplikasi pada bagian ini.

```
assets/
├── homepage.png
├── article.png
└── dashboard.png

```
# 📄 Lisensi

Project ini menggunakan lisensi **MIT License** sehingga bebas digunakan, dimodifikasi, dan dikembangkan sesuai kebutuhan.