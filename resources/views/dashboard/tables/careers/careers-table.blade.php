<x-dashboard.layout.layout title="Dashboard">


    <x-dashboard.breadcrumb.breadcrumb title="Careers" subTitle="Remember well that you will only live once.  if write @reviewing , @accepted , @rejected FILTERS. "
        page="Careers" titleBtn="Add"></x-dashboard.breadcrumb.breadcrumb>
    <x-dashboard.searchbar.searchtable action="{{ route('admin.careers.table') }}"
        value="{{ request()->input('search') }}" placeholder="Careers"></x-dashboard.searchbar.searchtable>

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Name</th>
                    <th class="border-gray-200">Email</th>
                    <th class="border-gray-200">Phone</th>
                    <th class="border-gray-200">Country</th>
                    <th class="border-gray-200">Work</th>
                    <th class="border-gray-200">HAU</th>
                    <th class="border-gray-200">Status</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($careers->count() == 0)
                    <tr>
                        <td colspan="10">
                            <div class="alert alert-info" role="alert">
                                No careers found
                            </div>
                        </td>
                    </tr>
                @endif
                @foreach ($careers as $career)
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">{{ $career->id }}</a>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $career->name }}</span>
                        </td>
                        <td>
                            <span class="fw-bold"> {{ $career->email }}</span>
                        </td>
                        <td>
                            <span class="fw-normal"> {{ $career->phone }}</span>
                        </td>
                        <td>
                            <span class="fw-bold"> {{ $career->country_name }}</span>
                        </td>

                        <td>
                            <span class="fw-normal"> In a job: {{ $career->is_job ? 'Yes' : 'No' }} </span>,
                            <span class="fw-normal"> Remotely work: {{ $career->is_remote ? 'Yes' : 'No' }}</span>,
                            <span class="fw-normal"> Education Lavel: {{ $career->education }}</span>
                        </td>
                        <td>
                            <span class="fw-bold"> {{ $career->hear_us }} </span>
                        </td>
                        <td>
                            <span
                                class="fw-bold     @if ($career->status == 'Accepted') bg-success
                                @elseif ($career->status == 'Rejected')
                                    bg-danger
                                @else
                                    bg-warning @endif  px-2 py-1 rounded text-white">
                                @if ($career->status == 'Accepted')
                                    Accepted
                                @elseif ($career->status == 'Rejected')
                                    Rejected
                                @else
                                    Reviewing
                                @endif

                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                {{-- view resume --}}
                                <a href="{{ asset($career->resume) }}" target="_blank"> <svg
                                        class="icon icon-xs text-gray-600" fill="none" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.3116 12.6473L20.8293 10.7154C21.4335 8.46034 21.7356 7.3328 21.5081 6.35703C21.3285 5.58657 20.9244 4.88668 20.347 4.34587C19.6157 3.66095 18.4881 3.35883 16.2331 2.75458C13.978 2.15033 12.8504 1.84821 11.8747 2.07573C11.1042 2.25537 10.4043 2.65945 9.86351 3.23687C9.27709 3.86298 8.97128 4.77957 8.51621 6.44561C8.43979 6.7254 8.35915 7.02633 8.27227 7.35057L8.27222 7.35077L7.75458 9.28263C7.15033 11.5377 6.84821 12.6652 7.07573 13.641C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6392 12.3508 17.2435L12.3508 17.2435C14.3834 17.7881 15.4999 18.0873 16.415 17.9744C16.5152 17.9621 16.6129 17.9448 16.7092 17.9223C17.4796 17.7427 18.1795 17.3386 18.7203 16.7612C19.4052 16.0299 19.7074 14.9024 20.3116 12.6473Z"
                                            stroke="#1C274C" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M16.415 17.9741C16.2065 18.6126 15.8399 19.1902 15.347 19.6519C14.6157 20.3368 13.4881 20.6389 11.2331 21.2432C8.97798 21.8474 7.85044 22.1495 6.87466 21.922C6.10421 21.7424 5.40432 21.3383 4.86351 20.7609C4.17859 20.0296 3.87647 18.9021 3.27222 16.647L2.75458 14.7151C2.15033 12.46 1.84821 11.3325 2.07573 10.3567C2.25537 9.58627 2.65945 8.88638 3.23687 8.34557C3.96815 7.66065 5.09569 7.35853 7.35077 6.75428C7.77741 6.63996 8.16368 6.53646 8.51621 6.44531"
                                            stroke="#1C274C" stroke-width="1.5" />
                                        <path d="M11.7769 10L16.6065 11.2941" stroke="#1C274C" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5" d="M11 12.8975L13.8978 13.6739" stroke="#1C274C"
                                            stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </a>
                                     {{-- view Career --}}
                                     <a href="{{ route('home.career.single', ['id' => $career->job_id]) }}" target="_blank"> <svg
                                        class="icon icon-xs text-gray-600" fill="none" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z" fill="#04b964"></path> <path opacity="0.5" d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22" stroke="#04b964" stroke-width="1.5"></path> <ellipse opacity="0.5" cx="17" cy="14.5" rx="1" ry="1.5" fill="#04b964"></ellipse> <path opacity="0.5" d="M9 17.5C10.8167 18.7111 13.1833 18.7111 15 17.5" stroke="#04b964" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <ellipse opacity="0.5" cx="7" cy="14.5" rx="1" ry="1.5" fill="#04b964"></ellipse> </g>
                                    </svg>
                                </a>
                                {{-- view profile --}}

                                <a href="{{ $career->profile }}" target="_blank"> <svg
                                        class="icon icon-xs text-gray-600" fill="none" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="2" stroke="#1C274C"
                                            stroke-width="1.5" />
                                        <path
                                            d="M13 15C13 16.1046 13 17 9 17C5 17 5 16.1046 5 15C5 13.8954 6.79086 13 9 13C11.2091 13 13 13.8954 13 15Z"
                                            stroke="#1C274C" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                            stroke="#1C274C" stroke-width="1.5" />
                                        <path d="M19 12H15" stroke="#1C274C" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path d="M19 9H14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.9" d="M19 15H16" stroke="#1C274C" stroke-width="1.5"
                                            stroke-linecap="round" />
                                    </svg>
                                </a>
                                {{-- edit --}}

                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#modal-default-{{ $career->id }}"> <svg
                                        class="icon icon-xs text-gray-600" fill="none" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5"
                                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                        <path
                                            d="M17.3009 2.80624L16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9L8.03811 15.0229C7.9492 15.2897 8.01862 15.5837 8.21744 15.7826C8.41626 15.9814 8.71035 16.0508 8.97709 15.9619L10.1 15.5876L11.8354 15.0091C12.3775 14.8284 12.6485 14.7381 12.9035 14.6166C13.2043 14.4732 13.4886 14.2975 13.7513 14.0926C13.9741 13.9188 14.1761 13.7168 14.5801 13.3128L20.5449 7.34795L21.1938 6.69914C22.2687 5.62415 22.2687 3.88124 21.1938 2.80624C20.1188 1.73125 18.3759 1.73125 17.3009 2.80624Z"
                                            stroke="#1C274C" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M16.6522 3.45508C16.6522 3.45508 16.7333 4.83381 17.9499 6.05034C19.1664 7.26687 20.5451 7.34797 20.5451 7.34797M10.1002 15.5876L8.4126 13.9"
                                            stroke="#1C274C" stroke-width="1.5" />
                                    </svg>
                                </a>
                                <!-- Modal Content -->
                                <div class="modal fade" id="modal-default-{{ $career->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('admin.update.careers')}}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h2 class="h6 modal-title"> Edit Status</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <input type="hidden" name="id"
                                                        value="{{ $career->id }}">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="status">Status</label>
                                                                <select class="form-select" name="status"
                                                                    id="status"
                                                                    aria-label="Default select example">

                                                                    <option value="Accepted"
                                                                        @if ($career->status == 'Accepted') selected @endif>
                                                                        Accepted</option>
                                                                    <option value="Rejected"
                                                                        @if ($career->status == 'Rejected') selected @endif>
                                                                        Rejected</option>
                                                                    <option value="Reviewing"
                                                                        @if ($career->status == 'Reviewing') selected @endif>
                                                                        Reviewing</option>


                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success animate-up-2">Save</button>
                                                    <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Content -->



                                {{-- delete --}}

                                <a href="{{ route('admin.delete.careers', $career->id) }}">
                                    <svg class="icon icon-xs text-gray-600" fill="none" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                            stroke-linejoin="round" />

                                        <g id="SVGRepo_iconCarrier">
                                            <circle cx="12" cy="6" r="4" stroke="#ff0000"
                                                stroke-width="1.5" />
                                            <path opacity="0.5"
                                                d="M14 20.8344C13.3663 20.9421 12.695 21 12 21C8.13401 21 5 19.2091 5 17C5 14.7909 8.13401 13 12 13C13.7135 13 15.2832 13.3518 16.5 13.9359"
                                                stroke="#ff0000" stroke-width="1.5" />
                                            <circle cx="17" cy="18" r="4" stroke="#ff0000"
                                                stroke-width="1.5" />
                                            <path d="M15.6665 16.6667L18.3332 19.3333M18.3335 16.6667L15.6668 19.3333"
                                                stroke="#ff0000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div
            class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <nav aria-label="Page navigation example">
                <ul class="pagination mb-0">
                    <!-- Previous Page Link -->
                    @if ($careers->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link"
                                href="{{ $careers->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($careers->links()->elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $careers->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($careers->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $careers->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>

            <div class="fw-normal small mt-4 mt-lg-0">
                Showing <b>{{ $careers->firstItem() }}</b> to <b>{{ $careers->lastItem() }}</b> out of
                <b>{{ $careers->total() }}</b> entries
            </div>
        </div>

    </div>



</x-dashboard.layout.layout>
