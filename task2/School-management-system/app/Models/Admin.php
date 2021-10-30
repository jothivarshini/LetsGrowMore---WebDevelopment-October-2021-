<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admin_details';

    protected $fillable = [
        'admin_id',
        'admin_identity_number',
    ];

    public function getStudents() {
        return Student::all();
    }

    public function findById($id) {

        return User::where('id', $id)->first();
    }

    public function create($admin_id) {
        $last_row = DB::table('admin_details')->orderBy('id', 'desc')->first();
        $identityNumber = "AD10000";
        if($last_row) {
            $identityNumber = "AD1000". $last_row->id;
        }

        return Admin::insert(
            array("admin_id" => $admin_id,
                "admin_identity_number" => $identityNumber)
        );
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
