<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('suppliers')->insert([
            ['name' => 'PT. Indofood Sukses Makmur', 'phone' => '021-5795-8822', 'address' => 'Jakarta Barat'],
            ['name' => 'PT. Unilever Indonesia', 'phone' => '021-8082-1000', 'address' => 'Tangerang'],
            ['name' => 'PT. Mayora Indah', 'phone' => '021-565-5322', 'address' => 'Jakarta Utara'],
        ]);
    }
}
