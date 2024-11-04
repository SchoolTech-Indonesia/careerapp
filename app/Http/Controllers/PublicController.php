<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::latest()->get();
        return view('welcome', compact('opportunities'));
    }

    public function show($id)
    {
        $opportunity = Opportunity::find($id);
        $id_opportunity = $opportunity->id; // Mengambil ID opportunity
    
        return view('detailopportunity', compact('opportunity', 'id_opportunity'));
    }
    
    public function store(Request $request, $id)
{
    // Validasi data yang dikirim
    $request->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone_number' => 'required|string|max:15',
        'portfolio_link' => 'nullable|url',
        'cv_path' => 'required|file|mimes:pdf|max:2048', // Validasi file CV
        'gender' => 'required|string',
        'birthdate' => 'required|date',
        'address' => 'required|string',
        'religion' => 'required|string',
        'marital_status' => 'required|string',
        'last_education' => 'required|string',
        'education_name' => 'required|string',
        'major_name' => 'required|string',
        'gpa' => 'nullable|numeric|max:4',
        'graduate_status' => 'required|boolean', // Ubah ke boolean jika berupa angka 1 atau 0
        'graduate_year' => 'required|integer',
        'know_opportunity_form' => 'nullable|string',
    ]);

    // Upload CV dan simpan path-nya
    $cvPath = $request->file('cv_path')->store('cvs', 'public');

    // Buat instance model dan isi datanya
    $applicant = new Applicants();
    
    // Set UUID untuk kolom id
    $applicant->id = (string) Str::uuid(); // Menghasilkan UUID baru
    $applicant->fullname = $request->fullname;
    $applicant->email = $request->email;
    $applicant->phone_number = $request->phone_number;
    $applicant->portfolio_link = $request->portfolio_link;
    $applicant->id_opportunity = $id; // Ambil dari parameter route
    $applicant->cv_path = $cvPath;
    $applicant->gender = $request->gender;
    $applicant->birthdate = $request->birthdate;
    $applicant->address = $request->address;
    $applicant->religion = $request->religion;
    $applicant->marital_status = $request->marital_status;
    $applicant->last_education = $request->last_education;
    $applicant->education_name = $request->education_name;
    $applicant->major_name = $request->major_name;
    $applicant->gpa = $request->gpa;
    $applicant->graduate_status = $request->graduate_status;
    $applicant->graduate_year = $request->graduate_year;
    $applicant->know_opportunity_form = $request->know_opportunity_form;

    try {
        // Simpan data ke database
        $applicant->save();
        return redirect()->back()->with('success', 'Application submitted successfully.');
    } catch (\Exception $e) {
        // Menangani kesalahan jika terjadi saat penyimpanan
        return redirect()->back()->with('error', 'Failed to submit application: ' . $e->getMessage());
    }
}
}