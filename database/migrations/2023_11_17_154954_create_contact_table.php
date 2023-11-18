<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\User;
use App\Models\Priority;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Category::class)->nullable();
            $table->foreignIdFor(Priority::class)->nullable();
            $table->foreignId('staff_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('text');
            $table->boolean('is_close')->default('false');
            $table->string('path_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
