<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrphansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orphans', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('breadwinner_id')->nullable();
			$table->string('first_name', 200);
            $table->string('father_name', 200);
            $table->string('grandfather_name', 200);
            $table->string('family_name', 200);
            $table->integer('gender')->nullable();
            $table->string('national_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_country')->nullable();
            //$table->integer('martial')->nullable();
            $table->string('orphan_file')->nullable();
            $table->integer('rel_2_bdwin')->nullable();
            $table->integer('rel_2_orphan')->nullable();
            $table->integer('rel_2_others')->nullable();
            //$table->integer('cur_work')->nullable();
            //$table->integer('last_cert')->nullable();
            $table->integer('is_study')->nullable();
            $table->string('reason_no_study')->nullable();
            //$table->integer('cur_study')->nullable();
            $table->integer('edu_type')->nullable();
            $table->integer('study_class')->nullable();
            $table->integer('study_stage')->nullable();
            $table->string('edu_name')->nullable();
            $table->integer('study_level')->nullable();
            $table->integer('live_with')->nullable();
            $table->integer('is_praying')->nullable();
            $table->string('behavior')->nullable();
            $table->integer('is_mem_quran')->nullable();
            $table->string('quran_chapters')->nullable();
            $table->string('quran_parts')->nullable();
            $table->integer('is_healthy')->nullable();
            $table->string('ill_name')->nullable();
            $table->string('o_classification')->nullable();
            $table->string('hobbies',255)->nullable();			
            $table->string('profile_image')->nullable();
            $table->string('researcher_notes')->nullable();            
			$table->date('followup_date')->nullable();
			$table->timestamps();
		    $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orphans');
    }
}
