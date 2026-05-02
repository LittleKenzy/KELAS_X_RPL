<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            [
                'name'        => 'Ekosistem React',
                'icon'        => 'Code2',
                'description' => 'Arsitektur komponen, Hooks, Manajemen state, Next.js.',
                'level'       => 95,
                'category'    => 'frontend',
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Animasi Lanjutan',
                'icon'        => 'Zap',
                'description' => 'GSAP, Framer Motion, Three.js, Canvas.',
                'level'       => 90,
                'category'    => 'frontend',
                'sort_order'  => 2,
            ],
            [
                'name'        => 'UI/UX Engineering',
                'icon'        => 'Layout',
                'description' => 'Tailwind CSS, Styled Components, Sistem Desain.',
                'level'       => 88,
                'category'    => 'frontend',
                'sort_order'  => 3,
            ],
            [
                'name'        => 'Integrasi Laravel',
                'icon'        => 'Layers',
                'description' => 'Template Blade, Inertia, Pengembangan API, Routing.',
                'level'       => 85,
                'category'    => 'backend',
                'sort_order'  => 4,
            ],
            [
                'name'        => 'Arsitektur Sistem',
                'icon'        => 'Cpu',
                'description' => 'Vite, Webpack, CI/CD, Optimasi performa.',
                'level'       => 80,
                'category'    => 'tools',
                'sort_order'  => 5,
            ],
            [
                'name'        => 'Terminal / Backend',
                'icon'        => 'Terminal',
                'description' => 'Node.js, Express, Server Linux, Bash.',
                'level'       => 75,
                'category'    => 'backend',
                'sort_order'  => 6,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
