<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Result extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'result';

    protected $fillable = [
        'batch_id',
        'student_id',
        'exam_id',
        'subject_id',
        'mark',
    ];

    public function getResult($batch_id, $deportment_id, $student_id, $exam_id) {
        return DB::table('result')
            ->select('result.mark as mark','subjects.name as name','subjects.subject_code as subject_code')
            ->join('subjects', 'subjects.id', '=', 'result.subject_id')
            ->where(array('batch_id' => $batch_id, 'deportment_id' => $deportment_id, 'student_id' => $student_id, 'exam_id' => $exam_id))
            ->get();
    }

    public function findById($id) {

        return Exam::where('id', $id)->first();
    }

    public function create($data) {
        return Result::insert(
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
