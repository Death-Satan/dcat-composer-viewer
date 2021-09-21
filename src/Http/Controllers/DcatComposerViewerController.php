<?php

namespace SaTan\Dcat\Extensions\ComposerViewer\Http\Controllers;

use Composer\InstalledVersions;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Alert;
use SaTan\Dcat\Extensions\ComposerViewer\DcatComposerViewerServiceProvider;
use SaTan\Dcat\Extensions\ComposerViewer\Http\Repositories\Composer;

class DcatComposerViewerController extends AdminController
{


    protected function title()
    {
        return $this->trans(__FUNCTION__);
    }

    protected function description()
    {
        return $this->trans(__FUNCTION__); // TODO: Change the autogenerated stub
    }

    protected function trans($key, $replace = [], $locale = null)
    {
        return DcatComposerViewerServiceProvider::trans('controller.'.$key,$replace,$locale); // TODO: Change the autogenerated stub
    }

    public function grid():Grid
    {
        return Grid::make(new Composer(),function (Grid $grid){

            $grid->disableBatchDelete();
            $grid->showActions(false);
            $grid->disableCreateButton();
            $grid->disableBatchActions();

            $grid->column('package_name',$this->trans('fields.package_name'))
                ->copyable()
                ->label('info');
            $grid->column('type',$this->trans('fields.type'));
            $grid->column('pretty_version',$this->trans('fields.pretty_version'));
            $grid->column('install_path',$this->trans('fields.install_path'));

            $grid->filter(function (Grid\Filter $filter){
                $filter->panel();
                $filter->like('package_name',$this->trans('fields.package_name'));
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id): Show
    {
        return Show::make($id,new Composer(),function (Show $show){
                $show->field('package_name',$this->trans('fields.package_name'));
                $show->field('type',$this->trans('fields.type'));
                $show->field('pretty_version',$this->trans('fields.pretty_version'));
                $show->field('install_path',$this->trans('fields.install_path'));
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        \Admin::exit(Alert::make()->title($this->trans('form.title'))
                        ->content($this->trans('form.content')));
    }
}