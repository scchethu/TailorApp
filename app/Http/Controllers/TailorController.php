<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Tailor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TailorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function __construct()
{
    $this->middleware('auth');

}

    public function index()
    {
        if(!Auth::user()->can('admin'))
        {
            return redirect('/') ;
        }
        $users  = Tailor::all();
        return view('tailor.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('tailor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requests = $request->all();

        return redirect()->route('tailors.index');
    }

    public function approve($id)
    {
        $user = User::find($id);
        $user->is_verified =true;
        $user->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Tailor::find($id);
        return view('tailor.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Tailor::find($id);
        return view('tailor.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function AddWork(Request $request)
    {
        $requests = $request->all();
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $destinationPath = 'work';
            $path  = $file->move($destinationPath,$file->getClientOriginalName());
            $requests['media_url'] = $path->getPathname();
            Media::create($requests);
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $requests = $request->all();
        $tailor  = Tailor::find($id);
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $destinationPath = 'uploads';
            $path  = $file->move($destinationPath,$file->getClientOriginalName());
            $requests['photo_url'] = $path->getPathname();
        }


        $tailor->update($requests);

        return redirect()->route('tailors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
