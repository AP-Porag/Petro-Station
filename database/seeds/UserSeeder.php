<?php

use App\Models\Product;
use App\Models\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Asraf Porag',
            'email'=>'asraf@aic.mail.com',
            'password'=>Hash::make('asraf@aic.mail.com'),
        ]);
        User::create([
            'name'=>'Razaul Karim',
            'email'=>'razaul@aic.mail.com',
            'password'=>Hash::make('razaul@aic.mail.com'),
        ]);
        Profile::create([
            'user_id' => 1,
            'firstName' => 'Asraf Porag',
            'lastName' => 'Asraf Porag',
            'contact' => 'please update your contact !',
            'profilePicture' => asset('admin/img/undraw_profile.svg'),
        ]);
        Profile::create([
            'user_id' => 2,
            'firstName' => 'Razaul Karim',
            'lastName' => 'Razaul Karim',
            'contact' => 'please update your contact !',
            'profilePicture' => asset('admin/img/undraw_profile.svg'),
        ]);
        Product::create([
            'name' => 'petrol',
            'unit' => 'ltr',
        ]);
        Product::create([
            'name' => 'diesel',
            'unit' => 'ltr',
        ]);
        Product::create([
            'name' => 'gas',
            'unit' => 'ltr',
        ]);
    }
}
