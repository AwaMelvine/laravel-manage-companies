
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>  Braces Matcher Algorithm</title>


  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Miriam+Libre|Nunito" rel="stylesheet">
  <link rel="stylesheet" href="http://codewithawa.com/frontend/css/style.css">

      <!-- Syntaxhighlighter theme -->

    <link rel="stylesheet" href="http://codewithawa.com/assets/plugins/ckeditor/plugins/codesnippet/lib/highlight/styles/prism.css">

    <!-- Font-awesome -->
    <link rel="stylesheet" href="http://codewithawa.com/assets/plugins/font-awesome/css/font-awesome.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>


   <link rel="stylesheet" href="http://codewithawa.com/frontend/css/footer/demo.css">
   <link rel="stylesheet" href="http://codewithawa.com/frontend/css/footer/footer-distributed-with-contact-form.css">



</head>
<body>



  <div class="container">
    <div class="row">

      <div class="col-md-10 col-md-offset-1">

        <h1 class="text-center">Braces Matcher Algorithm</h1>
        <br>

          <pre>
<code class="language-php">&lt;?php
function Braces($arrStr) {
  $results = [];
  $ALL_BRACES = ")]}{[(";
  $OPEN = "{[(";
  $CLOSE = ")]}";
  $refMap = [
    '}' =&gt; '{',
    '{' =&gt; '}',
    '[' =&gt; ']',
    ']' =&gt; '[',
    '(' =&gt; ')',
    ')' =&gt; '('
  ];
  for ($i = 0; $i &lt; sizeof($arrStr); $i++) {
    $valueS = $arrStr[$i]; // loop through string array
    $opened = []; // $opened is a record of all opened braces in order of appearance
    // hash map for each $valueS
    // if a brace is opened, 1 is subtracted from its value
    // if that braces other pair is closed, 1 is added to it's value, normalizing it back to 0
    $map = [
      '}' =&gt; 0,
      '{' =&gt; 0,
      '[' =&gt; 0,
      ']' =&gt; 0,
      '(' =&gt; 0,
      ')' =&gt; 0
    ];
    for ($j = 0; $j &lt; strlen($valueS); $j++) { // looping through each character of $valueS
        $char = substr($valueS, $j, 1); // current character
        if(strpos($ALL_BRACES, $char) !== false) { // if current character is a brace
          $otherPair = $refMap[$char];
          // if open, set to 0, if close, set to 1
          if(strpos($OPEN, $char) !== false) { // OPENING A BRACE
            array_push($opened, $char);
            $map[$char] = $map[$otherPair] - 1; // subtracting 1 from map's value for $char means opening $char
          } else if(strpos($CLOSE, $char) !== false) { // CLOSING A BRACE
            $recentlyOpened = array_slice($opened, sizeof($opened) - 1)[0];
            if($recentlyOpened !== $otherPair) { // the closing $char must be the counter pair ($otherPair) of the most recently opened
              // braces don't match and won't match for $valueS
              $map[$otherPair] += 1;
              break;
            } else if($map[$otherPair] &gt;= $map[$char]) { // closing a brace that has never been opened
              // braces don't match and won't match for $valueS
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
      array_push($results, [$i =&gt; "No"]);
    } else {
      array_push($results, [$i =&gt; "Yes"]);
    }
  }
  echo "&lt;pre&gt;"; print_r($results); echo "&lt;/pre&gt;";
  return $results;
}
Braces(["t()(){}", "t()(){}", "t()(){(})", "t()(){}"]);</code></pre>




</div><!-- col-md-10  -->

</div> <!-- /page wrapper row -->


</div>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://codewithawa.com/frontend/js/scripts.js"></script>
  <script src="http://codewithawa.com/assets/plugins/ckeditor/plugins/codesnippet/lib/highlight/prism.js"></script>



<script>

hljs.initHighlightingOnLoad()


</script>




</body>
</html>
