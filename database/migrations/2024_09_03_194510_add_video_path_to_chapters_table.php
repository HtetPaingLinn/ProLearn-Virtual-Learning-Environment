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
    Schema::table('chapters', function (Blueprint $table) {
        $table->string('video_path')->nullable(); // add this line
    });
}

public function down()
{
    Schema::table('chapters', function (Blueprint $table) {
        $table->dropColumn('video_path');
    });
}
};
