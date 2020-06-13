<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCandidatesTable extends Migration
{
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->unsignedInteger('jurusan_id');
            $table->foreign('jurusan_id', 'jurusan_fk_1633141')->references('id')->on('prodi_jurusans');
        });
    }
}