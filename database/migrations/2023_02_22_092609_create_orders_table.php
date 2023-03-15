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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('order1')->nullable();
            $table->integer('order2')->nullable();
            $table->integer('order3')->nullable();
            $table->integer('order4')->nullable();
            $table->integer('order5')->nullable();
            $table->integer('order6')->nullable();
            $table->integer('order7')->nullable();
            $table->integer('order8')->nullable();
            $table->integer('order9')->nullable();
            $table->integer('order10')->nullable();
            $table->integer('order11')->nullable();
            $table->integer('order12')->nullable();
            $table->integer('order13')->nullable();
            $table->integer('order14')->nullable();
            $table->integer('order15')->nullable();
            $table->integer('order16')->nullable();
            $table->integer('order17')->nullable();
            $table->integer('order18')->nullable();
            $table->integer('order19')->nullable();
            $table->integer('order20')->nullable();
            $table->date('receive_date');
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
        Schema::dropIfExists('orders');
    }
};
