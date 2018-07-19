@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1 class="text-center">Braces Completion Solution and Source code</h1>

          @if(Session::has('results') !== null && !is_null(Session::get('results')))
          <table class="table table-bordered table-striped">
            <thead>
              <th>String Index</th>
              <th>Braces Completion Status</th>
            </thead>
            <tbody>
              @foreach (Session::get('results') as $key => $value)
                <tr>
                  <td>{{ $key }}</td>
                  <td>{{ $value }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>

          @endif


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





    <h1>Source code: PHP</h1>

    <?php

    echo "<pre style='padding: 20px; background-color: #f1f1f1;'>";

    print_r('function Braces($arrStr) {
      $results = [];
      $ALL_BRACES = ")]}{[(";
      $OPEN = "{[(";
      $CLOSE = ")]}";

      $refMap = [
        "}" => "{",
        "{" => "}",
        "[" => "]",
        "]" => "[",
        "(" => ")",
        ")" => "("
      ];

      foreach ($arrStr as $valueS) { // loop through input string array
        $opened = []; // $opened is a record of all opened (un-closed) braces in order of appearance in string

        // map for each $valueS
        // 0 means brace is balanced (opening brace)
        // -1 means waiting to be closed (opening brace)
        // 1 (closing braces) means waiting to be opened, hence, does not match
        $map = [
          "}" => 0,
          "{" => 0,
          "[" => 0,
          "]" => 0,
          "(" => 0,
          ")" => 0
        ];

        for ($j = 0; $j < strlen($valueS); $j++) { // looping through each character of $valueS
            $char = substr($valueS, $j, 1); // current character

            if(strpos($ALL_BRACES, $char) !== false) { // if current character is a brace
              $otherPair = $refMap[$char];

              // if open, set to -1, at the time of close, add 1
              if(strpos($OPEN, $char) !== false) { // OPENING A BRACE
                array_push($opened, $char);
                $map[$char] = $map[$otherPair] - 1; // subtracting 1 from map"s value for $char means opening $char
              } else if(strpos($CLOSE, $char) !== false) { // CLOSING A BRACE
                $recentlyOpened = array_slice($opened, sizeof($opened) - 1)[0];

                if($recentlyOpened !== $otherPair) { // the closing $char must be the counter pair ($otherPair) of the most recently opened
                  // braces don"t match and won"t match for $valueS
                  $map[$otherPair] += 1;
                  break;
                } else if($map[$otherPair] >= $map[$char]) { // closing a brace that has never been opened
                  // braces don"t match and won"t match for $valueS
                  $map[$otherPair] += 1;
                  break;
                }
                $map[$otherPair] = $map[$otherPair] + 1; // closing means adding the $otherPair (previously opened by subtracting 1)
              }
            }
        }

        // For braces to match in current string, the sum of map values ($mapValuesSum) must be 0
        // since closing and opening was done by alternately subtracting and adding 1
        $mapValuesSum = array_sum(array_values($map));
        if ($mapValuesSum !== 0) {
          array_push($results, "No");
        } else {
          array_push($results, "Yes");
        }
      }

      return $results;
    }');

    echo "</pre>";


    ?>





</div>


  <script type="text/javascript">
  //
  // var addButton = document.querySelector("#addBtn");
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
