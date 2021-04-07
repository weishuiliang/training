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
    protected $title = '考卷';

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

        $form->text('exam_name', __('试卷名称'));
        $form->text('description', __('试卷描述'));

        return $form;
    }
}
