<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ShowPage extends Controller
{
    public function __invoke($pageTitle) {
        // jeigu view su pavadinimu $pageTitle egzistuoja, jį išvedam
        if (View::exists($pageTitle)) {
            return view($pageTitle);
        }

        // kitu atveju, metam 404 klaidos puslapį
        abort(404);
    }
}
