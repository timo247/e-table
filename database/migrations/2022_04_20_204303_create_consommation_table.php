<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consommations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom');
            $table->text('description');
            $table->string('image_url');
            $table->float('prix');
            $table->string('categorie');
            $table->string('tags');
            $table->integer('etablissement_id')->unsigned();
            $table->foreign('etablissement_id')
                ->references('id')
                ->on('etablissements')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // if (DB::getDriverName() !== 'sqlite') {
        //     Schema::table('voitures', function (Blueprint $table) {
        //         $table->dropForeign('articles_user_id_foreign');
        //     });
        // }
        Schema::dropIfExists('consommation');
    }
};
