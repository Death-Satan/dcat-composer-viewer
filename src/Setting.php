<?php

namespace SaTan\Dcat\Extensions\ComposerViewer;

use Dcat\Admin\Extend\Setting as Form;
use Dcat\Admin\Widgets\Alert;

class Setting extends Form
{
    public function form()
    {
        \Admin::exit(Alert::make()->content($this->trans('setting.content'))->info());
    }

    public function title()
    {
        return $this->trans('setting.title');
    }
}
