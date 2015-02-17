<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounterTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('counter', function($table)
    {
      $table->increments('id');
      $table->string('class_name');

      $table->integer('object_id');

      $table->integer('view_counter');
      $table->integer('like_counter');
      
      $table->index('class_name');
      $table->index('object_id');

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
    Schema::drop('counter');
  }

}
