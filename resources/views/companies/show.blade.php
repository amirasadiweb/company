@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-4">


                <form method="post" action="{{route('companies.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label>Company Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        {!!  $errors->first('name','<p class="help-block btn-outline-danger">:message</p>')  !!}
                    </div>


                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                    </div>


                    <div class="form-group">
                        <label for="website">Web Site</label>
                        <input type="text" name="website" class="form-control" id="website" value="{{old('website')}}">
                    </div>


                    <div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
                        <label for="exampleFormControlFile1">Logo For Company</label>
                        <input type="file" name="logo" class="form-control-file"  id="exampleFormControlFile1">
                        {!!  $errors->first('logo','<p class="help-block btn-outline-danger">:message</p>')  !!}
                    </div>


                    <button type="submit" class="btn btn-primary">create</button>

                </form>

            </div>

        </div>

    </div>









@endsection
