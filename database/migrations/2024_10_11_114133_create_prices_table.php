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
        Schema::create('prices', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('url_id')
                ->constrained(table: (new \App\Models\Url)->getTable())
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date('date');
            $table->decimal('price', 12, 4)->default(0);
            $table->decimal('offer_price', 12, 4)->default(0);
            $table->decimal('card_price', 12, 4)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
