<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToBankUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_user', function (Blueprint $table) {
            $table->foreign('bank_id')
                ->references('id') // id dari kolom tabel bank yang berelasi dengan table bank
                ->on('bank') // tabel bank
                ->onUpdate('cascade') // diperbolehkan untuk mengupdate
                ->onDelete('cascade'); // diperbolehkan untuk menghapus

            $table->foreign('user_id')
                ->references('id') // id dari kolom tabel users yang berelasi dengan table users
                ->on('users') // tabel users
                ->onUpdate('cascade') // diperbolehkan untuk mengupdate
                ->onDelete('cascade'); // diperbolehkan untuk meghapus

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_user', function (Blueprint $table) {
            $table->dropForeign('bank_user_bank_id_foreign');
            $table->dropForeign('bank_user_user_id_foreign');
        });
    }
}
