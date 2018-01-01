<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Storage;


use App\Models\AboutModel;

class MasterAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $getData['listData'] = AboutModel::get();
        return view('Admin_view/MasterAboutView',$getData);
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
        $getData = Input::all();
        $this->validate($request,[
            'content' => 'required'
        ]);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // mengambil hanya filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // mengambil hanya ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // file untuk store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $insert = new AboutModel;
        $insert->content = $request['content'];
        $insert->image = $fileNameToStore;
        $insert->save();

        return redirect(route('master.about'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('Admin_view/FormAbout');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
       $getData = Input::get('id');
       $getEx['accept'] = AboutModel::where('id_about',$getData)->get()->toArray();
       
       return view('Admin_view/FormAbout',$getEx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        $getData = Input::all();
        $this->validate($request,[
            'content' => 'required'
        ]);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // mengambil hanya filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // mengambil hanya ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // file untuk store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }

        $getUpdate = AboutModel::find( $request->input('id'));
        $getUpdate->content = $getData['content'];
        if($request->hasFile('image')){
            $getUpdate->image = $fileNameToStore;
        }
        $getUpdate->save();
        return redirect(route('master.about'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_about)
    {   
        $getData = AboutModel::find($id_about);
        $getData->delete();
        return redirect(route('master.about'));
    }

    
}
