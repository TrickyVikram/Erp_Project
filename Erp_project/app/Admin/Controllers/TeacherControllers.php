<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Teacher;

class TeacherControllers extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Teacher';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Teacher());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('user_id'));
        $grid->column('name', __('Name'));
        $grid->column('emp_id', __('Emp id'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('dept', __('Dept'));
        $grid->column('address', __('Address'));
        $grid->column('image')->image();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Teacher::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('user_id'));
        $show->field('name', __('Name'));
        $show->field('emp_id', __('Emp id'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('dept', __('Dept'));
        $show->field('address', __('Address'));
        $show->field('image', __('Image'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Teacher());

        $form->text('name', __('Name'));
        $form->text('emp_id', __('Emp id'));
        $form->email('email', __('Email'));
        $form->phonenumber('phone', __('Phone'));
        $form->text('dept', __('Dept'));
        $form->text('address', __('Address'));
        $form->image('image', __('Image'));

        return $form;
    }
}
