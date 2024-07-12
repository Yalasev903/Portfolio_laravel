<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElfinderController extends Controller
{
    /**
     * Show the elFinder popup.
     *
     * @param  string  $input_id
     * @return \Illuminate\View\View
     */
    public function showPopup($input_id)
    {
        return view('vendor.elfinder.standalonepopup', compact('input_id'));
    }
}
