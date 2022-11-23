<?php

use App\Models\Package;
use App\Models\User;
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
    public function up()
    {
        Schema::create('user_packages', function (Blueprint $table) {
            $table->id();
            // $table->integer('user_id')->unsigned(); 
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->integer('package_id')->unsigned(); 
            // $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Package::class);
            $table->dateTime('expired_date');
            $table->index('expired_date');
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
        Schema::dropIfExists('user_packages');
    }
};
