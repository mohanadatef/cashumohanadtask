<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateConfigsTable extends Migration {

	public function up()
	{
		Schema::create('configs', function(Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
			$table->increments('id');
            $table->float('sales_target');
            $table->integer('user_id')->unsigned()->index();
			$table->timestamps();
		});
	}

	public function down()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Schema::dropIfExists('configs');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
