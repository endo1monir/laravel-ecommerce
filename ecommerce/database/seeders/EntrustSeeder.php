<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        $adminRole=Role::create([
'name'=>"admin",
'display_name'=>"Adminstration",
'description'=>"Adminstration",
'allowed_route'=>"admin",
        ]);
        $supervisorRole=Role::create([
'name'=>"supervisor",
'display_name'=>"Supervision",
'description'=>"Supervision",
'allowed_route'=>"admin",
        ]);
        $customerRole=Role::create([
'name'=>"customer",
'display_name'=>"customer",
'description'=>"customer",
'allowed_route'=>null,
        ]);
$adminUser=User::create([
    "first_name"=>"Admin",
    "last_name"=>"System",
    "email"=>"admin@admin.com",
    "email_verified_at"=>now(),
    "mobile"=>"54544558787",
    "user_image"=>"admin.svg",
    "status"=>1,
    "password"=>bcrypt('123'),
    "remember_token"=>Str::random(10),
]);

$adminUser->attachRole($adminRole);

$supervisorUser=User::create([
    "first_name"=>"supervisor",
    "last_name"=>"System",
    "email"=>"supervisor@supervisor.com",
    "email_verified_at"=>now(),
    "mobile"=>"545445587876",
    "user_image"=>"avatar.svg",
    "status"=>1,
    "password"=>bcrypt('123'),
    "remember_token"=>Str::random(10),
]);
$supervisorUser->attachRole($supervisorRole);
$customer=User::create([
    "first_name"=>"endo",
    "last_name"=>"Monir",
    "email"=>"endo@endo.com",
    "email_verified_at"=>now(),
    "mobile"=>"545445585787",
    "user_image"=>"admin.svg",
    "status"=>1,
    "password"=>bcrypt('123'),
    "remember_token"=>Str::random(10),
]);
$customer->attachRole($customerRole);
for($i=0;$i<15;$i++){
$user=User::factory()->create();
$user->attachRole($customerRole);
}
}
}
