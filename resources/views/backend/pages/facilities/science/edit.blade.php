<form id="partnerEditForm" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $file->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit file</h5>
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
                <div class="form-group mb-2">
                    <select name="type" class="form-control type" id="type" required>
                        <option value="">-- Select Type --</option>
                        <option {{ $file->type == 'physics_lab' ? 'selected' : '' }} value="physics_lab">Physics Lab</option>
                        <option {{ $file->type == 'chemistry_lab' ? 'selected' : '' }} value="chemistry_lab">Chemistry Lab</option>
                        <option {{ $file->type == 'biology_lab' ? 'selected' : '' }} value="biology_lab">Biology Lab</option>
                        <option {{ $file->type == 'ict_lab' ? 'selected' : '' }} value="ict_lab">ICT Lab</option>
                        <option {{ $file->type == 'library' ? 'selected' : '' }} value="library">Library</option>
                        <option {{ $file->type == 'multimedia_classroom' ? 'selected' : '' }} value="multimedia_classroom">Multi-Media Classroom</option>
                        <option {{ $file->type == 'qip_sms_service' ? 'selected' : '' }} value="qip_sms_service">QIP SMS Service</option>
                        <option {{ $file->type == 'common_room' ? 'selected' : '' }} value="common_room">Common Room</option>
                        <option {{ $file->type == 'prayer_room' ? 'selected' : '' }} value="prayer_room">Prayer Room</option>
                    </select>
                </div>
                <div class="d-flex w-100 gap-2 mb-1">
                    <div class="form-group mb-1 w-100">
                        <input type="file" class="form-control"
                            onchange="previewFile('editModal #profile_image', 'editModal .profile_image')"
                            name="file" id="profile_image">
                        <img src="{{ $file->file ? asset($file->file) : asset('assets/img/no-img.jpg') }}" height="80px" width="100px"
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
