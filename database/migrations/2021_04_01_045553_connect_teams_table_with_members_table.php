<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectTeamsTableWithMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->foreign('leader_id')->references('id')->on('members')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function(Blueprint $table) {
            $table->dropForeign('members_team_id_foreign');
        });

        Schema::table('teams', function(Blueprint $table) {
            $table->dropForeign('teams_leader_id_foreign');
        });
    }
}
