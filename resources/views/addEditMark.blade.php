@include('menu')

<h1>@if(isset($editresult)&&count($editresult)>0) Edit @else Add @endif Marks</h1>

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

@if(isset($editresult)&&count($editresult)>0)
@foreach($editresult as $r=>$resultdata)

<div style="border:1px solid #000; padding: 10px;">

<form action="{{ url('updatemark/'.$resultdata->student_id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="form-group">
        
        <label >Student</label>            
        <select name="student_id">
        @foreach($studentlist as $k=>$g)
        @if($resultdata->student_id == $g->id)

        <option selected value="{{$g->id}}">{{$g->name}}</option>
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
         @if($resultdata->subject == $g)
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
        <label >Term</label>
       <select name="term">
        @foreach($term as $t)
        @if($resultdata->term == $t)
        <option selected value="{{$t}}">{{$t}}</option>
         @else
        <option value="{{$t}}">{{$t}}</option>
        @endif 
           
        @endforeach
    </select>
       
    </div>
    <br>
    <br>
     <div class="form-group">
        <label >Total mark</label>
        <input type="text" placeholder="Enter Mark" name="total_mark" value="{{$resultdata->total_mark }}">
       
    </div>
    <br>
    <br>
    <input type="hidden" name="id" value="{{$resultdata->id}}">
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
 @endforeach
@else
<form method = "post" action="addmark">

   @csrf
    <div class="form-group">
        <label >Student</label>            
        <select name="student_id">
        @foreach($studentlist as $k=>$g)
        <option value="{{$g->id}}">{{$g->name}}</option>
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
    <button type="submit" class="btn btn-default">Submit</button>
</form>

@endif
