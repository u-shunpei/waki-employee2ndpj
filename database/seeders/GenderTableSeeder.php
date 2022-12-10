<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
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
            'name' => '男性',
        ];
        DB::table('genders')->insert($param);

        $param = [
            'id' => 2,
            'name' => '女性',
        ];
        DB::table('genders')->insert($param);
    }
}
