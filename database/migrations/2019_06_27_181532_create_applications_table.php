<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomeCompleto');
            $table->string('email');
            $table->string('telefone');
            $table->string('linkedinURL');
            $table->string('githubURL');
            $table->string('pretensaoSalarial');
            $table->string('curriculo');
            $table->string('nomeOriginalArquivo');

            $table->bigInteger('english_level_id')->unsigned();
            $table->foreign('english_level_id')->references('id')->on('english_levels');
            
            $table->bigInteger('application_status_id')->unsigned()->default('1');
            $table->foreign('application_status_id')->references('id')->on('application_statuses');

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
        Schema::dropIfExists('applications');
    }
}
