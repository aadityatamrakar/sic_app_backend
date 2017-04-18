<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1492539858CallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('calls')) {
            Schema::create('calls', function (Blueprint $table) {
                $table->increments('id');
                $table->string('type')->nullable();
                $table->string('brand')->nullable();
                $table->string('product')->nullable();
                $table->string('customer_name')->nullable();
                $table->string('customer_mobile')->nullable();
                $table->string('customer_phone')->nullable();
                $table->string('customer_address')->nullable();
                $table->text('complain')->nullable();
                $table->text('remarks')->nullable();
                $table->string('bill')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
}
