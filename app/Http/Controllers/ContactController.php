<?php

namespace App\Http\Controllers;

use DB;
use App\Company;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all()->toJson();

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
        try{
            $contact=new Contact;
            $contact->id_cont_k=$request->get('id_cont_k');
            $contact->id_comp=$request->get('id_comp');
            $contact->description=$request->get('description');
            $contact->save();
            return $contact;
        }catch(Exception $e){
            return back()->withErrors(['exception'=>$e->getMessage()])->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $contacts=DB::table('contacts')->where('id_comp',$id)
        //     ->select();
        $contacts=Contact::where('id_comp','=',$id)->get();
        return $contacts->toJson();
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
        $contact=Contact::find($id);
        $contact->description=$request->description;
        $contact->save();

        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$id_c)
    {
        $contacts=DB::table('contacts')->where('id_comp',$id_c)
        ->select(DB::raw('count(*) as comp_count'))
        ->get();
        $count=($contacts[0]->comp_count);
        if ($count >=1) {
            $contact=Contact::find($id);
            $contact->delete();
        } else {
            return 'No puede eliminar el único contacto existente';
        }


    }
}
