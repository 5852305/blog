<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
          $table->increments('id');
           $table->string('title');
           $table->text('content');
           $table->integer('user_id')->unsigned()->index();
           $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
           $table->integer('view')->default(0);
           $table->integer('catid')->default(0);
           $table->string('des');
           $table->string('image');
           $table->string('statement');      
           $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}
