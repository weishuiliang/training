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
    protected $title = 'Classes';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Classes());

        $grid->column('class_id', __('Class id'));
        $grid->column('class_name', __('Class name'));
        $grid->column('description', __('Description'));
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
        $show = new Show(Classes::findOrFail($id));

        $show->field('class_id', __('Class id'));
        $show->field('class_name', __('Class name'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Classes());

        $form->number('class_id', __('Class id'));
        $form->text('class_name', __('Class name'));
        $form->text('description', __('Description'));
        $form->datetime('create_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
