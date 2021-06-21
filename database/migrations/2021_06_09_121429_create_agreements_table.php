<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('loanee_id');
            $table->double('loan_amount');
            $table->string('agreement_attachment');
            $table->timestamp('disbursement_date')->nullable();
            $table->integer('loan_type');
            $table->string('payable_type');
            $table->double('interest_rate');
            $table->timestamp('expected_first_payment_date')->nullable();;
            $table->double('late_charges')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_image')->nullable();
            $table->boolean('admin_product')->default(0);
            $table->timestamp('cancelation')->nullable();
            $table->boolean('isRead')->default(1);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreements');
    }
}
