<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProdisTable extends Migration
{
    public function up()
    {
        Schema::table('prodis', function (Blueprint $table) {
            $table->unsignedInteger('jurusan_id');
            $table->foreign('jurusan_id', 'jurusan_fk_1632144')->references('id')->on('prodi_jurusans');
        });
    }
}