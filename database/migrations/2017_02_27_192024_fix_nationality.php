<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;
use App\Models\Student;

class FixNationality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE students CHANGE nationality tmp_nationality enum('AT','BE','BG','HR','CY','CZ','DK','EE','FI','FR','DE','GR','HU','IE','IT','LV','LT','LU','MT','NL','PL','PT','RO','SK','SI','SP','SE','UK')");

        Schema::table('students', function (Blueprint $table) {
            $table->enum('nationality', Student::$nationalities)->nullable();
        });

        $all=DB::table('students')->get();

        foreach ($all as $item) {
            if ($item->tmp_nationality != 'SP') {
                DB::table('students')->where('id', $item->id)->update(['nationality'=>$item->tmp_nationality]);
            } elseif ($item->tmp_nationality == 'UK') {
                DB::table('students')->where('id', $item->id)->update(['nationality'=>'GB']);
            } else {
                DB::table('students')->where('id', $item->id)->update(['nationality'=>'ES']);
            }
        }
        DB::statement("ALTER TABLE students DROP COLUMN tmp_nationality");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $prevNationalities = ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'SP', 'SE', 'UK'];

        DB::statement("ALTER TABLE students CHANGE nationality tmp_nationality enum('AT','BE','BG','HR','CY','CZ','DK','EE','FI','FR','DE','GR','HU','IE','IT','LV','LT','LU','MT','NL','PL','PT','RO','SK','SI','ES','SE','UK')");

        Schema::table('students', function (Blueprint $table) use ($prevNationalities) {
            $table->enum('nationality', $prevNationalities)->nullable();
        });

        $all=DB::table('students')->get();

        foreach ($all as $item) {
            if ($item->tmp_nationality != 'ES') {
                DB::table('students')->where('id', $item->id)->update(['nationality'=>$item->tmp_nationality]);
            } elseif ($item->tmp_nationality == 'GB') {
                DB::table('students')->where('id', $item->id)->update(['nationality'=>'UK']);
            } else {
                DB::table('students')->where('id', $item->id)->update(['nationality'=>'SP']);
            }
        }
        DB::statement("ALTER TABLE students DROP COLUMN tmp_nationality");
    }
}
