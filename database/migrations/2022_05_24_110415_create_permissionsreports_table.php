
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreatePermissionsreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissionsreports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100)->nullable();
            $table->string('motivo',100)->nullable();
            $table->string('status',5)->nullable();
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
        Schema::dropIfExists('permissionsreports');
    }
}
