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
        Schema::create('import_data', function (Blueprint $table) {
            $table->id();
            $table->string('rank')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->string('irtg')->nullable(true);
            $table->string('club')->nullable(true);
            $table->string('type')->nullable(true);
            $table->string('point')->nullable(true);
            $table->string('bh1')->nullable(true);
            $table->string('bh2')->nullable(true);
            $table->string('sb')->nullable(true);
            $table->string('res')->nullable(true);
            $table->string('vict')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_data');
    }
};
