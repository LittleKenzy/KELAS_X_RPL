# Profil Digital - Bilal Alaudin

Proyek ini adalah sebuah website portofolio interaktif dan modern bergaya *cyberpunk / dark chrome*, yang dibangun untuk menampilkan identitas digital, keahlian teknis, artikel blog, dan kumpulan proyek mini interaktif (mini games).

Proyek ini menggunakan arsitektur **Full-Stack** yang menggabungkan keandalan sistem backend **Laravel 11** dan keindahan antarmuka dinamis **React 18** (Vite).

---

## 🚀 Teknologi yang Digunakan (Tech Stack)

### 1. Frontend (Antarmuka Pengguna)
- **React 18** - Library utama untuk membangun komponen UI interaktif.
- **Vite 5** - *Build tool* dan bundler super cepat.
- **Tailwind CSS 3** - Framework CSS *utility-first* untuk styling modern.
- **Framer Motion & GSAP** - Library animasi untuk transisi elemen dan efek parallax.
- **Lucide React** - Set ikon SVG minimalis.
- **Axios** - HTTP client untuk mengambil data dari backend.

### 2. Backend (Server & Database)
- **Laravel 11** - Framework PHP modern untuk membuat RESTful API yang aman.
- **MySQL** - Sistem manajemen basis data relasional.

---

## 🧠 Arsitektur: Peran Laravel & React

### Fungsi Laravel (Backend)
Dalam proyek ini, **Laravel berfungsi murni sebagai API (Application Programming Interface)** penyedia data.
- **Database Manager**: Mengatur struktur tabel melalui Migrations dan mengisi data awal menggunakan Seeders.
- **Pengatur Logika**: Menangani logika CRUD (Create, Read, Update, Delete) untuk Profil, Skill, Portofolio, Blog, dan menyimpan pesan dari form Kontak.
- **Pengirim Respon**: Merespons permintaan dari React dan mengirimkan data dalam format JSON standar (`{ success, data, message }`).

### Fungsi React (Frontend)
Di sisi lain, **React berfungsi murni sebagai Tampilan Visual (View)**.
- Tidak ada data yang di-*hardcode* atau diketik mati di dalam React. 
- React menggunakan fitur bernama `useApi` (Custom Hook) untuk secara diam-diam memanggil Laravel, mengambil data, dan merendernya ke layar.
- Mengurus semua animasi rumit, efek kursor kustom, popup (modal) artikel blog, dan mini game interaktif yang ada di layar.

---

## 💻 Langkah Pembuatan (Dari Nol)

Bagi yang penasaran bagaimana proyek ini diracik sejak awal, berikut adalah garis besar tahapannya:

1. **Inisialisasi Project**: Menggunakan perintah `composer create-project laravel/laravel portfolio` untuk membuat dasar Laravel 11.
2. **Setup Frontend**: Menginstal dependensi Vite, React, dan Tailwind CSS ke dalam Laravel menggunakan npm (`npm install react react-dom @vitejs/plugin-react tailwindcss postcss autoprefixer`).
3. **Konfigurasi Vite**: Menghubungkan Laravel dengan React lewat plugin `laravel-vite-plugin` di `vite.config.js`.
4. **Desain UI/UX**: Menyusun tata letak *Single Page* menggunakan React Components (`Hero`, `Skills`, `PortfolioSection`, dll) dan Tailwind CSS dengan skema warna *chrome-neon* khusus.
5. **Animasi & Interaksi**: Menambahkan efek scroll menggunakan GSAP, efek muncul elemen dengan Framer Motion, dan merangkai logika 3 mini-games.
6. **Pembuatan Database**: Merancang tabel MySQL dengan Laravel Migration (untuk profile, skill, blog, portfolio) dan membuat Model Eloquent-nya.
7. **Integrasi Data (API)**: Membangun Laravel Controller untuk mendistribusikan data sebagai JSON, dan membuat `axios client` di React untuk mengambil data tersebut.
8. **Final Build**: Menggabungkan seluruh komponen menjadi bundel statis untuk siap rilis.

---

## 🛠️ Cara Instalasi & Menjalankan (Jika baru di-Clone dari GitHub)

Ikuti langkah berikut secara berurutan untuk menjalankan web ini di komputer lokal Anda:

### 1. Persiapan Server & File
1. Pastikan Anda sudah menginstal **PHP (Minimal v8.2)**, **Composer**, **Node.js**, dan aplikasi server lokal seperti **XAMPP** atau **Laragon**.
2. Clone repository ini dari GitHub:
   ```bash
   git clone <url-repo-anda>
   cd portfolio
   ```
3. Copy file konfigurasi *environment*:
   ```bash
   cp .env.example .env
   ```
4. Buka aplikasi **XAMPP**, lalu klik tombol **START** pada module **Apache** dan **MySQL**.

### 2. Instalasi Dependensi
Jalankan perintah berikut di terminal:
```bash
composer install
npm install
php artisan key:generate
```

### 3. Setup Database (Cara Masukin Data MySQL)
Karena Anda baru saja melakukan clone, database Anda masih kosong.

1. Buka browser dan ketik: `http://localhost/phpmyadmin`
2. Buat database baru bernama **portfolio_bilal** (klik tombol *New*, ketik nama, klik *Create*).
3. Buka file `.env` di kode editor Anda, pastikan setting database sesuai:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=portfolio_bilal
   DB_USERNAME=root
   DB_PASSWORD=
   ```
4. Eksekusi tabel beserta data awal otomatis (Seeding) lewat terminal:
   ```bash
   php artisan migrate:fresh --seed
   ```
*(Catatan: Langkah 4 akan otomatis membuat semua tabel dan mengisi data milik Bilal Alaudin secara instan, Anda tidak perlu mengimpor file SQL manual jika menggunakan seed)*.

### 4. Menjalankan Website
Agar frontend terhubung dengan backend, jalankan dua server ini secara bersamaan di terminal terpisah:

**Terminal 1 (Backend API):**
```bash
php artisan serve
```

**Terminal 2 (Frontend Build):**
```bash
npm run build
```
*(Cukup jalankan `npm run dev` hanya jika Anda berniat untuk mengedit kode/mengubah desain).*

Setelah itu, silakan buka `http://127.0.0.1:8000` di browser Anda!

---

## 💽 Panduan Ekspor & Impor Database Manual (Beda Device)

Jika suatu saat Anda menambahkan artikel blog atau karya baru dari *device* pertama, dan ingin memindahkan datanya ke *device* (laptop/komputer) kedua, ikuti cara ini:

### Ekspor Data (Dari Device 1)
1. Buka `http://localhost/phpmyadmin` di Device 1.
2. Klik database **portfolio_bilal** di panel sebelah kiri.
3. Di deretan menu atas, klik tab **Export** (Ekspor).
4. Biarkan metode pada format **Quick** dan format **SQL**.
5. Klik **Export/Go**. Anda akan mendapatkan file `portfolio_bilal.sql`. Pindahkan file ini ke flashdisk atau Google Drive.

### Impor Data (Ke Device 2)
1. Di Device 2, buka XAMPP dan jalankan MySQL.
2. Buka `http://localhost/phpmyadmin`.
3. Buat database baru dengan nama **portfolio_bilal**.
4. Klik database tersebut, lalu pilih tab **Import** (Impor) di menu atas.
5. Klik tombol **Choose File** (Pilih File) dan pilih file `portfolio_bilal.sql` dari flashdisk Anda.
6. Scroll ke bawah dan klik tombol **Import/Go**.

Data situs, artikel, dan portfolio Anda kini sukses berpindah dan siap dijalankan di Device 2!
