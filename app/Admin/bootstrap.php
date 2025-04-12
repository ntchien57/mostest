<?php
/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
Encore\Admin\Form::forget(['map', 'editor']);
//custome template admin
// app('view')->prependNamespace('admin', resource_path('views/admin'));
use App\Admin\Extensions\Column\Expands;
use App\Admin\Extensions\Form\CKEditor;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid\Column;

Column::extend('expand', Expands::class);

Form::extend('ckeditor', CKEditor::class);
//end Ckeditor
Admin::js('/js/extent.js');
Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {

});
