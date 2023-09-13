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
                    Schema::create('comments', function (Blueprint $table) {
                              $table->id("CommentID");
                              $table->foreignId("UserID")->constrained("users", "id");
                              $table->foreignId("ArticleID")->constrained("articles", "ArticleID");
                              $table->string('username');
                              $table->string('content');
                              $table->integer('role');
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
                    Schema::dropIfExists('comments');
          }
};
