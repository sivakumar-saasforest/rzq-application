<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('password', 100)->nullable();
            $table->boolean('rzq_grandfathered')->nullable();
            $table->string('rzq_namespace')->nullable();
            $table->boolean('rzq_freemium')->nullable(false);
            $table->date('password_updated_at')->nullable();
            $table->integer('theme_support_level')->nullable();

            $table->unsignedBigInteger('plan_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('shops');
    }
}
