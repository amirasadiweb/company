@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-4">


                <form method="post" action="{{route('employes.update',$employe->id)}}">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" value="{{$employe->firstname}}">
                        {!!  $errors->first('firstname','<p class="help-block btn-outline-danger">:message</p>')  !!}

                    <div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="{{$employe->lastname}}">
                        {!!  $errors->first('lastname','<p class="help-block btn-outline-danger">:message</p>')  !!}
                    </div>                    </div>




            <div class="form-group">
                        <label for="email">Company </label>
                        <select class="custom-select" name="company_id">
                            @foreach(\App\Company::all() as $company)

                                <option

                                        @if($company->id==$employe->company_id)
                                        selected
                                        @endif

                                        value="{{$company->id}}">{{$company->name}}</option>

                            @endforeach
                        </select>
                    </div>


                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email">Email </label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$employe->email}}">
                        {!!  $errors->first('email','<p class="help-block btn-outline-danger">:message</p>')  !!}
                    </div>

                    <input type="hidden" name="redir" value="{{$redir}}" />


                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{$employe->phone}}">
                        {!!  $errors->first('phone','<p class="help-block btn-outline-danger">:message</p>')  !!}
                    </div>



                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

            </div>




        </div>


    </div>

@endsection