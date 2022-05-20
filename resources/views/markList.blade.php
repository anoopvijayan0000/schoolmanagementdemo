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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Maths</th>
                    <th>Science</th>
                    <th>History</th>
                    <th>Term</th>
                    <th>Total</th>
                     <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=0;
                @endphp
                @foreach($student as $userid=>$data)



               @foreach($data as $innerdatakey=>$innerdata)
               @php
                $total=0;
                $tdsubject='';
                $i++;
                @endphp
              
                <tr id="student">
                    <td>{{$i}}</td>
                    
                     @foreach($innerdata as $cdatakey=>$cdata)
                       @php
                        $total+= $cdata['total'];
                        $name = $cdata['name'];
                        
                        @endphp
                        <td>{{$cdata['total']}}</td>
                       @endforeach
                   <td>{{$name}}</td>    
                    <td>{{$innerdatakey}}</td>
                    <td>{{$total}}</td>
                    <td><a href="{{url('marklist-list-edit/'.$userid)}}">Edit</a> / <a href="{{url('marklist-list-delete/'.$userid)}}">Delete</a></td>
                </tr>

                @endforeach
                @endforeach
            </tbody>
        </table>

        