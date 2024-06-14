<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelontong_549Table extends Migration
{
    public function up()
    {
        Schema::create('kelontong_549', function (Blueprint $table) {
            $table->id();
            $table->string('produk');
            $table->string('kategori');
            $table->string('pesanan');
            $table->string('pelanggan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelontong_549');
    }
}
?>