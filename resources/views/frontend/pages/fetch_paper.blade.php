<img src="{{url('/')}}/assets/img/online-course.png" />
<select name="paper" id="paper" onchange="getamount()">
	<option value="">Select paper</option>
	@foreach($paper as $val)
	<option value="{{@$val->id}}">{{@$val->name}}</option>
	
	@endforeach
	
</select>