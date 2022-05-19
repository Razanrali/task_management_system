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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('ID_num');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('department_id')->nullable()
                ->constrained('departments')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->rememberToken();
            $table->timestamps();
            //team-id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');

    }
};
