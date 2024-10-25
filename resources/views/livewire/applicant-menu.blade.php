<div>
    <select wire:model="selectedOpportunityId">
        <option value="">Pilih Opportunity</option>
        @foreach ($opportunities as $opportunity)
            <option value="{{ $opportunity->id }}">{{ $opportunity->title }}</option>
        @endforeach
    </select>

    <h2>Daftar Pelamar</h2>
    @if ($applicants->isEmpty())
        <p>No applicants found.</p>
    @else
        @foreach ($applicants as $applicant)
            <div>
                <h5>{{ $applicant->name }}</h5>
                <p>Email: {{ $applicant->email }}</p>
                <p>Opportunity: {{ $applicant->opportunity_id }}</p>
                <p>Domisili: {{ $applicant->domicile_address }}</p>
            </div>
        @endforeach
    @endif
</div>
