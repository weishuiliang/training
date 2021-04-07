<?php

namespace App\Admin\Controllers;

use App\Models\Student;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StudentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Student';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Student());

        $grid->column('student_id', __('Student id'));
        $grid->column('class_id', __('Class id'));
        $grid->column('name', __('Name'));
        $grid->column('age', __('Age'));
        $grid->column('sex', __('Sex'));
        $grid->column('avatar', __('Avatar'));
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
        $show = new Show(Student::findOrFail($id));

        $show->field('student_id', __('Student id'));
        $show->field('class_id', __('Class id'));
        $show->field('name', __('Name'));
        $show->field('age', __('Age'));
        $show->field('sex', __('Sex'));
        $show->field('avatar', __('Avatar'));
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
        $form = new Form(new Student());

        $form->number('student_id', __('Student id'));
        $form->number('class_id', __('Class id'));
        $form->text('name', __('Name'));
        $form->text('age', __('Age'));
        $form->switch('sex', __('Sex'))->default(1);
        $form->image('avatar', __('Avatar'));
        $form->datetime('create_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
