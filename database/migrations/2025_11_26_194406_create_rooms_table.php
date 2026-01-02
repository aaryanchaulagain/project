<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id'); // foreign key to users
            $table->string('name');
            $table->string('type');
            $table->integer('rooms_available');
            $table->decimal('price', 10, 2);
            $table->string('status')->default('pending'); // admin approval
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
