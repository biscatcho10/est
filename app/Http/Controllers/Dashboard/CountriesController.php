<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::all();
         return view('dashboard.admins.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('dashboard.admins.countries.create');
    }

    public function store(CountryRequest $request)
    {
        try {
            $country = Country::create($request->except('_token'));
            $country->name = $request->name;
            $country->save();
            return redirect()->route('admin.countries.index')->with(['success', 'Country Added Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.countries.index')->with(['success', 'There Are Wrong, Try Agin']);
        }
    }

    public function edit(Request $request, $id)
    {
        $country = Country::find($id);
        if(!$country)
        {
            return redirect()->route('admin.countries.index')->with(['success', 'The Country Not Found']);
        }

        return view('dashboard.admins.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request)
    {
        try {

            $country = Country::find($request->id);
            if(!$country)
            {
                return redirect()->route('admin.countries.index')->with(['success', 'The Country Not Found']);
            }

            $country->update($request->except('_token','id'));
            $country->name = $request->name;
            $country->save();
            return redirect()->route('admin.countries.index')->with(['success', 'Country Updated Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.countries.index')->with(['success', 'There Are Wrong, Try Agin']);
        }
    }

    public function destroy($id)
    {
        try {

            $country = Country::find($id);
            if(!$country)
            {
                return redirect()->route('admin.countries.index')->with(['success', 'The Country Not Found']);
            }

            $country->translations()->delete();
            $country->delete();
            return redirect()->route('admin.countries.index')->with(['success', 'Country Deleted Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.countries.index')->with(['success', 'There Are Wrong, Try Agin']);
        }
    }


}
