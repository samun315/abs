<div class="modal fade" tabindex="-1" id="showModal" data-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit User</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 formReset" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <!--begin::Form-->
                <form class="card-body px-9" id="submitForm">

                    @csrf

                    <input type="text" hidden name="user_id" id="kt_user_id" value="">

                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <!--begin::Heading-->

                            <!--begin::Input group-->
                            <div class="fv-row">
                                <!--begin::Row-->
                                <div class="row">

                                    <div class="col-md-6 fv-row mb-5">
                                        <label class="required fs-5 fw-bold mb-2">User Role</label>
                                        <select name="role_id" id="kt_role_id" data-control="select2"
                                            data-placeholder="Select User Role" data-dropdown-parent="#showModal"
                                            class="form-select form-select-solid @error('role_id') is-invalid @enderror">
                                            <option value=""></option>
                                            @foreach ($userRoles as $userRole)
                                                <option value="{{ $userRole->role_id ?? old('role_id') }}">
                                                    {{ $userRole->role_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 fv-row mb-5">
                                        <label class="required fs-5 fw-bold mb-2">Active</label>
                                        <select name="active" id="kt_active"
                                            data-placeholder="Select active Status"
                                            class="form-select form-select-solid @error('active') is-invalid @enderror"
                                            data-control="select2" data-dropdown-parent="#showModal">
                                            <option value=""></option>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        @error('active')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-end mt-3">
                                        <button type="button" class="btn btn-light me-2 formReset" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-sm fs-6 btn-primary">update
                                        </button>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 1-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>
