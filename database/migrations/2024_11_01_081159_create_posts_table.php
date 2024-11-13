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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
        
        Schema::table('posts', function (Blueprint $table) {
            $table->softDeletes(); // これでdeleted_atカラムが追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropSoftDeletes(); // ロールバック時の処理
        });
    }
};
