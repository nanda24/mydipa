<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DipaMenu;
use Spatie\Permission\Models\Role;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $viewerRole = Role::where('name', 'viewer')->first();

        $menus = [
            ['name' => 'Dashboard', 'type' => 'master', 'url' => '/dashboard', 'icon' => 'bi bi-grid', 'order_index' => 1],
            ['name' => 'Inbox Workflow', 'type' => 'transaction', 'url' => '/inbox', 'icon' => 'bi bi-calendar-check', 'order_index' => 2],
            ['name' => 'My Transaction', 'type' => 'transaction', 'url' => '/transaction', 'icon' => 'bi bi-receipt', 'order_index' => 3],
            ['name' => 'Information', 'type' => 'master', 'url' => '#', 'icon' => 'bi bi-info-circle', 'order_index' => 4],
            ['name' => 'Transaction', 'type' => 'transaction', 'url' => '#', 'icon' => 'bi bi-journal-text', 'order_index' => 5],
            ['name' => 'Settings', 'type' => 'master', 'url' => '/settings', 'icon' => 'bi bi-gear', 'order_index' => 99],
        ];

        $children = [
            ['name' => 'Peraturan Perusahaan', 'parent' => 'Information', 'url' => '/peraturan'],
            ['name' => 'FA Dept', 'parent' => 'Transaction', 'url' => '/fa'],
            ['name' => 'Payment Request', 'parent' => 'Transaction', 'url' => '/payment'],
            ['name' => 'Purchasing', 'parent' => 'Transaction', 'url' => '/purchasing'],
            ['name' => 'Internal Request', 'parent' => 'Transaction', 'url' => '/internal'],
            ['name' => 'GA', 'parent' => 'Transaction', 'url' => '#'],
            ['name' => 'Peminjaman Ruang', 'parent' => 'GA', 'url' => '/ruang'],
        ];

        $menuMap = [];

        foreach ($menus as $data) {
            $menu = DipaMenu::create([
                'name' => $data['name'],
                'type' => $data['type'],
                'url' => $data['url'],
                'icon' => $data['icon'],
                'is_active' => true,
                'order_index' => $data['order_index'],
            ]);
            $menu->roles()->attach([$adminRole->id, $viewerRole->id]);
            $menuMap[$data['name']] = $menu->id;
        }

        foreach ($children as $data) {
            $menu = DipaMenu::create([
                'name' => $data['name'],
                'type' => 'transaction',
                'url' => $data['url'],
                'icon' => null,
                'is_active' => true,
                'order_index' => 0,
                'parent_id' => $menuMap[$data['parent']] ?? null,
            ]);
            $menu->roles()->attach([$adminRole->id]);
        }
    }
}
