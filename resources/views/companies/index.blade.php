@extends('layouts.app')
@section('content')


<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class=" col-md-3 mb-3">
                <a href="{{ route('companies.create') }}">
                    <button type="button" class="btn btn-outline-success">New company</button>
                </a>

            </div>


            <table class="table table-bordered table-hover" style="text-align: center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Logo</th>
                    <th scope="col">WebSite</th>
                    <th scope="col">Employees</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($companies as $index => $company)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>
                                <img src="{{asset($company->logo)}}" width="50" height="50"/>
                            </td>
                            <td>{{$company->website}}</td>
                            <td>
                                <a href="{{ route('companies.show',$company->id)}}">
                                    <button type="button" class="btn btn-outline-info">View</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('companies.edit',$company->id)}}">
                                    <button type="button" class="btn btn-outline-success">edit</button>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('companies.destroy',$company->id)}}">
                                    @method('delete')
                                    @csrf
                                    {{--<input type="hidden" name="company_id" value="{{$company->id}}"/>--}}
                                    <button type="submit" class="btn btn-outline-danger">delete</button>
                                </form>

                                </td>
                        </tr>
                 @endforeach

                </tbody>
            </table>

            {{$companies->links()}}


        </div>
    </div>
</div>


@endsection
