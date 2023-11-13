<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
//            $table->uuid('id')->primary()->default(DB::raw('uuid_generate_v4()'));
//            $table->string('username')->default(20);
//            $table->string('password')->default(255);
//            $table->string('email')->default(255);
//            $table->timestamps();
//            $table->softDeletes();

            $table = [
                'id' => [
                    'type' => 'uuid',
                    'primary' => true,
                    'default' => DB::raw('uuid_generate_v4()'),
                ],
                'username' => [
                    'type' => 'string',
                    'default' => 20,
                ],
                'password' => [
                    'type' => 'string',
                    'default' => 255,
                ],
                'email' => [
                    'type' => 'string',
                    'default' => 255,
                ],
                'created_at' => 'timestamps',
                'updated_at' => 'timestamps',
                'deleted_at' => 'softDeletes',
            ];
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
