<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listsorders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('bill_id');
            $table->integer('amount');
            $table->tinyInteger('status')->default(0); // 0 = pending, 1 = completed, 2 = cancelled
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listorders');
    }
};
