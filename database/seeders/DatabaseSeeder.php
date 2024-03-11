<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'sonisetiawanmail@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '12345678',
        ]);

        \App\Models\ProfileClinic::factory()->create([
            'name'          => 'Klinik Soni',
            'address'       => 'Jalan Solo Km 12,5 Kalasan Sleman 555153',
            'phone'         => '(0274) 333110',
            'email'         => 'klinik.soni@example.com',
            'doctor_name'   => 'Dr. Soni',
            'unique_code'   => '123456'
        ]);

        // seeder Doctor
        $this->call(DoctorSeeder::class);
    }
}
