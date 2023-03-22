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
        Schema::create("players", function (Blueprint $table) {
            $table->uuid()->primary()->default(DB::raw("(UUID())"));
            $table->string("nickname", 64)->unique();
            $table->string("email", 320)->unique();
            $table->integer("registered");
            $table->boolean("status");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
