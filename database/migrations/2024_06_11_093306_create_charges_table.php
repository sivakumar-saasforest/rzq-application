<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('charge_id');
            $table->boolean('test')->default(false);
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('terms')->nullable();
            $table->string('type');
            $table->decimal('price', 8, 2);
            $table->string('interval')->nullable();
            $table->decimal('capped_amount', 8, 2)->nullable();
            $table->integer('trial_days')->nullable();
            $table->timestamp('billing_on')->nullable();
            $table->timestamp('activated_on')->nullable();
            $table->timestamp('trial_ends_on')->nullable();
            $table->timestamp('cancelled_on')->nullable();
            $table->timestamp('expires_on')->nullable();
            $table->integer('plan_id')->unsigned()->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('reference_charge')->nullable();
            $table->timestamps();
            $table->softDeletes();

            if ($this->getLaravelVersion() < 5.8) {
                $table->integer('shops')->unsigned();
            } else {
                $table->bigInteger('shops')->unsigned();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('charges');
    }

    /**
     * Get Laravel version.
     *
     * @return float
     */
    private function getLaravelVersion()
    {
        $version = Application::VERSION;

        return (float) substr($version, 0, strrpos($version, '.'));
    }
}
