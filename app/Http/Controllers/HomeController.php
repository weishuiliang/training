<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Exam;
use App\Models\Student;
use App\Models\StudentExamStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    /**
     * 班级分数排行
     *
     * @author wsl
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function classScore()
    {
        $list = Classes::query()->select('class_id', 'class_name')->get()->toArray();
        foreach ($list as &$item) {
            $item['score'] = StudentExamStat::query()
                ->selectRaw('sum(exam_score) as score')
                ->where('class_id', $item['class_id'])
                ->groupBy('exam_id', 'class_id')
                ->orderBy('class_id')
                ->pluck('score')
                ->toArray();

        }

        $examNameArray = Exam::query()->pluck('exam_name')->toArray();
        $examNameJson = json_encode($examNameArray, JSON_UNESCAPED_UNICODE);

        return view('curve', ['list' => $list, 'exam_name_json' => $examNameJson]);
    }

    /**
     * 个人分数趋势
     *
     * @author wsl
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function personScoreTrend(Request $request)
    {
        $params = $request->input();

        $scoreArray = [];

        $examNameArray = Exam::query()->pluck('exam_name')->toArray();
        $examNameJson = json_encode($examNameArray, JSON_UNESCAPED_UNICODE);

        $studentSelect = Student::query()->pluck('name', 'student_id')->toArray();
        $firstStudentId = array_key_first($studentSelect);

        $currentStudentId = $params['student_id'] ?? $firstStudentId;

        $exam = Exam::query()->select('exam_id', 'exam_name')->get()->toArray();
        foreach ($exam as &$item) {
            $scoreArray[] = StudentExamStat::query()
                    ->selectRaw('sum(exam_score) as score')
                    ->where('exam_id', $item['exam_id'])
                    ->where('student_id', $currentStudentId)
                    ->value('score') ?? 0;
        }

        return view('columnar', [
            'exam_name_json' => $examNameJson,
            'data' => $scoreArray,
            'student_select' => $studentSelect,
            'current_student_id' => $currentStudentId,
            'current_student_name' => $studentSelect[$currentStudentId],
            'url' => 'person-score-trend',
            'title' => '学生分数趋势',
            'ytitle' => '分数'
        ]);
    }

    public function personErrorTrend(Request $request)
    {
        $params = $request->input();

        $errorCountArray = [];

        $examNameArray = Exam::query()->pluck('exam_name')->toArray();
        $examNameJson = json_encode($examNameArray, JSON_UNESCAPED_UNICODE);

        $studentSelect = Student::query()->pluck('name', 'student_id')->toArray();
        $firstStudentId = array_key_first($studentSelect);

        $currentStudentId = $params['student_id'] ?? $firstStudentId;

        $exam = Exam::query()->select('exam_id', 'exam_name')->get()->toArray();
        foreach ($exam as &$item) {
            $errors = StudentExamStat::query()
                ->where('exam_id', $item['exam_id'])
                ->where('student_id', $currentStudentId)
                ->value('errors') ?? 0;
            $errorCountArray[] = count(array_filter(explode(',', $errors)));
        }

        return view('columnar', [
            'exam_name_json' => $examNameJson,
            'data' => $errorCountArray,
            'student_select' => $studentSelect,
            'current_student_id' => $currentStudentId,
            'current_student_name' => $studentSelect[$currentStudentId],
            'url' => 'person-error-trend',
            'title' => '学生错题趋势',
            'ytitle' => '错题数'
        ]);
    }


    public function examError(Request $request)
    {
        $tmpArr = $data = [];
        $total = 0;

        $params = $request->input();
        $examSelect = Exam::query()->select('exam_id', 'exam_name')->get()->toArray();

        $currentExamId = $params['exam_id'] ?? current($examSelect)['exam_id'];

        $list = StudentExamStat::query()
            ->where('exam_id', $currentExamId)
            ->pluck('errors')
            ->toArray();

        foreach ($list as $item) {
            $errorArray = explode(',', $item);
            foreach ($errorArray as $error) {
                $total += 1;
                if (isset($tmpArr[$error])) {
                    $tmpArr[$error]  += 1;
                } else {
                    $tmpArr[$error] = 1;
                }
            }
        }
        if ($total > 0) {
            foreach ($tmpArr as $tmpKey => $tmpVal) {
                $data[] = ["第" . $tmpKey . "道题", round($tmpVal / $total, 2)];
            }
        }

//        [["IE",26.8],["Safari",8.5],["Opera",6.2],["其他",0.7]]
        return view('circle',[
            'title' => current($examSelect)['exam_name'] ."试卷错题分布",
            'data' => json_encode($data, JSON_UNESCAPED_UNICODE),
            'url' => 'exam-error',
            'exam_select' => $examSelect,
            'current_exam_id' => $currentExamId
        ]);
    }


}
