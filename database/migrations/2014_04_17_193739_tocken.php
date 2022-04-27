<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tocken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('tocken');
            $table->timestamp('uso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }

    public function Consumir(request $request){
        $Token = Token::where("tocken", $request->token)->get()[0];
        if($Token->uso != null){
            return "Este Token ya ha sido utilizado.";
        }
        else{
            $Token->uso = date('y-m-d');
            $Token->save();
            return $Token;
        }
    }
}
