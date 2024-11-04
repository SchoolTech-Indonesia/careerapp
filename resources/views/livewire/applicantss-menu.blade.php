<div class="col-lg-6 col-md-12">
    <form wire:submit.prevent="submitApplication">
        <p><strong>Applicant Form</strong></p> 
        <div class="wow fadeIn" data-wow-delay=".3s">
            <div class="p-5 rounded contact-form">
                <div class="mb-4">
                    <p class="text-white">Full Name</p>
                    <span class="text-white">Tuliskan nama lengkap anda sesuai dengan KTP</span>
                    <input type="text" class="form-control border-0 py-3" wire:model="fullname">
                    @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Email Address</p>
                    <input type="email" class="form-control border-0 py-3" wire:model="email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Phone Number</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="phone_number">
                    @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Portfolio Link</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="portfolio_link">
                    @error('portfolio_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Curriculum Vitae</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="cv_path">
                    @error('cv_path')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Gender</p>
                    <select class="form-control border-0 py-3" wire:model="gender">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Birth Date</p>
                    <input type="date" class="form-control border-0 py-3" wire:model="birthdate">
                    @error('birthdate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Address</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="address">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Religion</p>
                    <select class="form-control border-0 py-3" wire:model="religion">
                        <option value="">Select Religion</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                    </select>
                    @error('religion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Marital Status</p>
                    <select class="form-control border-0 py-3" wire:model="marital_status">
                        <option value="">Select Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                    </select>
                    @error('marital_status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Last Education</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="last_education">
                    @error('last_education')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Education Name</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="education_name">
                    @error('education_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Major Name</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="major_name">
                    @error('major_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">GPA</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="gpa">
                    @error('gpa')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Graduate Status</p>
                    <select class="form-control border-0 py-3" wire:model="graduate_status">
                        <option value="">Select Graduate Status</option>
                        <option value="1">Graduated</option>
                        <option value="0">Not Graduated</option>
                    </select>
                    @error('graduate_status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Graduate Year</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="graduate_year">
                    @error('graduate_year')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Know Opportunity Form</p>
                    <input type="text" class="form-control border-0 py-3" wire:model="know_opportunity_form">
                    @error('know_opportunity_form')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-start">
                    <button class="btn bg-primary text-white py-3 px-5" 
                    type="submit" wire:click.prevent="submitApplication">Sent Application</button>
                </div>
            </div>
    </form>
</div>