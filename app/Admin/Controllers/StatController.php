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
        $grid->column('student_id', __('Student id'));
        $grid->column('exam_id', __('Exam id'));
        $grid->column('subject_id', __('Subject id'));
        $grid->column('exam_score', __('Exam score'));
        $grid->column('errors', __('Errors'));
        $grid->column('create_at', __('Create at'));
        $grid->column('update_at', __('Update at'));

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
        $show = new Show(StudentExamStat::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('student_id', __('Student id'));
        $show->field('exam_id', __('Exam id'));
        $show->field('subject_id', __('Subject id'));
        $show->field('exam_score', __('Exam score'));
        $show->field('errors', __('Errors'));
        $show->field('create_at', __('Create at'));
        $show->field('update_at', __('Update at'));

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

        $form->number('student_id', __('Student id'));
        $form->number('exam_id', __('Exam id'));
        $form->number('subject_id', __('Subject id'));
        $form->text('exam_score', __('Exam score'));
        $form->text('errors', __('Errors'));
        $form->datetime('create_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
