<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
class CreateFileuploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_uploads', function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('filename');
            $table->bigInteger('user_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
           
        });
         Schema::table('file_uploads', function($table) {
          $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_uploads');
      //  $table->dropForeign('user_id'); //
    }
}
