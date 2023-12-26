<form id="updateSettingModalForm" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Introduction Members</h5>
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
                    <textarea type="text" class="form-control mytextarea" placeholder="Email" name="{{ $key }}" id="{{ $key }}"
                        value="{{ Helper::getSettings($key) }}" rows="10" required>{{ Helper::getSettings($key) }}</textarea>
                    <label for="{{ $key }}">{{ $label }}<span class="text-danger">*</span></label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-block step_btn step_btn_1">
                <button type="submit" id="updateSettingFromModalBtn" data-check-area="step_1"
                class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
