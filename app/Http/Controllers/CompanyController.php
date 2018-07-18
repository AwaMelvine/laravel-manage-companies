<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;

// Form Requests
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

// Models
use App\Company;

use Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of companies
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::select('id', 'name', 'email', 'website')->paginate(10);
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.companies.create');
    }

    /**
     * Store a newly created company in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $validated = $request->validated();

        $input = [
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'website' => $request->input('website')
        ];

        // processing logo file
        if ($request->hasFile('logo')) {
            $file = $request->logo;

            // form a name for the logo file
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fullname = $name . '.' . date('Y-m-d') . '.' . $extension;

            // stores logo file in storage/app/public director with file name $fullname
            Storage::putFileAs('public', $file, $fullname, 'public');

            // adding filename to $input to be saved in the database
            $input['logo'] = $fullname;
        }

        Company::create($input);

        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'New company record created');

        return redirect()->route('companies.index');
    }

    /**
     * Display details about a specified company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $company = Company::find($id);
      return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
      $validated = $request->validated();

      $input = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'website' => $request->input('website')
      ];

      // processing logo file
      if ($request->hasFile('logo')) {
          $file = $request->logo;

          // forming a name for the logo file
          $name = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $fullname = $name . '.' . date('Y-m-d') . '.' . $extension;

          // storing logo file in storage/app/public director with file name $fullname
          Storage::putFileAs('public', $file, $fullname, 'public');

          // adding filename to $input array to be saved in the database
          $input['logo'] = $fullname;
      }

      // get the old company record and update it
      $oldCompanyRecord = Company::find($id);
      $oldCompanyRecord->update($input);

      Session::flash('alert-class', 'alert-success');
      Session::flash('message', 'Company record updated');

      return redirect()->route('companies.index');
    }

    /**
     * Remove the specified company from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $oldCompanyRecord = Company::find($id);
      // delete old profile picture
      Storage::delete('public/' . $oldCompanyRecord->logo);

      $oldCompanyRecord->delete();
      return redirect()->route('companies.index');
    }
}
