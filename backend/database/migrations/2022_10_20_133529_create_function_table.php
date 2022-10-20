<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        DB::unprepared('
        CREATE FUNCTION grade (grade_point INT)
            RETURNS VARCHAR(15)
            RETURN 
                CASE
                    WHEN grade_point >= 90 THEN "EXCELLENT"
                    WHEN grade_point >= 80 THEN "GOOD"
                END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS grade');
    }
};
