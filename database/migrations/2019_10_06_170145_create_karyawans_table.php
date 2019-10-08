<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->string('nik', 10)->primaryKey();
            $table->string('id_department', 8)->unsigned();
            $table->foreign('id_department')->references('department_id')->on('departments');
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->string('name', 40);
            $table->date('born');
            $table->text('address');
            $table->date('since');
            $table->enum('status', ['Lajang', 'Kawin', 'Bercerai']);
            $table->enum('gender', ['L', 'P']);
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('karyawans');
    }
}
