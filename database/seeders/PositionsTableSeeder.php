<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
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
            'name' => '相談役',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 2,
            'name' => '取締役会長',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 3,
            'name' => '取締役社長',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 4,
            'name' => '取締役',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 5,
            'name' => '監査役',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 6,
            'name' => '部長',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 7,
            'name' => '課長',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 8,
            'name' => '係長',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 9,
            'name' => '技術職',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 10,
            'name' => '一般職',
        ];
        DB::table('positions')->insert($param);

        $param = [
            'id' => 11,
            'name' => '通年パート',
        ];
        DB::table('positions')->insert($param);
    }
}
