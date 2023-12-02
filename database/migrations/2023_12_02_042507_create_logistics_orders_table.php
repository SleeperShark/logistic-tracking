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
        Schema::create('logistics_orders', function (Blueprint $table) {
            $table->id();
            $table->string('sno', 16)->unique()->comment('物流編號');
            $table->unsignedTinyInteger('tracking_status')->default(1)->comment('物流狀態');
            $table->date('estimated_delivery')->comment('預計送達日期');
            $table->unsignedBigInteger('current_location_id')->comment('包裹目前位置id');
            $table->unsignedBigInteger('recipient_id')->comment('收件者id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistics_orders');
    }
};
