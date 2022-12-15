<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id') // id dari kolom tabel users yang berelasi dengan table users
                ->on('users') // tabel users
                ->onUpdate('cascade') // diperbolehkan untuk mengupdate
                ->onDelete('restrict'); // apabila id berelasi digunakan makan fungsi delete akan di tolak

            $table->foreign('campaign_id')
                ->references('id') // id dari kolom tabel campaigns yang berelasi dengan table campaaigns
                ->on('campaigns') // tabel campaigns
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
        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign('donations_user_id_foreign');
            $table->dropForeign('donations_campaign_id_foreign');
        });
    }
}
