
@if($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="logMsg" style="margin-top: 5px; margin-bottom: 5px;">
  <ul>
      @foreach($errors->all() as $error)
    <li style="list-style-type: none;;margin: 0;"><i class="fa fa-exclamation-circle"></i>  {{ $error}}</li>
      @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if(\Session::has('success'))
                        <div class="alert alert-success" alert-dismissible fade show" role="alert" id="logMsg"style="margin-top:10px;">
                            <strong><i class="fa fa-check-circle"></i> {{\Session::get('success')}} </strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif