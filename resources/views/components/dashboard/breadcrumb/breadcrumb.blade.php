<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">

                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> <svg class="icon icon-xxs" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5"
                                d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                stroke="#1C274C" stroke-width="1.5" />
                            <path d="M9 16C9.85038 16.6303 10.8846 17 12 17C13.1154 17 14.1496 16.6303 15 16"
                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
            </ol>
        </nav>
        <h2 class="h4">{{ $title }} </h2>
        <p class="mb-0">{{ $subTitle }} </p>
    </div>
    @isset($urlBtn)
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ $urlBtn }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"
                @isset($modalId)
                data-bs-toggle="modal" data-bs-target="#{{ $modalId }}"
                @endisset>
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                {{ $titleBtn }}
            </a>
        </div>
    @endisset
</div>
