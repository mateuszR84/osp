<?php namespace Mater\Firebrigade\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateActionsTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('mater_firebrigade_actions', function(Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('evidence_number');
            $table->string('action_place');
            $table->string('officer');
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
            $table->text('additional_information');
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('mater_firebrigade_actions');
    }
};
