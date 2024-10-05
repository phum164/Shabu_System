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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('table_id');
            $table->integer('person_amount');
            $table->integer('all_person_pay');
            $table->integer('add_pay')->default(0);
            $table->integer('total_pay');
            $table->integer('status');
            $table->dateTime('start_time');
            $table->dateTime('finish_time')->nullable();
            $table->dateTime('end_time');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->cascadeOnUpdate();

            $table->foreign('table_id')
                  ->references('id')
                  ->on('tables')
                  ->onDelete('cascade')
                  ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
