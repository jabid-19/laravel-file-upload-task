<?php

namespace App\Http\Controllers;

use App\AnyFileUpload;
use App\Category;
use Illuminate\Http\Request;

class AnyFileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myFiles = AnyFileUpload::orderBy('id', 'desc')->get();
//        dd($myFiles);
        return view('any-file-upload', compact('myFiles'));

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

        if($request->file('file'))
        {
            $file = $request->file('file');
            $filename = time() . '.' . $request->file('file')->extension();
            $filePath = public_path() . '/files';
            $file->move($filePath, $filename);
            $data['file'] = $filename;
        }
        AnyFileUpload::create($data);
//        AnyFileUpload::create($request->all());
        return redirect('/anyFileUploads')->with('status','Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnyFileUpload  $anyFileUpload
     * @return \Illuminate\Http\Response
     */
    public function show(AnyFileUpload $anyFileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnyFileUpload  $anyFileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(AnyFileUpload $anyFileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnyFileUpload  $anyFileUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnyFileUpload $anyFileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnyFileUpload  $anyFileUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnyFileUpload $anyFileUpload)
    {
//        dd($anyFileUpload);
        $anyFileUpload->delete();
        return redirect('/anyFileUploads')->with('status','Deleted Successfully');
    }
}
