<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Osiset\ShopifyApp\Util;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->boolean('shopify_grandfathered')->default(false);
            $table->string('shopify_namespace')->nullable(true)->default(null);
            $table->boolean('shopify_freemium')->default(false);
            $table->integer('plan_id')->unsigned()->nullable();
            $table->date('password_updated_at')->nullable();
            $table->integer('theme_support_level')->nullable();

            if (!Schema::hasColumn('shops', 'deleted_at')) {
                $table->softDeletes();
            }

            if (!Schema::hasColumn('shops', 'name')) {
                $table->string('name')->nullable();
            }

            if (!Schema::hasColumn('shops', 'email')) {
                $table->string('email')->nullable();
            }

            if (!Schema::hasColumn('shops', 'password')) {
                $table->string('password', 100)->nullable();
            }

            $table->foreign('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropForeign('shops' . '_plan_id_foreign');
            $table->dropColumn([
                'name',
                'email',
                'password',
                'shopify_grandfathered',
                'shopify_namespace',
                'shopify_freemium',
                'plan_id',
            ]);

            $table->dropSoftDeletes();
        });
    }
}
