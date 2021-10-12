@extends('frontend.layouts.app')

@section('title', 'College Programs')

@push('after-styles')
    <link href="{{ url('css/search.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 3rem;">
        <h5 class="fw-bolder">College Programs</h5>
        <hr>
    </div>

    <div class="container language-programs">
        <div class="row mt">
            <div class="col-12">
                <table class="table table-striped table-bordered" id="programs-table" style="width:100%">
                    <thead>
                        <tr class="align-items-center">
                            <th scope="col">Program Name</th>
                            <th scope="col">School Name</th>
                            <th scope="col">Description</th>
                            <th scope="col" style="max-width: 150px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(function () {
            var table = $('#programs-table').DataTable({
                processing: true,
                ajax: "{{route('frontend.get_college_programs')}}",
                serverSide: true,
                order: [[0, "asc"]],
                columns: [
                    {data: 'program_name', name: 'program_name'},
                    {data: 'school_name', name: 'school_name'},
                    {data: 'sub_title', name: 'sub_title'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>

@endpush