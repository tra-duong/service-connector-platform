<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\JobRequest\Helpers\JobRequestHelper;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_requests', function (Blueprint $table) {
            $table->id();
            $table->string('raw_request')->nullable();
            $table->string('country')->nullable()->default('Việt Nam');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('ward_id')->constrained('wards')->onDelete('cascade');
            $table->string('street_id')->nullable();
            $table->string('home_number')->nullable();
            $table->decimal('lat')->nullable();
            $table->decimal('long')->nullable();
            $table->unsignedSmallInteger('accuracy')->nullable();
            $table->foreignId('author')->constrained('users')->onDelete('cascade');
            $table->json('files')->nullable();
            $table->dateTime('schedule_time')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->unsignedInteger('approx_duration')->nullable();
            $table->dateTime('expired_time')->nullable();
            $table->unsignedMediumInteger('quantity')->nullable()->default(1);
            $table->foreignId('assign_to_user')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('assign_to_team')->nullable()->constrained('teams')->onDelete('cascade');
            $table->unsignedTinyInteger('type')->nullable()->default(JobRequestHelper::TYPE_INDIVIDUAL);
            $table->dateTime('assign_time')->nullable();
            $table->dateTime('cancel_time')->nullable();
            $table->dateTime('completed_time')->nullable();
            $table->string('note')->nullable();
            $table->tinyInteger('status')->nullable()->default(JobRequestHelper::STATUS_DRAFT);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_requests');
    }
};
