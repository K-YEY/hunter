<x-dashboard.layout.layout title="Dashboard">


    <x-dashboard.breadcrumb.breadcrumb title="All Admins" subTitle="Actions speak louder than words."
        page="Admins"></x-dashboard.breadcrumb.breadcrumb>
   <x-dashboard.searchbar.searchtable action="{{ route('admin.admins.table') }}" value="{{ request()->input('search') }}" placeholder="Admins" ></x-dashboard.searchbar.searchtable>

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Name</th>
                    <th class="border-gray-200">Username</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($admins->count() == 0)
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-info" role="alert">
                                No admins found
                            </div>
                        </td>
                    </tr>
                @endif
                @foreach ($admins as $admin)
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">{{ $admin->id }}</a>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $admin->name }}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $admin->username }}</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <!-- Your action buttons/icons here -->
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#modal-default-{{ $admin->id }}">

                                    <svg class="icon icon-xs text-gray-600" fill="none" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">

                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M7.67004 11.6064L8.20037 12.1367L7.67004 11.6064ZM6 13.9682H5.25H6ZM10.0318 18V18.75V18ZM11.6064 7.67004L11.076 7.13971L11.6064 7.67004ZM12.6506 16.073C12.9435 16.3659 13.4183 16.3659 13.7112 16.073C14.0041 15.7801 14.0041 15.3053 13.7112 15.0124L12.6506 16.073ZM8.98764 10.2888C8.69474 9.99588 8.21987 9.99588 7.92698 10.2888C7.63408 10.5817 7.63408 11.0565 7.92698 11.3494L8.98764 10.2888ZM15.7996 11.8633L11.8633 15.7996L12.924 16.8603L16.8603 12.924L15.7996 11.8633ZM8.20037 12.1367L12.1367 8.20037L11.076 7.13971L7.13971 11.076L8.20037 12.1367ZM8.20037 15.7996C7.6287 15.228 7.25442 14.8514 7.01378 14.536C6.78634 14.2379 6.75 14.0841 6.75 13.9682H5.25C5.25 14.544 5.492 15.0144 5.82124 15.4459C6.13728 15.8601 6.59802 16.3186 7.13971 16.8603L8.20037 15.7996ZM7.13971 11.076C6.59802 11.6177 6.13728 12.0762 5.82124 12.4904C5.492 12.922 5.25 13.3924 5.25 13.9682H6.75C6.75 13.8522 6.78634 13.6984 7.01378 13.4003C7.25442 13.0849 7.6287 12.7084 8.20037 12.1367L7.13971 11.076ZM11.8633 15.7996C11.2916 16.3713 10.9151 16.7456 10.5997 16.9862C10.3016 17.2137 10.1478 17.25 10.0318 17.25V18.75C10.6076 18.75 11.078 18.508 11.5096 18.1788C11.9238 17.8627 12.3823 17.402 12.924 16.8603L11.8633 15.7996ZM7.13971 16.8603C7.6814 17.402 8.13989 17.8627 8.55411 18.1788C8.98563 18.508 9.45604 18.75 10.0318 18.75V17.25C9.91588 17.25 9.76207 17.2137 9.46398 16.9862C9.14858 16.7456 8.77204 16.3713 8.20037 15.7996L7.13971 16.8603ZM15.7996 8.20037C16.3713 8.77204 16.7456 9.14858 16.9862 9.46398C17.2137 9.76207 17.25 9.91588 17.25 10.0318H18.75C18.75 9.45604 18.508 8.98563 18.1788 8.55411C17.8627 8.13989 17.402 7.6814 16.8603 7.13971L15.7996 8.20037ZM16.8603 12.924C17.402 12.3823 17.8627 11.9238 18.1788 11.5096C18.508 11.078 18.75 10.6076 18.75 10.0318H17.25C17.25 10.1478 17.2137 10.3016 16.9862 10.5997C16.7456 10.9151 16.3713 11.2916 15.7996 11.8633L16.8603 12.924ZM16.8603 7.13971C16.3186 6.59802 15.8601 6.13728 15.4459 5.82124C15.0144 5.492 14.544 5.25 13.9682 5.25V6.75C14.0841 6.75 14.2379 6.78634 14.536 7.01378C14.8514 7.25442 15.228 7.6287 15.7996 8.20037L16.8603 7.13971ZM12.1367 8.20037C12.7084 7.6287 13.0849 7.25442 13.4003 7.01378C13.6984 6.78634 13.8522 6.75 13.9682 6.75V5.25C13.3924 5.25 12.922 5.492 12.4904 5.82124C12.0762 6.13728 11.6177 6.59802 11.076 7.13971L12.1367 8.20037ZM13.7112 15.0124L8.98764 10.2888L7.92698 11.3494L12.6506 16.073L13.7112 15.0124Z"
                                                fill="#ED4337" />
                                            <path opacity="0.5"
                                                d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                stroke="#ED4337" stroke-width="1.5" />
                                        </g>
                                    </svg>
                                </a>
                                <!-- Modal Content -->
                                <div class="modal fade" id="modal-default-{{ $admin->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="h6 modal-title">Delete <del>{{ $admin->name }}</del></h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-footer">
                                                <a href="{{ route('admin.delete.admins', $admin->id) }}"
                                                    class="btn btn-danger">Accept</a>
                                                <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Content -->


                                <a href="{{ route('admin.edit', $admin->id) }}" target="_blank">
                                    <svg class="icon icon-xs text-gray-600" fill="none" viewBox="0 0 24 24"
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
                    @if ($admins->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $admins->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($admins->links()->elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $admins->currentPage())
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
                    @if ($admins->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $admins->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>

            <div class="fw-normal small mt-4 mt-lg-0">
                Showing <b>{{ $admins->firstItem() }}</b> to <b>{{ $admins->lastItem() }}</b> out of
                <b>{{ $admins->total() }}</b> entries
            </div>
        </div>

    </div>



</x-dashboard.layout.layout>
