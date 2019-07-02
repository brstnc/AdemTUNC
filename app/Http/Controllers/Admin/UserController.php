<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\User_Details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        if($id>0) {
            $entry = User::find($id);
        }
        return view('admin.user.form', compact('entry'));
    }

    public function save($id = 0)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $data = request()->only('name', 'email');
        $data['admin'] = request()->has('admin') ? 1 : 0;

        if ($id>0) {
            $entry = User::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()->route('admin.user');
    }
    public function user_detail()
    {
        return view('admin.user.user_detail');
    }
    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('admin.user');
    }
}
