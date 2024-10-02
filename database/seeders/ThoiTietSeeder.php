<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThoiTietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('thoitiet')->truncate();
        $data=[
            [
                'loai' => 'nhietDo',
                'noiDung' => '38 độ C',
                'thietbi_id' => 1,
            ],
            [
                'loai' => 'doAm',
                'noiDung' => '60%',
                'thietbi_id' => 1,
            ],
            [
                'loai' => 'nhietDo',
                'noiDung' => '40 độ C',
                'thietbi_id' => 2,
            ]
        ];
        DB::table('thoitiet')->insert($data);
    }
}
