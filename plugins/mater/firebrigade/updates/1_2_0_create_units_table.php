<?php namespace Mater\Firebrigade\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateUnitsTable Migration
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
        Schema::create('mater_firebrigade_units', function(Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('abbreviation');
            $table->string('legal_form');
            $table->dateTime('registration_date');
            $table->string('regon');
            $table->string('tax_id_number');
            $table->string('krs');
            $table->string('account_number');
            // contact fields
            $table->string('town');
            $table->string('street');
            $table->string('postal_code');
            $table->string('post_office');
            $table->string('phone_number');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('mater_firebrigade_units');
    }
};
