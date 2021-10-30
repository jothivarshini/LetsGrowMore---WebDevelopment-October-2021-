<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'student_details';

    protected $fillable = [
        'student_id',
        'student_identity_number',
        'father_name',
        'gender',
        'blood_group',
        'batch',
        'deportment',
    ];

    public function getStudents() {
        return Student::all();
    }

    public function findById($id) {

        return Student::where('id', $id)->first();
    }

    public function create($student_id) {
        $last_row = DB::table('student_details')->orderBy('id', 'desc')->first();
        $identityNumber = "STD10000";
        if($last_row) {
            $identityNumber = "STD1000". $last_row->id;
        }

        return Student::insert(
            array("student_id" => $student_id,
                "student_identity_number" => $identityNumber)
        );
    }

    public function updateDetail( array $data, $id) {

        return  Student::where('id', $id)->update(
            [
                'student_identity_number' => $data['student_identity_number'],
                'father_name' => $data['father_name'],
                'gender' => $data['gender'],
                'number' => $data['number'],
                'address' => $data['address'],
                'blood_group' => $data['blood_group'],
                'deportment' => $data['deportment'],
                'batch' => $data['batch']
            ]
        );
    }

    public function deleteById($id) {
        return DB::table('student_details')->where('id', $id)->delete();
    }

    public function findByDeportment($dep, $batch) {
        return DB::table('student_details')->where(array('deportment' => $dep, 'batch' => $batch))->get();
    }
}
