<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSlugForEventsSevasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('sevas')){
            if(!Schema::hasColumn('sevas','slug')){
                Schema::table('sevas', function (Blueprint $table) {
                    $table->string('slug',250)->nullable()->unique();
                });
            }
        }
        if(Schema::hasTable('events')){
            if(!Schema::hasColumn('events','slug')){
                Schema::table('events', function (Blueprint $table) {
                    $table->string('slug',250)->nullable()->unique();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_slug_for_events_sevas_');
    }
}
