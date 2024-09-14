<x-layout.layout loop="true">
    <!-- hero -->
    <section class="hero-services pb-0">
        <div class="container">
            <div class="row  align-items-center justify-content-center">
                <div class="col-lg-12 ">
                    <div class="title-content text-center">
                        <h1 class="title">Let’s Build <br>
                            <span>Your Remote Career</span>
                        </h1>
                        <img src="{{ asset('assets/img/careers/carousel.svg') }}" class="mt-5 mb-5 px-4">
                        <p class="desc">
                            No matter where you are in your career journey, we have the perfect job opportunity waiting
                            for you
                        </p>
                        <a href="#career" class="btn btn-view">
                            Applay Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="career" id="career">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-8">
                    <div class="title">
                        <h2>
                            Choose the Role You’re Passionate About
                        </h2>
                    </div>
                </div>
                @foreach ($data as $job)
                    <div class="col-md-6">
                        <div class="careerBox card-service">
                            <div class="service-img">
                                <img src="{{ asset('storage/' . $job->cover->file) }}" alt="" class='w-100' />
                                <div class="button">
                                    <a href="{{ route('home.career.single', $job->id) }}" class="btn-view mt-0">
                                        <span class="text"> Applay</span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 11L11 1M11 1H1M11 1V11" stroke="#8438F1" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"></path>

                                        </svg>
                                    </a>
                                </div>
                                <div class="img-content px-4">
                                    <img width="20" height="20"
                                        src="{{ asset('storage/' . $job->type->icon->file) }}"
                                        style="margin-left: -6rem;" alt="Job Type Icon">


                                    <h5 class="title">
                                        {{ Str::words($job->title, 6) }}
                                    </h5>
                                    <p class="desc"> {{ Str::words($job->desc, 8) }}</p>
                                </div>
                            </div>
                            <div class="content-box">
                                <ul>
                                    @php
                                        $responsibilities = explode(',', $job->list_of_text);
                                    $limitedResponsibilities = array_slice($responsibilities, 0, 4); @endphp
                                    @foreach ($limitedResponsibilities as $responsibility)
                                        <li>
                                            <span class="icon">
                                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.3332 1.66663L5.47124 8.52856C5.21089 8.7889 4.78878 8.7889 4.52843 8.52856L1.6665 5.66663"
                                                        stroke="white" stroke-width="2" stroke-linecap="round" />
                                                </svg>

                                            </span>
                                            {{ trim($responsibility) }}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

</x-layout.layout>
