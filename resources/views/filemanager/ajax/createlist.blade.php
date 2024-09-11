<div class="row">
    <div class="col-sm-6">
            <div class="bg-white rounded add-client">
        <form id="resource-form" method="post" autocomplete="off" novalidate="novalidate" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="{{ empty($obj->id) ? 0 : $obj->id }}">
            @csrf
            <div class="modal-body">
                    <input type="hidden" name="type" id="type" value="{{$type}}">
                    <input type="hidden" name="parent_id" id="parent_id" value="{{$parent->id}}">
                    <input type="hidden" name="document_name" id="document_name" value="">
                @if($type == 2)
                @if(empty($obj->id))
                <div class="mb-3">
                    <label class="form-label" for="name">Document</label>
                   
                    <input type="file" id="document" name="document" onchange="fileSelect(event)" class="form-control height-35 f-14" required>
                </div>
                @endif 
                <div class="mb-3">
                    <label class="form-label" for="name">File name</label>
                    <input type="input" id="version" name="version"  class="form-control height-35 f-14" value="{{ old('version', $obj->version) }}" required>
                </div>
                @else
                <div class="mb-3">
                    <label class="form-label" for="name">Folder Name</label>
                    <input type="text" id="document" name="document" class="form-control height-35 f-14" value="{{ old('version', $obj->version) }}" required>
                </div>
                
                @endif 
              </div>
            <button type="button" class="btn btn-light">Cancel</button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Save</button>
            
    </form>
</div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#resource-form").submit(function(event) { 
        event.preventDefault();
            var me = $(this);
            if ( me.data('requestRunning') ) {
                return;
            }
            me.data('requestRunning', true);
            var form = $('#resource-form')[0];
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: "{{ route('filemanager.list.create.update.post') }}",
                processData: false,
                contentType: false,
                data: formData,
                success: function(data) {
                    $("#datatable_resource").DataTable().draw(false);
                    data = JSON.parse(data);
                },
                error: function(error) {
                    me.data('requestRunning', false);
                },
                complete: function() {
                    me.data('requestRunning', false);
                }
            });
    });
});
    function fileSelect(e){
        $("#version").val(e.target.files[0].name);
        $("#document_name").val(e.target.files[0].name);
    }

</script>
