@extends('layouts.app')
@section('content')


    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">


                <table class="table table-bordered table-hover" style="text-align: center">
                    <thead>
                    <tr>
                        <th colspan="9">
                            Soft Delete Employes

                        </th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th scope="col">Restore</th>
                        <th scope="col">Force Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($soft->isEmpty())
                        <tr>
                            <td colspan="8" align="center">There is not list of deleted employes</td>
                        </tr>
                    @else

                    @foreach($soft as $index => $employ)
                        <tr id="{{$employ->id}}">
                            <td>{{$index+1}}</td>
                            <td>{{$employ->firstname}}</td>
                            <td>{{$employ->lastname}}</td>
                            <td>{{$employ->email}}</td>
                            <td>{{$employ->phone}}</td>
                            <td>

                                    {{--{{$employ->Company->name}}--}}
                            </td>


                            <td>
                                <a href="{{ route('employes.restore',$employ->id)}}">
                                    <button type="button" class="btn btn-outline-success">Restore</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('employes.force',$employ->id)}}">
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
