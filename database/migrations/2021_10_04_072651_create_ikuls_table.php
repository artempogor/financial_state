<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('ikul');
            $table->string('type_of_organization');
            $table->string('full_company_name');
            $table->string('short_company_name');
            $table->string('reg_number');
            $table->string('location');
            $table->string('director_fio');
            $table->string('accountant_fio');
            $table->string('special_official_fio');
            $table->string('responsible_actuary');
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
        Schema::dropIfExists('ikuls');
    }
}
