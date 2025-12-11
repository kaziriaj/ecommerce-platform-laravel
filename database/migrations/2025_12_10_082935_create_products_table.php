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
            Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug', 255)->unique(); // Optional: Limit length
            $table->text('short_details')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->longText('description')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->string('image')->nullable(); // Optional: For storing product image filename
            $table->decimal('rating', 3, 2)->default(0); // Optional: For storing average product rating
            $table->timestamps();
            $table->string('status')->default('active');
            //warring in stoke or outofstoke
            $table->string('stoke_statas')->default('in_stok');
            $table->enum('size', ['L', 'M', 'XL', 'XXL'])->default('L');
            // Optional: Enable soft deletes
            $table->softDeletes();

            // Optional: Index on slug for better search performance
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
