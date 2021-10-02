@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables_extend.css') }}">
@endpush

@section('content')
    <div class="mt-4 ml-4 mr-4 flex flex-col">
        <div class="flex flex-row justify-end mb-4">
            <a href="" class="flex flex-row px-4 py-2 text-white rounded-full bg-blue-400 hover:bg-blue-500 button">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Create Category
            </a>
        </div>
        <table class="table stripe hover" id="table" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
            <tr>
                <th data-priority="1">Category Name</th>
                <th data-priority="2">Total Products</th>
                <th data-priority="3">Created Date</th>
                <th data-priority="4">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->title }}</td>
                    <td>0 Product</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <div class="flex flex-row w-full justify-center">
                            <button class="dt-b-default">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/alpine.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script>
        const table = $('#table').DataTable({
            responsive: true,
            paginate: true,
            searching: false,
            info: false,
        }).columns.adjust()
            .responsive.recalc();

        function myFunction(x) {
            if (x.matches) { // If media query matches
                table.columns.adjust().responsive.recalc();
            } else {
                table.columns.adjust().responsive.recalc();
            }
        }

        var x = window.matchMedia("(min-width: 700px)")
        myFunction(x) // Call listener function at run time
        x.addListener(myFunction) // Attach listener function on state changes
    </script>
@endpush
