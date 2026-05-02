<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'title'        => 'Neon Snake',
                'slug'         => 'neon-snake',
                'description'  => 'Game Snake klasik dengan sentuhan Cyberpunk dan animasi pergerakan grid yang mulus. Dibuat dalam waktu 2 hari menggunakan React Hooks (useEffect & useRef) untuk mengatur game loop dan state management.',
                'thumbnail'    => null,
                'project_url'  => 'internal:neon-snake',
                'github_url'   => 'https://github.com/bilalalaudin/neon-snake',
                'tech_stack'   => ['React', 'Tailwind CSS', 'Game Loop'],
                'category'     => 'game',
                'is_featured'  => true,
                'completed_at' => '2026-04-10',
                'sort_order'   => 1,
            ],
            [
                'title'        => 'Memory Match',
                'slug'         => 'memory-match',
                'description'  => 'Game asah otak mencocokkan kartu dengan desain Glassmorphism. Dilengkapi dengan animasi membalik kartu 3D yang elegan menggunakan Framer Motion. Project ini diselesaikan dalam waktu 3 hari.',
                'thumbnail'    => null,
                'project_url'  => 'internal:memory-match',
                'github_url'   => 'https://github.com/bilalalaudin/memory-match',
                'tech_stack'   => ['React', 'Framer Motion', 'CSS 3D'],
                'category'     => 'game',
                'is_featured'  => true,
                'completed_at' => '2026-04-15',
                'sort_order'   => 2,
            ],
            [
                'title'        => 'Simon Says',
                'slug'         => 'simon-says',
                'description'  => 'Game memori urutan warna klasik. Menampilkan efek cahaya neon yang interaktif dan dinamis menggunakan Tailwind CSS. Diprogram selama 1 hari fokus pada manajemen antrean (queue) aksi pemain.',
                'thumbnail'    => null,
                'project_url'  => 'internal:simon-says',
                'github_url'   => 'https://github.com/bilalalaudin/simon-says',
                'tech_stack'   => ['React', 'State Machine', 'Tailwind'],
                'category'     => 'game',
                'is_featured'  => true,
                'completed_at' => '2026-04-20',
                'sort_order'   => 3,
            ],
            // Non-featured projects...
            [
                'title'        => 'E-Commerce Platform',
                'slug'         => 'e-commerce-platform',
                'description'  => 'Platform e-commerce full-stack dengan fitur keranjang belanja.',
                'thumbnail'    => '/images/portfolio/ecommerce.jpg',
                'project_url'  => 'https://example.com',
                'github_url'   => null,
                'tech_stack'   => ['Laravel', 'React'],
                'category'     => 'web',
                'is_featured'  => false,
                'completed_at' => '2026-03-15',
                'sort_order'   => 4,
            ]
        ];

        foreach ($portfolios as $item) {
            Portfolio::create($item);
        }
    }
}
