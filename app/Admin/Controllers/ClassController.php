<?php

namespace App\Admin\Controllers;

use App\Models\Classes;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ClassController extends AdminController
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
        $grid = new Grid(new Classes());

        $grid->column('class_id', __('班级ID'));
        $grid->column('class_name', __('班级名称'));
        $grid->column('description', __('班级描述'));

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
        $show = new Show(Classes::query()->findOrFail($id));

        $show->field('class_id', __('班级ID'));
        $show->field('class_name', __('班级名称'));
        $show->field('description', __('班级描述'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Classes());

        $form->text('class_name', __('班级名称'));
        $form->text('description', __('班级描述'));

        return $form;
    }
}
