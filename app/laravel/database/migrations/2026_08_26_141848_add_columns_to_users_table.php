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
            $table->string('pass_token', 100)->nullable()->after('password');
            $table->string('icon', 100)->nullable()->after('pass_token');
            $table->tinyInteger('del_flg')->default(0)->after('icon');
            $table->tinyInteger('stop_flg')->default(0)->after('del_flg');
            $table->tinyInteger('role')->default(0)->after('stop_flg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
