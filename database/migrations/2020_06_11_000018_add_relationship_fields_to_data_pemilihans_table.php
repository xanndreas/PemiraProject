<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataPemilihansTable extends Migration
{
    public function up()
    {
        Schema::table('data_pemilihans', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_1632330')->references('id')->on('users');
            $table->unsignedInteger('candidate_id');
            $table->foreign('candidate_id', 'candidate_fk_1632331')->references('id')->on('candidates');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_1632332')->references('id')->on('categories');
        });
    }
}