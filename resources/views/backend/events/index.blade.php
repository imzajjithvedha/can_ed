@extends('backend.layouts.app')

@section('title', __('Events | Admin'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Events&nbsp;</strong>

                    <a href="{{ route('admin.events.create_event') }}" class="btn btn-primary pull-right ml-4">Create new</a>
                   
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="events-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Event title</th>
                                <th scope="col">Event date</th>
                                <th scope="col">Event time</th>
                                <th scope="col">City</th>
                                <th scope="col">Country</th>
                                <th scope="col">Status</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Advertised</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

     <!-- Modal delete -->
     <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this?</h5>
                        </div>                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection


@push('after-scripts')
<script type="text/javascript">
    $(function () {
        var table = $('#events-table').DataTable({
            processing: true,
            ajax: "{{route('admin.events.get_events')}}",
            serverSide: true,
            order: [[0, "asc"]],
            columns: [
                {data: 'title', name: 'title'},
                {data: 'date', name: 'date'},
                {data: 'time', name: 'time'},
                {data: 'city', name: 'city'},
                {data: 'country', name: 'country'},
                {data: 'status', name: 'status'},
                {data: 'featured', name: 'featured'},
                {data: 'advertised', name: 'advertised'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "drawCallback": function(settings) {
                $('.status-check').change(function() {

                    let status = $(this).prop('checked') == true ? 1 : 0;
                    let id = $(this).attr('data-id');

                    $.ajax({
                        url: "{{url('/')}}/admin/events/change-status/" + id + "/" + status,
                        method: "GET",
                        timeout: 0,
                        dataType: "json",
                        success: function() {
                            console.log(data.success);
                        }
                    });
                });

                $('.featured-check').change(function() {

                    let status = $(this).prop('checked') == true ? 1 : 0;
                    let id = $(this).attr('data-id');

                    $.ajax({
                        url: "{{url('/')}}/admin/events/change-featured/" + id + "/" + status,
                        method: "GET",
                        timeout: 0,
                        dataType: "json",
                        success: function() {
                            console.log(data.success);
                        }
                    });
                });

                $('.advertised-check').change(function() {

                    let status = $(this).prop('checked') == true ? 1 : 0;
                    let id = $(this).attr('data-id');

                    $.ajax({
                        url: "{{url('/')}}/admin/events/change-advertised/" + id + "/" + status,
                        method: "GET",
                        timeout: 0,
                        dataType: "json",
                        success: function() {
                            console.log(data.success);
                        }
                    });
                });
            }
        });

        let event_id;

        $(document).on('click', '.delete', function(){
            event_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"events/delete-event/" + event_id,
        
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#events-table').DataTable().ajax.reload();
                    });
                }
            })
        });
    });

</script>

@endpush
