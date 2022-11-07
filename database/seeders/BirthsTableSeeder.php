<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BirthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'name' => '1',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 2,
            'name' => '2',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 3,
            'name' => '3',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 4,
            'name' => '4',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 5,
            'name' => '5',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 6,
            'name' => '6',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 7,
            'name' => '7',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 8,
            'name' => '8',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 9,
            'name' => '9',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 10,
            'name' => '10',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 11,
            'name' => '11',
        ];
        DB::table('births')->insert($param);

        $param = [
            'id' => 12,
            'name' => '12',
        ];
        DB::table('births')->insert($param);
    }
}
