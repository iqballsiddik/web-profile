<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Iluminate\Support\Facades\Input;
use Yajra\DataTables\Datatables;

use App\Models\HomeModel;

class MasterHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin_View/HomeView');
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
        $data = [
            'judul' => $request['judul'],
            'content' => $request['content']
        ];

        return HomeModel::create($data);
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
        //
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
        //
    }
    
    public function api(){
        $getData = HomeModel::all();
        

        return Datatables::of($getData)
            ->addColumn('action', function($getData){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i>Show</a> '.
                        '<a onclick="editForm('.$getData->id.')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>Edit</a> '.
                        '<a onclick="deleteData('.$getData->id.')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-edit"></i>Delete</a>';
            })->make(true);
    }
}