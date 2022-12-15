<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id') // id dari kolom tabel users yang berelasi dengan table users
                ->on('users') // tabel users
                ->onUpdate('cascade') // diperbolehkan untuk mengupdate
                ->onDelete('restrict'); // apabila id berelasi digunakan makan fungsi delete akan di tolak
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropForeign('campaigns_user_id_foreign'); // meghapus relasi dengan tabel users
        });
    }
}
