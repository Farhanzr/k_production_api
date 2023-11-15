<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRefEmploymentStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_employment_status', function (Blueprint $table) {
            $table->id();
            $table->integer('CODE');
            $table->string('DESCRIPTION');
            $table->timestamps();
        });

        // Insert data
        DB::table('ref_employment_status')->insert(
            array(
                [
                    'CODE' => '0',
                    'DESCRIPTION' => 'INACTIVE',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'CODE' => '1',
                    'DESCRIPTION' => 'ACTIVE',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'CODE' => '3',
                    'DESCRIPTION' => 'RESIGNED',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'CODE' => '4',
                    'DESCRIPTION' => 'TERMINATED',
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
        Schema::dropIfExists('ref_employment_status');
    }
}
