<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Teacher extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'teacher_details';

    protected $fillable = [
        'teacher_id',
        'teacher_identity_number',
        'gender',
        'qualification',
        'blood_group',
    ];

    public function getUsers() {
        return User::all();
    }

    public function findById($id) {

        return Teacher::where('id', $id)->first();
    }

    public function create($teacher_id) {
        $last_row = DB::table('teacher_details')->orderBy('id', 'desc')->first();
        $identityNumber = "PRO10000";
        if($last_row) {
            $identityNumber = "PRO1000". $last_row->id;
        }

        return Teacher::insert(
            array("teacher_id" => $teacher_id,
                "teacher_identity_number" => $identityNumber)
        );
    }

    public function updateDetail( array $data, $id) {

        return  Teacher::where('id', $id)->update(
            [
                'teacher_identity_number' => $data['teacher_identity_number'],
                'gender' => $data['gender'],
                'qualification' => $data['qualification'],
                'blood_group' => $data['blood_group']
            ]
        );
    }

    public function deleteById($id) {

        return DB::table('users')->where('id', $id)->delete();

    }
}
