<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->unique();
            $table->integer('leader_id')->nullable()->unsigned()->index();
            $table->string('password');
            $table->string('category', 255)->default('SMA/SMK');
            $table->string('referrer', 255)->default('HIMFO');
            $table->string('payment_proof_file_path', 255)->nullable();
            $table->string('submission_file_path', 255)->nullable();
            $table->string('payment_status')->default('pending');
            $table->rememberToken();
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
        Schema::dropIfExists('teams');
    }
}
