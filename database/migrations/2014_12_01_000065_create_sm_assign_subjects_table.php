<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmAssignSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_assign_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('active_status')->default(1);
            $table->timestamps();

            $table->integer('teacher_id')->nullable()->unsigned();
            $table->foreign('teacher_id')->references('id')->on('sm_staffs')->onDelete('restrict');

            $table->integer('class_id')->nullable()->unsigned();
            $table->foreign('class_id')->references('id')->on('sm_classes')->onDelete('restrict');


            $table->integer('section_id')->nullable()->unsigned();
            $table->foreign('section_id')->references('id')->on('sm_sections')->onDelete('restrict');

            $table->integer('subject_id')->nullable()->unsigned();
            $table->foreign('subject_id')->references('id')->on('sm_subjects')->onDelete('restrict');


            $table->integer('created_by')->nullable()->default(1)->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');

            $table->integer('updated_by')->nullable()->default(1)->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');

            $table->integer('school_id')->nullable()->default(1)->unsigned();
            $table->foreign('school_id')->references('id')->on('sm_schools')->onDelete('restrict');
        });

//        Have Seeder


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_assign_subjects');
    }
}