<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('role:system_user', ['only'=>'index']);
    }
    public function index()
    {
        $result = Hospital::paginate(2);
        return view('multiauth::admin.system_user.hospital',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:hospitals',
            'phone' => 'required|unique:hospitals',
            'address' => 'required',
        ]);
         $inputs = $request->except('_token');
         $hospital = Hospital::create($inputs);
         return back()->with('status','✔ Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $id = \Crypt::decrypt($id);
        $result = Hospital::where('id',$id)->first();
        return view('multiauth::admin.system_user.hospitalEdit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $id = \Crypt::decrypt($id);
        $inputs = $request->except('_token');
        $hospital = Hospital::find(  $id  );
        //dd( $inputs) ; 
        $hospital->update($inputs);
     return back()->with('status','✔ Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $id = \Crypt::decrypt($id);
        $delete = Hospital::find($id);
        $delete->delete();
        return back()->with('status',"✔ REMOVED");
    }
}
