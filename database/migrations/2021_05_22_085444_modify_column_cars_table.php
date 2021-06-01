<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            DB::statement("ALTER TABLE cars MODIFY COLUMN deliveryCompany_id int AFTER id");

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
            DB::statement("ALTER TABLE cars MODIFY COLUMN deliveryCompany_id int AFTER driver_name");
            
        });
    }
}
