<x-dashboard.layout.layout title="Dashboard">


    <x-dashboard.breadcrumb.breadcrumb title="Types" subTitle="Remember well that you will only live once." page="Types"
        titleBtn="Add"></x-dashboard.breadcrumb.breadcrumb>
    <x-dashboard.searchbar.searchtable action="{{ route('admin.careers.table') }}"
        value="{{ request()->input('search') }}" placeholder="Type"></x-dashboard.searchbar.searchtable>

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
                        <td colspan="4">
                            <div class="alert alert-info" role="alert">
                                No Type found
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
                            <span class="fw-bold"> {{ $career->Country }}</span>
                        </td>
                        <td>
                            <span class="fw-normal"> {{ $career->Education }}</span>
                        </td>
                        <td>
                            <span class="fw-normal"> In a job: </span>,
                            <span class="fw-normal"> Remotely work: </span>,
                            <span class="fw-normal"> Education Lavel: </span>
                        </td>
                        <td>
                            <span class="fw-bold"> {{ $career->hear_us }}  </span>
                        </td>
                        <td>
                            <span class="fw-bold bg bg-success"> {{ $career->status }} </span>
                        </td>

                        <td>
                            <div class="btn-group">

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
                        <li class="page-item"><a class="page-link" href="{{ $careers->nextPageUrl() }}">Next</a></li>
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
