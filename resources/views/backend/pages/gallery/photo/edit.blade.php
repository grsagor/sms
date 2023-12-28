<form id="partnerEditForm" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $gallery->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Dress Code</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
        </button>
    </div>
    <div class="modal-body">
        <div class="col-sm-12">
            <div class="server_side_error" role="alert">

            </div>
        </div>
        <div class="col-sm-12 tab-content" id="v-pills-tabContent">
            <div class="step step_1 tab-pane fade show active create-artist">
                <div class="form-group mb-1 w-100">
                    <select name="event_id" class="form-control" id="event_id">
                        <option value="">Select event</option>
                        @foreach ($events as $event)
                            <option {{ $event->id == $gallery->event_id ? 'selected' : '' }} value="{{ $event->id }}">{{ $event->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex w-100 gap-2 mb-1">
                    <div class="form-group mb-1 w-100">
                        <input type="file" class="form-control"
                            onchange="previewFile('editModal #profile_image', 'editModal .profile_image')"
                            name="file" id="profile_image">
                        <img src="{{ $gallery->file ? asset($gallery->file) : asset('assets/img/no-img.jpg') }}" height="80px" width="100px"
                            class="profile_image mt-1 border" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-block step_btn step_btn_1">
                <button type="submit" id="editPartnerBtn" data-check-area="step_1"
                class="btn btn-primary">Update</button>
        </div>

    </div>
</form>
