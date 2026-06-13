# Aplikasi Blog — Sistem Manajemen Konten (CMS) + Halaman Pengunjung

> **Nama Lengkap:** _Arinda Noer Agit_
> **NIM:** _240605110146_
> **Video Demonstrasi (YouTube):** https://youtu.be/_47u6PionTQ?si=pEiSB3cxsKWB7Nvh

## Deskripsi Singkat
Aplikasi blog berbasis **Laravel** yang terdiri dari dua bagian:
1. **CMS / Halaman Administrator** (perlu login) untuk mengelola **artikel**, **penulis**, dan **kategori artikel**.
2. **Halaman Pengunjung** (publik, tanpa login) untuk membaca artikel.

Aplikasi memakai database **`db_blog`** dengan tabel `penulis`, `kategori_artikel`, dan `artikel`.

## Fitur
### CMS (dilindungi login)
- Login & logout penulis (autentikasi memakai tabel `penulis`).
- CRUD **Kategori Artikel** (tambah, ubah, hapus).
- CRUD **Penulis** (tambah, ubah, hapus, termasuk upload foto profil).
- CRUD **Artikel** (tambah, ubah, hapus, termasuk upload gambar).
- Validasi input dan notifikasi (flash message) untuk setiap operasi.

### Halaman Pengunjung (publik)
- **Halaman Utama** (`/`): menampilkan **5 artikel terbaru** beserta **widget kategori** di samping. Pengunjung dapat **menyaring artikel berdasarkan kategori** dengan mengklik item di widget.
- **Halaman Detail Artikel** (`/artikel/{id}`): menampilkan isi lengkap artikel beserta **5 artikel terkait** dari kategori yang sama, lengkap dengan breadcrumb dan tautan **Kembali ke Beranda**.

## Teknologi
- Laravel 13 (PHP 8.3)
- MySQL (database `db_blog`)
- Bootstrap 5
- Blade Template Engine

## Struktur Penting
- Controller pengunjung: `app/Http/Controllers/PengunjungController.php` (terpisah dari controller CMS).
- Layout pengunjung: `resources/views/layouts/pengunjung.blade.php` (terpisah dari layout CMS `layouts/app.blade.php`).
- Seluruh route didefinisikan di `routes/web.php`. Route pengunjung **tidak** memakai middleware `auth`.

## Cara Menjalankan Aplikasi Secara Lokal
1. Clone repositori ini, lalu masuk ke foldernya:
   ```
   git clone <url-repo-ini>
   cd aplikasi-blog
   ```
2. Install dependency:
   ```
   composer install
   ```
3. Siapkan file `.env`:
   ```
   copy .env.example .env
   ```
   Lalu sesuaikan bagian database & session:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_blog
   DB_USERNAME=root
   DB_PASSWORD=

   SESSION_DRIVER=file
   CACHE_STORE=file
   ```
4. Generate application key:
   ```
   php artisan key:generate
   ```
5. Import database `db_blog` (file `.sql`) ke MySQL melalui phpMyAdmin/HeidiSQL.
6. Buat symbolic link storage (agar gambar tampil):
   ```
   php artisan storage:link
   ```
   Pastikan file gambar berada di `storage/app/public/foto/` (foto penulis) dan `storage/app/public/gambar/` (gambar artikel).
7. Jalankan server:
   ```
   php artisan serve
   ```
8. Akses aplikasi:
   - Halaman pengunjung: `http://localhost:8000/`
   - Login admin/CMS: `http://localhost:8000/login`

## Catatan
- Database sudah berisi data. **Jangan** menjalankan `php artisan migrate` (struktur tabel tidak boleh diubah).
- File `.env` tidak diikutkan ke repositori karena berisi kredensial (sudah diatur di `.gitignore`).
