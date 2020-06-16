<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('payment_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('name');
            $table->string('phone_no');
            $table->text('shipping_address');

            //shipping charges
            $table->integer('shipping_charge')->default(60);
            //custom discount
            $table->integer('custom_discount')->default(0);
            
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);
            $table->string('transaction_id')->nullable();
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
             * 1-> order controller
             * 2-> order model
             * 3-> order table and write under codes also
             * 
             * Now run php artisan migrate
            **/

            /* Uncomment after migration */
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('payment_id')
            ->references('id')->on('payments')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
