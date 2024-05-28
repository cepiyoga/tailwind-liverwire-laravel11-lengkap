<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Karyawan;
use App\Models\komputerModel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Karyawan::create([
            'nama' => 'Cepi Yoga Asmara',
            'alamat' => 'Tangerang',
            'nik' => 'ID001',
        ]);

        Inventory::create([
           'code'=>'PM1',
           'description'=>'Buku Tulis 40 halaman',
           'quantity'=>100,
           'unit'=>'PCS'
        ]);


        komputerModel::create([
            'namapc'=>'Laptop Dell i5',
            'jumlah'=>10,
            'harga'=>10000
        ]);
    }
}
