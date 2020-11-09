<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\DoctorProfile;
use App\Models\ExaminationType;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = DB::table('doctors')
            ->join('doctor_profiles', 'doctors.id', '=', 'doctor_profiles.doctor_id')
            ->select('doctors.*', 'doctor_profiles.*')
            ->get();
        return view('dashboard.admins.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['countries'] = Country::all();
        $data['specialties'] = Specialty::all();
        // $data['ex_types'] = ExaminationType::all();
        return view('dashboard.admins.doctors.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
            DB::beginTransaction();
            $doctor_data = $request->only(['first_name','last_name','email','password','phone']);
            $doctor_data['password'] = bcrypt($request->password);
            $doctor = Doctor::create($doctor_data);

            $profile_data = $request->except(['first_name','last_name','email','password','phone','image','documents']);


            // Save Image
            if (request()->hasFile('image')) {
                $profile_img = Image::make($request->image)->encode('jpg');
                Storage::disk('local')->put('public/images/doctors/profile_images/' . $request->image->hashName(), (string)$profile_img, 'public');
                $profile_data['image'] = request()->image->hashName();
            }

            $doctor_profile = $doctor->doctorProfile()->create($profile_data);

            // Save Dcument
            if (request()->hasFile('documents')) {
                $docs = $request->documents;
                foreach ($docs as $doc) {
                    $document = Image::make($doc)->encode('jpg');
                    Storage::disk('local')->put('public/images/doctors/documents/' . $doc->hashName(), (string)$document, 'public');
                    $doctor_profile->files()->create([
                        'file' => $doc->hashName(),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.doctors.index')->with(['success' => 'The Doctor Created Successfully']);

            DB::rollBack();
            return redirect()->route('admin.doctors.index')->with(['error' => 'There Are Error ,Try Again']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return redirect()->route('admin.doctors.index')->with(['success', 'The Doctor Not Found']);
        }

        return view('dashboard.admins.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
