<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = DB::table('companies')->orderBy('created_at', 'desc')->paginate(10);
        return view('companies.index',compact('companies'));
    }

    public function create()
    {
        return view('companies.show');
    }

    public function store(Request $request,Company $company)
    {


        $dataValidate=$request->validate([
            'name'=>'required',
            'logo'=>'dimensions:min_width=100,min_height=100'
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
            return redirect('companies')->with('success','Success Create New Company ');



        }


    }

    public function show(Company $company)
    {
        return view('companies.list',compact('company'));

    }

    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    public function update(Request $request,$company)
    {

        $dataValidate=$request->validate([
            'name'=>'required',
            'logo'=>'dimensions:min_width=100,min_height=100'
        ] );


        if($dataValidate) {


            $comp = Company::find($company);


            if ($request->hasFile('logo')) {
                $logoExtenition = $request->file('logo')->getClientOriginalName();
                $name = time() . rand(999, 9999) . '-company' . '.' . $logoExtenition;
                $logoPath = $request->file('logo')->move('storage/app/public', $name);
                $comp->logo = $logoPath;

            }




            $comp->name = $request->name;
            $comp->email = $request->email;
            $comp->logo=$logoPath;
            $comp->website = $request->website;

            $comp->save();
            return redirect('companies')->with('primary','Update Company ');
        }


    }

    public function destroy($company)
    {

        Company::destroy($company);
        return redirect()->back()->with('delete','Delete Company');

    }


}
