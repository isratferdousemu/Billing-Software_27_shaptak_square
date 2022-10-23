<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
        DB::table('admins')->insert([
            ['name' => 'Admin',
             'email' => 'admin@xyz.com',
             'password' => bcrypt('adminadmin')] ,
 ['name' => 'Operator',
             'email' => 'operator@xyz.com',
             'password' => bcrypt('operator')] ,

 ['name' => 'User',
             'email' => 'user@xyz.com',
             'password' => bcrypt('useruser')] ,

            
            
         ]
     );
 
    } 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
