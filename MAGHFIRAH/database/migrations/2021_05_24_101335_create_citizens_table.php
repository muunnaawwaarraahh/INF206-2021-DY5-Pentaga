<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();            
            $table->string('nama');            
            $table->string('noKK');            
            $table->string('tempatLahir');            
            $table->date('tanggalLahir');            
            $table->string('dusun');            
            $table->string('lorong');            
            $table->string('noRumah');            
            $table->string('luasPetakRumah');            
            $table->integer('jumlahTanggungan');            
            $table->string('noHP');            
            $table->string('profesi');            
            $table->integer('penghasilan');            
            $table->integer('jumlahKendaraan');            
            $table->string('kepemilikanRumah');            
            $table->string('pernahMenerimaBantuan');            
            $table->string('tagihanListrikPerbulan');          
            $table->string('tagihanListrikPerbulanBukti');          
            $table->string('tagihanAirPerbulan')->default(null);            
            $table->string('tagihanAirPerbulanBukti')->default(null);            
            $table->string('konstruksiRumah');            
            $table->string('konstruksiRumahBukti');                     
            $table->string('golongan')->default("belum diverifikasi");                         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizens');
    }
}
