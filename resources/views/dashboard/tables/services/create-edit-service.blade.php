<x-dashboard.layout.layout title="Dashboard | Services" bodyClass="">
    <div class="row mt-5">
        <div class="col-12 col-xl-8">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Services information</h2>
                <form action="{{ isset($service) ? route('admin.edit.service.update') : route('admin.create.service.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($service)
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        @endif
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div>
                                    <label for="title">Title</label>
                                    <input class="form-control" id="title" type="text" placeholder="Enter your title"
                                        value="{{ isset($service) ? $service->title : old('title') }}" name="title" required />
                                </div>
                            </div>

                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-12 mb-3">
                                <label for="textarea">Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter your Description..." id="textarea" rows="4">{{ isset($service) ? $service->desc : old('description') }}</textarea>
                            </div>

                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12 mb-3">
                                <label for="type">Select Type</label>
                                <select class="form-select" name="type" id="type"
                                    aria-label="Default select example">
                                    @if (isset($service))
                                        <option value="{{ $service->type_id }}" selected>{{ $service->type->title }}</option>
                                    @else
                                        <option selected="" value="">Type Job</option>
                                    @endif

                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="mt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                    @if (isset($service) && $service->status == 'Publish') checked @endif name="status" value="Publish">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Publish</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">
                                {{ isset($service) ? 'Update' : 'Save all' }}
                            </button>
                        </div>
                </div>

            </div>
            <div class="col-12 col-xl-4">
                <div class="row">
                    @if (Route::currentRouteName() == 'admin.service.edit')
                        <div class="col-12 mb-4">
                            <div class="card shadow border-0 text-center p-0 ">
                                <a href="{{ isset($service) && $service->cover !== null ? asset('storage/' . $service->cover->file) : asset('bg.svg') }}"
                                    target="_blank">
                                    <div class="profile-cover rounded-top"
                                        data-background="{{ isset($service) && $service->cover !== null ? asset('storage/' . $service->cover->file) : asset('bg.svg') }}">
                                    </div>
                                </a>

                            </div>
                        </div>
                    @endif

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
                                                    1 mb
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
