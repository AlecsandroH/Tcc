<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('forums', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('senha');
            $table->text('bio')->nullable()->after('avatar');
        });
    }

    public function down()
    {
        Schema::table('forums', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'bio']);
        });
    }
};