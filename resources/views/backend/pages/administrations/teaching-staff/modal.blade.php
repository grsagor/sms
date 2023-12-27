<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" id="partnerCreateForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
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

                        <div class="step step_1 tab-pane fade create-artist">
                            <div class="d-flex gap-1 mb-1 w-100">
                                <div class="form-floating mb-1 w-100">
                                    <input type="text" class="form-control" placeholder="Title"
                                        value="{{ old('name') }}" name="name">
                                    <label for="">Name<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="d-flex gap-1 mb-1 w-100">
                                <div class="form-floating mb-1 w-100">
                                    <input type="text" class="form-control" placeholder="Title"
                                        value="{{ old('designation') }}" name="designation">
                                    <label for="">Designation<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="d-flex gap-1 mb-1 w-100">
                                <div class="form-floating mb-1 w-100">
                                    <input type="text" class="form-control" placeholder="Title"
                                        value="{{ old('subject') }}" name="subject">
                                    <label for="">Subject<span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <select name="shift" class="form-control shift" id="shift" required>
                                    <option value="">-- Select Type --</option>
                                    <option value="Morning">Morning</option>
                                    <option value="Day">Day</option>
                                    <option value="College">College</option>
                                </select>
                            </div>
                            <div class="d-flex w-100 gap-2 mb-1">
                                <div class="form-group mb-1 w-100">
                                    <input type="file" class="form-control"
                                        onchange="previewFile('createModal #profile_image', 'createModal .profile_image')"
                                        name="file" id="profile_image" required>
                                    <img src="{{ asset('assets/img/no-img.jpg') }}" height="80px" width="100px"
                                        class="profile_image mt-1 border" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-block step_btn step_btn_1">
                        <button type="submit" id="addPartnerBtn" data-check-area="step_1"
                        class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit modal  --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>

{{-- edit modal  --}}
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>

{{-- add text modal  --}}
<div class="modal fade" id="updateSettingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>