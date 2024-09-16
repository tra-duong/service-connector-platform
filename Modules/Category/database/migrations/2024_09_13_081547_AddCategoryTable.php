<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Category\Helpers\CategoryStatusHelper;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('slug', 128)->nullable(false);
            $table->bigInteger('parent_id')->nullable(true)->default(null);
            $table->bigInteger('type')->nullable(true);
            $table->tinyInteger('status')->default(CategoryStatusHelper::STATUS_INACTIVE);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
