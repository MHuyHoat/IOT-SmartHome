<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('thietbi', function (Blueprint $table) {
            $table->id();
            $table->string('loai')-> nullable()->comment('Loại thiết bị : đèn, quạt,... ');
            $table->string('ten')->nullable();
            $table->integer('trangthai')->default(0)->comment('0 tat , 1 la bat');
            $table->bigInteger('phuthuoc')->nullable()->comment("phụ thuộc vào thiết bị nào : Được điều khiển bởi thiết bị nào ");
            $table->bigInteger('user_id')->nullable()->default(1)->comment('Của tài khoản nào');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('db_iot');
    }
};
