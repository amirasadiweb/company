<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employe;
use Illuminate\Http\Request;

class EmployesController extends Controller
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
        $employs=Employe::paginate(10);

        return view('employs.index',compact('employs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employs.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Employe $employe)
    {

        $dataValidate=$request->validate([
            'firstname'=>'required',
            'lastname'=>'required'
        ] );

        if($dataValidate)
        {
            $employe->firstname=$request->firstname;
            $employe->lastname=$request->lastname;
            $employe->company_id=$request->company_id;
            $employe->email=$request->email;
            $employe->phone=$request->phone;
            $employe->save();

//            $company->employes()->create($request->all());
            return back()->with('success','Success Create New Employe ');


        }



//        }
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
    public function edit(Employe $employe)
    {
        return view('employs.edit',compact('employe'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employe $employe)
    {
        $dataValidate=$request->validate([
            'firstname'=>'required',
            'lastname'=>'required'
        ] );

        if($dataValidate)
        {
//            dd($request->all());
            $employe->firstname=$request->firstname;
            $employe->lastname=$request->lastname;
            $employe->company_id=$request->company_id;
            $employe->email=$request->email;
            $employe->phone=$request->phone;
            $employe->save();

            return back()->with('primary','Update Employ');


        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employ)
    {
        Employe::destroy($employ);
        return redirect()->back()->with('delete','Delete Employ');
    }
}
