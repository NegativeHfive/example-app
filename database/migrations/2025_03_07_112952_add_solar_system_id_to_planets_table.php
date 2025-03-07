<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('planets', function (Blueprint $table) {
            $table->foreignId('solar_system_id')
                ->constrained('solar_systems')
                ->onDelete('cascade')
                ->after('id'); // Zorgt ervoor dat deze kolom na de ID komt
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planets', function (Blueprint $table) {
            $table->dropForeign(['solar_system_id']);
            $table->dropColumn('solar_system_id');
        });
    }
};

?>
