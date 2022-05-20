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

                $subject = ['Maths','Science','History'];
                @endphp
                @foreach($student as $userid=>$data)
               @foreach($data as $innerdatakey=>$innerdata)
               @php
                $total=0;
                $tdsubject='';
                $i++;
                $markcolumn=0;
                //$subjectArray =[];
                @endphp
              
                <tr id="student">
                    <td>{{$i}}</td>
                    
                   
                     @foreach($innerdata as $cdatakey=>$cdata)

    
                          @php

                        $total+= $cdata['total'];
                        $name = $cdata['name'];
                        $created_at = $cdata['created_at'];
                        $markcolumn++;
                        if (in_array($cdata['subject'],$subject ))
                        {
                              @endphp     
                            <td>{{$cdata['total']}}</td>
                             @php
                        }
                        else
                        {

                            echo '<td></td>';
                        }

                        @endphp
                        <!-- <td>{{$cdata['total']}}</td> -->
                       @endforeach
                    

                   <td>{{$name}}</td>    
                    <td>{{$innerdatakey}}</td>
                    <td>{{$total}}</td>
                    <td>{{$created_at}}</td>
                    <td><a href="{{url('marklist-list-edit/'.$userid)}}">Edit</a> / <a href="{{url('marklist-list-delete/'.$userid)}}">Delete</a></td>
                </tr>

                @endforeach
                @endforeach
            </tbody>
        </table>

        @stop