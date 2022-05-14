<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->string('type');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->longText('address')->nullable();
            $table->string('camp')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('payment_method')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('amount');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
