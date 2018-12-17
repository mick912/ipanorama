<?php namespace Mirjan\Ipanorama\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMirjanIpanoramaPanoramas extends Migration
{
    public function up()
    {
        Schema::create('mirjan_ipanorama_panoramas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mirjan_ipanorama_panoramas');
    }
}
