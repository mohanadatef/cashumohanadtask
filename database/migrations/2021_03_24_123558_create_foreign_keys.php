<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
        Schema::table('user_roles', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
        Schema::table('role_permissions', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
        Schema::table('sales', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
        Schema::table('configs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_user_id_foreign');
        });
        Schema::table('role_permissions', function (Blueprint $table) {
            $table->dropForeign('role_permissions_role_id_foreign');
            $table->dropForeign('role_permissions_permission_id_foreign');
        });
        Schema::table('user_roles', function (Blueprint $table) {
            $table->dropForeign('user_roles_user_id_foreign');
            $table->dropForeign('user_roles_role_id_foreign');
        });
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('sales_user_id_foreign');
        });
        Schema::table('configs', function (Blueprint $table) {
            $table->dropForeign('configs_user_id_foreign');
        });
    }
}
