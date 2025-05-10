<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */       
    public function up(): void
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ✅ Define name column
            $table->timestamps();
        });

        $userStatuses = [
            ['name' => 'Active'],
            ['name' => 'Inactive'],
        ];
        
      

foreach ($userStatuses as $userStatus) {
    DB::table('user_statuses')->insert($userStatus);
}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_statuses');
    }
};
