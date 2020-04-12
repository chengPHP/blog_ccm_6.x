<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('用户名');;
            $table->string('email')->unique()->comment('用户邮箱地址');
            $table->string('phone')->unique()->comment('用户手机号码');
            $table->string('password');
            $table->string('head_portrait')->nullable()->comment('用户头像');
            $table->tinyInteger('is_valid')->default(0)->comment('用户状态 0:启用 1:禁用');
            $table->tinyInteger('status')->default(0)->comment('有效性 0:有效 1:无效');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
