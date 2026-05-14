<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        // The users table is already created with admin, owner, and tenant roles.
    }

    public function down(): void
    {
        // No schema changes to reverse.
    }
};

