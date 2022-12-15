<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id') // id dari kolom tabel users yang berelasi dengan table users
                ->on('users') // tabel users
                ->onUpdate('cascade') // diperbolehkan untuk mengupdate
                ->onDelete('restrict'); // apabila id berelasi digunakan makan fungsi delete akan di tolak

            $table->foreign('order_number')
                ->references('order_number') // id dari kolom tabel donations yang berelasi dengan table donations
                ->on('donations') // tabel donations
                ->onUpdate('cascade') // diperbolehkan untuk mengupdate
                ->onDelete('cascade'); // diperbolehkan untuk mengupdate
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('payments_user_id_foreign');
            $table->dropForeign('payments_order_number_foreign');
        });
    }
}
