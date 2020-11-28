<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userTypeId');
            //$table->foreign('userTypeId')->references('id')->on('user_types');
            $table->integer('deptId');
            //$table->foreign('deptId')->references('id')->on('departments');
            $table->integer('officeId');
            //$table->foreign('officeId')->references('id')->on('offices');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->longText('address')->nullable();
            $table->tinyInteger('admin')->nullable();
            $table->tinyInteger('manager')->nullable();
            $table->tinyInteger('tech_lead')->nullable();
            $table->tinyInteger('software_engineer')->nullable();
            $table->timestamp('emailVerifiedAt')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
