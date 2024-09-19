  <!-- header -->
  <header class="header">
      <nav class="navbar navbar-expand-lg ">
          <div class="container">
              <a class="navbar-brand" href="{{ route('home.index') }}">
                  <img src="{{ asset('assets/img/logo.svg') }}" alt="logo" class="img-fluid">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
                      </li>

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="{{ route('home.service') }}" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              Services
                          </a>
                          <div class="dropdown-menu container ">
                            @php
                            $dataType = \App\Models\Admin\CommonType::with('icon', 'service')->get();
                        @endphp

                        <div class="row">
                            @foreach ($dataType as $data)
                                <div class="col-lg-3">
                                    <div class="dropdown-item-menu">
                                        @php
                                            $serviceId = $data->service ? $data->service->id : null;
                                        @endphp
                                        <a href="{{ $serviceId !== null ? route('home.service.single', ['id' => $serviceId]) : route('home.service', ['id' => $data->id]) }}">
                                            <span>
                                                <img src="{{ $data->icon ? asset('storage/' . $data->icon->file) : '' }}"
                                                     alt="{{ $data->title }}" width="24" height="24">
                                            </span>
                                            {{ $data->title }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach


                              </div>
                          </div>

                      </li>

                      <li class="nav-item">
                          <a class="nav-link" href="{{route('home.about')}}">About Us</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('home.career') }}">Careers</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('home.contact') }}">Contact Us</a>
                      </li>

                  </ul>
                  <div class="d-flex">
                      <a href="{{ route('home.contact') }}" class="btn btn-main" type="submit">
                          Let’s Talk
                          <span>
                              <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 11.5997 0.375616 13.1116 1.04346 14.4525C1.22094 14.8088 1.28001 15.2161 1.17712 15.6006L0.581511 17.8267C0.322954 18.793 1.20701 19.677 2.17335 19.4185L4.39939 18.8229C4.78393 18.72 5.19121 18.7791 5.54753 18.9565C6.88836 19.6244 8.40032 20 10 20Z"
                                      fill="#8438F1" />
                                  <path
                                      d="M13 10C13 10.5523 13.4477 11 14 11C14.5523 11 15 10.5523 15 10C15 9.44772 14.5523 9 14 9C13.4477 9 13 9.44772 13 10Z"
                                      fill="white" />
                                  <path
                                      d="M9 10C9 10.5523 9.44772 11 10 11C10.5523 11 11 10.5523 11 10C11 9.44772 10.5523 9 10 9C9.44772 9 9 9.44772 9 10Z"
                                      fill="white" />
                                  <path
                                      d="M5 10C5 10.5523 5.44772 11 6 11C6.55228 11 7 10.5523 7 10C7 9.44772 6.55228 9 6 9C5.44772 9 5 9.44772 5 10Z"
                                      fill="white" />
                              </svg>
                          </span>
                      </a>
                  </div>
              </div>
          </div>
      </nav>
  </header>
