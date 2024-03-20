<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Labels extends Model
{
    use HasFactory;

    protected $table = 'labels';
    protected $guarded = false;

}


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use App\Models\Entities;

use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('entities')->insert([
            ['type' => 'user'],
            ['type' => 'campaign'],
            ['type' => 'site']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('entities')->whereIn('type', ['user', 'company', 'site'])->delete();
    }
};
