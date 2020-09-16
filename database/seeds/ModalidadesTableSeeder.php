<?php

use Illuminate\Database\Seeder;


class ModalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('modalidades')->delete();
        \DB::table('modalidades')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 3,
                    'edad_max' => 3,
                    'grado_min' => 9,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A1',
                    'kumite' => 'B1',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            1 =>
                array(
                    'id' => 2,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 3,
                    'edad_max' => 3,
                    'grado_min' => 9,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A1',
                    'kumite' => 'B1',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            2 =>
                array(
                    'id' => 3,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 4,
                    'edad_max' => 4,
                    'grado_min' => 9,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A2',
                    'kumite' => 'B2',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            3 =>
                array(
                    'id' => 4,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 4,
                    'edad_max' => 4,
                    'grado_min' => 9,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A2',
                    'kumite' => 'B2',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            4 =>
                array(
                    'id' => 5,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 5,
                    'edad_max' => 5,
                    'grado_min' => 9,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A3',
                    'kumite' => 'B3',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            5 =>
                array(
                    'id' => 6,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 5,
                    'edad_max' => 5,
                    'grado_min' => 9,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A4',
                    'kumite' => 'B4',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            6 =>
                array(
                    'id' => 7,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 6,
                    'edad_max' => 7,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 1,
                    'kata' => 'A5',
                    'kumite' => 'B5',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            7 =>
                array(
                    'id' => 8,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 6,
                    'edad_max' => 7,
                    'grado_min' => 6,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A6',
                    'kumite' => 'B6',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            8 =>
                array(
                    'id' => 9,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 6,
                    'edad_max' => 7,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 0,
                    'kata' => 'A7',
                    'kumite' => 'B7',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            9 =>
                array(
                    'id' => 10,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 6,
                    'edad_max' => 7,
                    'grado_min' => 6,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A8',
                    'kumite' => 'B8',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            10 =>
                array(
                    'id' => 11,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 8,
                    'edad_max' => 9,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 1,
                    'kata' => 'A9',
                    'kumite' => 'B9',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            11 =>
                array(
                    'id' => 12,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 8,
                    'edad_max' => 9,
                    'grado_min' => 6,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A10',
                    'kumite' => 'B10',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            12 =>
                array(
                    'id' => 13,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 8,
                    'edad_max' => 9,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 0,
                    'kata' => 'A11',
                    'kumite' => 'B11',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),

            13 =>
                array(
                    'id' => 14,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 8,
                    'edad_max' => 9,
                    'grado_min' => 6,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A12',
                    'kumite' => 'B12',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            14 =>
                array(
                    'id' => 15,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 10,
                    'edad_max' => 11,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 1,
                    'kata' => 'A13',
                    'kumite' => 'B13',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            15 =>
                array(
                    'id' => 16,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 10,
                    'edad_max' => 11,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 1,
                    'kata' => 'A14',
                    'kumite' => 'B14',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            16 =>
                array(
                    'id' => 17,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 10,
                    'edad_max' => 11,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A15',
                    'kumite' => 'B15',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            17 =>
                array(
                    'id' => 18,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 10,
                    'edad_max' => 11,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 0,
                    'kata' => 'A16',
                    'kumite' => 'B16',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            18 =>
                array(
                    'id' => 19,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 10,
                    'edad_max' => 11,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 0,
                    'kata' => 'A17',
                    'kumite' => 'B17',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            19 =>
                array(
                    'id' => 20,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 10,
                    'edad_max' => 11,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A18',
                    'kumite' => 'B18',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            20 =>
                array(
                    'id' => 21,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 12,
                    'edad_max' => 13,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 1,
                    'kata' => 'A19',
                    'kumite' => 'B19',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            21 =>
                array(
                    'id' => 22,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 12,
                    'edad_max' => 13,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 1,
                    'kata' => 'A20',
                    'kumite' => 'B20',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            22 =>
                array(
                    'id' => 23,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 12,
                    'edad_max' => 13,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A21',
                    'kumite' => 'B21',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            23 =>
                array(
                    'id' => 24,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 12,
                    'edad_max' => 13,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 0,
                    'kata' => 'A22',
                    'kumite' => 'B22',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            24 =>
                array(
                    'id' => 25,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 12,
                    'edad_max' => 13,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 0,
                    'kata' => 'A23',
                    'kumite' => 'B23',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            25 =>
                array(
                    'id' => 26,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 12,
                    'edad_max' => 13,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A24',
                    'kumite' => 'B24',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            26 =>
                array(
                    'id' => 27,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 14,
                    'edad_max' => 15,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 1,
                    'kata' => 'A25',
                    'kumite' => 'B25',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            27 =>
                array(
                    'id' => 28,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 14,
                    'edad_max' => 15,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 1,
                    'kata' => 'A26',
                    'kumite' => 'B26',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            28 =>
                array(
                    'id' => 29,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 14,
                    'edad_max' => 15,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A27',
                    'kumite' => 'B27',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            29 =>
                array(
                    'id' => 30,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 14,
                    'edad_max' => 15,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 0,
                    'kata' => 'A28',
                    'kumite' => 'B28',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            30 =>
                array(
                    'id' => 31,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 14,
                    'edad_max' => 15,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 0,
                    'kata' => 'A29',
                    'kumite' => 'B29',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            31 =>
                array(
                    'id' => 32,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 14,
                    'edad_max' => 15,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A30',
                    'kumite' => 'B30',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            32 =>
                array(
                    'id' => 33,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 16,
                    'edad_max' => 17,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 1,
                    'kata' => 'A31',
                    'kumite' => 'B31',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            33 =>
                array(
                    'id' => 34,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 16,
                    'edad_max' => 17,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 1,
                    'kata' => 'A32',
                    'kumite' => 'B32',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            34 =>
                array(
                    'id' => 35,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 16,
                    'edad_max' => 17,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A33',
                    'kumite' => 'B33',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            35 =>
                array(
                    'id' => 36,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 16,
                    'edad_max' => 17,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 0,
                    'kata' => 'A34',
                    'kumite' => 'B34',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            36 =>
                array(
                    'id' => 37,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 16,
                    'edad_max' => 17,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 0,
                    'kata' => 'A35',
                    'kumite' => 'B35',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            37 =>
                array(
                    'id' => 38,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 16,
                    'edad_max' => 17,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A36',
                    'kumite' => 'B36',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            38 =>
                array(
                    'id' => 39,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 18,
                    'edad_max' => 100,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 1,
                    'kata' => 'A37',
                    'kumite' => 'B37',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            39 =>
                array(
                    'id' => 40,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 18,
                    'edad_max' => 100,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 1,
                    'kata' => 'A38',
                    'kumite' => 'B38',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            40 =>
                array(
                    'id' => 41,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 18,
                    'edad_max' => 100,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 1,
                    'kata' => 'A39',
                    'kumite' => 'B39',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            41 =>
                array(
                    'id' => 42,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 18,
                    'edad_max' => 100,
                    'grado_min' => 9,
                    'grado_max' => 7,
                    'sexo' => 0,
                    'kata' => 'A40',
                    'kumite' => 'B40',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'


                ),
            42 =>
                array(
                    'id' => 43,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 18,
                    'edad_max' => 100,
                    'grado_min' => 6,
                    'grado_max' => 4,
                    'sexo' => 0,
                    'kata' => 'A41',
                    'kumite' => 'B41',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),
            43 =>
                array(
                    'id' => 44,
                    'torneo_id' =>1,
                    'nombre' => NULL,
                    'edad_min' => 18,
                    'edad_max' => 100,
                    'grado_min' => 3,
                    'grado_max' => 1,
                    'sexo' => 0,
                    'kata' => 'A42',
                    'kumite' => 'B42',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),

        ));
    }
}
