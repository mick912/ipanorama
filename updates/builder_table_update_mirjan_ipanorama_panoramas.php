<?php namespace Mirjan\Ipanorama\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMirjanIpanoramaPanoramas extends Migration
{
    public function up()
    {
        Schema::table('mirjan_ipanorama_panoramas', function($table)
        {
            $table->text('desc')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('mirjan_ipanorama_panoramas', function($table)
        {
            $table->dropColumn('desc');
        });
    }
}
