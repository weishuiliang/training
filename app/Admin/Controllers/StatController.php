<?php

namespace App\Admin\Controllers;

use App\Models\Exam;
use App\Models\Student;
use App\Models\StudentExamStat;
use App\Models\Subject;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StatController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '学生考试成绩';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $studentArray = Student::query()->pluck('name', 'student_id')->toArray();
        $examArray = Exam::query()->pluck('exam_name','exam_id')->toArray();
        $subjectArray = Subject::query()->pluck('subject_name','subject_id')->toArray();


        $grid = new Grid(new StudentExamStat());

        $grid->column('id', __('Id'));
        $grid->column('student_id', __('学生'))->using($studentArray);
        $grid->column('exam_id', __('试卷'))->using($examArray);
        $grid->column('subject_id', __('科目'))->using($subjectArray);
        $grid->column('exam_score', __('考试分数'));
        $grid->column('errors', __('错题，用逗号隔开'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $studentArray = Student::query()->pluck('name', 'student_id')->toArray();
        $examArray = Exam::query()->pluck('exam_name','exam_id')->toArray();
        $subjectArray = Subject::query()->pluck('subject_name','subject_id')->toArray();

        $show = new Show(StudentExamStat::query()->findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('student_id', __('学生ID'))->using($studentArray);
        $show->field('exam_id', __('试卷ID'))->using($examArray);
        $show->field('subject_id', __('科目ID'))->using($subjectArray);
        $show->field('exam_score', __('考试分数'));
        $show->field('errors', __('错题，用逗号隔开'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $studentArray = Student::query()->pluck('name', 'student_id')->toArray();
        $examArray = Exam::query()->pluck('exam_name','exam_id')->toArray();
        $subjectArray = Subject::query()->pluck('subject_name','subject_id')->toArray();

        $form = new Form(new StudentExamStat());

        $form->select('student_id', __('学生ID'))->options($studentArray)
        ->rules("required", ["请选择学生"]);

        $form->select('exam_id', __('试卷ID'))->options($examArray)
        ->rules("required", ["请选择考卷"]);

        $form->select('subject_id', __('科目ID'))->options($subjectArray)
        ->rules("required", ["请选择科目"]);

        $form->text('exam_score', __('考试分数'));

        $form->textarea('errors', __('错题，用逗号隔开'))
        ->rules("required", ["请填写错题"]);


        return $form;
    }
}
