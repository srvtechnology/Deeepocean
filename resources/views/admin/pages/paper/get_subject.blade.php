<label for="title">Select Subject <span style="color: red;">*</span></label>
<select name="subject" class="form-control rm06"style="color: black" >
    <option value="">Select Subject</option>
    @foreach($subjects as $val)
    <option value="{{$val->id}}">{{@$val->name}}</option>
    @endforeach
    
</select>