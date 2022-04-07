<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            //criando coluna para guardar usuário
            $table->bigInteger('user_id')->unsigned();
            $table->string('title', 200);
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('posts', function($table) {
            //referenciando as tabelas com chave estrangeira, usando onDelete('cascade') para que se o usuário for deletado todas os posts petencentes a ele será deletedo.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
