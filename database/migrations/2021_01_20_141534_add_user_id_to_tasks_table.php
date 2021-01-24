<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // このtasksというテーブルにuser_idというカラムを定義する
             $table->unsignedBigInteger('user_id');
            // このtasksというテーブルのuser_idというカラムに外部キー制約を設定する
            // references = 対象テーブルのカラム名
            // on = 対象テーブル名
            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
            //
          $table->dropForeign(['user_id']);
           Schema::dropColumn('tasks'); 
    }
}
