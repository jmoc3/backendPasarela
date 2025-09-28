<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recordExists = TipoDocumento::whereIn('abreviatura',['CC','PS'])->exists();
        if(!$recordExists){
            TipoDocumento::insert([
                ['nombre' => 'Cédula de ciudadanía', 'abreviatura' => 'CC', 'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['nombre' => 'Pasaporte', 'abreviatura' => 'PS', 'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
            ]);
        };
    }
}
