<x-dashboard.layout.layout title="Dashboard">

    <x-dashboard.breadcrumb.breadcrumb title="FAQ"
        subTitle="However difficult life may seem, there is always something you can do and succeed at."
        page="FAQ"></x-dashboard.breadcrumb.breadcrumb>


    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Title</th>
                    <th class="border-gray-200">Content</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($faqs->count() == 0)
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-info" role="alert">
                                No faqs found
                            </div>
                        </td>
                    </tr>
                @endif
                @foreach ($faqs as $widget)
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">{{ $widget->id }}</a>
                        </td>
                        <td>
                            <span class="fw-normal">{{ Str::limit($widget->question, 30) }}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{ Str::limit($widget->answer, 50) }}</span>
                        </td>

                        <td>
                            <div class="btn-group">

                                {{-- edit --}}
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#modal-default-{{ $widget->id }}">
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

                                <!-- Modal Content -->
                                <div class="modal fade" id="modal-default-{{ $widget->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.update.faq') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $widget->id }}">
                                                <div class="modal-header">
                                                    <h2 class="h6 modal-title"> Edit FAQ</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group mb-3">
                                                        <label for="question">Question</label>
                                                        <input type="text" name="question" id="question" class="form-control"
                                                            value="{{ $widget->question }}" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="answer">Answer</label>
                                                        <textarea name="answer" id="answer" class="form-control" rows="3"
                                                            required>{{ $widget->answer }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Content -->

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
                    @if ($faqs->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $faqs->previousPageUrl() }}">Previous</a></li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($faqs->links()->elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $faqs->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($faqs->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $faqs->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>

            <div class="fw-normal small mt-4 mt-lg-0">
                Showing <b>{{ $faqs->firstItem() }}</b> to <b>{{ $faqs->lastItem() }}</b> out of
                <b>{{ $faqs->total() }}</b> entries
            </div>
        </div>
    </div>
</x-dashboard.layout.layout>
