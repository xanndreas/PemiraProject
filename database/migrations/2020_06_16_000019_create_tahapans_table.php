<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahapansTable extends Migration
{
    public function up()
    {
        Schema::create('tahapans', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('tanggal');
            $table->longText('description');
            $table->string('jenis_tahapan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}