<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdiJurusansTable extends Migration
{
    public function up()
    {
        Schema::create('prodi_jurusans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->integer('total_mahasiswa')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}