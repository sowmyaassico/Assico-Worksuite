@extends('layouts.app')

@push('styles')
<link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('datatable-styles')
    @include('sections.datatable_css')
@endpush

@section('filter-section')

    {{--<x-filters.filter-box>
        <!-- DATE START -->
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center">@lang('app.duration')</p>
            <div class="select-status d-flex">
                <input type="text" class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500 border-additional-grey"
                    id="datatableRange" placeholder="@lang('placeholders.dateRange')">
            </div>
        </div>
        <!-- DATE END -->
        
        <!-- RESET START -->
        <div class="select-box d-flex py-1 px-lg-2 px-md-2 px-0">
           
        </div>
        <!-- RESET END -->

        <!-- MORE FILTERS START -->
        <x-filters.more-filter-box>
            
          
        </x-filters.more-filter-box>
        <!-- MORE FILTERS END -->

    </x-filters.filter-box>--}}

@endsection

@section('content')
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->
        <div class="d-grid d-lg-flex d-md-flex action-bar">
            <div id="table-actions" class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                    <x-forms.link-primary :link="route('filemanager.create.update', [1,0,1])"
                        class="mr-3 openRightModal float-left mb-2 mb-lg-0 mb-md-0" icon="plus">
                        Add Folder
                    </x-forms.link-primary>
                    <x-forms.link-secondary :link="route('filemanager.create.update', [1,0,2])"
                        class="mr-3 openRightModal mb-2 mb-lg-0 mb-md-0 float-left" icon="layer-group">
                        Add File
                    </x-forms.link-secondary>
            </div>

        </div>
        <!-- Add Task Export Buttons End -->
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white table-responsive">
            <table id="datatable_resource" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Last Modified</th>
                        <th>Download</th>
                        <th>Rename</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>

        </div>
        <!-- Task Box End -->
    </div>
    <!-- CONTENT WRAPPER END -->
<form action="" id="quick-action-form">
    @csrf
    <input type="hidden" name="hidval" id="hidval" value="1">
</form>
@endsection

@push('scripts')
<script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
   
$(document).ready(function() {
    loadResources();


function addResource(app_id, id, type) {
     $.get("{{ route('filemanager.create.update') }}/" + app_id +'/'+ id +'/'+ type, function(response) {
         $('#AddResourceModal').html(response);
         $("#AddResourceModal").modal('show');

     });
 }

 function loadResources(){ //alert("sss");
    var datatable = $('#datatable_resource').DataTable({
                "language": {
                    "paginate": {
                        "next": '<span><i class="fas fa-chevron-right"></i></span></a>',
                        "previous": '<span><i class="fas fa-chevron-left"></i></span></a>'
                    }
                },
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('filemanager.list', 1) }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    { data: 'id', name: 'id', visible:false },
                    {
                        data: 'version',
                        name: 'version'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'download',
                        name: 'download',
                        orderable: false,
                        searchable: false,
                        className: "text-center"
                    },
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false,
                        searchable: false,
                        className: "text-center"
                    },
                    {
                        data: 'delete',
                        name: 'delete',
                        orderable: false,
                        searchable: false,
                        className: "text-center"
                    },
                ],
                "order": [
                    [3, "desc"]
                ],
            });
    $('#txtSearch').on( 'keyup', function () {
        datatable.search( this.value ).draw();
    });
 }
});
function deleteFile(id){
            const actionValue = $('#quick-action-type').val();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You will not be able to recover the deleted record!",
                    icon: 'warning',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: "@lang('messages.confirmDelete')",
                    cancelButtonText: "@lang('app.cancel')",
                    customClass: {
                        confirmButton: 'btn btn-primary mr-3',
                        cancelButton: 'btn btn-secondary'
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        applyQuickAction(id);
                    }
                });

            }
            const showTable = () => {
                window.LaravelDataTables["datatable_resource"].draw(false);
            }
 const applyQuickAction = (rowdIds) => {
            const url = "{{ route('filemanager.action') }}/" + rowdIds;

            $.easyAjax({
                url: url,
                container: '#quick-action-form',
                type: "POST",
                disableButton: true,
                buttonSelector: "#quick-action-apply",
                data: $('#quick-action-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        $("#datatable_resource").DataTable().draw(true);
                    }
                }
            })
        };

    
</script>

@endpush
