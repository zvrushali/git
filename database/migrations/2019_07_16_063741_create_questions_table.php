<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Categorie;
class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
          //  $table->engine = "InnoDB";
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->string('questions');
            $table->string('option1');
            $table->string('option2');
            $table->string('option3');
            $table->string('option4');
            $table->string('correct_ans');  
            $table->softDeletes();
            $table->timestamps();
        });

         Schema::table('questions', function($table) {
         $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
