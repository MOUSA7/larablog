<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth',['except'=>['edit','show']]);
        $this->middleware('admin',['except'=>['show','edit','update']]);
    }


    public function index()
    {
        $users = User::latest()->get();
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.index',compact('users','roles'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();
        if ($file = $request->file('photo_id')){
            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name,'title'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        if ( $resume =$request->file('resume')){
            $fileName = time().'_'.$resume->getClientOriginalName();
            $filePath = $resume->storeAs('uploads', $fileName, 'public');
            $photo = Photo::create(['file'=>$fileName,'title'=>'/storage/' . $filePath]);
            $input['resume'] = $photo->file;
        }

        $input['password'] = bcrypt($request->password);
        $user->create($input);
        Alert::success('Successful Created', 'Your Created User Successfully Now !');
        return redirect('admin/users');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $user = User::whereName($name)->first();
//        dd(random_bytes(2));
//        dd(random_int(7550,9787));
        $roles = Role::pluck('name','id');
        return view('admin.users.show',compact('user','roles'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $user = User::whereName($name)->first();
        $roles = Role::pluck('name','id');
        if (\auth()->user()->id == $user->id OR \auth()->user()->role->id == 1){
//            dd($user->role->id);
        return view('admin.users.edit',compact('user','roles'));
        }else{
            abort('403');
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $name)
    {

        $user = User::findOrFail($name);

        if (trim($request->password) == ''){
            $inputs =$request->except('password');
        }else{
        $inputs = $request->all();
        $inputs['password'] = bcrypt($request->password);
        }
        if ($file = $request->file('photo_id')) {
            if (file_exists('images/' . $user->photo->file)) {
                unlink('images/' . $user->photo->file);
                $user->photo()->delete();
            }
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name, 'title' => $name]);
            $inputs['photo_id'] = $photo->id;
        }

//        $inputs['resume'] = $request->file('resume')->store('public/uploads');

        if ($resume = $request->file('resume')) {
            $fileName = time() . '_' . $resume->getClientOriginalName();
            $filePath = $resume->storeAs('uploads', $fileName, 'public');
            $photo = Photo::create(['file' => $fileName, 'title' => '/storage/' . $filePath]);
            $inputs['resume'] = $photo->file;
        }
//        dd($inputs);
        if ($request->is_edit) {
            $user = User::findOrFail($name)->update($inputs);
            Alert::success('Successful Updated', 'Your Updated User Successfully Now !');
            return redirect()->back();
        }
        $user->update($inputs);
        Alert::success('Successful Updated', 'Your Updated User Successfully Now !');

        return redirect('/admin/users');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Successful Deleted', 'Your Deleted User Successfully Now !');
        return redirect('admin/users');
        //
    }

}
