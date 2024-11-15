<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cdesa', function (Blueprint $table) {
            // Drop the existing 'nomor' column
            $table->dropColumn('nomor');
        });

        Schema::table('cdesa', function (Blueprint $table) {
            // Recreate the 'nomor' column
            $table->string('nomor', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::table('cdesa', function (Blueprint $table) {
            // Rollback by dropping the 'nomor' column
            $table->dropColumn('nomor');
        });

        Schema::table('cdesa', function (Blueprint $table) {
            // Recreate the original 'nomor' column
            $table->string('nomor', 20)->nullable(false);
        });
    }
};
