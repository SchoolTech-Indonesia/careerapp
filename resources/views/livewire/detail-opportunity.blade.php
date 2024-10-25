<div class="col-lg-6 col-md-12">
    <form wire:submit.prevent="save">
        <p><strong>Applicant Form</strong></p>
        <div class="wow fadeIn" data-wow-delay=".3s">
            <div class="p-5 rounded contact-form">
                {{-- <livewire:detail-opportunity /> --}}
                <div class="mb-4">
                    <p class="text-white">Full Name</p>
                    <span class="text-white">Tuliskan nama lengkap anda sesuai dengan KTP</span>
                    <input type="text" class="form-control border-0 py-3" wire:model.defer="fullname" required>
                    @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Email Address</p>
                    <input type="email" class="form-control border-0 py-3" wire:model.defer="email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Phone Number</p>
                    <input type="text" class="form-control border-0 py-3" wire:model.defer="phone" required>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Portfolio Link</p>
                    <input type="text" class="form-control border-0 py-3" wire:model.defer="portfolio">
                </div>
                <div class="mb-4">
                    <p class="text-white">Curriculum Vitae</p>
                    <input type="file" class="form-control border-0 py-3" wire:model.defer="cv" required>
                    @error('cv')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <p class="text-white">Gender</p>
                    <select class="form-control border-0 py-3" wire:model.defer="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Men</option>
                        <option value="female">Women</option>
                    </select>
                </div>
                <div class="mb-4">
                    <p class="text-white">Birth Date</p>
                    <input type="date" class="form-control border-0 py-3" wire:model.defer="birth_date" required>
                </div>
                <div class="mb-4">
                    <p class="text-white">Address</p>
                    <input type="text" class="form-control border-0 py-3" wire:model.defer="address" required>
                </div>
                <div class="mb-4">
                    <p class="text-white">Religion</p>
                    <select class="form-control border-0 py-3" wire:model.defer="religion" required>
                        <option value="" disabled selected>Select Religion</option>
                        <option value="islam">Islam</option>
                        <option value="christian">Kristen</option>
                    </select>
                </div>
                <div class="mb-4">
                    <p class="text-white">Marital Status</p>
                    <select class="form-control border-0 py-3" wire:model.defer="marital_status" required>
                        <option value="" disabled selected>Select Marital Status</option>
                        <option value="married">Married</option>
                        <option value="not_married">Not Married</option>
                    </select>
                </div>
                <div class="mb-4">
                    <p class="text-white">Last Education</p>
                    <select class="form-control border-0 py-3" wire:model.defer="last_education" required>
                        <option value="" disabled selected>Select Education Level</option>
                        <option value="highschool">High School</option>
                        <option value="bachelor">Bachelor</option>
                        <option value="master">Master</option>
                        <option value="phd">PhD</option>
                    </select>
                </div>
                <div class="mb-4">
                    <p class="text-white">Education Name</p>
                    <input type="text" class="form-control border-0 py-3" wire:model.defer="education_name" required>
                </div>
                <div class="mb-4">
                    <p class="text-white">Majority Name</p>
                    <input type="text" class="form-control border-0 py-3" wire:model.defer="majority_name" required>
                </div>
                <div class="mb-4">
                    <p class="text-white">GPA</p>
                    <input type="text" class="form-control border-0 py-3" wire:model.defer="gpa" required>
                </div>
                <div class="mb-4">
                    <p class="text-white">Graduate Status</p>
                    <select class="form-control border-0 py-3" wire:model.defer="graduate_status" required>
                        <option value="" disabled selected>Select Status</option>
                        <option value="graduate">Graduate</option>
                        <option value="not_graduate">Not Graduate</option>
                    </select>
                </div>
                <div class="mb-4">
                    <p class="text-white">Graduate Year</p>
                    <input type="text" class="form-control border-0 py-3" wire:model.defer="graduate_year"
                        required>
                </div>
                <div class="mb-4">
                    <p class="text-white">Know Opportunity From</p>
                    <select class="form-control border-0 py-3" wire:model.defer="know_opportunity_from" required>
                        <option value="" disabled selected>Select Source</option>
                        <option value="friends">Friends</option>
                        <option value="website">Website</option>
                        <option value="social_media">Social Media</option>
                    </select>
                </div>
                <div class="text-start">
                    <button type="submit" class="btn bg-primary text-white py-3 px-5">Send
                        Application</button>
                </div>
            </div>
        </div>
    </form>
</div>
