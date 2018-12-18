<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id_cont');
            $table->integer('id_cont_k');
            $table->integer('id_comp')->nullable();
            $table->string('description',120)->unique();
            $table->foreign('id_cont_k')->references('id_cont_k')->on('contact_kinds');
            $table->foreign('id_comp')->references('id_comp')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
