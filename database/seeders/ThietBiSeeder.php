<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThietBiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('thietbi')->truncate();
        $data= [
            [
                'loai' => 'chipConnect',
                'ten' => 'Chíp gửi, nhận tín hiệu ',
                'trangthai' => 1,
                'phuthuoc' => null,
                'user_id' => 1,
            ],
            [
                'loai' => 'den',
                'ten' => 'Đèn phòng khách',
                'trangthai' => 0,
                'phuthuoc' => 1,
                'user_id' => 1,
            ],
            [
                'loai' => 'quat',
                'ten' => 'Quạt trần',
                'trangthai' => 0,
                'phuthuoc' => 1,
                'user_id' => 1,
            ],
            [
                'loai' => 'den',
                'ten' => 'Đèn phòng ngủ',
                'trangthai' => 0,
                'phuthuoc' => 1,
                'user_id' => 1,
            ],
            [
                'loai' => 'den',
                'ten' => 'Đèn bàn',
                'trangthai' => 0,
                'phuthuoc' => 1,
                'user_id' => 1,
            ],
            [
                'loai' => 'camBienNhietDo',
                'ten' => 'Cảm biến nhiệt độ phòng ngủ',
                'trangthai' => 0,
                'phuthuoc' => 1,
                'user_id' => 1,
            ],
            [
                'loai' => 'den',
                'ten' => 'Đèn LED',
                'trangthai' => 0,
                'phuthuoc' => 1,
                'user_id' => 1,
            ]
        ];
        DB::table('thietbi')->insert($data);

    }
}
