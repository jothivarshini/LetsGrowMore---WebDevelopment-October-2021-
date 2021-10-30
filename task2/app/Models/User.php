<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsers() {
        return User::all();
    }

    public function getAllTeachers() {
        return DB::table('users')
            ->join('teacher_details', 'users.id', '=', 'teacher_details.teacher_id')
            ->get();
    }

    public function getAllStudents() {
        return DB::table('users')
            ->select('student_details.id as id',
                'student_details.student_identity_number as student_identity_number',
                'student_details.gender as gender',
                'student_details.blood_group as blood_group',
                'student_details.father_name as father_name','student_details.number as number',
                'users.name as name', 'users.email as email',
                'batch.name as batch_name', 'deportment.name as deportment_name'
            )
            ->join('student_details', 'users.id', '=', 'student_details.student_id')
            ->leftJoin('batch', 'batch.id', '=', 'student_details.batch')
            ->leftJoin('deportment', 'deportment.id', '=', 'student_details.deportment')
            ->get();
    }

    public function getUsersCount() {
        return User::all()->count();
    }

    public function getAdminCount() {
        return DB::table('users')
            ->join('admin_details', 'users.id', '=', 'admin_details.admin_id')
            ->count();
    }

    public function getTeachersCount() {
        return DB::table('users')
            ->join('teacher_details', 'users.id', '=', 'teacher_details.teacher_id')
            ->count();
    }

    public function getStudentsCount() {
        return DB::table('users')
            ->join('student_details', 'users.id', '=', 'student_details.student_id')
            ->count();
    }

    public function findById($id) {

        return User::where('id', $id)->first();
    }

    public function create($data) {
        return DB::table('users')->insertGetId($data);
    }

    public function updateDetail( array $data, $id) {

        return  User::where('id', $id)->update(
            [
                'name' => $data['name'],
                'type' => $data['type'],
                'email' => $data['email'],
            ]
        );
    }

    public function deleteById($id) {

        return DB::table('users')->where('id', $id)->delete();

    }
}
