<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use vidyasmasani\ThroattleReferrerApp\Throattle;


class UserController extends Controller
{
    public function access(Request $request) {
        $throattle = new Throattle();
        return $throattle->greet($request);
    }
}
