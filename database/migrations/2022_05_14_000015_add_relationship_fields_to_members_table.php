<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMembersTable extends Migration
{
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id', 'district_fk_6453858')->references('id')->on('districts');
            $table->unsignedBigInteger('block_id')->nullable();
            $table->foreign('block_id', 'block_fk_6453859')->references('id')->on('blocks');
            $table->unsignedBigInteger('panchayat_id')->nullable();
            $table->foreign('panchayat_id', 'panchayat_fk_6466117')->references('id')->on('panchayats');
        });
    }
}
