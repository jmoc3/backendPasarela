<?php

namespace Database\Seeders;

use App\Models\Divisa;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DivisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recordExists = Divisa::whereIn('abreviatura',['COP','USD'])->exists();
        if(!$recordExists){
            Divisa::insert([
                ['nombre' => 'Peso colombiano', 'abreviatura' => 'COP', 'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['nombre' => 'Dólar estadounidense', 'abreviatura' => 'USD', 'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
            ]);
        }
    }
}
