<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\User_Details;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $list = User::orderbyDesc('created_at')->paginate(8);
        return view('admin.user.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new User;
        if ($id > 0) {
            $entry = User::find($id);
        }
        return view('admin.user.form', compact('entry'));
    }

    public function save(Request $request, $id = 0)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);


        $entry = User::where('id', $id)->firstOrFail();
        $entry['admin'] = request()->has('admin') ? 1 : 0;
        $entry->update();


        return redirect()->route('admin.user');
    }

    public function user_detail_get()
    {

        $user = User::find(auth()->id());
        return view('admin.user.user_detail', compact('user'));
    }

    public function user_detail_post(Request $request)
    {
        $user = User::find(auth()->id());
        $user->name = $request->name;
        if (Input::get('password') == '') {
            $user->name = Input::get('name');
            $user->email = Input::get('email');
        } else {
            $this->validate($request, [
                'password' => 'required|min:6|confirmed',
            ]);
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
        }

        $user->saveOrFail();

        $detail = UserDetail::where('user_id', auth()->id())->first();

        $detail->content = $request->content;

        if ($request->hasFile('user_img')) {
            $file = $request->user_img;
            $name = time() . '.jpg';
            $file->move('images/user/', $name);
            $adres = '/images/user' . '/' . $name;
            $detail->user_img = $adres;
        }
        $detail->saveOrFail();

        return redirect()->route('admin.user.detail');
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('admin.user');
    }
}
