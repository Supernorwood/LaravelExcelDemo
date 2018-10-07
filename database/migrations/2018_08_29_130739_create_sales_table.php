<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agency_code', 50);
            $table->string('agent_last_name', 50);
            $table->string('agent_first_name', 50);
            $table->string('agent_code', 50);
            $table->string('product_type', 50);
            $table->string('comp_type', 50);
            $table->string('subscriber_last_name', 50);
            $table->string('subscriber_first_name', 50);
            $table->string('subscriber_middle_name', 50)->nullable();
            $table->string('app_id', 50)->nullable();
            $table->string('member_contract_no', 50);
            $table->string('original_effective_date', 50);
            $table->string('benefit_effective_date', 50);
            $table->string('accounting_date', 50)->nullable();
            $table->string('compensation_date', 50);
            $table->string('cancel_date', 50);
            $table->string('comp_year', 50)->nullable();
            $table->string('prior_carrier_ind', 50)->nullable();
            $table->string('prior_plan_type', 50)->nullable();
            $table->string('event_type', 50)->nullable();
            $table->string('flat_rate', 50)->nullable();
            $table->string('comm_amount', 50);
            $table->string('county_name', 50);
            $table->string('cms_date', 50)->nullable();
            $table->string('cycle_year', 50)->nullable();
            $table->string('admin_fee', 50)->nullable();

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
