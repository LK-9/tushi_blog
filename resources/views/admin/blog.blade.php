<x-app-layout>
    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Page Header -->
            <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                <div class="flex-grow-1">
                    <h4 class="fw-bold mb-0">Blogs</h4>
                </div>
                <div class="text-end">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="ti ti-plus me-1"></i> New
                        Blog</a>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="card blog-item">
                            <div class="card-body p-0">
                                <div class="position-relative rounded-top overflow-hidden">
                                    @if ($post->image)
                                        <a href="blog-details.html" class="blog-img"><img
                                                src="{{ asset('storage/' . $post->image) }}" alt="img"
                                                class="img-fluid rounded-top"></a>
                                    @endif
                                    <a href="{{ route('posts.destroy', $post) }}"
                                        class="btn btn-sm d-inline-flex align-items-center justify-content-center p-2 bg-white rounded-2 blog-delete"><i
                                            class="ti ti-trash"></i></a>
                                    <a href="{{ route('posts.edit', $post) }}"
                                        class="btn btn-sm d-inline-flex align-items-center justify-content-center p-2 bg-white rounded-2 blog-edit"><i
                                            class="ti ti-edit"></i></a>
                                </div>
                                <div class="p-3">
                                    <span
                                        class="badge badge-soft-primary border border-primary fs-13 py-1 px-2 mb-3">{{ $post->category->name }}</span>
                                    <h6 class="fw-bold"><a href="blog-details.html">{{ $post->title }}</a></h6>
                                    <p class="truncate-2-lines mb-0">
                                        {{ Str::limit(strip_tags($post->description), 100) }}</p>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                @endforeach


                <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="javascript:void(0);"
                            class="btn btn-outline-white bg-white d-inline-flex align-items-center">Load More <i
                                class="ti ti-loader-2 ms-1"></i></a>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- End Content -->

        <!-- Footer Start -->
        <div class="footer text-center bg-white p-2 border-top">
            <p class="text-dark mb-0">2025 &copy; <a href="javascript:void(0);" class="link-primary">Preclinic</a>,
                All Rights Reserved</p>
        </div>
        <!-- Footer End -->

    </div>
</x-app-layout>
