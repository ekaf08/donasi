<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')
                ->references('id') // id dari kolom tabel roles yang berelasi dengan table users
                ->on('roles') // tabel roles
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign'); // meghapus relasi dengan tabel roles
        });
    }
}
