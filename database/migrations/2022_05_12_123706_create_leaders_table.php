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
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            //$table->string('username')->unique();
            $table->text('img_profile')->nullable();//
            $table->tinyText('phone');
            $table->text('contact')->nullable(); // maybe zoom
            $table->mediumText('education')->nullable();
            $table->text('experience')->default('hello'); // المهام الوظيفية
            $table->foreignId('user_id')->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            //  $table->text('brief');
           // $table->foreignId('department_id')->constrained('departments')
             //   ->cascadeOnDelete()
               // ->cascadeOnUpdate();

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
        Schema::dropIfExists('leaders');
    }
};
