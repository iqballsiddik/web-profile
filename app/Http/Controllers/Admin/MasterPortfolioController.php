<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Storage;
use App\Models\PortfolioModel;


class MasterPortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData['listData'] = PortfolioModel::get();
        // echo "<pre>";
        // print_r($getData); die;
        return view('MasterPortfolioView', $getData);
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
        //
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
    public function edit()
    {
        $getData = Input::get('id');
        $getExport['accept'] = PortfolioModel::where('id_portfolio',$getData)->get()->toArray();
        return view('form_edit',$getExport);
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

        $this->validate($request, [
            'name' => 'required',
            'content' => 'required'
        ]);
            // salah na pas update ?  nya pas update
            // handle file upload
        if($request->hasFile('image')){
            // mengambil filename di extension
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

        // create update
        $inseert = PortfolioModel::find( $request->input('id'));
        $inseert->name = $request->input('name');
        $inseert->content = $request->input('content');
        if($request->hasFile('image')){
            $inseert->image = $fileNameToStore;
        }
        
        $inseert->save();

        return redirect(route('master.portfolio'))->with('succes','image update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_portfolio)
    {
        $getData = PortfolioModel::find($id_portfolio);
        $getData->delete();
        return redirect(route('master.portfolio'));

    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'image' => 'image|nullable|max:2000'
        ]);
            // handle file upload
        if($request->hasFile('image')){
            // mengambil filename di extension
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

        $inseert = new PortfolioModel;
        $inseert->name = $request['name'];
        $inseert->content = $request['content'];
        $inseert->image = $fileNameToStore;
        $inseert->save();

        return redirect(route('master.portfolio'));

    }
    // public function showList(){
    //     $getData['listData'] = PortfolioModel::get();
    // }
}
