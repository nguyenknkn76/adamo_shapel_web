<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // id (Primary Key)
    // user_id (Foreign key referencing Users)
    // dishes_id (Foreign key referencing Dishes)
    // combos_id (Foreign key referencing Combos)
    // rating
    // comment
    // created_at
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('dish_id')->nullable()->constrained('dishes')->onDelete('cascade');
            $table->foreignId('combo_id')->nullable()->constrained('combos')->onDelete('cascade');
            $table->tinyInteger('rating')->unsigned();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
