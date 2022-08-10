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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('title');
            $table->integer('brand_id');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('description');
            $table->string('featured_image')->nullable();
            $table->string('gallery')->nullable();
            $table->string('video_link')->nullable();
            $table->string('sku')->nullable();
            $table->string('price')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('stock_status')->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('wide')->nullable();
            $table->string('height')->nullable();
            $table->string('product_collections')->nullable(); //New Arrival, Best Sellers,  Special Offer
            $table->string('labels')->nullable(); //Hot, New,  Sale
            // Store
            //Delivery id
            // Tax_id
            //Stock Status koto gulo product bikri hoiche ar koto gulo available seta kivabe ber kore seta pari nai

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->boolean('status')->default(true);
            $table->boolean('featured')->default(false);
            $table->boolean('trending')->default(false);
            $table->boolean('popular')->default(false);
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
        Schema::dropIfExists('products');
    }
};
