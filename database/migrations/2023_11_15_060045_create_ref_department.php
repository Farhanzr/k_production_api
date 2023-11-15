<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRefDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_department', function (Blueprint $table) {
            $table->id();
            $table->integer('CODE');
            $table->string('DESCRIPTION');
            $table->timestamps();
        });
        
        // Insert data
        DB::table('ref_department')->insert(
            array(
                [
                    'CODE' => '1',
                    'DESCRIPTION' => 'ADMINISTRATOR',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'CODE' => '2',
                    'DESCRIPTION' => 'HUMAN RESOURCE',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'CODE' => '3',
                    'DESCRIPTION' => 'INFORMATION TECHNOLOGY',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'CODE' => '4',
                    'DESCRIPTION' => 'FINANCING',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_department');
    }
}
