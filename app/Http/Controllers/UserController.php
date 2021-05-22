<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function unsubscribe(Request $request)
    {
        $data = User::find($request->input('user_id'));
        $data->events()->detach($request->input('id'));

        if ($data) {
            return redirect()->route('event.index')
                ->with('success', 'Вы успешно отказались');
        }
    }
    public function join(Request $request)
    {

        $data = User::find(Auth::user()->id);
//        dd($data);
        $data->events()->attach($request->input('id'));

        if ($data) {
            return redirect()->route('event.index')
                ->with('success', 'Вы успешно записались');
        }
    }
}
