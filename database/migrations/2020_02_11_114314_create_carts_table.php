<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('order_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('product_quantity')->default(1);

            $table->timestamps();
            
            /**
             * ---------------------------------------------------------------------------
             * If you want to migrate this table at the beginning migration with all table
             * then comment this CASECADE SECTION
             * 
             * OR
             * 
             * ---------------------------------------------------------------------------
             * If you want to migrate after completing all process then
             * CREATE 
             * 1-> cart controller
             * 2-> cart model
             * 3-> cart table and write under codes also
             * 
             * Now run php artisan migrate
            **/


            /* or if you want to migrate later then you can use it without comment */
            /* Uncomment after migration */
            
            /* CASECADE SECTION START */
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade'); // when user is deleted then users all order will be deleted by this.

            $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade'); // when user is deleted then users all order will be deleted by this.

            $table->foreign('order_id')
            ->references('id')->on('orders')
            ->onDelete('cascade'); // when user is deleted then users all order will be deleted by this.
            /* CASECADE SECTION END */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
