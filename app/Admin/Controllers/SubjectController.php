<?php

namespace App\Admin\Controllers;

use App\Models\Subject;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SubjectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '班级';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Subject());

        $grid->column('subject_id', __('科目ID'));
        $grid->column('subject_name', __('科目名称'));
        $grid->column('description', __('科目描述'));

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
        $show = new Show(Subject::findOrFail($id));

        $show->field('subject_id', __('科目ID'));
        $show->field('subject_name', __('科目名称'));
        $show->field('description', __('科目描述'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Subject());

        $form->text('subject_name', __('科目名称'));
        $form->text('description', __('科目描述'));

        return $form;
    }
}
