<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToBankSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_setting', function (Blueprint $table) {
            $table->foreign('bank_id')
                ->references('id') // id dari kolom tabel bank yang berelasi dengan table bank
                ->on('bank') // tabel bank
                ->onUpdate('cascade') // diperbolehkan untuk mengupdate
                ->onDelete('cascade'); // diperbolehkan untuk menghapus

            $table->foreign('setting_id')
                ->references('id') // id dari kolom tabel settings yang berelasi dengan table settings
                ->on('settings') // tabel settings
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
        Schema::table('bank_setting', function (Blueprint $table) {
            $table->dropForeign('bank_setting_bank_id_foreign');
            $table->dropForeign('bank_Setting_setting_id_foreign');
        });
    }
}
