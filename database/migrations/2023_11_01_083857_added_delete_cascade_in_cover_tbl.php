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
        Schema::table('cover_documents', function (Blueprint $table) {
            $table->dropForeign('cover_documents_document_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
