<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNam2012sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nam2012s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('muctieunam_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('date');
            $table->float('power',8,2)->default(0);
            $table->float('quantity',8,3)->default(0);
            $table->float('MNH',8,2)->unsigned();
            $table->float('rain',8,1)->default(0);
            $table->string('device');
            $table->tinyInteger('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nam2012s');
    }
}
