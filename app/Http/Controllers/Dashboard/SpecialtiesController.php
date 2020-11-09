<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtyRequest;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtiesController extends Controller
{
    public function index()
    {
        $specialties = Specialty::all();
         return view('dashboard.admins.specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('dashboard.admins.specialties.create');
    }

    public function store(SpecialtyRequest $request)
    {
        try {
            $specialty = Specialty::create($request->except('_token'));
            $specialty->name = $request->name;
            $specialty->save();
            return redirect()->route('admin.specialties.index')->with(['success', 'Specialty Added Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.specialties.index')->with(['success', 'There Are Wrong, Try Agin']);
        }
    }

    public function edit(Request $request, $id)
    {
        $specialty = Specialty::find($id);
        if(!$specialty)
        {
            return redirect()->route('admin.specialties.index')->with(['success', 'The Specialty Not Found']);
        }

        return view('dashboard.admins.specialties.edit', compact('specialty'));
    }

    public function update(SpecialtyRequest $request)
    {
        try {

            $specialty = Specialty::find($request->id);
            if(!$specialty)
            {
                return redirect()->route('admin.specialties.index')->with(['success', 'The Specialty Not Found']);
            }

            $specialty->update($request->except('_token','id'));
            $specialty->name = $request->name;
            $specialty->save();
            return redirect()->route('admin.specialties.index')->with(['success', 'Specialty Updated Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.specialties.index')->with(['success', 'There Are Wrong, Try Agin']);
        }
    }

    public function destroy($id)
    {
        try {

            $specialty = Specialty::find($id);
            if(!$specialty)
            {
                return redirect()->route('admin.specialties.index')->with(['success', 'The Specialty Not Found']);
            }

            $specialty->translations()->delete();
            $specialty->delete();
            return redirect()->route('admin.specialties.index')->with(['success', 'Specialty Deleted Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.specialties.index')->with(['success', 'There Are Wrong, Try Agin']);
        }
    }
}
