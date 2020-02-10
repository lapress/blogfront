<?php

namespace App\Http\Controllers\Xml;

use LaPress\WordPress\Routing\Http\Controllers\TemplateController;

class RSSController extends TemplateController
{
    public function index()
    {
        return $this->script()->run('index.php');
    }
}
