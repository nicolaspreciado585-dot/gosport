<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('apellido')->after('name');
        $table->bigInteger('numero_identificacion')->unique()->after('apellido');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('apellido');
        $table->dropColumn('numero_identificacion');
    });
}

};
