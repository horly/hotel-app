<?php

namespace App\Http\Controllers;

use App\Repository\ConnectionHistoryRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    protected $request;
    protected $connectHistory;

    function __construct(Request $request, ConnectionHistoryRepo $connectHistory)
    {
        $this->request = $request;
        $this->connectHistory = $connectHistory;
    }

    public function loginHistory()
    {
        $user = Auth::user();

        $histories = $this->connectHistory->getHistoryByUser($user->id);

        return view('app.auth.login-histoty', compact('histories'));
    }
}
