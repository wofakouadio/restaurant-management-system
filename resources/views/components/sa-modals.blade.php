{{---------------USERS---------------}}
<!-- Edit User Info Modal -->
<div class="modal" id="edit-user-modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form action="" method="POST" enctype="multipart/form-data" id="sa-update-user-form">
                    @csrf
                    @method('PUT')
                    <div class="block-header block-header-default">
                    <h3 class="block-title">Update User Profile</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                    <div class="block-content fs-sm">
                        <div class="alert alert-danger" id="update-user-form-alert"></div>
                        <div class="block block-rounded shadow-none mb-0">
                            <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" id="btabs-static-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-static-home" role="tab" aria-controls="btabs-static-home" aria-selected="true">
                                        Home
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" id="btabs-static-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-static-profile" role="tab" aria-controls="btabs-static-profile" aria-selected="false">
                                        Address & Contact
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" id="btabs-static-settings-tab" data-bs-toggle="tab" data-bs-target="#btabs-static-settings" role="tab" aria-controls="btabs-static-settings" aria-selected="false">
                                        Identification
                                    </button>
                                </li>
                            </ul>
                            <div class="block-content tab-content">
                                <div class="tab-pane active" id="btabs-static-home" role="tabpanel" aria-labelledby="btabs-static-home-tab" tabindex="0">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="form-label" for="mega-firstname">Firstname</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-firstname" name="firstname" placeholder="Enter your firstname..">
                                            <input type="hidden" name="user-id"/>
                                            <span class="text-danger" id="firstname-err"></span>
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="mega-middlename">MiddleName</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-middlename" name="middlename" placeholder="Enter your middlename..">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="mega-lastname">Lastname</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-lastname" name="lastname" placeholder="Enter your lastname..">
                                            <span class="text-danger" id="lastname-err"></span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="form-label" for="mega-dob">Date of Birth</label>
                                            <input type="text" class="js-flatpickr form-control form-control-lg" id="example-flatpickr-default"  name="dob" placeholder="Y-m-d">
                                            <span class="text-danger" id="dob-err"></span>
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="mega-placeofbirth">Place of Birth</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-placeofbirth" name="placeofbirth" placeholder="Enter your place of birth..">
                                            <span class="text-danger" id="placeofbirth-err"></span>
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="mega-gender">Gender</label>
                                            <select class="form-select form-control form-control-lg" id="mega-gender" name="gender">
                                                <option value="">Choose</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <span class="text-danger" id="gender-err"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="btabs-static-profile" role="tabpanel" aria-labelledby="btabs-static-profile-tab" tabindex="0">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="form-label" for="mega-address-1">Main Address</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-address-1" name="address" placeholder="Enter your address..">
                                            <span class="text-danger" id="main-address-err"></span>
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="mega-address-2">Secondary Address</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-address-2" name="secondary-address" placeholder="Enter your secondary address..">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="form-label" for="mega-contact1">Contact[Mobile]</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-contact1" name="contact" placeholder="Enter your contact..">
                                            <span class="text-danger" id="main-contact-err"></span>
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="mega-contact-2">Phone</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-contact-2" name="secondary-contact" placeholder="Enter your secondary contact..">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="form-label" for="mega-email">Email Address</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-email" name="email" placeholder="Enter your email address..">
                                            <span class="text-danger" id="email-address-err"></span>
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="mega-username">Username</label>
                                            <input type="text" class="form-control form-control-lg" id="mega-username" name="username" placeholder="Enter your username..">
                                            <span class="text-danger" id="username-err"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="btabs-static-settings" role="tabpanel" aria-labelledby="btabs-static-settings-tab" tabindex="0">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="form-label" for="example-file-input">Upload Profile Picture</label>
                                            <input class="form-control form-control-lg" type="file" id="example-file-input" name="profile-picture">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="mega-role">Profile Picture</label>
                                            <div class="img user-profile-picture"></div>
                                            <input type="hidden" name="user-profile-picture">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="mega-role">Role</label>
                                        <select class="form-select form-control form-control-lg" id="mega-role" name="role">
                                            <option value="">Choose</option>
                                        </select>
                                        <span class="text-danger" id="role-type-err"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">

                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary" name="btn-update-user" id="btn-update-user">
                            <i class="fa fa-check opacity-50 me-1"></i> Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit User Info Modal -->

<!-- Delete User Info Modal -->
<div class="modal" id="delete-user-modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form action="" method="POST" id="sa-delete-user-form">
                    @csrf
                    @method('DELETE')
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Delete User Profile</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="alert alert-danger" id="delete-user-form-alert"></div>
                        <div class="block block-rounded shadow-none mb-0">
                            <div class="col">
                                <h2 class="h4 fw-normal" id="delete-notice"></h2>
                                <input type="hidden" name="user-id"/>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">

                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-danger" name="btn-delete-user" id="btn-delete-user">
                            <i class="fa fa-check opacity-50 me-1"></i> Delete User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete User Info Modal -->
{{---------------USERS---------------}}


{{---------------CATEGORIES---------------}}
<!-- New Category Modal -->
<div class="modal" id="add-category-modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog modal-l" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form action="" method="POST" enctype="multipart/form-data" id="sa-new-category-form">
                    @csrf
                    <div class="block-header block-header-default">
                        <h3 class="block-title">New Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full fs-sm">
                        <div class="alert alert-danger category-alert"></div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="mega-firstname">Name</label>
                            <input type="text" class="form-control form-control-lg" id="mega-firstname" name="name" placeholder="Enter category..">
                            <span class="text-danger" id="category-name-err"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="example-file-input">Upload Profile Picture</label>
                            <input class="form-control form-control-lg" type="file" id="example-file-input" name="profile-picture">
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary" name="btn-new-category" id="btn-new-category">
                            <i class="fa fa-check opacity-50 me-1"></i> Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- New Category Modal -->

<!-- Edit Category Modal -->
<div class="modal" id="edit-category-modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form method="POST" enctype="multipart/form-data" id="sa-update-category-form">
                    @csrf
                    @method('PUT')
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full fs-sm">
                        <div class="alert alert-danger category-alert"></div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="mega-firstname">Name</label>
                            <input type="text" class="form-control form-control-lg" id="mega-firstname" name="name" placeholder="Enter category..">
                            <span class="text-danger" id="category-name-err"></span>
                            <input type="hidden" name="cat_id">
                        </div>
                        <div class="img cat-profile-picture rounded text-center"></div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="example-file-input">Upload Profile Picture</label>
                            <input class="form-control form-control-lg" type="file" id="example-file-input" name="profile-picture">
                            <input type="hidden" name="fetched-image">
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary" name="btn-new-category" id="btn-new-category">
                            <i class="fa fa-check opacity-50 me-1"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Category Modal -->

<!-- Delete User Info Modal -->
<div class="modal" id="delete-category-modal" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form action="" method="POST" id="sa-delete-category-form">
                    @csrf
                    @method('DELETE')
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Delete Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="alert alert-danger category-alert"></div>
                        <div class="block block-rounded shadow-none mb-0">
                            <div class="col">
                                <h2 class="h4 fw-normal" id="delete-notice"></h2>
                                <input type="hidden" name="cat-id"/>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">

                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-danger" name="btn-delete-user" id="btn-delete-user">
                            <i class="fa fa-check opacity-50 me-1"></i> Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete User Info Modal -->
{{---------------CATEGORIES---------------}}


{{---------------SUB-CATEGORIES---------------}}
<!-- New Sub-Category Modal -->
<div class="modal" id="add-sub-category-modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog modal-l" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form action="" method="POST" enctype="multipart/form-data" id="sa-new-sub-category-form">
                    @csrf
                    <div class="block-header block-header-default">
                        <h3 class="block-title">New Sub-Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full fs-sm">
                        <div class="alert alert-danger sub-category-alert"></div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="mega-firstname">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Enter Sub-Category..">
                            <span class="text-danger" id="sub-category-name-err"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="example-file-input">Upload Profile Picture</label>
                            <input class="form-control form-control-lg" type="file" name="profile-picture">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="mega-firstname">Category</label>
                            <select class="form-control form-control-lg select2" name="cat-id">
                                <option value="">Choose</option>
                            </select>
                            <span class="text-danger" id="category-name-err"></span>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary" name="btn-new-category" id="btn-new-category">
                            <i class="fa fa-check opacity-50 me-1"></i> Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- New Sub-Category Modal -->

<!-- Edit Sub-Category Modal -->
<div class="modal" id="edit-sub-category-modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form method="POST" enctype="multipart/form-data" id="sa-update-sub-category-form">
                    @csrf
                    @method('PUT')
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Sub-Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full fs-sm">
                        <div class="alert alert-danger sub-category-alert"></div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="mega-firstname">Name</label>
                            <input type="text" class="form-control form-control-lg" id="mega-firstname" name="name" placeholder="Enter category..">
                            <span class="text-danger" id="sub-category-name-err"></span>
                            <input type="hidden" name="sub_cat_id">
                        </div>
                        <div class="img cat-profile-picture rounded text-center"></div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="example-file-input">Upload Profile Picture</label>
                            <input class="form-control form-control-lg" type="file" id="example-file-input" name="profile-picture">
                            <input type="hidden" name="fetched-image">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="mega-firstname">Category</label>
                            <select class="form-control form-control-lg select2" name="cat-id">
                                <option value="">Choose</option>
                            </select>
                            <span class="text-danger" id="category-name-err"></span>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary" name="btn-new-category" id="btn-new-category">
                            <i class="fa fa-check opacity-50 me-1"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Sub-Category Modal -->

<!-- Delete Sub-Category Info Modal -->
<div class="modal" id="delete-sub-category-modal" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form action="" method="POST" id="sa-delete-sub-category-form">
                    @csrf
                    @method('DELETE')
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Delete Sub-Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="alert alert-danger sub-category-alert"></div>
                        <div class="block block-rounded shadow-none mb-0">
                            <div class="col">
                                <h2 class="h4 fw-normal" id="delete-notice"></h2>
                                <input type="hidden" name="sub-cat-id"/>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">

                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-danger" name="btn-delete-user" id="btn-delete-user">
                            <i class="fa fa-check opacity-50 me-1"></i> Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Sub-Category Info Modal -->
{{---------------SUB-CATEGORIES---------------}}



{{---------------MENUS---------------}}
<!-- Edit Menu Modal -->
<div class="modal" id="edit-menu-modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form method="POST" enctype="multipart/form-data" id="sa-update-menu-form">
                    @csrf
                    @method('PUT')
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Menu</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full fs-sm">
                        <div class="alert alert-danger menu-alert"></div>
                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control form-control-lg" name="name" placeholder="Enter your menu..">
                                <input name="menu_id" type="hidden">
                                <span class="text-danger" id="name-err"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Category</label>
                                <select name="cat-id" class="form-select form-control form-control-lg" style="width: 100%;">
                                </select>
                                <span class="text-danger" id="category-err"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Sub-Category</label>
                                <select name="sub-cat-id" class="form-select form-control form-control-lg" style="width: 100%;">
                                </select>
                                <span class="text-danger" id="sub-category-err"></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control form-control-lg" cols="10" rows="5"></textarea>
                                <span class="text-danger" id="description-err"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Extra</label>
                                <textarea name="extra" class="form-control form-control-lg" cols="10" rows="5"></textarea>
                                <span class="text-danger" id="extra-err"></span>
                            </div>
                            <div class="col">
                                <div class="mb-4">
                                    <label>Pricing</label>
                                    <input type="text" class="form-control form-control-lg" name="price">
                                    <span class="text-danger" id="price-err"></span>
                                </div>
                                <div class="mb-4">
                                    <label>Discount</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="discount">
                                        <span class="input-group-text">
                                        <b>%</b>
                                    </span>
                                    </div>
                                    <span class="text-danger" id="discount-err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
{{--                            <div class="col">--}}
{{--                                <div class="mb-4">--}}
{{--                                    <label class="form-label">Size</label>--}}
{{--                                    <div class="space-x-2">--}}
{{--                                        <div class="form-check form-check-inline">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="Small" id="example-checkbox-inline1" name="size[]">--}}
{{--                                            <label class="form-check-label" for="example-checkbox-inline1">Small</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-check form-check-inline">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="Medium" id="example-checkbox-inline2" name="size[]">--}}
{{--                                            <label class="form-check-label" for="example-checkbox-inline2">Medium</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-check form-check-inline">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="Large" id="example-checkbox-inline3" name="size[]">--}}
{{--                                            <label class="form-check-label" for="example-checkbox-inline3">Large</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-check form-check-inline">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="XLarge" id="example-checkbox-inline4" name="size[]">--}}
{{--                                            <label class="form-check-label" for="example-checkbox-inline4">XLarge</label>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="selected-size" readonly class="form-control form-control-lg">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col">
                                <label class="form-label" for="example-file-input">Upload Profile Picture</label>
                                <input class="form-control form-control-lg" type="file" id="example-file-input" name="profile-picture">
                                <input type="hidden" name="fetched-picture">
                            </div>
                            <div class="col">
                                <label class="form-label" for="mega-role">Status</label>
                                <select class="form-select form-control form-control-lg" name="status">
                                    <option value="">Choose</option>
                                    <option value="1">Available</option>
                                    <option value="2">Out</option>
                                </select>
                                <span class="text-danger" id="status-err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary" name="btn-update" id="btn-update">
                            <i class="fa fa-check opacity-50 me-1"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Menu Modal -->

<!-- Delete Menu Info Modal -->
<div class="modal" id="delete-menu-modal" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <form action="" method="POST" id="sa-delete-menu-form">
                    @csrf
                    @method('DELETE')
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Delete Sub-Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="alert alert-danger sub-category-alert"></div>
                        <div class="block block-rounded shadow-none mb-0">
                            <div class="col">
                                <h2 class="h4 fw-normal" id="delete-notice"></h2>
                                <input type="hidden" name="menu_id"/>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">

                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-danger" name="btn-delete-user" id="btn-delete-user">
                            <i class="fa fa-check opacity-50 me-1"></i> Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Menu Info Modal -->

{{---------------MENUS---------------}}
