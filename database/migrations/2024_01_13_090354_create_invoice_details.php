<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('barang_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('created_by_id')->nullable();
            $table->string('updated_by_id')->nullable();
            $table->string('deleted_by_id')->nullable();
            $table->bigInteger('jumlah_barang')->nullable();
            $table->bigInteger('sub_total')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
