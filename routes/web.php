<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/braces', function () {
    return view('braces');
})->name('braces');
Route::get('/braces/demo', function () {
    return view('braces_demo');
})->name('braces.demo');

Route::post('/braces/demo', function(){
  $valueStringArray = request()->input('valueS');
  $notNullStrings = array_filter($valueStringArray, function($valueS) { return $valueS !== null; });
  // echo "<pre>"; print_r("results"); echo "</pre>";
  $results = Braces($notNullStrings);
  // dd($results);
  return redirect()->back()->with('results', $results);
})->name('braces.test');


Route::group(['prefix' => 'admin', 'middleware' => 'admin_only'], function(){
  // Company routes

  // Route::resource('companies', 'CompanyController');

  Route::get('companies', ['uses' => 'CompanyController@index', 'as' => 'companies.index']);
  Route::get('companies/create', ['uses' => 'CompanyController@create', 'as' => 'companies.create']);
  Route::get('companies/{id}', ['uses' => 'CompanyController@show', 'as' => 'companies.show']);
  Route::get('companies/{id}/edit', ['uses' => 'CompanyController@edit', 'as' => 'companies.edit']);
  Route::post('companies', ['uses' => 'CompanyController@store', 'as' => 'companies.store']);
  Route::put('companies/{id}', ['uses' => 'CompanyController@update', 'as' => 'companies.update']);
  Route::get('companies/{id}/delete', ['uses' => 'CompanyController@destroy', 'as' => 'companies.destroy']);

  // Employee routes

  // Route::resource('employees', 'EmployeeController');

  Route::get('employees', ['uses' => 'EmployeeController@index', 'as' => 'employees.index']);
  Route::get('employees/create', ['uses' => 'EmployeeController@create', 'as' => 'employees.create']);
  Route::get('employees/{id}', ['uses' => 'EmployeeController@show', 'as' => 'employees.show']);
  Route::get('employees/{id}/edit', ['uses' => 'EmployeeController@edit', 'as' => 'employees.edit']);
  Route::post('employees', ['uses' => 'EmployeeController@store', 'as' => 'employees.store']);
  Route::put('employees/{id}', ['uses' => 'EmployeeController@update', 'as' => 'employees.update']);
  Route::get('employees/{id}/delete', ['uses' => 'EmployeeController@destroy', 'as' => 'employees.destroy']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



function Braces($arrStr) {
  $results = [];
  $ALL_BRACES = ")]}{[(";
  $OPEN = "{[(";
  $CLOSE = ")]}";
  $refMap = [
    '}' => '{',
    '{' => '}',
    '[' => ']',
    ']' => '[',
    '(' => ')',
    ')' => '('
  ];
  for ($i = 0; $i < sizeof($arrStr); $i++) {
    $valueS = $arrStr[$i]; // loop through string array
    $opened = []; // $opened is a record of all opened braces in order of appearance
    // hash map for each $valueS
    // if a brace is opened, 1 is subtracted from its value
    // if that braces other pair is closed, 1 is added to it's value, normalizing it back to 0
    $map = [
      '}' => 0,
      '{' => 0,
      '[' => 0,
      ']' => 0,
      '(' => 0,
      ')' => 0
    ];
    for ($j = 0; $j < strlen($valueS); $j++) { // looping through each character of $valueS
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
            } else if($map[$otherPair] >= $map[$char]) { // closing a brace that has never been opened
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
      array_push($results, "No");
    } else {
      array_push($results, "Yes");
    }
  }
  // echo "<pre>"; print_r($results); echo "</pre>";
  return $results;
}
