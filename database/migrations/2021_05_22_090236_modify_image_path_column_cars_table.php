<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyImagePathColumnCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            DB::statement("ALTER TABLE cars MODIFY COLUMN image_path varchar(225) AFTER delivery_area");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
        DB::statement("ALTER TABLE cars MODIFY COLUMN image_path varchar(225) AFTER updated_at");
        });
    }
}
