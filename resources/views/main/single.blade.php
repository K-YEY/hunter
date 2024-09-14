<x-layout.layout>


    <section class="accountant">
        <div class="container">
            <nav class="nav">
                <a href="{{ route('home.index') }}" class="nav-link">
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                                <path
                                    d="M6.77168 11.6667C7.14172 13.1044 8.4468 14.1667 10 14.1667C11.5532 14.1667 12.8583 13.1044 13.2283 11.6667M9.18141 2.30335L3.52949 6.69929C3.15168 6.99314 2.96278 7.14006 2.82669 7.32406C2.70614 7.48705 2.61633 7.67067 2.56169 7.86589C2.5 8.08628 2.5 8.3256 2.5 8.80423V14.8333C2.5 15.7668 2.5 16.2335 2.68166 16.59C2.84144 16.9036 3.09641 17.1586 3.41002 17.3183C3.76654 17.5 4.23325 17.5 5.16667 17.5H14.8333C15.7668 17.5 16.2335 17.5 16.59 17.3183C16.9036 17.1586 17.1586 16.9036 17.3183 16.59C17.5 16.2335 17.5 15.7668 17.5 14.8333V8.80423C17.5 8.3256 17.5 8.08628 17.4383 7.86589C17.3837 7.67067 17.2939 7.48705 17.1733 7.32406C17.0372 7.14006 16.8483 6.99314 16.4705 6.69929L10.8186 2.30335C10.5258 2.07564 10.3794 1.96178 10.2178 1.91802C10.0752 1.8794 9.92484 1.8794 9.78221 1.91802C9.62057 1.96178 9.47418 2.07564 9.18141 2.30335Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>

                    </span>
                </a>
                <a class="nav-link active" aria-current="page"
                    href="  {{ Route::currentRouteName() == 'home.service.single' ? route('home.service') : route('home.career') }}">

                    {{ Route::currentRouteName() == 'home.service.single' ? 'Services' : 'Career' }}</a>
                <a class="nav-link"
                    href="{{ Route::currentRouteName() == 'home.service.single' ? route('home.service', ['id' => $data->type_id]) : route('home.career', ['id' => $data->type_id]) }}">{{$data->type->title}}</a>
            </nav>
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5">
                    <div class="accountant-img">
                        <img src="{{ asset('storage/' . $data->cover->file) }}" alt="{{ $data->title }}">
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="accountant-info">
                        <div class="head">
                            <img src="{{ asset('storage/' . $data->type->icon->file) }}" alt="{{ $data->type->title }}"
                                width="24" height="24">
                            <h1>{{ $data->type->title }}</h1>
                            <p>{{ $data->title }}</p>
                        </div>
                        <div class="desc">
                            <h3>{{ $data->text_highlight_desc }}</h3>
                            <p>Managing finances is key to running a successful business.
                                At Remote Hiring Hunt, we match you with skilled accountants
                                who make sure your financial operations are precise and insightful.
                                Our services help keep your financial processes running smoothly,
                                follow all the rules, and support your business goals</p>

                        </div>
                        @if ($data->list_of_text != '')
                            <ul>
                                <h3>{{ $data->text_highlight_list }}</h3>
                                @php
                                    $responsibilities = explode(',', $data->list_of_text);
                                $limitedResponsibilities = array_slice($responsibilities, 0, 4); @endphp
                                @foreach ($limitedResponsibilities as $responsibility)
                                    <li class="d-flex align-items-center">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_839_704)">
                                                <circle cx="24" cy="24" r="16" fill="#8438F1" />
                                            </g>
                                            <path
                                                d="M29.3327 20.6667L22.4708 27.5286C22.2104 27.789 21.7883 27.789 21.5279 27.5286L18.666 24.6667"
                                                stroke="white" stroke-width="2" stroke-linecap="round" />
                                            <defs>
                                                <filter id="filter0_d_839_704" x="0" y="0" width="48" height="48"
                                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                        result="hardAlpha" />
                                                    <feOffset />
                                                    <feGaussianBlur stdDeviation="4" />
                                                    <feComposite in2="hardAlpha" operator="out" />
                                                    <feColorMatrix type="matrix"
                                                        values="0 0 0 0 0.168627 0 0 0 0 0.14902 0 0 0 0 0.415686 0 0 0 1 0" />
                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                        result="effect1_dropShadow_839_704" />
                                                    <feBlend mode="normal" in="SourceGraphic"
                                                        in2="effect1_dropShadow_839_704" result="shape" />
                                                </filter>
                                            </defs>
                                        </svg>
                                        <p> {{ trim($responsibility) }}

                                        </p>
                                    </li>
                                @endforeach


                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="source">
        <div class="container">
            <div class="small-head text-center">
                <h2 class="title">Why Outsource Your Accounting to <br>
                    <span>Remote Hiring Hunt?</span>
                </h2>
                <p class="desc">Outsourcing your accounting is a strategic move with numerous benefits in today's
                    fast-paced <br> world.
                    It allows you to free up time and focus on growth instead of getting buried in financial details.
                    <br> By
                    choosing our remote accounting services, you can enjoy the following perks:
                </p>
            </div>
            <div class="sourceBoxContainer">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sourceBox text-center">
                            <svg width="76" height="76" viewBox="0 0 76 76" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_839_644)">
                                    <circle cx="38" cy="38" r="30" fill="#8438F1" />
                                </g>
                                <g clip-path="url(#clip0_839_644)">
                                    <path
                                        d="M44.4766 24.4874C43.9726 24.962 43.4776 25.3304 43.114 25.8002C42.7786 26.2334 42.5842 26.7758 42.3178 27.2888C35.9938 24.884 30.358 28.1438 28.0084 32.3108C25.4344 36.8762 26.2504 42.629 30.0262 46.253C33.8548 49.928 39.6022 50.5292 44.0806 47.7482C48.2068 45.1862 50.9764 39.6494 48.6988 33.6968C49.2196 33.4196 49.7692 33.2096 50.2162 32.8658C50.6866 32.5046 51.0592 32.0162 51.4948 31.562C54.1786 36.7448 53.5078 44.6174 47.5582 49.5416C41.7544 54.344 33.283 54.1034 27.8458 49.0136C22.276 43.799 21.3964 35.4464 25.786 29.3054C30.2878 23.0084 38.3428 21.4946 44.4766 24.4874Z"
                                        fill="white" />
                                    <path
                                        d="M45.1402 34.457C46.939 37.8686 45.8356 42.209 42.6604 44.492C39.4156 46.8254 34.9714 46.394 32.191 43.4762C29.4562 40.6058 29.2666 36.1592 31.7458 33.017C34.0684 30.0734 38.4718 29.0798 41.512 30.863C40.6516 31.7246 39.817 32.5892 38.941 33.4094C38.8012 33.5402 38.476 33.503 38.2384 33.494C35.65 33.3926 33.5062 35.4326 33.5116 38.0018C33.517 40.5416 35.6422 42.572 38.2012 42.4826C40.6678 42.3962 42.631 40.2452 42.484 37.7396C42.4576 37.2938 42.5752 37.0082 42.8854 36.7118C43.6366 35.996 44.3554 35.246 45.1402 34.4564V34.457Z"
                                        fill="white" />
                                    <path
                                        d="M48.0074 25.706C49.1156 24.8186 49.9256 24.7352 50.5862 25.3736C51.2606 26.0252 51.191 26.8382 50.3024 27.9908C50.9978 27.9908 51.6314 27.9638 52.2602 28.0046C52.4966 28.0202 52.8398 28.1402 52.919 28.3118C52.994 28.4744 52.85 28.8284 52.6922 28.9916C51.6518 30.071 50.5922 31.1324 49.5116 32.171C49.3256 32.3492 49.0082 32.393 48.7484 32.4902C48.6938 32.5106 48.6248 32.4926 48.5624 32.4932C47.606 32.5046 46.5464 32.2628 45.7226 32.5994C44.9216 32.9264 44.3606 33.8438 43.6976 34.5056C42.224 35.9768 40.7546 37.4528 39.2792 38.9216C38.5148 39.683 37.5584 39.7436 36.9056 39.086C36.2528 38.4284 36.3188 37.478 37.0826 36.7118C39.068 34.7216 41.0492 32.7266 43.0544 30.7568C43.3982 30.419 43.5326 30.0806 43.5146 29.612C43.484 28.8218 43.4804 28.0286 43.5206 27.239C43.5338 26.978 43.6556 26.666 43.8344 26.4794C44.8586 25.4138 45.9044 24.368 46.9706 23.3438C47.1482 23.1728 47.5322 23.0012 47.6912 23.0828C47.873 23.1758 47.9768 23.5472 47.9954 23.8058C48.038 24.4034 48.0092 25.0058 48.0092 25.7042L48.0074 25.706Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_839_644" x="0" y="0" width="76" height="76"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="4" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.168627 0 0 0 0 0.14902 0 0 0 0 0.415686 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_839_644" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_839_644"
                                            result="shape" />
                                    </filter>
                                    <clipPath id="clip0_839_644">
                                        <rect width="30" height="30" fill="white"
                                            transform="translate(23 23)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <h3>
                                Cost Efficiency
                            </h3>
                            <p>For small businesses with limited resources, hiring a professional virtual bookkeeper is
                                a
                                cost-effective alternative to a full-time traditional bookkeeper, ensuring your finances
                                are
                                managed efficiently and remotely. Outsourcing accounting services helps you cut overhead
                                costs,
                                including salaries, benefits, office space...</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sourceBox text-center">
                            <svg width="76" height="76" viewBox="0 0 76 76" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_839_644)">
                                    <circle cx="38" cy="38" r="30" fill="#8438F1" />
                                </g>
                                <g clip-path="url(#clip0_839_644)">
                                    <path
                                        d="M44.4766 24.4874C43.9726 24.962 43.4776 25.3304 43.114 25.8002C42.7786 26.2334 42.5842 26.7758 42.3178 27.2888C35.9938 24.884 30.358 28.1438 28.0084 32.3108C25.4344 36.8762 26.2504 42.629 30.0262 46.253C33.8548 49.928 39.6022 50.5292 44.0806 47.7482C48.2068 45.1862 50.9764 39.6494 48.6988 33.6968C49.2196 33.4196 49.7692 33.2096 50.2162 32.8658C50.6866 32.5046 51.0592 32.0162 51.4948 31.562C54.1786 36.7448 53.5078 44.6174 47.5582 49.5416C41.7544 54.344 33.283 54.1034 27.8458 49.0136C22.276 43.799 21.3964 35.4464 25.786 29.3054C30.2878 23.0084 38.3428 21.4946 44.4766 24.4874Z"
                                        fill="white" />
                                    <path
                                        d="M45.1402 34.457C46.939 37.8686 45.8356 42.209 42.6604 44.492C39.4156 46.8254 34.9714 46.394 32.191 43.4762C29.4562 40.6058 29.2666 36.1592 31.7458 33.017C34.0684 30.0734 38.4718 29.0798 41.512 30.863C40.6516 31.7246 39.817 32.5892 38.941 33.4094C38.8012 33.5402 38.476 33.503 38.2384 33.494C35.65 33.3926 33.5062 35.4326 33.5116 38.0018C33.517 40.5416 35.6422 42.572 38.2012 42.4826C40.6678 42.3962 42.631 40.2452 42.484 37.7396C42.4576 37.2938 42.5752 37.0082 42.8854 36.7118C43.6366 35.996 44.3554 35.246 45.1402 34.4564V34.457Z"
                                        fill="white" />
                                    <path
                                        d="M48.0074 25.706C49.1156 24.8186 49.9256 24.7352 50.5862 25.3736C51.2606 26.0252 51.191 26.8382 50.3024 27.9908C50.9978 27.9908 51.6314 27.9638 52.2602 28.0046C52.4966 28.0202 52.8398 28.1402 52.919 28.3118C52.994 28.4744 52.85 28.8284 52.6922 28.9916C51.6518 30.071 50.5922 31.1324 49.5116 32.171C49.3256 32.3492 49.0082 32.393 48.7484 32.4902C48.6938 32.5106 48.6248 32.4926 48.5624 32.4932C47.606 32.5046 46.5464 32.2628 45.7226 32.5994C44.9216 32.9264 44.3606 33.8438 43.6976 34.5056C42.224 35.9768 40.7546 37.4528 39.2792 38.9216C38.5148 39.683 37.5584 39.7436 36.9056 39.086C36.2528 38.4284 36.3188 37.478 37.0826 36.7118C39.068 34.7216 41.0492 32.7266 43.0544 30.7568C43.3982 30.419 43.5326 30.0806 43.5146 29.612C43.484 28.8218 43.4804 28.0286 43.5206 27.239C43.5338 26.978 43.6556 26.666 43.8344 26.4794C44.8586 25.4138 45.9044 24.368 46.9706 23.3438C47.1482 23.1728 47.5322 23.0012 47.6912 23.0828C47.873 23.1758 47.9768 23.5472 47.9954 23.8058C48.038 24.4034 48.0092 25.0058 48.0092 25.7042L48.0074 25.706Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_839_644" x="0" y="0" width="76" height="76"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="4" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.168627 0 0 0 0 0.14902 0 0 0 0 0.415686 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_839_644" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_839_644"
                                            result="shape" />
                                    </filter>
                                    <clipPath id="clip0_839_644">
                                        <rect width="30" height="30" fill="white"
                                            transform="translate(23 23)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <h3>
                                Cost Efficiency
                            </h3>
                            <p>For small businesses with limited resources, hiring a professional virtual bookkeeper is
                                a
                                cost-effective alternative to a full-time traditional bookkeeper, ensuring your finances
                                are
                                managed efficiently and remotely. Outsourcing accounting services helps you cut overhead
                                costs,
                                including salaries, benefits, office space...</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sourceBox text-center">
                            <svg width="76" height="76" viewBox="0 0 76 76" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_839_644)">
                                    <circle cx="38" cy="38" r="30" fill="#8438F1" />
                                </g>
                                <g clip-path="url(#clip0_839_644)">
                                    <path
                                        d="M44.4766 24.4874C43.9726 24.962 43.4776 25.3304 43.114 25.8002C42.7786 26.2334 42.5842 26.7758 42.3178 27.2888C35.9938 24.884 30.358 28.1438 28.0084 32.3108C25.4344 36.8762 26.2504 42.629 30.0262 46.253C33.8548 49.928 39.6022 50.5292 44.0806 47.7482C48.2068 45.1862 50.9764 39.6494 48.6988 33.6968C49.2196 33.4196 49.7692 33.2096 50.2162 32.8658C50.6866 32.5046 51.0592 32.0162 51.4948 31.562C54.1786 36.7448 53.5078 44.6174 47.5582 49.5416C41.7544 54.344 33.283 54.1034 27.8458 49.0136C22.276 43.799 21.3964 35.4464 25.786 29.3054C30.2878 23.0084 38.3428 21.4946 44.4766 24.4874Z"
                                        fill="white" />
                                    <path
                                        d="M45.1402 34.457C46.939 37.8686 45.8356 42.209 42.6604 44.492C39.4156 46.8254 34.9714 46.394 32.191 43.4762C29.4562 40.6058 29.2666 36.1592 31.7458 33.017C34.0684 30.0734 38.4718 29.0798 41.512 30.863C40.6516 31.7246 39.817 32.5892 38.941 33.4094C38.8012 33.5402 38.476 33.503 38.2384 33.494C35.65 33.3926 33.5062 35.4326 33.5116 38.0018C33.517 40.5416 35.6422 42.572 38.2012 42.4826C40.6678 42.3962 42.631 40.2452 42.484 37.7396C42.4576 37.2938 42.5752 37.0082 42.8854 36.7118C43.6366 35.996 44.3554 35.246 45.1402 34.4564V34.457Z"
                                        fill="white" />
                                    <path
                                        d="M48.0074 25.706C49.1156 24.8186 49.9256 24.7352 50.5862 25.3736C51.2606 26.0252 51.191 26.8382 50.3024 27.9908C50.9978 27.9908 51.6314 27.9638 52.2602 28.0046C52.4966 28.0202 52.8398 28.1402 52.919 28.3118C52.994 28.4744 52.85 28.8284 52.6922 28.9916C51.6518 30.071 50.5922 31.1324 49.5116 32.171C49.3256 32.3492 49.0082 32.393 48.7484 32.4902C48.6938 32.5106 48.6248 32.4926 48.5624 32.4932C47.606 32.5046 46.5464 32.2628 45.7226 32.5994C44.9216 32.9264 44.3606 33.8438 43.6976 34.5056C42.224 35.9768 40.7546 37.4528 39.2792 38.9216C38.5148 39.683 37.5584 39.7436 36.9056 39.086C36.2528 38.4284 36.3188 37.478 37.0826 36.7118C39.068 34.7216 41.0492 32.7266 43.0544 30.7568C43.3982 30.419 43.5326 30.0806 43.5146 29.612C43.484 28.8218 43.4804 28.0286 43.5206 27.239C43.5338 26.978 43.6556 26.666 43.8344 26.4794C44.8586 25.4138 45.9044 24.368 46.9706 23.3438C47.1482 23.1728 47.5322 23.0012 47.6912 23.0828C47.873 23.1758 47.9768 23.5472 47.9954 23.8058C48.038 24.4034 48.0092 25.0058 48.0092 25.7042L48.0074 25.706Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_839_644" x="0" y="0" width="76" height="76"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="4" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.168627 0 0 0 0 0.14902 0 0 0 0 0.415686 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_839_644" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_839_644"
                                            result="shape" />
                                    </filter>
                                    <clipPath id="clip0_839_644">
                                        <rect width="30" height="30" fill="white"
                                            transform="translate(23 23)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <h3>
                                Cost Efficiency
                            </h3>
                            <p>For small businesses with limited resources, hiring a professional virtual bookkeeper is
                                a
                                cost-effective alternative to a full-time traditional bookkeeper, ensuring your finances
                                are
                                managed efficiently and remotely. Outsourcing accounting services helps you cut overhead
                                costs,
                                including salaries, benefits, office space...</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sourceBox text-center">
                            <svg width="76" height="76" viewBox="0 0 76 76" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_839_644)">
                                    <circle cx="38" cy="38" r="30" fill="#8438F1" />
                                </g>
                                <g clip-path="url(#clip0_839_644)">
                                    <path
                                        d="M44.4766 24.4874C43.9726 24.962 43.4776 25.3304 43.114 25.8002C42.7786 26.2334 42.5842 26.7758 42.3178 27.2888C35.9938 24.884 30.358 28.1438 28.0084 32.3108C25.4344 36.8762 26.2504 42.629 30.0262 46.253C33.8548 49.928 39.6022 50.5292 44.0806 47.7482C48.2068 45.1862 50.9764 39.6494 48.6988 33.6968C49.2196 33.4196 49.7692 33.2096 50.2162 32.8658C50.6866 32.5046 51.0592 32.0162 51.4948 31.562C54.1786 36.7448 53.5078 44.6174 47.5582 49.5416C41.7544 54.344 33.283 54.1034 27.8458 49.0136C22.276 43.799 21.3964 35.4464 25.786 29.3054C30.2878 23.0084 38.3428 21.4946 44.4766 24.4874Z"
                                        fill="white" />
                                    <path
                                        d="M45.1402 34.457C46.939 37.8686 45.8356 42.209 42.6604 44.492C39.4156 46.8254 34.9714 46.394 32.191 43.4762C29.4562 40.6058 29.2666 36.1592 31.7458 33.017C34.0684 30.0734 38.4718 29.0798 41.512 30.863C40.6516 31.7246 39.817 32.5892 38.941 33.4094C38.8012 33.5402 38.476 33.503 38.2384 33.494C35.65 33.3926 33.5062 35.4326 33.5116 38.0018C33.517 40.5416 35.6422 42.572 38.2012 42.4826C40.6678 42.3962 42.631 40.2452 42.484 37.7396C42.4576 37.2938 42.5752 37.0082 42.8854 36.7118C43.6366 35.996 44.3554 35.246 45.1402 34.4564V34.457Z"
                                        fill="white" />
                                    <path
                                        d="M48.0074 25.706C49.1156 24.8186 49.9256 24.7352 50.5862 25.3736C51.2606 26.0252 51.191 26.8382 50.3024 27.9908C50.9978 27.9908 51.6314 27.9638 52.2602 28.0046C52.4966 28.0202 52.8398 28.1402 52.919 28.3118C52.994 28.4744 52.85 28.8284 52.6922 28.9916C51.6518 30.071 50.5922 31.1324 49.5116 32.171C49.3256 32.3492 49.0082 32.393 48.7484 32.4902C48.6938 32.5106 48.6248 32.4926 48.5624 32.4932C47.606 32.5046 46.5464 32.2628 45.7226 32.5994C44.9216 32.9264 44.3606 33.8438 43.6976 34.5056C42.224 35.9768 40.7546 37.4528 39.2792 38.9216C38.5148 39.683 37.5584 39.7436 36.9056 39.086C36.2528 38.4284 36.3188 37.478 37.0826 36.7118C39.068 34.7216 41.0492 32.7266 43.0544 30.7568C43.3982 30.419 43.5326 30.0806 43.5146 29.612C43.484 28.8218 43.4804 28.0286 43.5206 27.239C43.5338 26.978 43.6556 26.666 43.8344 26.4794C44.8586 25.4138 45.9044 24.368 46.9706 23.3438C47.1482 23.1728 47.5322 23.0012 47.6912 23.0828C47.873 23.1758 47.9768 23.5472 47.9954 23.8058C48.038 24.4034 48.0092 25.0058 48.0092 25.7042L48.0074 25.706Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_839_644" x="0" y="0" width="76" height="76"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="4" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.168627 0 0 0 0 0.14902 0 0 0 0 0.415686 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_839_644" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_839_644"
                                            result="shape" />
                                    </filter>
                                    <clipPath id="clip0_839_644">
                                        <rect width="30" height="30" fill="white"
                                            transform="translate(23 23)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <h3>
                                Cost Efficiency
                            </h3>
                            <p>For small businesses with limited resources, hiring a professional virtual bookkeeper is
                                a
                                cost-effective alternative to a full-time traditional bookkeeper, ensuring your finances
                                are
                                managed efficiently and remotely. Outsourcing accounting services helps you cut overhead
                                costs,
                                including salaries, benefits, office space...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Started -->
    @include('components.layout.started')
    <!-- Started -->

</x-layout.layout>
