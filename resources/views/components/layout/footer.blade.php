<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-4">
                <div class="foot-img">
                  <a href="{{ route('home.index') }}"> <img src="{{ asset('assets/img/logo.svg') }}" alt="" /></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="linethrough">Useful Links</h5>
                        <ul class="list-none">
                            <li class="li-item">
                                <a href="{{ route('home.index') }}">Home</a>
                            </li>
                            <li class="li-item">
                                <a href="{{ route('home.service') }}">Services</a>
                            </li>
                            <li class="li-item">
                                <a href="{{ route('home.about') }}">About</a>

                            </li>
                            <li class="li-item">
                                <a href="{{ route('home.career') }}">Careers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="linethrough">info Links</h5>
                        <ul class="list-none">
                            <li class="li-item">
                                <a href="{{ route('home.contact') }}">Contact Us</a>
                            </li>
                            <li class="li-item">
                                <a href="{{ route('home.privacy') }}">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4" style="text-align: -webkit-center;">
                <div class="social w-100">
               @php
              $socials= \App\Models\Social::where('status','active')->get();
               @endphp
                @foreach($socials as $social)
                    <a href="{{ $social->link }}">
                        {{ $social->title }}
                       {!! $social->icon !!}
                    </a>
                @endforeach
                </div>
            </div>
        </div>
        <h5 class="copywrite">©R2H. 2024 All rights reserved.</h5>
    </div>
</footer>
