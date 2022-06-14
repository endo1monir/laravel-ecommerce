<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = Role::create([
            'name' => "admin",
            'display_name' => "Adminstration",
            'description' => "Adminstration",
            'allowed_route' => "admin",
        ]);
        $supervisorRole = Role::create([
            'name' => "supervisor",
            'display_name' => "Supervision",
            'description' => "Supervision",
            'allowed_route' => "admin",
        ]);
        $customerRole = Role::create([
            'name' => "customer",
            'display_name' => "customer",
            'description' => "customer",
            'allowed_route' => null,
        ]);
        $adminUser = User::create([
            "first_name" => "Admin",
            "last_name" => "System",
            "username" => "admin",
            "email" => "admin@admin.com",
            "email_verified_at" => now(),
            "mobile" => "54544558787",
            "user_image" => "admin.svg",
            "status" => 1,
            "password" => bcrypt('123'),
            "remember_token" => Str::random(10),
        ]);

        $adminUser->attachRole($adminRole);

        $supervisorUser = User::create([
            "first_name" => "supervisor",
            "last_name" => "System",
            "username" => "supervisor",
            "email" => "supervisor@supervisor.com",
            "email_verified_at" => now(),
            "mobile" => "545445587876",
            "user_image" => "avatar.svg",
            "status" => 1,
            "password" => bcrypt('123'),
            "remember_token" => Str::random(10),
        ]);
        $supervisorUser->attachRole($supervisorRole);
        $customer = User::create([
            "first_name" => "endo",
            "last_name" => "Monir",
            "username" => "endo",
            "email" => "endo@endo.com",
            "email_verified_at" => now(),
            "mobile" => "545445585787",
            "user_image" => "admin.svg",
            "status" => 1,
            "password" => bcrypt('123'),
            "remember_token" => Str::random(10),
        ]);
        $customer->attachRole($customerRole);
        for ($i = 0; $i < 15; $i++) {
            $user = User::factory()->create();
            $user->attachRole($customerRole);
        }
        //main permision
        $manageMain = Permission::create([
            'name' => 'main',
            'display_name' => 'Main',
            'description' => '',
            'route' => 'index',
            'module' => 'index',
            'as' => 'index',
            'icon' => 'fas fa-home',
            'parent' => '0',
            'parent_original' => '0',
            'sidebar_link' => '1',
            'appear' => '1',
            'ordering' => '1',
        ]);
        $manageMain->parent_show = $manageMain->id;
        $manageMain->save();
        //product categories
        $manageProductCategories = Permission::create([
            'name' => 'manage_product_categories',
            'display_name' => 'Category',
            'description' => '',
            'route' => 'product_categories',
            'module' => 'product_categories',
            'as' => 'product_categories.index',
            'icon' => 'fas fa-file-archive',
            'parent' => '0',
            'parent_original' => '0',
            'sidebar_link' => '1',
            'appear' => '1',
            'ordering' => '5',
        ]);
        $manageProductCategories->parent_show = $manageProductCategories->id;
        $manageProductCategories->save();
        //Show product categories
        $manageProductCategories = Permission::create([
            'name' => 'show_product_categories',
            'display_name' => 'Categories',
            'description' => '',
            'route' => 'product_categories',
            'module' => 'product_categories',
            'as' => 'product_categories.index',
            'icon' => 'fas fa-file-archive',
            'parent' => $manageProductCategories->id,
            'parent_show'=>$manageProductCategories->id,
            'parent_original' => $manageProductCategories->id,
            'sidebar_link' => '1',
            'appear' => '1',

        ]);

        //create product categories
        $manageProductCategories = Permission::create([
            'name' => 'create_product_categories',
            'display_name' => 'Create Categories',
            'description' => '',
            'route' => 'product_categories',
            'module' => 'product_categories',
            'as' => 'product_categories.create',
            'icon' => null,
            'parent' => $manageProductCategories->id,
            'parent_show'=>$manageProductCategories->id,
            'parent_original' => $manageProductCategories->id,
            'sidebar_link' => '1',
            'appear' => '0',

        ]);
        //create product categories
        $displayProductCategories = Permission::create([
            'name' => 'display_product_categories',
            'display_name' => 'Display Category',
            'description' => '',
            'route' => 'product_categories',
            'module' => 'product_categories',
            'as' => 'product_categories.show',
            'icon' => null,
            'parent' => $manageProductCategories->id,
            'parent_show'=>$manageProductCategories->id,
            'parent_original' => $manageProductCategories->id,
            'sidebar_link' => '1',
            'appear' => '0',

        ]);
        //update product categories
        $displayProductCategories = Permission::create([
            'name' => 'update_product_categories',
            'display_name' => 'update Category',
            'description' => '',
            'route' => 'product_categories',
            'module' => 'product_categories',
            'as' => 'product_categories.edit',
            'icon' => null,
            'parent' => $manageProductCategories->id,
            'parent_show'=>$manageProductCategories->id,
            'parent_original' => $manageProductCategories->id,
            'sidebar_link' => '1',
            'appear' => '0',

        ]);
        //delete product categories
        $displayProductCategories = Permission::create([
            'name' => 'delete_product_categories',
            'display_name' => 'delete Category',
            'description' => '',
            'route' => 'product_categories',
            'module' => 'product_categories',
            'as' => 'product_categories.destroy',
            'icon' => null,
            'parent' => $manageProductCategories->id,
            'parent_show'=>$manageProductCategories->id,
            'parent_original' => $manageProductCategories->id,
            'sidebar_link' => '1',
            'appear' => '0',

        ]);





    }
}
