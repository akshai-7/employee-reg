@extends('layouts.app')
@section('content')
    <section>
        <div class="mt-5" style="margin-left:100px">
            <h4> Employee detailes</h4>
            <form action="/usersearch" method="GET" style="margin-left:32%" autocomplete="off">
                <div id="filterDiv1">
                    <div class="col-md-9">
                        <label></label>
                        @if (isset($_GET['query']))
                            <input type="text" name="query" placeholder="Name/Email/Mobile" class="form-control"
                                value="{{ $_GET['query'] }}" required>
                        @else
                            <input type="text" name="query" placeholder="Name/Email/Mobile" class="form-control">
                        @endif
                    </div>
                    <div class="col-md-5" style="margin-left: 6px">
                        <br />
                        <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                class="fa-solid fa-magnifying-glass"></i></i></button>
                        <a href="/user" class="btn btn-success btn-sm mt-1"><i class="fa-solid fa fa-refresh"></i></a>
                    </div>
                </div>
            </form>
            <table class="table table-bordered mt-5" style="border: 1px solid lightgrey;width:1200px;margin-left:50px"
                id="myTable">
                <thead style="font-size: 17px;font-weight:600;">
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
