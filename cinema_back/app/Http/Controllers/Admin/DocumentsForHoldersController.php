<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentForHolders;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentsForHoldersController extends Controller
{
    public function index()
    {
        $documents = DocumentForHolders::with('user')->get();
        return view('admin.documents_for_holders.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function verifyDocuments(Request $request){
        $request = $request->all();
        DocumentForHolders::where('id', $request['id'])->update([
            'verified' => 1
        ]);
        User::where('id', $request['user_id'])->update([
            'document_verified' => 2
        ]);
        $documents = DocumentForHolders::with('user')->get();
        return view('admin.documents_for_holders.index', compact('documents'));
    }


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
    public function edit($id)
    {

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
}
