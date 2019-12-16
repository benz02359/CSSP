<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStaffIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id')->index()->nullable()->after('text');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //Schema::dropIfExists('staff_id');
            $table->dropColumn('staff_id');
            //$table->dropIndex('posts_staff_id_index');
            //$table->dropForeign('posts_staff_id_foreign');
            //$table->foreign('staff_id')->references('id')->on('staff');
        });
    }
}
