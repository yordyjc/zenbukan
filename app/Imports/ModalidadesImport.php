<?php

namespace App\Imports;

use App\Models\Modalidad;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class ModalidadesImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value)
        {
            if ($key>0)
            {
                DB::table('modalidades')->insert([
                    'torneo_id'     => $value[0],
                    'nombre'        => $value[1],
                    'edad_min'      => $value[2],
                    'edad_max'      => $value[3],
                    'grado_min'     => $value[4],
                    'grado_max'     => $value[5],
                    'sexo'          => $value[6],
                    'kata'          => $value[7],
                    'kumite'        => $value[8],
                    'estado'        => '1'
                ]);

            }
        }
    }
}
