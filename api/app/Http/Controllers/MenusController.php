<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use LaPress\Database\Models\Menu;

class MenusController extends Controller
{
    /**
     * @param string  $slug
     * @return mixed
     */
    public function show(string $slug)
    {
        $menu = Menu::location($slug)->first();

        return response()->json([
            'key'   => $slug,
            'items' => $menu ?? [],
        ], empty($menu) ? Response::HTTP_NOT_FOUND : Response::HTTP_OK);
    }
}
