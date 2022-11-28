<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KindsTableSeeder extends Seeder
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
            'name' => '管理者'
        ];
        DB::table('kinds')->insert($param);

        $param = [
            'id' => 2,
            'name' => '一般ユーザー'
        ];
        DB::table('kinds')->insert($param);
    }
}
