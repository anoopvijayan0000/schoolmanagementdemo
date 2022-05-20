@extends('layouts')
@section('content')

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


<table class="table table-inverse" border="1" style="padding-left:5px;margin-top: 50px;border: 1px solid #000;">
            <thead>
                <tr>
                    <th>ID</th>
                    
                    <th>Maths</th>
                    <th>Science</th>
                    <th>History</th>
                    <th>Name</th>
                    <th>Term</th>
                    <th>Total</th>
                    <th>Created At</th>
                    
                     <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=0;
                @endphp
               @foreach($student as $innerdatakey=>$innerdata)
               
              
                <tr id="student">
                    <td>{{++$i}}</td>  
                    @foreach($innerdata['marks'] as $mkey=>$mvalue)

                    <td>{{$mvalue}}</td>  
                    @endforeach
                   <td>{{$innerdata['name']}}</td>    
                   
                   <td>{{$innerdata['term']}}</td>  
                   <td>{{$innerdata['total']}}</td>  
                   <td>{{$innerdata['created_at']}}</td>  
    
                    <td><a href="{{url('marklist-list-edit/'.$innerdata['student_id'])}}">Edit</a> / <a href="{{url('marklist-list-delete/'.$innerdata['student_id'])}}">Delete</a></td>
                </tr>

               
                @endforeach
            </tbody>
        </table>

        @stop