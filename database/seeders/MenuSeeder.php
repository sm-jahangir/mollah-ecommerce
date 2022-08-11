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
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 4, 'title' => 'Category', 'url' => "/app/category", 'icon_class' => 'fas fa-certificate']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 5, 'title' => 'Tags', 'url' => "/app/tags", 'icon_class' => 'fas fa-tags']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 6, 'title' => 'Brand', 'url' => "/app/brand", 'icon_class' => 'fab fa-bandcamp']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 7, 'title' => 'Ads', 'url' => "/app/ads", 'icon_class' => 'fab fa-goodreads']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 8, 'divider_title' => 'Products']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 9, 'title' => 'Colors', 'url' => "/app/color", 'icon_class' => 'fas fa-paint-brush']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 10, 'title' => 'Sizes', 'url' => "/app/size", 'icon_class' => 'fas fa-sitemap']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 11, 'title' => 'Products', 'url' => "/app/product", 'icon_class' => 'fab fa-product-hunt']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 12, 'title' => 'Sliders', 'url' => "/app/slider", 'icon_class' => 'fas fa-spider']);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 13, 'divider_title' => 'Access Control']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 14, 'title' => 'Roles', 'url' => "/app/roles", 'icon_class' => 'fas fa-user-lock']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 6, 'title' => 'Users', 'url' => "/app/users", 'icon_class' => 'fas fa-users']);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'divider', 'parent_id' => null, 'order' => 15, 'divider_title' => 'System']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 16, 'title' => 'Menus', 'url' => "/app/menus", 'icon_class' => 'fas fa-bars']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'type' => 'item', 'parent_id' => null, 'order' => 17, 'title' => 'Settings', 'url' => "/app/settings/general", 'icon_class' => 'fas fa-cogs']);
    }
}
