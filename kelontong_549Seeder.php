<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class kelontong_549Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<100;$i++){
            DB::table('kelontong_549')->insert([
                'produk' => $faker -> sentence(1),
                'kategori' => $faker -> word(),
                'pelanggan' => $faker -> sentence(),
                'pesanan' => $faker -> sentence(),
            ]);
    }
}
}