<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1492540021CallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calls', function (Blueprint $table) {
            $table->integer('dealer_id')->unsigned()->nullable();
                $table->foreign('dealer_id', '30714_58f65a74aa3bf')->references('id')->on('dealers')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calls', function (Blueprint $table) {
            $table->dropForeign('30714_58f65a74aa3bf');
            $table->dropIndex('30714_58f65a74aa3bf');
            $table->dropColumn('dealer_id');
            
        });

    }
}
