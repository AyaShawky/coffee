<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =Admin::create([
            'name'=>'Admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
        ]);
    }
}
