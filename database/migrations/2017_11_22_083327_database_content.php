<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = config('database.default');

        // Schema::connection($connection)->create('users', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        //
        // Schema::connection($connection)->create('password_resets', function (Blueprint $table) {
        //     $table->string('email')->index();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });
        //
        Schema::connection($connection)->create('galaxy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::connection($connection)->create('system_object_size', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('size');
            $table->timestamps();
        });

        Schema::connection($connection)->create('system_object_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::connection($connection)->create('system_object_color', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code_hexadecimal');
            $table->string('code_nuance');
            $table->timestamps();
        });

        Schema::connection($connection)->create('system_object', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('size')->unsigned();
            $table->foreign('size')->references('id')->on('system_object_size');
            $table->integer('type')->unsigned();
            $table->foreign('type')->references('id')->on('system_object_type');
            $table->integer('color')->unsigned();
            $table->foreign('color')->references('id')->on('system_object_color');
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
        // Schema::dropIfExists('users', 'password_resets');
        Schema::dropIfExists('galaxy, system_object_size', 'system_object_type', 'system_object_color', 'system_object');
    }
}
