<?php

namespace App\Http\Livewire;

use App\Models\Applicant;
use App\Models\Applicants;
use Livewire\Component;

class ApplicantMenu extends Component
{
    public $applicants; // To hold the list of applicants
    public $selectedApplicant; // To hold the selected applicant's data
    public $id, $opportunity_id, $name, $email, $phone_number, $gender_id, $birth_date, $domicile_address;
    public $religion_id, $marital_id, $education_id, $education_institution;
    public $majority, $gpa, $graduate_status, $graduate_year, $information_from;
    public $portfolio_link, $cv_file;

    protected $listeners = ['showOpportunityDetails'];


    public function showOpportunityDetails($id)
    {
        // Mengambil data pemohon berdasarkan ID
        $applicant = Applicants::find($id);
    
        if ($applicant) {
            // Mengatur nilai properti berdasarkan data pemohon yang diambil
            $this->id = $applicant->id;
            $this->opportunity_id = $applicant->opportunity_id;
            $this->name = $applicant->name;
            $this->email = $applicant->email;
            $this->phone_number = $applicant->phone_number;
            $this->gender_id = $applicant->gender_id;
            $this->birth_date = $applicant->birth_date;
            $this->domicile_address = $applicant->domicile_address;
            $this->religion_id = $applicant->religion_id;
            $this->marital_id = $applicant->marital_id;
            $this->education_id = $applicant->education_id;
            $this->education_institution = $applicant->education_institution;
            $this->majority = $applicant->majority;
            $this->gpa = $applicant->gpa;
            $this->graduate_status = $applicant->graduate_status;
            $this->graduate_year = $applicant->graduate_year;
            $this->information_from = $applicant->information_from;
            $this->portfolio_link = $applicant->portfolio_link;
            $this->cv_file = $applicant->cv_file;
    
            // Jika ingin reset setelah mengisi, bisa dipanggil disini
            // $this->resetFields(); // Uncomment jika perlu mereset
        } else {
            // Tangani kasus ketika applicant tidak ditemukan
            session()->flash('error', 'Applicant not found.');
        }
    }
    

    public function mount()
    {
        $this->applicants = Applicants::all(); // Load all applicants
    }

    public function selectApplicant($id)
    {
        $this->selectedApplicant = Applicants::find($id);
        $this->fill($this->selectedApplicant->toArray()); // Fill form fields with selected applicant data
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            // Add more validation rules as needed
        ]);
        
        // dd($this->getApplicantData()); // Cek data yang akan disimpan

        Applicants::updateOrCreate(
            ['id' => $this->selectedApplicant ? $this->selectedApplicant->id : null],
            $this->getApplicantData()
        );

        session()->flash('message', 'Applicant saved successfully.');
        $this->resetFields();
        $this->applicants = Applicants::all(); // Refresh the applicants list
    }

    protected function getApplicantData()
    {
        return [
            'id' => $this->id,
            'opportunity_id' => $this->opportunity_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'gender_id' => $this->gender_id,
            'birth_date' => $this->birth_date,
            'domicile_address' => $this->domicile_address,
            'religion_id' => $this->religion_id,
            'marital_id' => $this->marital_id,
            'education_id' => $this->education_id,
            'education_institution' => $this->education_institution,
            'majority' => $this->majority,
            'gpa' => $this->gpa,
            'graduate_status' => $this->graduate_status,
            'graduate_year' => $this->graduate_year,
            'information_from' => $this->information_from,
            'portfolio_link' => $this->portfolio_link,
            'cv_file' => $this->cv_file,
        ];
    }

    public function resetFields()
    {
        $this->selectedApplicant = null;
        $this->id = null;
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->gender_id = '';
        $this->birth_date = '';
        $this->domicile_address = '';
        $this->religion_id = '';
        $this->marital_id = '';
        $this->education_id = '';
        $this->education_institution = '';
        $this->majority = '';
        $this->gpa = '';
        $this->graduate_status = '';
        $this->graduate_year = '';
        $this->information_from = '';
        $this->portfolio_link = '';
        $this->cv_file = '';
    }

    public function render()
{
    $applicants = Applicants::where('name', 'like', '%' . $this->search . '%')->get(); // Gunakan `get()` untuk mengambil data

    return view('livewire.opportunity-menu', ['applicants' => $applicants]);
}

    
    
    
    
}

