@include('menu')

<h1>Edit Student</h1>

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
<form method = "post" action="addstudent">
@else
 <form method = "post" action="updatestudent">
@endif
   @csrf
    <div class="form-group">
        <label >Name</label>            
        <input type="text"  placeholder="Enter Name" name="name" value="@if(isset($student->id)){{$student->name}}@endif">
    </div>
    <br>
    <br>
    <div class="form-group">
        <label >Age</label>
        <input type="text" placeholder="Enter Age" name="age" value="@if(isset($student->id)){{$student->age}}@endif">
       
    </div>
    <br>
    <br>
    <div class="form-group">
        
    <label >Gender</label>
    <select name="gender">
        @foreach($gender as $g)
        @if(isset($student->gender) && $student->gender == $g)

        <option selected value="{{$g}}">{{$g}}</option>
        @else
        <option value="{{$g}}">{{$g}}</option>
        @endif
        @endforeach
    </select>
       
    </div>
    <br>
    <br>
    <div class="form-group">
        <label >Reporting Teacher</label>
       <select name="reporting_teacher">
        @foreach($teachers as $teacher)
       
        @if(isset($student->reporting_teacher) && $student->reporting_teacher == $teacher)

           <option selected value="{{$teacher}}">{{$teacher}}</option>
        @else
           <option value="{{$teacher}}">{{$teacher}}</option>
         @endif
        @endforeach
    </select>
       
    </div>
    <br>
    <br>

    <input type="hidden" name="id" value="@if(isset($student->id)){{$student->id}}@endif"> 
    <button type="submit" class="btn btn-default">Submit</button>
</form>
