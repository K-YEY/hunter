<x-dashboard.layout.layout title="Dashboard" bodyClass="">
    <div class="row mt-5">
        <div class="col-12 col-xl-8">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">General information</h2>
                <form action="{{ isset($admin) ? route('admin.edit.admin.update'): route('admin.create.admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($admin)
                    <input type="hidden" name="admin_id" value="{{ $admin->id }}">
                    @endif
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">First Name</label>
                                <input class="form-control" id="first_name" type="text"
                                    placeholder="Enter your first name"
                                    value="{{ isset($admin) ? trimName($admin->name) : trimName(old('name')) }}"
                                    name="first_name" required />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Last Name</label>
                                <input class="form-control" id="last_name" type="text"
                                    placeholder="Also your last name" name="last_name"
                                    value="{{ isset($admin) ? trimName($admin->name, false) : trimName(old('name'), false) }}"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-12 mb-3">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M3 10.4167C3 7.21907 3 5.62028 3.37752 5.08241C3.75503 4.54454 5.25832 4.02996 8.26491 3.00079L8.83772 2.80472C10.405 2.26824 11.1886 2 12 2C12.8114 2 13.595 2.26824 15.1623 2.80472L15.7351 3.00079C18.7417 4.02996 20.245 4.54454 20.6225 5.08241C21 5.62028 21 7.21907 21 10.4167C21 10.8996 21 11.4234 21 11.9914C21 17.6294 16.761 20.3655 14.1014 21.5273C13.38 21.8424 13.0193 22 12 22C10.9807 22 10.62 21.8424 9.89856 21.5273C7.23896 20.3655 3 17.6294 3 11.9914C3 11.4234 3 10.8996 3 10.4167Z"
                                            stroke="#1C274C" stroke-width="1.5" />
                                        <circle cx="12" cy="9" r="2" stroke="#1C274C"
                                            stroke-width="1.5" />
                                        <path
                                            d="M16 15C16 16.1046 16 17 12 17C8 17 8 16.1046 8 15C8 13.8954 9.79086 13 12 13C14.2091 13 16 13.8954 16 15Z"
                                            stroke="#1C274C" stroke-width="1.5" />

                                    </svg>
                                </span>
                                <input class="form-control" id="username" name="username" type="text"
                                    placeholder="user_123" value="{{ isset($admin) ? $admin->username : old('username') }}"
                                    required />
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input class="form-control" id="pass" type="password" placeholder="user202@#$%"
                                    name="password" {{ isset($admin) ? '' : 'required' }} />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="pass_confirm">Confirm Password</label>
                                <input class="form-control" id="pass_confirm" name="password_confirmation"
                                    type="password" placeholder="user202@#$%"  {{ isset($admin) ? '' : 'required' }} />
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">
                            {{ isset($admin) ? 'Update' : 'Save all' }}
                        </button>
                    </div>
            </div>

        </div>
        <div class="col-12 col-xl-4">
            <div class="row">
                @if (Route::currentRouteName() == 'admin.edit')
                    <div class="col-12 mb-4">
                        <div class="card shadow border-0 text-center p-0">
                            <div class="profile-cover rounded-top"
                                data-background="{{ isset($admin) && $admin->cover !== null ? asset('storage/' . $admin->cover) : asset('bg.svg') }}">
                            </div>
                            <div class="card-body pb-5">
                                <img src="{{ isset($admin) && $admin->image !== null ? asset('storage/' . $admin->image) : asset('avatar.png') }}"
                                    class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait" />
                                <h4 class="h3 text-capitalize">{{ isset($admin)? $admin->name : 'Admin' }}</h4>

                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <div class="card card-body border-0 shadow mb-4">
                        <h2 class="h5 mb-4">Select profile photo</h2>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <!-- Avatar -->
                                <img id="profileImage" class="rounded avatar-xl" src="{{ asset('avatar.png') }}"
                                    alt="change avatar" />
                            </div>
                            <div class="file-field">
                                <div class="d-flex justify-content-xl-center ms-xl-3">
                                    <div class="d-flex">
                                        <svg class="icon text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <input type="file" class="image-input" name="profile_photo"
                                            data-target="#profileImage" />
                                        <div class="d-md-block text-left">
                                            <div class="fw-normal text-dark mb-1">
                                                Choose Image
                                            </div>
                                            <div class="text-gray small">
                                                JPG, GIF or PNG. Max size of
                                                800K
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-body border-0 shadow">
                        <h2 class="h5 mb-4">Select cover photo</h2>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <!-- Avatar -->
                                <img id="coverImage" class="rounded avatar-xl" src="{{ asset('bg.svg') }}"
                                    alt="change cover" />
                            </div>
                            <div class="file-field">
                                <div class="d-flex justify-content-xl-center ms-xl-3">
                                    <div class="d-flex">
                                        <svg class="icon text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <input type="file" class="image-input" name="cover_photo"
                                            data-target="#coverImage" />
                                        <div class="d-md-block text-left">
                                            <div class="fw-normal text-dark mb-1">
                                                Choose Image
                                            </div>
                                            <div class="text-gray small">
                                                JPG, GIF or PNG. Max size of
                                                800K
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>

</x-dashboard.layout.layout>
