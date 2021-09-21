<?php

namespace SaTan\Dcat\Extensions\ComposerViewer;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;

class DcatComposerViewerServiceProvider extends ServiceProvider
{
    protected $menu = [
        [
            'title'=>'composer viewer',
            'icon'=>'fa-street-view',
            'uri'=>'satan/dcat-composer-viewer'
        ]
    ];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();

		//

	}

	public function settingForm()
	{
		return new Setting($this);
	}
}
