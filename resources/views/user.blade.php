@extends('layouts.app')
@section('content')
    <section>
        <div class="mt-5" style="margin-left:100px">
            <h4> Employee detailes</h4>
            <table class="table table-bordered mt-2" style="border: 1px solid lightgrey;width:1200px;margin-left:50px">
                <thead>
                    <th style="text-align:center;">Employee Id</th>
                    <th style="text-align:center;">Employee Name</th>
                    <th style="text-align:center;">FatherName</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">Address</th>
                    <th style="text-align:center;">Mobile</th>
                    <th style="text-align:center;">Description</th>
                    <th style="text-align:center;">Action</th>
                </thead>
                @foreach ($user as $users)
                    <tr>
                        <td style="text-align:center;" class="table_data">EMP-00{{ $users->id }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $users->firstname }}.{{ $users->lastname }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $users->fathername }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $users->email }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $users->address }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $users->mobile }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $users->description }}
                        </td>
                        <td style="text-align:center;" class="table_data">
                            <a href="/edituser/{{ $users->id }}" class="btn btn-success btn-sm mt-1"><i
                                    class="fa-solid fa-pen-to-square btn-btn-success"></i></a>
                            <a href="/remove/{{ $users->id }}" class="btn btn-danger btn-sm mt-1"><i
                                    class="fa-solid fa-trash "></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
