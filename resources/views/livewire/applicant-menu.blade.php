<div>
    @if ($isHome)
        <div class="section-header">
            <h1>Applicant Management</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Applicant List</h2>
            <p class="section-lead">In this section you can manage Applicants data such as adding, changing and deleting.</p>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <!-- Kosong -->
                        </div>
                        <div class="col-4">
                            <input wire:model.live.debounce.250ms="search" type="text" class="form-control" id="search" placeholder="Search Applicant">
                        </div>
                        <div class="col-4 text-right">
                            <button wire:click.prevent="create()" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                    <br>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        </div>
                        <br>
                    @endif
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($applicants as $index => $applicant)
                            <tr>
                                <th scope="row">{{$index + 1}}</th>
                                <td>{{$applicant->name}}</td>
                                <td>{{$applicant->email}}</td>
                                <td>{{$applicant->phone_number}}</td>
                                <td>
                                    <div class="buttons">
                                        <a href="#" wire:click.prevent="update({{$applicant->id}})" class="btn btn-icon btn-warning"><i class="fas fa-exclamation-triangle"></i></a>
                                        <a href="#" wire:click.prevent="delete({{$applicant->id}})" wire:confirm="Are you sure?" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>                    
                        @endforeach
                        </tbody>
                    </table>
                    {{$applicants->links()}}
                </div>
            </div>
        </div>
    @endif

    @if ($isCreate)
        <div class="section-header">
            <h1>Create Applicant</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Applicant</h2>
            <p class="section-lead">In this section you can create applicant.</p>
            <div class="card">
                <form wire:submit.prevent="save">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" wire:model="phone_number">
                            @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="domicile_address">Domicile Address</label>
                            <input type="text" class="form-control" id="domicile_address" wire:model="domicile_address">
                            @error('domicile_address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="education_institution">Education Institution</label>
                            <input type="text" class="form-control" id="education_institution" wire:model="education_institution">
                            @error('education_institution') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="majority">Majority</label>
                            <input type="text" class="form-control" id="majority" wire:model="majority">
                            @error('majority') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="buttons">
                            <a href="#" wire:click="home()" class="btn btn-primary">Back</a>
                            <button class="submit btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if($isUpdate)
        <div class="section-header">
            <h1>Update Applicant</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Update Applicant</h2>
            <p class="section-lead">In this section you can update applicant.</p>
            <div class="card">
                <form wire:submit.prevent="saveUpdate({{$applicantId}})">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" wire:model="phone_number">
                            @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="domicile_address">Domicile Address</label>
                            <input type="text" class="form-control" id="domicile_address" wire:model="domicile_address">
                            @error('domicile_address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="education_institution">Education Institution</label>
                            <input type="text" class="form-control" id="education_institution" wire:model="education_institution">
                            @error('education_institution') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="majority">Majority</label>
                            <input type="text" class="form-control" id="majority" wire:model="majority">
                            @error('majority') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="buttons">
                            <a href="#" wire:click="home()" class="btn btn-primary">Back</a>
                            <button class="submit btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
