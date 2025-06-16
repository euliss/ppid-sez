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
        Schema::create('m_sop', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('file');
        $table->string('status');
        $table->date('publish_date');
        // Hapus timestamps() kalau memang kamu gak pakai created_at dan updated_at
        // $table->timestamps(); ← ini boleh dihapus
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_sop');
    }
};
