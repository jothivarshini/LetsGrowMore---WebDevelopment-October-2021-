<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Subject extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'subjects';

    protected $fillable = [
        'name',
        'subject_code'
    ];

    public function getSubjects() {
        return Subject::all();
    }

    public function findById($id) {

        return Subject::where('id', $id)->first();
    }

    public function create($data) {
        return Subject::insert(
            array($data)
        );
    }

    public function updateDetail( array $data, $id) {

        return  Subject::where('id', $id)->update(
            [
                'name' => $data['name'],
                'subject_code' => $data['subject_code'],
            ]
        );
    }

    public function deleteById($id) {

        return DB::table('subjects')->where('id', $id)->delete();

    }
}
