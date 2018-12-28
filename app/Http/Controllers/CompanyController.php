<?php

namespace App\Http\Controllers;
use DB;
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
        $company=Company::paginate(3);
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
            $contact=new Contact;
            $contact->id_cont_k=$request->get('id_cont_k');
            $contact->id_comp=$company->id_comp;
            $contact->description=$request->get('description');
            $contact->save();
            $id=$company->id_comp;
            //return redirect()->route('company.edit', array('company' => $id))->with('success','Completar Registro');
            return redirect('company')->with('success','Datos registrados');
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
        $contacts_k=ContactKind::get();
        $addresses=Address::where('level','=','3')->get();
        //$contactComp=Contact::where('id_comp','=',$id)->get();
        $company=Company::findOrFail($id);
        //$address=collect($company->Address);
        return view("company.edit",compact('company','addresses','contacts_k'));

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

            $company=Company::updateOrCreate(['id_comp'=>$id],$request->except('id_cont_k','contact_desc'));

        //    $contact = Contact::where('id_comp', '=', $id)->first();
        //    $contact->id_cont_k=$request->get('id_cont_k');
        //    $contact->description=$request->get('contact_desc');
        //    $contact->save();
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
        try{
            DB::table('contacts')->where('id_comp',$id)
            ->delete();
            //$contact = Contact::where('id_comp', '=', $id)->get();
            //$id_cont=$contact->id_cont;
            //Contact::destroy($id_cont);
            Company::destroy($id);
            return redirect('company')->with('success','Datos de compañía eliminados');
        }catch(Exception $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }

    }
    public function eliminar($id)
    {
        try{
            DB::table('contacts')->where('id_comp',$id)
            ->delete();
            //$contact = Contact::where('id_comp', '=', $id)->get();
            //$id_cont=$contact->id_cont;
            //Contact::destroy($id_cont);
            Company::destroy($id);
            return redirect('company')->with('success','Datos de compañía eliminados');
        }catch(Exception $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }

    }
}
