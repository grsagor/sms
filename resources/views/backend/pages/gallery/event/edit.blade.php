<form id="partnerEditForm" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $gallery->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Gallery Event</h5>
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
                <div class="form-floating mb-1 w-100">
                    <input type="text" class="form-control" placeholder="Email"
                        name="name" value="{{ $gallery->name }}" required>
                    <label for="">Event Name<span class="text-danger">*</span></label>
                </div>
            </div>

            <div class="form-group mb-1 w-100">
                <select name="type" class="form-control" id="type">
                    <option value="">Select gallery type</option>
                    <option {{ $gallery->type == 'photo' ? 'selected' : '' }} value="photo">Photo</option>
                    <option {{ $gallery->type == 'video' ? 'selected' : '' }} value="video">Video</option>
                </select>
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
