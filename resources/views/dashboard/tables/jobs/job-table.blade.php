<x-dashboard.layout.layout title="Dashboard">


    <x-dashboard.breadcrumb.breadcrumb title="Jobs"
        subTitle="Remember well that you will only live once.  if write @Publish , @Draft."
        page="Jobs"></x-dashboard.breadcrumb.breadcrumb>
    <x-dashboard.searchbar.searchtable action="{{ route('admin.job.table') }}" value="{{ request()->input('search') }}"
        placeholder="Jobs"></x-dashboard.searchbar.searchtable>

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Title </th>
                    <th class="border-gray-200">Info (click to show more)</th>
                    <th class="border-gray-200">Type</th>
                    <th class="border-gray-200">Status</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($jobs->count() == 0)
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-info" role="alert">
                                No jobs found
                            </div>
                        </td>
                    </tr>
                @endif
                @foreach ($jobs as $job)
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">{{ $job->id }}</a>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $job->title }}</span>
                        </td>

                        <td>
                            <span class="fw-bold"><a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#modal-more-{{ $job->id }}">{{ Str::limit($job->desc, 30) }}</a></span>
                        </td>
                        <td>
                            <span class="fw-bold"> {{ $job->type->title }} </span>
                        </td>
                        <td>
                            <span
                                class="fw-bold  @if ($job->status == 'Publish') bg-success

                                @else
                                    bg-warning @endif  px-2 py-1 rounded text-white">
                                @if ($job->status == 'Publish')
                                    Published
                                @else
                                    Draft
                                @endif

                            </span>
                        </td>

                        <td>
                            <div class="btn-group">

                                {{-- edit --}}
                                <a href="{{ route('admin.job.edit', $job->id) }}"> <svg class="icon icon-xs text-gray-600" fill="none"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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




                                {{-- delete --}}

                                <a href="{{ route('admin.delete.job', $job->id) }}">
                                    <svg class="icon icon-xs text-gray-600" fill="none" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

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
                    <!-- Modal Content -->
                    <div class="modal fade" id="modal-more-{{ $job->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="modal-default" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h2 class="h6 modal-title">Info</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <p>SubTitle: {{ $job->sub_title }}</p>
                                            <p>Head Line For List: {{ $job->text_highlight_list }}</p>
                                            <p>List: {{ $job->list_of_text }}</p>
                                            <p>Head Line For Description: {{ $job->text_highlight_desc }}</p>
                                            <p>Description: {{ $job->desc }}</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Content -->
                @endforeach
            </tbody>
        </table>

        <div
            class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <nav aria-label="Page navigation example">
                <ul class="pagination mb-0">
                    <!-- Previous Page Link -->
                    @if ($jobs->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $jobs->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($jobs->links()->elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $jobs->currentPage())
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
                    @if ($jobs->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $jobs->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>

            <div class="fw-normal small mt-4 mt-lg-0">
                Showing <b>{{ $jobs->firstItem() }}</b> to <b>{{ $jobs->lastItem() }}</b> out of
                <b>{{ $jobs->total() }}</b> entries
            </div>
        </div>

    </div>



</x-dashboard.layout.layout>
