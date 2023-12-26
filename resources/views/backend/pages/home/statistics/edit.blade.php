<form id="partnerEditForm" method="post" enctype="multipart/form-data">
    @csrf
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
                    <input type="text" class="form-control" placeholder="Email" name="application_number_of_students" id="application_number_of_students"
                        value="{{ Helper::getSettings('application_number_of_students') }}">
                    <label for="application_number_of_students">Number of students</label>
                </div>
                <div class="form-floating mb-1 w-100">
                    <input type="text" class="form-control" placeholder="Email" name="application_number_of_teachers" id="application_number_of_teachers"
                        value="{{ Helper::getSettings('application_number_of_teachers') }}">
                    <label for="application_number_of_teachers">Number of teachers</label>
                </div>
                <div class="form-floating mb-1 w-100">
                    <input type="text" class="form-control" placeholder="Email" name="application_number_of_scholarships_students" id="application_number_of_scholarships_students"
                        value="{{ Helper::getSettings('application_number_of_scholarships_students') }}">
                    <label for="application_number_of_scholarships_students">Number of scholarships students</label>
                </div>
                <div class="form-floating mb-1 w-100">
                    <input type="text" class="form-control" placeholder="Email" name="application_number_of_gpa5_students" id="application_number_of_gpa5_students"
                        value="{{ Helper::getSettings('application_number_of_gpa5_students') }}">
                    <label for="application_number_of_gpa5_students">Number of GPA-5 students</label>
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
