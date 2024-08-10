# Tutorial Cara Buka Projek KP Invoice

## 1. Download XAMPP
Unduh dan instal XAMPP dari [sini](https://www.apachefriends.org/index.html).

## 2. Download Composer
Unduh dan instal Composer: [Download Composer](https://getcomposer.org/download/).
> Download dan jalankan `Composer-Setup.exe` - ini akan menginstal versi Composer terbaru setiap kali dieksekusi.

Setelah selesai, cek versi Composer dengan menjalankan perintah berikut di CMD:
```bash
composer --version
```

## 3. Cara Masuk CMD dan Memeriksa Versi Composer

1. **Buka Command Prompt (CMD):**
   - Cara 1: Klik tombol **Start**, ketik "CMD", lalu tekan **Enter**.
   - Cara 2: Tekan **Ctrl + R**, ketik "CMD", lalu tekan **Enter**.

2. **Periksa Versi Composer:**
   - Setelah CMD terbuka, ketik perintah berikut untuk memeriksa versi Composer yang terinstal:
     ```bash
     composer --version
     ```
   - Perintah ini akan menampilkan versi Composer yang terinstal di sistem.

## 4. Buka dan Download Projek Laravel

Untuk memulai dengan cepat tanpa perlu mengunduh file Zip secara manual, ikuti langkah-langkah berikut:

**Download File Repository:**

   - Kunjungi repository ini: [laravel-invoice-print](https://github.com/percivalyan/laravel-invoice-print).
   - Klik tombol hijau **"<> Code"**.
   - Pilih **"Download ZIP"** untuk mengunduh file.

Setelah file ZIP diunduh, ekstrak ke direktori yang diinginkan dan buka di editor kode pilihan.

## 5. Navigasi ke Direktori Proyek

Setelah membuka Command Prompt (CMD), navigasikan ke direktori proyek Laravel dengan perintah berikut:

**Masuk ke Direktori Proyek:**
   - Ketik perintah berikut di CMD:
     ```bash
     cd laravel-invoice-print
     ```
   - Perintah ini akan mengubah direktori kerja ke folder proyek Laravel `laravel-invoice-print`.

## 6. Jika Menggunakan Visual Studio Code

Untuk membuka proyek Laravel di Visual Studio Code (VSC), ikuti langkah berikut:

**Buka Command Prompt (CMD):**
   - Jika CMD sudah terbuka dan berada di direktori proyek Laravel, lanjutkan ke langkah berikutnya.

**Buka Proyek di Visual Studio Code:**
   - Ketik perintah berikut di CMD:
     ```bash
     code .
     ```
   - Perintah ini akan langsung membuka proyek Laravel di Visual Studio Code.

## 7. Install Projek

Untuk melanjutkan, ikuti langkah-langkah berikut untuk membuka Command Prompt (CMD) dan menginstal dependensi Laravel:

**Buka Command Prompt (CMD):**
   - Cara 1: Klik tombol **Start**, ketik "CMD", lalu tekan **Enter**.
   - Cara 2: Tekan **Ctrl + R**, ketik "CMD", lalu tekan **Enter**.

**Jalankan Composer Install:**
   - Setelah CMD terbuka, navigasi ke direktori proyek Laravel.
   - Ketik perintah berikut untuk menginstal dependensi:
     ```bash
     composer install
     ```
   - Jika perintah `composer install` tidak berhasil, coba gunakan:
     ```bash
     composer update
     ```
   - Namun, selalu disarankan untuk mencoba `composer install` terlebih dahulu.

## 8. Konfigurasi Proyek Laravel

Setelah masuk ke direktori proyek, lalu perlu melakukan beberapa konfigurasi. Selanjutnya dapat melakukannya di Command Prompt (CMD) atau di Terminal Visual Studio Code (opsional). Ikuti langkah-langkah berikut:

**Salin File `.env.example` ke `.env`:**
   - Ketik perintah berikut di CMD atau Terminal:
     ```bash
     copy .env.example .env
     ```
   - Jika perintah di atas tidak berhasil, coba perintah berikut:
     ```bash
     cp .env.example .env
     ```

**Generate Key Aplikasi Laravel:**
   - Jalankan perintah berikut untuk menghasilkan key aplikasi Laravel:
     ```bash
     php artisan key:generate
     ```
   - Perintah ini akan mengupdate file `.env` dengan key aplikasi baru.

## 9. Edit File `.env`

**Masuk ke File `.env`:**
   - Buka file `.env` yang terletak di direktori proyek `laravel-invoice-print`.

## 10. Ubah Konfigurasi Database

**Update Bagian Database di `.env`:**
   - Ubah bagian konfigurasi database menjadi seperti berikut:
     ```plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=laravel_invoice_excel_td
     DB_USERNAME=root
     DB_PASSWORD=
     ```
   - Jika bagian ini dikomentari, hapus tanda komentar dan ketik atau ganti dengan nilai di atas.

## 11. Akses Proyek di Browser

**Masuk ke Browser:**
   - Buka browser dan kunjungi `localhost` untuk memastikan proyek Laravel dapat diakses.

## 12. Buat Database

**Buat Database `laravel_invoice_excel_td`:**
   - Gunakan tool manajemen database (seperti phpMyAdmin, MySQL Workbench, atau CLI) untuk membuat database dengan nama `laravel_invoice_excel_td`.

## 13. Jalankan Migrasi

**Kembali ke CMD atau Terminal Visual Studio Code:**
   - Ketik perintah berikut untuk menjalankan migrasi database:
     ```bash
     php artisan migrate
     ```

## 14. Jalankan Server

**Jalankan Server Laravel:**
   - Jika tidak ada error pada migrasi, ketik perintah berikut untuk menjalankan server lokal Laravel:
     ```bash
     php artisan serve
     ```

## 15. Verifikasi Aplikasi

**Buka URL di Browser:**
   - Kunjungi `http://127.0.0.1:8000/` di browser. Jika aplikasi muncul tanpa masalah, berarti proses setup berhasil.

