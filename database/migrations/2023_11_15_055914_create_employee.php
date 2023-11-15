<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->uuid('UUID');
            $table->string('NAME');
            $table->string('IDENTITY_NO');
            $table->string('EMAIL')->unique();
            $table->string('CONTACT_NO');
            $table->string('DEPARTMENT_CODE');
            $table->integer('EMPLOYMENT_STATUS');
            $table->timestamps();
            $table->softDeletes();
            $table->string('CREATED_BY');
            $table->string('UPDATED_BY');
            $table->string('DELETED_BY');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
