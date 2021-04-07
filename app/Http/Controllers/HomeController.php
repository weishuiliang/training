<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\Exam;
use App\Models\Student;
use App\Models\StudentExamStat;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function index()
    {
//        $db = DB::connection();
//
//        var_export($db);

//        $info = Student::query()->get()->toArray();

        $info = StudentExamStat::query()->get()->toArray();


        var_dump($info);
    }
}
