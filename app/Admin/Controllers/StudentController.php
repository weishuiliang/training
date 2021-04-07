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

        $grid->column('student_id', __('学生ID'));
        $grid->column('class_id', __('班级ID'));
        $grid->column('name', __('姓名'));
        $grid->column('age', __('年龄'));
        $grid->column('sex', __('性别'));
//        $grid->column('avatar', __('头像'));
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
        $show = new Show(Student::findOrFail($id));

        $show->field('student_id', __('学生ID'));
        $show->field('class_id', __('班级ID'));
        $show->field('name', __('姓名'));
        $show->field('age', __('年龄'));
        $show->field('sex', __('性别'));
//        $show->field('avatar', __('头像'));
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
        $form = new Form(new Student());

        $form->number('student_id', __('学生ID'));
        $form->number('class_id', __('班级ID'));
        $form->text('name', __('姓名'));
        $form->text('age', __('年龄'));
        $form->switch('sex', __('性别'))->default(1);
        $form->image('avatar', __('头像'));
        $form->datetime('create_at', __('创建时间'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('更新时间'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
