<x-dashboard.layout.layout title="Dashboard">


    <x-dashboard.breadcrumb.breadcrumb title="Contact"
        subTitle="Remember well that you will only live once.  if write @Meeting , @Waiting , @Met FILTERS. "
        page="Contact"></x-dashboard.breadcrumb.breadcrumb>
    <x-dashboard.searchbar.searchtable action="{{ route('admin.contact.table') }}"
        value="{{ request()->input('search') }}" placeholder="Careers"></x-dashboard.searchbar.searchtable>

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Name</th>
                    <th class="border-gray-200">Email</th>
                    <th class="border-gray-200">Compant Name</th>
                    <th class="border-gray-200">Country</th>
                    <th class="border-gray-200">Message (click to show more)</th>
                    <th class="border-gray-200">Schedule</th>
                    <th class="border-gray-200">Status</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($contacts->count() == 0)
                    <tr>
                        <td colspan="10">
                            <div class="alert alert-info" role="alert">
                                No contacts found
                            </div>
                        </td>
                    </tr>
                @endif
                @foreach ($contacts as $contact)
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">{{ $contact->id }}</a>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $contact->name }}</span>
                        </td>
                        <td>
                            <span class="fw-bold"> {{ $contact->email }}</span>
                        </td>
                        <td>
                            <span class="fw-normal"> {{ $contact->company_name }}</span>
                        </td>
                        <td>
                            <span class="fw-normal"> {{ $contact->country_name }}</span>
                        </td>

                        <td>
                            <span class="fw-bold"><a href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#modal-more-{{ $contact->id }}"  >{{ Str::limit($contact->message, 30) }}</a></span>
                        </td>
                        <td>
                            <span class="fw-bold"> {{ $contact->schedule }} </span>
                        </td>
                        <td>
                            <span
                                class="fw-bold     @if ($contact->status == 'Meeting') bg-success
                                @elseif ($contact->status == 'Met')
                                    bg-info
                                @else
                                    bg-warning @endif  px-2 py-1 rounded text-white">
                                @if ($contact->status == 'Meeting')
                                    Meeting
                                @elseif ($contact->status == 'Met')
                                    Met
                                @else
                                    Waiting
                                @endif

                            </span>
                        </td>

                        <td>
                            <div class="btn-group">
                                {{-- meeting --}}
                                <a href="{{  $contact->zoom_link }}" target="_blank"> <svg
                                        class="icon icon-xs text-gray-600" fill="none" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z"
                                                stroke="#10B981" stroke-width="1.5" />
                                            <path opacity="0.5"
                                                d="M16 12C16 11.1555 15.0732 10.586 13.2195 9.44695C11.3406 8.29234 10.4011 7.71504 9.70056 8.13891C9 8.56279 9 9.70853 9 12C9 14.2915 9 15.4372 9.70056 15.8611C10.4011 16.285 11.3406 15.7077 13.2195 14.5531C15.0732 13.414 16 12.8445 16 12Z"
                                                stroke="#10B981" stroke-width="1.5" stroke-linecap="round" />
                                        </g>

                                    </svg>
                                </a>

                                {{-- edit --}}
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#modal-default-{{ $contact->id }}"> <svg
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
                                <div class="modal fade" id="modal-default-{{ $contact->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.update.contact') }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h2 class="h6 modal-title"> Edit Status</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="status">Status</label>
                                                                <select class="form-select" name="status"
                                                                    id="status" aria-label="Default select example">

                                                                    <option value="Meeting"
                                                                        @if ($contact->status == 'Meeting') selected @endif>
                                                                        Meeting</option>
                                                                    <option value="Waiting"
                                                                        @if ($contact->status == 'Waiting') selected @endif>
                                                                        Waiting</option>
                                                                    <option value="Met"
                                                                        @if ($contact->status == 'Met') selected @endif>
                                                                        Met</option>


                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn btn-success animate-up-2">Save</button>
                                                    <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Content -->



                                {{-- delete --}}

                                <a href="{{ route('admin.delete.contact', $contact->id) }}">
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
          <!-- Modal Content -->
          <div class="modal fade" id="modal-more-{{ $contact->id }}" tabindex="-1"
            role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                        <div class="modal-header">
                            <h2 class="h6 modal-title"> Message</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                 <p> {{ $contact->message }}</p>

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
                    @if ($contacts->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link"
                                href="{{ $contacts->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($contacts->links()->elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $contacts->currentPage())
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
                    @if ($contacts->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $contacts->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>

            <div class="fw-normal small mt-4 mt-lg-0">
                Showing <b>{{ $contacts->firstItem() }}</b> to <b>{{ $contacts->lastItem() }}</b> out of
                <b>{{ $contacts->total() }}</b> entries
            </div>
        </div>

    </div>



</x-dashboard.layout.layout>
