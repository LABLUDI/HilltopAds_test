<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['user', 'company', 'site']);
            $table->unsignedBigInteger('id_labels')->nullable();;
            $table->foreign('id_labels')->references('id')->on('labels')->onDelete('cascade');
            $table->timestamps();
        });

        // Заполнение таблицы entities
        DB::table('entities')->insert([
            ['type' => 'user'],
            ['type' => 'company'],
            ['type' => 'site'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entities');
    }
};
