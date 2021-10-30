<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Deportment extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'deportment';

    protected $fillable = [
        'name',
    ];

    public function getDeportment() {
        return Deportment::all();
    }

    public function findById($id) {

        return Deportment::where('id', $id)->first();
    }

    public function create($data) {
        return Deportment::insert(
            array($data)
        );
    }

    public function updateDetail( array $data, $id) {

        return  Deportment::where('id', $id)->update(
            [
                'name' => $data['name'],
            ]
        );
    }

    public function deleteById($id) {

        return DB::table('deportment')->where('id', $id)->delete();

    }
}
