<?php

namespace App\Http\Controllers;

use LaPress\Database\Models\User;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class AuthorsController extends Controller
{
    /**
     * @return array
     */
    public function index()
    {
        return [];
    }

    /**
     * @param string $nickname
     * @return string[]
     */
    public function show(string $nickname)
    {
        return User::byName($nickname);
    }
}
