<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'name'       => 'Bilal Alaudin',
            'tagline'    => 'Pengembang Frontend Premium & Insinyur Kreatif',
            'bio'        => 'Siswa Kelas 10 RPL (Absen 6) dari SMKN 2 Buduran. Saya seorang pengembang frontend premium & insinyur kreatif yang memadukan kode dengan animasi visual untuk membangun dunia web yang imersif.',
            'bio_extended' => json_encode([
                'Saya tidak sekadar menulis kode; saya membangun pengalaman. Berawal dari ketertarikan pada media interaktif, perjalanan saya berkembang menjadi obsesi terhadap piksel yang sempurna dan performa yang mulus.',
                'Filosofi saya sederhana: estetika tanpa fungsi hanyalah seni, namun fungsi tanpa estetika adalah peluang yang terlewatkan. Saya hadir di persimpangan antara rekayasa logis dan desain visual yang kreatif.',
                'Sebagai siswa SMKN 2 Buduran jurusan Rekayasa Perangkat Lunak, saya terus belajar dan bereksperimen. Saat Anda berinteraksi dengan karya saya, Anda tidak hanya mengklik tombol—Anda merasakan pergerakan yang dirancang secara detail.',
            ]),
            'photo'      => null,
            'email'      => 'bilal@example.com',
            'phone'      => null,
            'location'   => 'Sidoarjo, Jawa Timur',
            'school'     => 'SMKN 2 Buduran',
            'major'      => 'Rekayasa Perangkat Lunak',
            'class_info' => 'Kelas 10 RPL (Absen 6)',

            'social_links' => [
                ['platform' => 'github',    'url' => 'https://github.com/LittleKenzy',   'label' => 'GitHub'],
                ['platform' => 'instagram', 'url' => 'https://instagram.com/bilalalaudin', 'label' => 'Instagram'],
                ['platform' => 'linkedin',  'url' => 'https://linkedin.com/in/bilalalaudin', 'label' => 'LinkedIn'],
            ],

            'motto'        => 'Desain bukan hanya tentang tampilan atau rasa. Desain adalah bagaimana ia bekerja.',
            'motto_author' => 'Sebuah Filosofi',

            'prime_time'       => '23:00',
            'prime_time_quote' => 'Ketika dunia tertidur, pikiran terbangun.',
            'current_status'   => 'Membangun masa depan',

            'personality_traits' => [
                ['name' => 'Analitis',     'value' => 85, 'color' => '#4a9eff'],
                ['name' => 'Kreatif',      'value' => 90, 'color' => '#9e4aff'],
                ['name' => 'Perfeksionis', 'value' => 95, 'color' => '#ff4a9e'],
                ['name' => 'Adaptif',      'value' => 80, 'color' => '#4aff9e'],
            ],

            'hobbies' => [
                ['title' => 'Main Game PC',     'icon' => 'MonitorPlay', 'desc' => 'Eksplorasi dunia virtual di layar lebar.'],
                ['title' => 'Game MOBA',        'icon' => 'Gamepad2',    'desc' => 'Adu mekanik dan strategi tim yang intens.'],
                ['title' => 'Nonton Film',      'icon' => 'Film',        'desc' => 'Menikmati sinematografi dan alur cerita epik.'],
                ['title' => 'Dengerin Musik',   'icon' => 'Music',       'desc' => 'Merasakan irama dan melodi sebagai inspirasi.'],
                ['title' => 'Olahraga',         'icon' => 'Dumbbell',    'desc' => 'Menjaga kebugaran dan keseimbangan hidup.'],
                ['title' => 'Tidur',            'icon' => 'MoonStar',    'desc' => 'Recharge energi untuk produktivitas esok hari.'],
                ['title' => 'Tour',             'icon' => 'Map',         'desc' => 'Berpetualang dan mencari pengalaman baru di luar ruangan.'],
            ],

            'daily_vibe' => [
                'lab_title' => 'Laboratorium',
                'lab_desc'  => 'Sesi coding tengah malam. Musik lofi. Ketikan keyboard mekanik.',
            ],
        ]);
    }
}
