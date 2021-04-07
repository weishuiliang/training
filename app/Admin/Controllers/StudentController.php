<?php

namespace App\Admin\Controllers;

use App\Models\Classes;
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
    protected $title = '学生';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $classListArray = Classes::query()->pluck('class_name','class_id')->toArray();

        $grid = new Grid(new Student());

        $grid->column('student_id', __('学生ID'));
        $grid->column('class_id', __('班级ID'))->using($classListArray);
        $grid->column('name', __('姓名'));
        $grid->column('age', __('年龄'));
        $grid->column('sex', __('性别'))->radio([ 1 =>'男', 2 => '女']);

//        $grid->column('avatar', __('头像'));

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
        $show = new Show(Student::query()->findOrFail($id));

        $show->field('class_id', __('班级ID'));
        $show->field('name', __('姓名'));
        $show->field('age', __('年龄'));
        $show->field('sex', __('性别'));
//        $show->field('avatar', __('头像'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $class = Classes::query()->get()->pluck('class_name', 'class_id')->toArray();


        $form = new Form(new Student());

        $form->select('class_id', __('班级ID'))
            ->options($class);

        $form->text('name', __('姓名'));
        $form->text('age', __('年龄'));


        $states = [
            'on'  => ['value' => 1, 'text' => '男', 'color' => 'success'],
            'off' => ['value' => 2, 'text' => '女', 'color' => 'success'],
        ];
        $form->switch('sex', __('性别'))->states($states);
//        $form->image('avatar', __('头像'));

        return $form;
    }
}
