<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detailtransaksi', function (Blueprint $table) {
            $table->id();
            $table->string('transaksi_id');

            // $table->foreignId('transaksi_id')->references('id')->on('transaksi')->cascadeOnDelete();
            $table->foreignId('menu_id')->references('id')->on('menu')->cascadeOnDelete();
            $table->double('harga');
            $table->integer('jumlah');
            $table->float('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailtransaksi');
    }
};
