<?php

use SaTan\Dcat\Extensions\ComposerViewer\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::resource('satan/dcat-composer-viewer', Controllers\DcatComposerViewerController::class);
