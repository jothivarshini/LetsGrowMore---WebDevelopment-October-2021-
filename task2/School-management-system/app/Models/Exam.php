<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Exam extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'exams';

    protected $fillable = [
        'name',
    ];

    public function getExams() {
        return Exam::all();
    }

    public function findById($id) {

        return Exam::where('id', $id)->first();
    }

    public function create($data) {
        return Exam::insert(
            array($data)
        );
    }

    public function updateDetail( array $data, $id) {

        return  Exam::where('id', $id)->update(
            [
                'name' => $data['name'],
            ]
        );
    }

    public function deleteById($id) {

        return DB::table('exams')->where('id', $id)->delete();

    }
}
