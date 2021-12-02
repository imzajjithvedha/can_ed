@extends('frontend.layouts.app')

@section('title', 'Programs - search results')

@push('after-styles')
    <link href="{{ url('css/search.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 3rem;">
        <h4 class="fw-bolder futura">Programs - search results</h4>
        <hr>
    </div>

    <div class="container language-programs" style="margin-bottom: 3rem;">
        <div class="row mt">
            <div class="col-12">
                <table class="table table-striped table-bordered" id="programs-table" style="width:100%">
                    <thead>
                        <tr class="align-items-center">
                            <th scope="col">Program name</th>
                            <th scope="col">School name</th>
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
            let keyword = <?php echo json_encode($keyword); ?>;

            var table = $('#programs-table').DataTable({
                processing: true,
                ajax: "{{route('frontend.home_program_search_function', $keyword)}}",
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