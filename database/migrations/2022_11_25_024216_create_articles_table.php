<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id("ArticleID");
            $table->string("title");
            $table->longText("description");
            $table->string('link');
            // $table->longText("content")->nullable();
            $table->foreignId("CategoryID")->constrained("categories", "CategoryID");
            // $table->foreignId("AuthorID")->constrained("users", "id")->nullable();
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
};