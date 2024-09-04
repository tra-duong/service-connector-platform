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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('name')->nullable();
            $table->string('middle_name')->after('first_name')->nullable();
            $table->string('last_name')->after('middle_name')->nullable();
            $table->date('birthday')->after('last_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove columns.
        $remove = [
            'first_name',
            'middle_name',
            'last_name',
            'birthday',
        ];
        foreach ($remove as $removeColumn) {
            if (Schema::hasColumn('users', $removeColumn)) {
                Schema::table('users', function (Blueprint $table) use ($removeColumn) {
                    $table->dropColumn($removeColumn);
                });
            }
        }
    }
};
