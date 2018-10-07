@extends('layout')

@section('content')


<div class="table">
    {{--   <div class="card-header">

       </div>--}}

    <div class="table-body">

        <table class="table table-bordered">
            <thead>
            <tr>

                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($students as $student)
                <tr>

                    <td> {{ $student->name }}

                    </td>
                    <td> {{ $student->email }}

                    </td>
                    <td> {{ $student->phone }}

                    </td>

                </tr>
            @endforeach


            </tbody>
        </table>

    </div>


</div>