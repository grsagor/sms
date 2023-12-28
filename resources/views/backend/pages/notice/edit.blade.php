<form id="partnerEditForm" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $notice->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Banner</h5>
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
                        name="notice" value="{{ $notice->notice }}" required>
                    <label for="">Notice<span class="text-danger">*</span></label>
                </div>

                <div class="form-floating mb-1 w-100">
                    <input type="date" class="form-control" placeholder="Amount"
                        value="{{ $notice->date }}" name="date" required>
                    <label for="">Date<span class="text-danger">*</span></label>
                </div>

                <div class="d-flex w-100 gap-2 mb-1">
                    <div class="form-group mb-1 w-100">
                        <input type="file" class="form-control"
                            onchange="previewFile('editModal #profile_image', 'editModal .profile_image')"
                            name="file" id="profile_image">
                        <img src="{{ $notice->file ? asset($notice->file) : asset('assets/img/no-img.jpg') }}" height="80px" width="100px"
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
