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

        Schema::create('header_settings', function (Blueprint $table) {
            $table->id();
            $table->string('menu_name_az');
            $table->string('menu_name_en');
            $table->string('menu_name_ru');
            $table->string('menu_url');
            $table->boolean('is_active')->default(true);

//            $table->string('title_en');
//            $table->string('title_ru');
//            $table->string('title_az');
//            $table->string('description_en');
//            $table->string('description_ru');
//            $table->string('description_az');
//            $table->string('header_logo_url');
//            $table->string('header_logo')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_settings');
    }
};
