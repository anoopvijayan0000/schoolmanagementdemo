@include('menu')

<h1>@if(!isset($student->id)) Add @else Edit @endif Marks</h1>

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


@if(!isset($student->id))
<form method = "post" action="addmark">
@else
 <form method = "post" action="updatemark">
@endif
   @csrf
    <div class="form-group">
        <label >Student</label>            
        <select name="student_id">
        @foreach($studentlist as $k=>$g)
        @if(isset($student->id) && $student->id == $k)

        <option selected value="{{$g}}">{{$g}}</option>
        @else
        <option value="{{$g->id}}">{{$g->name}}</option>
        @endif
        @endforeach
    </select>
    </div>
    <br>
    <br>
   
    <div class="form-group">
        
    <label >Subject</label>
    <select name="subject">
        @foreach($subject as $g)
        <option value="{{$g}}">{{$g}}</option>
        @endforeach
    </select>
       
    </div>
    <br>
    <br>
    <div class="form-group">
        <label >Term</label>
       <select name="term">
        @foreach($term as $t)
           <option value="{{$t}}">{{$t}}</option>
        @endforeach
    </select>
       
    </div>
    <br>
    <br>
     <div class="form-group">
        <label >Total mark</label>
        <input type="text" placeholder="Enter Mark" name="total_mark" value="">
       
    </div>
    <br>
    <br>
    <input type="hidden" name="id" value="@if(isset($student->id)){{$student->id}}@endif">
    <button type="submit" class="btn btn-default">Submit</button>
</form>


<!-- <form action="addstudent" method="post">
    @csrf
    <label>Name</label>
    <input type="text" name="name">
    <br>
    <br>
    <label>Age</label>
    <input type="text" name="age">
    <br>
    <br>
    <label>Gender</label>
    <input type="text" name="gender">
    <br>
    <br>
    <label>Reporting Teacher</label>
    <select name="reporting_teacher">
        <option>T1</option>
        <option>T2</option>
        <option>T3</option>
    </select>
    <br>
    <br>
    <br>
    <button type="submit">submit</button>

</form> -->
