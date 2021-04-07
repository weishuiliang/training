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
    protected $title = 'Subject';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Subject());

        $grid->column('subject_id', __('Subject id'));
        $grid->column('subject_name', __('Subject name'));
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
        $show = new Show(Subject::findOrFail($id));

        $show->field('subject_id', __('Subject id'));
        $show->field('subject_name', __('Subject name'));
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
        $form = new Form(new Subject());

        $form->number('subject_id', __('Subject id'));
        $form->text('subject_name', __('Subject name'));
        $form->text('description', __('Description'));
        $form->datetime('create_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
