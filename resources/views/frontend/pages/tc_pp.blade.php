<style>
.modal-backdrop.fade {
opacity: 0;
filter: alpha(opacity=0);
}
.modal-backdrop.in {
opacity: 0.5;
filter: alpha(opacity=50);
}



.modal-backdrop.fade {
opacity: 0;
filter: alpha(opacity=0);
}
.modal-backdrop.fade.in {
opacity: 0.5;
filter: alpha(opacity=50);
}
</style>


   <div class="col-md-6 col-12 tnc">
            <p> <a href="#"  data-toggle="modal" data-target="#myModal">  T&C </a> | <a href="{{route('p.p')}}"  >   PRIVACY POLICY </a></p>
          </div>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Terms and Condition</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      @php
      $tc2=DB::table('term_condition')->where('id','1')->first();
      @endphp
      <div class="modal-body">
      <p> {{@$tc2->text}}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
      </div>

    </div>
  </div>
</div>







{{-- <div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Privacy and Policy</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      @php
      $tc2=DB::table('term_condition')->where('id','3')->first();
      @endphp
      <div class="modal-body">
      <p> {{@$tc2->text}}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
      </div>

    </div>
  </div>
</div> --}}