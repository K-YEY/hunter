<x-layout.layout>
    <section class="hero-services">
        <div class="container">
            <div class="row  align-items-center justify-content-center">
                <div class="col-lg-12 ">
                    <div class="title-content text-center">
                        <img src="assets/img/icon/check.svg" class="img-hero" alt="">
                        <p class="desc">The Recruiting Solutions</p>
                        <h1 class="title">You Need To Propel
                            Your Business
                            <span>Forward</span>
                        </h1>
                        <img src="{{ asset('assets/img/icon/search.svg') }}" class="img-search" alt="">
                    </div>
                </div>


            </div>

        </div>

    </section>
    <!--  -->
    <section class="our-services">
        <div class="container">
            <div class="title-head">
                <h2 class="title">Our Services</h2>
            </div>
            <div class="row">
                @foreach ($data as $service)
                    <div class="col-lg-4 col-md-6 pb-3">
                        <div class="card-service   w-100">
                            <div class="service-body">
                                <div class="service-img">
                                    <img src="{{ asset('storage/' . $service->cover->file) }}"
                                        alt="{{ $service->title }}" />
                                    <div class="img-content px-4">
                                        <img width="20" height="20"
                                            src="{{ asset('storage/' . $service->type->icon->file) }}"
                                            style="margin-left: -6rem; object-fit: none; height: 20px"
                                            alt="Job Type Icon">
                                        <h5 class="title">{{ Str::words($service->title, 6) }}</h5>
                                    </div>
                                </div>

                                <div class="service-data">
                                    <p>
                                        {{ Str::words($service->desc, 8) }}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('home.service.single', $service->id) }}" class="btn-view">
                                        <span class="text">View more</span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 11L11 1M11 1H1M11 1V11" stroke="#8438F1" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!--  -->
    <!-- Started -->
    @include('components.layout.started')
    <!-- Started -->
</x-layout.layout>
