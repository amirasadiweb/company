@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-4">


                <form method="post" action="{{route('employes.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" value="{{old('firstname')}}">
                        {!!  $errors->first('firstname','<p class="help-block btn-outline-danger">:message</p>')  !!}
                    </div>

                    <div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="{{old('lastname')}}">
                        {!!  $errors->first('lastname','<p class="help-block btn-outline-danger">:message</p>')  !!}
                    </div>



                    <div class="form-group">
                        <label for="email">Company </label>
                        <select class="custom-select" name="company_id">
                            @foreach(\App\Company::all() as $company)

                                <option value="{{$company->id}}">{{$company->name}}</option>

                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                    </div>


                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{old('phone')}}">
                    </div>



                    <button type="submit" class="btn btn-primary">create</button>

                </form>

            </div>

        </div>

    </div>









@endsection
