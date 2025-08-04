<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable()->after('name');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ticket_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // автобус, тролейбус
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->decimal('balance', 10, 2)->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('card_ticket_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_type_id');
            $table->unsignedBigInteger('transport_id');
            $table->decimal('price', 8, 2);
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types')->onDelete('cascade');
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('trip_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('transport_id');
            $table->unsignedBigInteger('ticket_type_id');
            $table->decimal('amount', 8, 2);
            $table->timestamp('trip_time');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('topup_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->decimal('amount', 8, 2);
            $table->timestamp('topup_time');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
        });
        Schema::dropIfExists('topup_histories');
        Schema::dropIfExists('trip_histories');
        Schema::dropIfExists('card_ticket_prices');
        Schema::dropIfExists('cards');
        Schema::dropIfExists('transports');
        Schema::dropIfExists('ticket_types');
        Schema::dropIfExists('cities');
    }
};
