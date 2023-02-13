<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('identification')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();

            $table->date('birth_date')->nullable();
            $table->text('direction')->nullable();
            $table->string('phone_number')->nullable();

            $table->integer('vaccinated')->default(0)->comment('1 yes, 0 no');
            $table->foreignId('vaccine_fk')->nullable();
            $table->date('vaccinated_date')->nullable();
            $table->integer('number_dose')->nullable();

            $table->integer('status')->default(1)->nullable()->comment('1 active, 66 eliminated');

            //RELACION CON TABLA USUARIO
            $table->unsignedBigInteger('user_fk')->unique()->nullable();
            $table->foreign('user_fk')->references('id')->on('users')->onUpdate('cascade');

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
        Schema::dropIfExists('employees');
    }
}
