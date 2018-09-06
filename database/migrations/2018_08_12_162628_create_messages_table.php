<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
public function up()
 {
   Schema::create('messages', function (Blueprint $table) {
     $table->increments('id');
     $table->text('message')->nullable();
     $table->string('path')->nullable();
     $table->integer('user_id')->unsigned();
     $table->foreign('user_id')->references('id')->on('users');
     $table->timestamps();
   });
 }
}
