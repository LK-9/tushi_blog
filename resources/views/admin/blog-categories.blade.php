<x-app-layout>
    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Page Header -->
            <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                <div class="flex-grow-1">
                    <h4 class="fw-bold mb-0">Categories</h4>
                </div>
                <div class="text-end">
                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_categories"><i class="ti ti-plus me-1"></i>Add New Categories</a>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Table List -->
            <div class="table-responsive border">
                <table class="table table-nowrap">
                    <thead class="tablehead-light">
                        <tr>
                            <th>Categories</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->format('d M Y') }}</td>
                                <td><span
                                        class="badge bg-soft-success fs-13 fw-medium text-success border border-success py-1 px-2">{{ $category->status }}</span>
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                        class="btn p-1 btn-white border">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu p-2">
                                        <li>
                                            <a href="javascript:void(0);"
                                                class="dropdown-item d-flex align-items-center" data-bs-toggle="modal"
                                                data-bs-target="#edit_categories-{{ $category->id }}">Edit</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"
                                                class="dropdown-item d-flex align-items-center" data-bs-toggle="modal"
                                                data-bs-target="#delete_categories-{{ $category->id }}">Delete</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /Table List -->

        </div>
        <!-- End Content -->

    </div>

    <!-- Start Add Categories -->
    <div id="add_categories" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-dark modal-title">Add New Category</h5>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                        aria-label="Close"><i class="ti ti-x"></i></button>
                </div>
                <form action="{{ route('admin.category.store') }}" method="POST"> @csrf
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger text-danger">{{ $error }}</p>
                    @endforeach
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Category Name<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="category_name">
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Status<span class="text-danger ms-1">*</span></label>
                            <select class="select" name="status">
                                <option>Select</option>
                                <option value="active" selected>Active
                                </option>
                                <option value="inactive">
                                    Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center gap-1">
                        <button type="button" class="btn btn-white border" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End Add Categories -->

    <!-- Start Edit Categories -->
    @foreach ($categories as $category)
        <div id="edit_categories-{{ $category->id }}" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-dark modal-title">Edit Category</h5>
                        <button type="button" class="btn-close btn-close-modal custom-btn-close"
                            data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>
                    </div>
                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST"> @csrf
                        @method('put')
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger text-danger">{{ $error }}</p>
                        @endforeach
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">Category Name<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control" name="category_name"
                                    value="{{ $category->name }}">
                            </div>

                            <div class="mb-0">
                                <label class="form-label">Status<span class="text-danger ms-1">*</span></label>
                                <select class="select" name="status">
                                    <option>Select</option>
                                    <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer d-flex align-items-center gap-1">
                            <button type="button" class="btn btn-white border" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Start Delete Modal  -->
        <div class="modal fade" id="delete_categories-{{ $category->id }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center position-relative">
                        <img src="assets/img/bg/delete-modal-bg-01.png" alt=""
                            class="img-fluid position-absolute top-0 start-0">
                        <img src="assets/img/bg/delete-modal-bg-02.png" alt=""
                            class="img-fluid position-absolute bottom-0 end-0">
                        <div class="mb-3">
                            <span class="avatar avatar-lg bg-danger text-white"><i
                                    class="ti ti-trash fs-24"></i></span>
                        </div>
                        <h5 class="fw-bold mb-1">Delete Confirmation</h5>
                        <p class="mb-3">Are you sure, you want to delete Blog Category?</p>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-light position-relative z-1 me-3"
                                data-bs-dismiss="modal">Cancel</a>
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger position-relative z-1">Yes,
                                    Delete</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Delete Modal  -->
    @endforeach
    <!-- End Edit Categories -->


</x-app-layout>
