<?php

namespace App\Admin\Controllers;

use App\Models\StudentExamStat;
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
    protected $title = 'StudentExamStat';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new StudentExamStat());

        $grid->column('id', __('Id'));
        $grid->column('student_id', __('学生ID'));
        $grid->column('exam_id', __('试卷ID'));
        $grid->column('subject_id', __('科目ID'));
        $grid->column('exam_score', __('考试分数'));
        $grid->column('errors', __('错题，用逗号隔开'));
        $grid->column('create_at', __('创建时间'));
        $grid->column('update_at', __('更新时间'));

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
        $show = new Show(StudentExamStat::query()->findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('student_id', __('学生ID'));
        $show->field('exam_id', __('试卷ID'));
        $show->field('subject_id', __('科目ID'));
        $show->field('exam_score', __('考试分数'));
        $show->field('errors', __('错题，用逗号隔开'));
        $show->field('create_at', __('创建时间'));
        $show->field('update_at', __('更新时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new StudentExamStat());

        $form->number('student_id', __('学生ID'));
        $form->number('exam_id', __('试卷ID'));
        $form->number('subject_id', __('科目ID'));
        $form->text('exam_score', __('考试分数'));
        $form->text('errors', __('错题，用逗号隔开'));
        $form->datetime('create_at', __('创建时间'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('更新时间'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
