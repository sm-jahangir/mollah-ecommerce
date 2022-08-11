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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('slider_bg')->nullable();

            $table->string('button_1')->default('Shop Now');
            $table->string('button_1_bg_color')->nullable();
            $table->string('button_1_link')->default('#');

            $table->string('button_2')->default('Buy Now');
            $table->string('button_2_bg_color')->nullable();
            $table->string('button_2_link')->default('#');

            $table->string('status')->default(true);

            $table->string('position')->default('left');
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
        Schema::dropIfExists('sliders');
    }
};
