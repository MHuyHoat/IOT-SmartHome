<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thoitiet', function (Blueprint $table) {
            $table->id();
            $table->string('loai')->nullable()->comment('Loại nào : Nhiệt độ, độ ẩm,..');
            $table -> string('noiDung')->comment('Nội dung ghi lại : 38_o_C, 38%,.. ');
            $table->bigInteger('thietbi_id')->nullable()->nullable("Thuộc về thiết bị nào ");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thoitiet');
    }
};
