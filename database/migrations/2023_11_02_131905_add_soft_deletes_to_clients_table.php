<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToClientsTable extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });
    }
}
