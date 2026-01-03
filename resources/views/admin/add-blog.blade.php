<x-app-layout>
    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row -->
            <div class="row">

                <div class="col-lg-10 mx-auto">
                    <div class="mb-3">
                        <h6 class="fw-semibold"><a href="blogs.html"><i class="ti ti-chevron-left me-1"></i>Blogs</a></h6>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger text-danger">{{ $error }}</p>
                                @endforeach
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}"
                                        class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="select" name="category_id">
                                        <option>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="summernote" cols="30" rows="10"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tag</label>
                                    <input class="input-tags form-control" id="inputBox" type="text"
                                        data-role="tagsinput" name="tags">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Duration</label>
                                    <input class="input-tags form-control" type="text" name="duration">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Feature Image</label>
                                    <input class="form-control" type="file" name="image">
                                </div>

                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="javascript:void(0);" class="btn btn-light me-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Add Blog</button>
                                </div>
                            </form>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- End Content -->

        <!-- Footer Start -->
        <div class="footer text-center bg-white p-2 border-top">
            <p class="text-dark mb-0">2025 &copy; <a href="javascript:void(0);" class="link-primary">Preclinic</a>, All
                Rights Reserved</p>
        </div>
        <!-- Footer End -->

    </div>
</x-app-layout>
