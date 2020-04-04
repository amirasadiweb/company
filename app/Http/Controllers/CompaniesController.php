<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;



class CompaniesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::withoutTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('companies.index',compact('companies'));
    }

    public function create()
    {
        return view('companies.show');
    }

    public function store(Request $request,Company $company)
    {


        $dataValidate=$request->validate([
            'name'=>'required|unique:companies,name',
            'email'=>'required|email|unique:companies,email',
            'logo'=>'mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100',
            'website'=>'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
        ] );

        
        if($dataValidate)
        {

            if($request->hasFile('logo')){
                $logoExtenition=$request->file('logo')->getClientOriginalName();
                $name=time().rand(999,9999).'-company'.'.'.$logoExtenition;
                $logoPath=$request->file('logo')->move('storage/app/public',$name);
            }
            else{
                $logoPath='storage/app/public/non-image.jpg';
            }
            
            $company->name=$request->name;
            $company->email=$request->email;
            $company->logo=$logoPath;
            $company->website=$request->website;
            $company->save();
            
            return redirect('companies')->with('success','Success Create ' . $company->name. ' Company');



        }


    }

    public function show(Company $company)
    {
        return view('companies.list',compact('company'));

    }

    public function edit(Company $company)
    {
        $redir=url()->previous();
        return view('companies.edit',compact('company','redir'));
    }

    public function update(Request $request,$company)
    {

        $dataValidate=$request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'logo'=>'mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100',
            'website'=>'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
        ] );


        if($dataValidate) {


            $comp = Company::find($company);
            $logoPath=$comp->logo;


            if ($request->hasFile('logo')) {
                $logoExtenition = $request->file('logo')->getClientOriginalName();
                $name = time() . rand(999, 9999) . '-company' . '.' . $logoExtenition;
                $logoPath = $request->file('logo')->move('storage/app/public', $name);
            }


            if($comp->logo != $logoPath){
                $comp->logo=$logoPath;
            }



            if($request->redir == 'http://127.0.0.1:8000/companies'){
                $request->redir= 'http://127.0.0.1:8000/companies?page=1';
            }




            $comp->name = $request->name;
            $comp->email = $request->email;
            $comp->website = $request->website;

            $comp->save();

            if($request->redir == 'http://127.0.0.1:8000/companies'){
                $request->redir = 'http://127.0.0.1:8000/companies?page=1';
            }


            return redirect($request->redir.'#'.$comp->id)->with('primary','Update Company '.$comp->name);

        }


    }

    public function destroy($company)
    {


//        Employe::where('company_id',$company)->delete();
//        DB::table('employes')->where('company_id', $company);
//        Employe::find($company)->delete();
//        Company::destroy($company);


        $comp=Company::find($company);
        $comp->employes()->delete();
        Company::findOrFail($company)->delete();

//        $comp->delete();


        return redirect()->back()->with('delete','Delete Company');

    }

    public function softdelete()
    {
        $soft=Company::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);
        return view('companies.soft',compact('soft'));
    }

    public function restore($soft)
    {
        Company::onlyTrashed()->findOrFail($soft)->restore();
        return back();
    }

    public function force($soft)
    {
        Company::onlyTrashed()->findOrFail($soft)->forceDelete();
        return back();
    }


}
