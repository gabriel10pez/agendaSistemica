<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'user_id');
            $table->dateTime(column: 'start');
            $table->dateTime(column: 'end');
            $table->integer(column: 'status')->default(value: 0)->nullable();
            $table->integer(column: 'is_all_day')
                ->default(value: 0)
                ->nullable();
            $table->string(column: 'title');
            $table->text(column: 'description');
            $table->string(column: 'event_id')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->date('fecha_evento')->nullable();
            $table->string('lugar_evento')->nullable();
            $table->string('resolucion_evento')->nullable();
            $table->string('costo_evento')->nullable();

            $table->foreign(columns: 'user_id')->references(columns: 'id')->on(table: 'users');
            $table->foreignId('tipo_event_id')->nullable()->constrained('tipo_eventos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
