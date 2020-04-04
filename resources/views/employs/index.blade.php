@extends('layouts.app')
@section('content')


<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12 ">




            <table class="table table-bordered table-hover" style="text-align: center">
                <thead>
                <tr>
                    <th colspan="9">
                        List Employes

                    </th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Company</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($employs as $index => $employ)
                        <tr id="{{$employ->id}}">
                            <td>{{$index+1}}</td>
                            <td>{{$employ->firstname}}</td>
                            <td>{{$employ->lastname}}</td>
                            <td>{{$employ->email}}</td>
                            <td>{{$employ->phone}}</td>
                            <td>

                                {{$employ->Company->name}}





                            </td>


                            <td>
                                <a href="{{ route('employes.edit',$employ->id)}}">
                                    <button type="button" class="btn btn-outline-success">edit</button>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('employes.destroy',$employ->id)}}">
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

            {{$employs->links()}}


        </div>
    </div>
</div>


@endsection
