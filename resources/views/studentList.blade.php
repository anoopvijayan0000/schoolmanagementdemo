@include('menu')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    <br>
    <br>
    <br>
    <br>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<table class="table table-inverse" border="1">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Reporting Teacher</th>
                     <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student as $data)
                <tr id="student{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->age}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->reporting_teacher}}</td>
                    <td><a href="{{url('student-list-edit/'.$data->id)}}">Edit</a> / <a href="{{url('student-list-delete/'.$data->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        