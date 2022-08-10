<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::updateOrCreate(['name' => 'backend-sidebar', 'description' => 'This is backend sidebar', 'deletable' => false]);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 1, 'divider_title' => 'Menus']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 2, 'title' => 'Dashboard', 'url' => "/app/dashboard", 'icon_class' => 'fas fa-tachometer-alt']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 3, 'title' => 'Pages', 'url' => "/app/pages", 'icon_class' => 'fas fa-edit']);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 4, 'divider_title' => 'Access Control']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 5, 'title' => 'Roles', 'url' => "/app/roles", 'icon_class' => 'fas fa-user-lock']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 6, 'title' => 'Users', 'url' => "/app/users", 'icon_class' => 'fas fa-users']);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 7, 'divider_title' => 'System']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 8, 'title' => 'Menus', 'url' => "/app/menus", 'icon_class' => 'fas fa-bars']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 10, 'title' => 'Settings', 'url' => "/app/settings/general", 'icon_class' => 'fas fa-cogs']);
    }
}
