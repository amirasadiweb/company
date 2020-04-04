@extends('layouts.app')
@section('content')


    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">



                <table class="table table-bordered table-hover" style="text-align: center">
                    <thead>
                    <tr>
                        <th colspan="7">
                            Soft Delete Companies

                        </th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Logo</th>
                        <th scope="col">WebSite</th>
                        <th scope="col">Restore</th>
                        <th scope="col">Force Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($soft->isEmpty())
                        <tr>
                            <td colspan="8" align="center">There is not list of deleted companies</td>
                        </tr>
                    @else


                    @foreach($soft as $index => $company)
                        <tr>
                            <td id="{{$company->id}}">{{$index+1}}</td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>
                                <img src="{{asset($company->logo)}}" width="50" height="50"/>
                            </td>
                            <td>{{$company->website}}</td>
                            <td>
                                <a href="{{ route('companies.restore',$company->id)}}">
                                    <button type="button" class="btn btn-outline-success">Reset</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('companies.force',$company->id)}}">
                                    <button type="button" class="btn btn-outline-danger">Force Delete</button>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    @endif

                    </tbody>
                </table>

                {{$soft->links()}}


            </div>
        </div>
    </div>


@endsection
