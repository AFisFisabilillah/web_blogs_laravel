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
            $table->string('slug')->unique();
            $table->unsignedBigInteger('id_penulis');
            $table->text('content');
            $table->timestamps();
            $table->foreign('id_penulis')->references(columns: 'id')->on('users');
          
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('id_category')->constrained(
                table :'category',
                indexName:'fk_id_category'
               );
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['fk_id_user']);
        });

        Schema::dropIfExists('posts');
    }
};
