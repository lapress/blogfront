<?php

namespace App\Http\Controllers\Xml;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class SitemapTemplateController
{
    public function show()
    {
        return view('xml.google.template');
    }
}
