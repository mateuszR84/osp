<?php namespace Mater\Firebrigade\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateFirefightersTable Migration
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
        Schema::create('mater_firebrigade_firefighters', function(Blueprint $table) {
            $table->id();
            // names
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('father_name')->nullable();
            // personal
            $table->string('gender')->nullable();
            $table->string('membership_type')->nullable();
            $table->text('dob')->nullable();
            $table->text('birth_place')->nullable();
            $table->string('id_card')->nullable();
            $table->string('pesel')->nullable();
            // contact
            $table->string('street')->nullable();
            $table->string('town')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('post_office')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            // duty
            $table->string('duty_function')->nullable();
            $table->dateTime('duty_started_at')->nullable();
            $table->dateTime('duty_ended_at')->nullable();
            $table->dateTime('medical_exam')->nullable();
            $table->dateTime('psycho_exam')->nullable();
            $table->boolean('is_chief')->nullable();
            $table->boolean('is_active')->nullable();
            $table->boolean('is_driver')->nullable();
            $table->dateTime('driver_exam')->nullable();
            $table->string('permission_no')->nullable();
            $table->string('driver_license')->nullable();
            // misc
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('mater_firebrigade_firefighters');
    }
};
