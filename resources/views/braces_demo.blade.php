@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('braces.test') }}" method="post" >
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-10">
                <div id="inputs-wrapper">

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>

                  <div class="form-group value-input">
                    <label>Value String</label>
                    <input class="form-control" type="text" name="valueS[]" value="">
                  </div>


                </div>


              </div>

              <div class="col-sm-1 text-center" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary addBtn" id="addBtn"> Test Braces Completion</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>


  <script type="text/javascript">
  //
  // var addButton = document.querySelector('#addBtn');
  // var inputCounter = 0;
  //
  // addButton.addEventListener("click", function() {
  //   alert("clicks");
  //   var valueInput = '<div class="form-group value-input">'
  //   + '<label>Value String</label>' +
  //   + '<input class="form-control" type="text" name="valueS[]" value="">' +
  //   +'</div>';
  //
  //   document.getElementById('inputs-wrapper').innerHTML += valueInput;
  //
  // });

  </script>
@endsection
