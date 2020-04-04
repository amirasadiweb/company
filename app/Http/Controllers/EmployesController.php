<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employe;
use Illuminate\Http\Request;
use App\Http\Requests;

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
        $employs=Employe::withoutTrashed()->with('company')->orderBy('id', 'desc')->paginate(10);
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
    public function store(Request $request,Company $company)
    {


        $dataValidate=$request->validate([
            'firstname'=>'required|min:6',
            'lastname'=>'required',
            'email'=>'required|email|unique:employes,email',
            'phone'=>'min:7|numeric'
        ] );

        if($dataValidate)
        {
            $employe=new Employe();

            $employe->firstname=$request->firstname;
            $employe->lastname=$request->lastname;
            $employe->company_id=$request->company_id;
            $employe->email=$request->email;
            $employe->phone=$request->phone;
            $employe->save();


            return redirect()->route('employes.index')->with('success','Success Create New Employe ');


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
        $redir=url()->previous();
        return view('employs.edit',compact('employe','redir'));

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
            'firstname'=>'required|min:6',
            'lastname'=>'required',
            'email'=>'required|email',
            'phone'=>'min:7|numeric'
        ] );

        if($dataValidate)
        {
            $employe->firstname=$request->firstname;
            $employe->lastname=$request->lastname;
            $employe->company_id=$request->company_id;
            $employe->email=$request->email;
            $employe->phone=$request->phone;
            $employe->save();

            if($request->redir == 'http://127.0.0.1:8000/employes'){
                $request->redir= 'http://127.0.0.1:8000/employes?page=1';
            }


            return redirect($request->redir.'#'.$employe->id)->with('primary','Update Employ');


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

    public function softdelete()
    {
        $soft=Employe::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);
        return view('employs.soft',compact('soft'));
    }

    public function restore($soft)
    {
        Employe::onlyTrashed()->findOrFail($soft)->restore();
        return back();
    }

    public function force($soft)
    {
        Employe::onlyTrashed()->findOrFail($soft)->forceDelete();
        return back();
   }
}
