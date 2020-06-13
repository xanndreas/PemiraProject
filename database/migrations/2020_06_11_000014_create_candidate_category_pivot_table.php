<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('candidate_category', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_1633260')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedInteger('candidate_id');
            $table->foreign('candidate_id', 'candidate_id_fk_1633260')->references('id')->on('candidates')->onDelete('cascade');
        });
    }
}