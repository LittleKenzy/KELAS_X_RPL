<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title'        => 'Memulai Karir sebagai Web Developer di 2026',
                'slug'         => 'memulai-karir-web-developer-2026',
                'excerpt'      => 'Panduan lengkap untuk memulai karir di dunia web development. Dari memilih bahasa pemrograman hingga membangun portofolio pertama.',
                'body'         => '<h2>Mengapa Web Development?</h2>
<p>Di era digital saat ini, web developer menjadi salah satu profesi yang paling dicari. Menurut data dari berbagai sumber, permintaan untuk developer terus meningkat setiap tahunnya.</p>

<h3>Langkah 1: Kuasai Fundamental</h3>
<p>Mulailah dengan HTML, CSS, dan JavaScript. Ketiga teknologi ini adalah fondasi dari setiap website. Tanpa memahami ketiganya, akan sulit untuk melangkah lebih jauh.</p>

<h3>Langkah 2: Pilih Framework</h3>
<p>Setelah menguasai dasar, pilih framework yang sesuai. React, Vue, atau Angular untuk frontend. Laravel, Express, atau Django untuk backend. Pilihlah yang memiliki komunitas aktif dan dokumentasi yang baik.</p>

<h3>Langkah 3: Bangun Portofolio</h3>
<p>Buat project nyata yang bisa ditampilkan. Tidak perlu yang kompleks — yang penting menunjukkan kemampuan problem solving dan penguasaan teknologi.</p>

<h3>Langkah 4: Terus Belajar</h3>
<p>Teknologi web berubah cepat. Ikuti blog, YouTube channel, dan komunitas developer untuk tetap update.</p>',
                'thumbnail'    => '/images/blog/web-developer.jpg',
                'category'     => 'career',
                'tags'         => ['web development', 'career', 'tips', 'pemula'],
                'status'       => 'published',
                'published_at' => '2026-04-20 10:00:00',
                'read_time'    => 5,
            ],
            [
                'title'        => 'React + Laravel: Kombinasi Sempurna untuk Full-Stack',
                'slug'         => 'react-laravel-kombinasi-fullstack',
                'excerpt'      => 'Bagaimana React dan Laravel saling melengkapi untuk membangun aplikasi web modern yang scalable dan maintainable.',
                'body'         => '<h2>Mengapa React + Laravel?</h2>
<p>React unggul dalam membangun UI yang interaktif dan reaktif, sementara Laravel menyediakan backend yang kokoh dengan ORM Eloquent, routing yang elegan, dan ekosistem yang lengkap.</p>

<h3>Setup dengan Vite</h3>
<p>Dengan laravel-vite-plugin, integrasi keduanya menjadi seamless. Hot Module Replacement (HMR) membuat proses development lebih produktif.</p>

<pre><code>// vite.config.js
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.jsx"],
            refresh: true,
        }),
        react(),
    ],
});</code></pre>

<h3>API-Driven Architecture</h3>
<p>Dengan memisahkan frontend dan backend melalui API, kita mendapatkan fleksibilitas untuk mengembangkan mobile app di masa depan tanpa mengubah backend.</p>

<h3>Best Practices</h3>
<ul>
    <li>Gunakan Form Request untuk validasi</li>
    <li>Konsisten dalam format API response</li>
    <li>Manfaatkan Eloquent scope untuk query yang bersih</li>
    <li>Implementasikan error handling yang proper</li>
</ul>',
                'thumbnail'    => '/images/blog/react-laravel.jpg',
                'category'     => 'tutorial',
                'tags'         => ['react', 'laravel', 'fullstack', 'vite'],
                'status'       => 'published',
                'published_at' => '2026-04-15 08:30:00',
                'read_time'    => 7,
            ],
            [
                'title'        => 'Mendesain UI Modern dengan Tailwind CSS',
                'slug'         => 'mendesain-ui-modern-tailwindcss',
                'excerpt'      => 'Tips dan trik untuk membuat tampilan website yang modern dan responsive menggunakan Tailwind CSS utility-first framework.',
                'body'         => '<h2>Utility-First Approach</h2>
<p>Tailwind CSS mengubah cara kita menulis CSS. Alih-alih membuat class custom, kita mengkomposisi desain langsung di HTML menggunakan utility classes.</p>

<h3>Custom Theme</h3>
<p>Salah satu kekuatan Tailwind adalah kemudahan dalam kustomisasi. Melalui tailwind.config.js, kita bisa mendefinisikan warna, font, dan spacing yang sesuai brand.</p>

<h3>Glassmorphism dengan Tailwind</h3>
<p>Tren glassmorphism bisa diimplementasikan dengan mudah:</p>

<pre><code>.glass-panel {
    background: rgba(26, 26, 26, 0.4);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.05);
}</code></pre>

<h3>Dark Mode</h3>
<p>Tailwind menyediakan dark mode secara native. Dengan menambahkan darkMode: "class" di config, kita bisa membuat toggle dark/light theme dengan mudah.</p>

<h3>Responsive Design</h3>
<p>Dengan prefixes seperti sm:, md:, lg:, responsive design menjadi sangat intuitif. Mobile-first approach memastikan website terlihat baik di semua ukuran layar.</p>',
                'thumbnail'    => '/images/blog/tailwindcss.jpg',
                'category'     => 'tutorial',
                'tags'         => ['tailwind css', 'ui design', 'css', 'responsive'],
                'status'       => 'published',
                'published_at' => '2026-04-10 14:00:00',
                'read_time'    => 6,
            ],
            [
                'title'        => 'Animasi Web dengan GSAP dan Framer Motion',
                'slug'         => 'animasi-web-gsap-framer-motion',
                'excerpt'      => 'Perbandingan dan panduan penggunaan GSAP dan Framer Motion untuk membuat animasi web yang smooth dan performant.',
                'body'         => '<h2>GSAP vs Framer Motion</h2>
<p>Keduanya adalah library animasi yang powerful, tapi dengan pendekatan berbeda. GSAP lebih low-level dan versatile, sementara Framer Motion dirancang khusus untuk React.</p>

<h3>Kapan Menggunakan GSAP?</h3>
<ul>
    <li>Animasi timeline yang kompleks</li>
    <li>ScrollTrigger untuk scroll-based animations</li>
    <li>Animasi SVG dan canvas</li>
    <li>Performance-critical animations</li>
</ul>

<h3>Kapan Menggunakan Framer Motion?</h3>
<ul>
    <li>Layout animations</li>
    <li>Page transitions</li>
    <li>Gesture-based interactions</li>
    <li>Component mount/unmount animations</li>
</ul>

<h3>Menggabungkan Keduanya</h3>
<p>Tidak ada aturan yang melarang menggunakan keduanya dalam satu project. Gunakan GSAP untuk animasi scroll dan timeline, dan Framer Motion untuk animasi komponen React.</p>',
                'thumbnail'    => '/images/blog/animations.jpg',
                'category'     => 'tutorial',
                'tags'         => ['gsap', 'framer motion', 'animation', 'react'],
                'status'       => 'published',
                'published_at' => '2026-04-05 09:00:00',
                'read_time'    => 8,
            ],
            [
                'title'        => 'Perjalanan Belajar Coding Selama Setahun',
                'slug'         => 'perjalanan-belajar-coding-setahun',
                'excerpt'      => 'Refleksi personal tentang perjalanan belajar pemrograman dari nol hingga bisa membangun aplikasi full-stack.',
                'body'         => '<h2>Awal Mula</h2>
<p>Setahun lalu, saya tidak tahu apa-apa tentang coding. Yang saya tahu hanya bahwa saya ingin membuat sesuatu yang bisa digunakan orang lain. Itu cukup untuk memulai.</p>

<h3>Bulan 1-3: Fondasi</h3>
<p>Belajar HTML dan CSS terasa seperti membuka pintu ke dunia baru. JavaScript awalnya membingungkan, tapi setelah memahami konsep dasar, semuanya mulai masuk akal.</p>

<h3>Bulan 4-6: Framework</h3>
<p>Memilih React sebagai framework pertama adalah keputusan terbaik. Komponen-based thinking mengubah cara pandang saya tentang pembangunan UI.</p>

<h3>Bulan 7-9: Backend</h3>
<p>Laravel membuat backend development terasa elegan. Migration, Eloquent ORM, dan artisan commands — semuanya dirancang untuk membuat developer produktif.</p>

<h3>Bulan 10-12: Full-Stack</h3>
<p>Menggabungkan semuanya menjadi aplikasi full-stack adalah momen yang paling memuaskan. Melihat frontend dan backend bekerja bersama — itu rasanya luar biasa.</p>

<h3>Pelajaran</h3>
<p>Konsistensi lebih penting dari intensitas. Coding setiap hari walau hanya 30 menit lebih baik dari maraton 10 jam sekali seminggu.</p>',
                'thumbnail'    => '/images/blog/coding-journey.jpg',
                'category'     => 'personal',
                'tags'         => ['coding journey', 'belajar', 'motivasi', 'personal'],
                'status'       => 'published',
                'published_at' => '2026-03-28 16:00:00',
                'read_time'    => 6,
            ],
            [
                'title'        => 'Tips Optimasi Performa Website (Draft)',
                'slug'         => 'tips-optimasi-performa-website',
                'excerpt'      => 'Kumpulan tips untuk meningkatkan performa loading website — dari lazy loading hingga code splitting.',
                'body'         => '<h2>Coming Soon</h2>
<p>Artikel ini sedang dalam proses penulisan. Stay tuned!</p>',
                'thumbnail'    => '/images/blog/performance.jpg',
                'category'     => 'tutorial',
                'tags'         => ['performance', 'optimization', 'web'],
                'status'       => 'draft',
                'published_at' => null,
                'read_time'    => 1,
            ],
        ];

        foreach ($blogs as $item) {
            Blog::create($item);
        }
    }
}
