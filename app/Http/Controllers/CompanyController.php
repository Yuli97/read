<?php

namespace App\Http\Controllers;
use App\Company;
use App\Address;
use App\Contact;
use App\ContactKind;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
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
        $company=Company::get();
        return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses=Address::where('level','=','3')->get();
        $contacts_k=ContactKind::get();
        return view('company.create',compact('addresses','contacts_k'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
       try{
            $company=new Company;
            $company->fill($request->except('address'));
            $company->address=$request->get('address');
            $company->save();
            $id_comp=$company->id_comp;
            info($id_comp);
            return view('company.addContacts',compact('company'));
            //return redirect('company')->with('success','Compañia registrada');
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

        $addresses=Address::where('level','=','3')->get();
        $company=Company::findOrFail($id);
        //$address=collect($company->Address);
        return view("company.edit",compact('company','addresses'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        try {
            Company::updateOrCreate(['id_comp'=>$id],$request->except('address'));
            return redirect('company')->with('success', 'Datos de Compañía actualizados');
        } catch (Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
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
