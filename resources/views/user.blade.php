@extends('layouts.app')
@section('content')
    <Style>
        @import url("https://fonts.googleapis.com/css2?family=Mulish&display=swap");

        #section {
            font-family: "Mulish", sans-serif;
        }

        #filterDiv1 {
            width: 30%;
            margin-left: 780px;
            padding: 10px 5px;
            display: flex;
            align-content: center;
            justify-content: start;
        }

        #title {
            color: white;
            background-color: #f06487;
        }

        #title1 {
            color: black;
            margin-left: -70px;
            font-weight: bold;
            margin-top: 50px;
        }

        #dataNotFound {
            margin-left: 100px;
            width: 80%;
            height: 30px;
            display: flex;
            align-content: center;
            justify-content: center;
            color: black;
            background-color: #dedbdbab
        }

        #active {
            margin-left: 950px;
            color: #bf0e3a;
            margin-top: 50px;
        }

        #add {
            background: #e94870;
            border-radius: 5px;
            border: 1px solid rgb(148, 35, 35);
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            top: -20px;
            height: 30px;
            position: relative;
            width: 120px;
            margin-left: 950px;
        }

        #message {
            position: fixed;
            top: 70px;
            right: 10px;
            animation-duration: 1s;
            z-index: 1;
        }

        #mytable {
            margin-left: -80px;
        }
    </Style>
    <section id="section">
        <div class="mt-4" style="margin-left:100px">
            <div class="message" id="message">
                @if (session()->has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" style="width: 300px;height:20px">
                        <div div class="alert alert-success">
                            <i class="fa-regular fa-circle-check"></i> {{ session('message') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="message1" id="message">
                @if (session()->has('message1'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" style="width: 300px;height:20px;">
                        <div class="alert alert-danger">
                            <i class="fa-regular fa-circle-x"></i>{{ session('message1') }}
                        </div>
                    </div>
                @endif
            </div>
            <h3 id="title1"> Employee detailes</h3>
            {{-- <a href="/register"><input type="submit" value="Add Employee" id="add"></a> --}}
            <form action="/usersearch" method="GET" autocomplete="off">
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
                        <a href="/user" class="btn btn-secondary btn-sm mt-1"><i class="fa-solid fa fa-refresh"></i></a>
                    </div>
                </div>
            </form>
            <table class="table table-bordered table-striped mt-1" style="border: 1px solid lightgrey;width:1200px;"
                id="mytable">
                <thead style="font-size: 17px;font-weight:600;" id="thead">
                    <th style="text-align:center;" id="title">S.no</th>
                    <th style="text-align:center;" id="title">Employee Id</th>
                    <th style="text-align:center;" id="title">Employee Name</th>
                    <th style="text-align:center;" id="title">FatherName</th>
                    <th style="text-align:center;" id="title">Email</th>
                    <th style="text-align:center;" id="title">Address</th>
                    <th style="text-align:center;" id="title">Mobile</th>
                    <th style="text-align:center;" id="title">Description</th>
                    <th style="text-align:center;" id="title">Image</th>
                    <th style="text-align:center;" id="title">Action</th>
                </thead>
                @foreach ($users as $user)
                    <tr>
                        <td style="text-align:center;" class="table_data">{{ $loop->iteration }}
                        </td>
                        <td style="text-align:center;" class="table_data">EMP-00{{ $user->id }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $user->firstname }}.{{ $user->lastname }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $user->fathername }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $user->email }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $user->address }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $user->mobile }}
                        </td>
                        <td style="text-align:center;" class="table_data">{{ $user->description }}</td>
                        <td style="text-align:center;" class="table_data">
                            @if ($user->image != null)
                                <a>
                                    <img src="{{ url('images/' . explode(',', $user->image)[0]) }}"
                                        class="rounded-0 border border-secondary" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                        <td style="text-align:center;" class="table_data">
                            <a href="/edituser/{{ $user->id }}" class="btn btn-success btn-sm mt-1"><i
                                    class="fa-solid fa-pen-to-square btn-btn-success"></i></a>
                            <a href="/remove/{{ $user->id }}" class="btn btn-danger btn-sm mt-1"><i
                                    class="fa-solid fa-trash "></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if (count($users) < 1)
                <div id="dataNotFound">
                    <p>Data not found</p>
                </div>
            @endif
            <div id="active">
                {!! $users->links() !!}
            </div>
        </div>
    </section>
@endsection
