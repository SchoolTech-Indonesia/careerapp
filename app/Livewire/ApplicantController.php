<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function show($id)
    {
        $opportunity = Opportunity::with(['division', 'category', 'schema'])->find($id);

        if (!$opportunity) {
            // Debugging the opportunity not found
            dd('Opportunity not found. ID: ' . $id);
        }

        // Debugging the opportunity data
        dd($opportunity);

        return view('opportunity.show', compact('opportunity'));
    }

    public function store(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'portfolio_link' => 'nullable|url',
            'cv_path' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'gender' => 'required|in:male,female',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
            'religion' => 'required|string',
            'marital_status' => 'required|in:single,married',
            'last_education' => 'required|string|max:255',
            'education_name' => 'required|string|max:255',
            'major_name' => 'required|string|max:255',
            'gpa' => 'nullable|numeric',
            'graduate_status' => 'required|in:1,0',
            'graduate_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'know_opportunity_form' => 'nullable|string|max:255',
        ]);

        // Debugging the request data
        dd($request->all());

        // Simpan data pelamar ke database
        $applicant = new Applicant();
        $applicant->fullname = $request->fullname;
        $applicant->email = $request->email;
        $applicant->phone_number = $request->phone_number;
        $applicant->portfolio_link = $request->portfolio_link;
        $applicant->cv_path = $request->file('cv_path')->store('cvs');
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
        $applicant->opportunity_id = $id;
        $applicant->save();

        // Debugging after successful save
        dd('Application submitted successfully.');

        return redirect()->route('opportunity.show', ['id' => $id])->with('success', 'Your application has been submitted successfully.');
    }
}
