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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade'); //this belongs to employees table
            $table->date('pay_period_start');
            $table->date('pay_period_end');
            $table->decimal('total_hours', 8,2);
            $table->decimal('gross_pay', 10,2);
            $table->decimal('deductions', 10,2);
            $table->decimal('net_pay', 10,2);
            $table->timestamp('generated_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
