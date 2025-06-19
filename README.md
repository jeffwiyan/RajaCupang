<!--
Ekstrak file ZIP ke folder
 Buka terminal lalu masuk ke folder proyek: `cd raja-cupang`.
jalankan `composer install` untuk mengunduh dependency PHP Laravel.
 Salin file `.env`: `cp .env.example .env`.
 Jalankan: `php artisan key:generate` untuk membuat kunci aplikasi.
 Buka file `.env` lalu atur konfigurasi database, misalnya:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=raja_cupang
DB_USERNAME=root
DB_PASSWORD=
```

Buat database baru di MySQL dengan nama `raja_cupang`.
Jalankan migrasi untuk membuat tabel: `php artisan migrate`.
 (Opsional) Ubah salah satu user menjadi admin lewat Tinker:

```
php artisan tinker
$user = \App\Models\User::where('email', 'emailkamu@gmail.com')->first();
$user->role = 'admin';
$user->save();
```
Jalankan server: `php artisan serve`, lalu akses di browser `http://127.0.0.1:8000`.



Kunjungi: `http://127.0.0.1:8000/admin`
Login dengan akun yang sudah diberi role `admin`.


1. Masuk ke `/admin`.
2. Klik menu “Products”.
3. Klik “Create Product”.
4. Isi nama, deskripsi, harga, stok, dan upload gambar.
5. Simpan produk.


1. Upload gambar ke folder `storage/app/public/products`.
2. Saat simpan data produk, isi kolom image dengan path seperti `products/nama-gambar.jpg`.
3. Di Blade gunakan:





* Login & Register
* Lihat Katalog Produk
* Filter & Urutkan Harga
* Wishlist
* Review & Rating Produk
* WhatsApp Button untuk Order
* Admin Panel (Filament)
* Manajemen Produk
* Proteksi Admin Panel


* Jalankan `php artisan optimize:clear` setelah ubah config/middleware.
* Pastikan `php artisan storage:link` dijalankan agar gambar tampil.
* Gunakan Filament untuk mengelola data admin tanpa perlu banyak coding manual.
 -->
