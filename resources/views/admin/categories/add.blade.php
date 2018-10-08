@extends('admin.layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('categories.index') }}">Categories</a></li>
                            <li class="active">Add Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Category</strong> <small> (for product)</small>
                            </div>
                            <form method="post" action="{{ route('categories.store') }}">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Select Parent Category</label>
                                    <div class="input-group">
                                    	<select data-placeholder="Choose a Parent Category..." class="standardSelect" tabindex="1" name="parent_id">
		                                    <option value=""></option>
		                                    <option value="United States">United States</option>
		                                    <option value="United Kingdom">United Kingdom</option>
		                                    <option value="Afghanistan">Afghanistan</option>
		                                    <option value="Aland Islands">Aland Islands</option>
		                                    <option value="Albania">Albania</option>
		                                    <option value="Algeria">Algeria</option>
		                                    <option value="American Samoa">American Samoa</option>
		                                    <option value="Andorra">Andorra</option>
		                                    <option value="Angola">Angola</option>
		                                    <option value="Anguilla">Anguilla</option>
		                                    <option value="Antarctica">Antarctica</option>
                                		</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="name" placeholder="Enter category name.." required>
                                    </div>
                                    <small class="form-text text-muted">ex. Baby Clothes</small>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Slug</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="slug" placeholder="Enter category slug">
                                    </div>
                                    <small class="form-text text-muted">ex. baby-clothes</small>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <div class="input-group">
                                        <textarea  class="form-control" name="description" placeholder="Enter category description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label">Upload Image</label>
                                  <div class="input-group"><input type="file" id="category_image" name="category_image" class="form-control-file"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Image Preview</label>
                                    <div class="input-group"><img src="" id="preview" height="200px" width="200px"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                              </button>
                              <button type="reset" class="btn btn-danger btn-sm" onclick="this.form.reset();">
                                <i class="fa fa-ban"></i> Reset
                              </button>
                            </div>
                </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#category_image").change(function(){
        readURL(this);
    });

    $(document).ready(function() {
        $(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
@endsection