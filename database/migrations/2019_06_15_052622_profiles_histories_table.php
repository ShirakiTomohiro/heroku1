<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfilesHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->nullable();
            $table->integer('profiles_id')->nullable();
            $table->string('edited_at');

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
        Schema::dropIfExists('histories');
    }
}
