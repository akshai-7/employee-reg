@extends('layouts.app')
@section('content')
    <style>
        .form-control {
            border: none;
        }
    </style>
    <section>
        <div class="mt-5" style="margin-left:30px">
            <h4> Edit Employee detailes</h4>
            <form action="/update/{id}" method="Post">
                @csrf
                <table class="table table-bordered mt-5" style="border: 1px solid lightgrey;width:1350px;">
                    <thead style="font-size: 17px;font-weight:600;">
                        <th style="text-align:center;">Employee Id</th>
                        <th style="text-align:center;">First Name</th>
                        <th style="text-align:center;">Last Name</th>
                        <th style="text-align:center;">FatherName</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Address</th>
                        <th style="text-align:center;">Mobile</th>
                        <th style="text-align:center;">Description</th>
                        <th style="text-align:center;">Action</th>
                    </thead>
                    @foreach ($edit as $edits)
                        <tr>
                            <td style="text-align:center;"><input type="text" readonly class="form-control"
                                    name="id" value="{{ $edits->id }}">
                            </td>
                            <td style="text-align:center;"><input type="text" class="form-control" name="firstname"
                                    value="{{ $edits->firstname }}" required>
                            </td>
                            <td style="text-align:center;"><input type="text" class="form-control" name="lastname"
                                    value="{{ $edits->lastname }}" required>
                            </td>
                            <td style="text-align:center;"><input type="text" class="form-control" name="fathername"
                                    value="{{ $edits->fathername }}" required>
                            </td>
                            <td style="text-align:center;"><input type="text" class="form-control" name="email"
                                    value="{{ $edits->email }}" required>
                            </td>
                            <td style="text-align:center;"><input type="text" class="form-control" name="address"
                                    value="{{ $edits->address }}" required>
                            </td>
                            <td style="text-align:center;"><input type="text" class="form-control" name="mobile"
                                    value="{{ $edits->mobile }}" required>
                            </td>
                            <td style="text-align:center;"><input type="text" class="form-control" name="description"
                                    value="{{ $edits->description }}" required>
                            </td>
                            <td style="text-align:center;">
                                <button type="submit">Submit</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </section>
@endsection
