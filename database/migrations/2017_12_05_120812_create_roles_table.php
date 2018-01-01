<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('nameRule');
            $kolom->timestamps();
        });

        // schema ini untuk ketika di table user di update atau delet tabel roles akan ikut update dan delet juga
        Schema::table('users', function(Blueprint $kolom){
            $kolom->foreign('roles_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
