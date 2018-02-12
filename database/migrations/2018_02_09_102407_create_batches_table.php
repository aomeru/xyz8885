<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->increments('id');

            $table->string('batch_no',50)->unique();

            $table->integer('purchase_id')->unsigned()->nullable();
            $table->foreign('purchase_id')->references('id')->on('purchases');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->enum('location', ['Lagos','Warri'])->default('Lagos')->after('staff_id');
        });

        Schema::table('inventories', function(Blueprint $table){
            $table->renameColumn('purchase_id','batch_id');
        });

        DB::update("ALTER TABLE batches AUTO_INCREMENT = 58512");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batches');
    }
}
