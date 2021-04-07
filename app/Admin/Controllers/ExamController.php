<?php

namespace App\Admin\Controllers;

use App\Models\Exam;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ExamController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Exam';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Exam());

        $grid->column('exam_id', __('试卷ID'));
        $grid->column('exam_name', __('试卷名称'));
        $grid->column('description', __('试卷描述'));
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
        $show = new Show(Exam::findOrFail($id));

        $show->field('exam_id', __('试卷ID'));
        $show->field('exam_name', __('试卷名称'));
        $show->field('description', __('试卷描述'));
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
        $form = new Form(new Exam());

        $form->number('exam_id', __('试卷ID'));
        $form->text('exam_name', __('试卷名称'));
        $form->text('description', __('试卷描述'));
        $form->datetime('create_at', __('创建时间'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('更新时间'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
