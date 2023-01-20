
@extends('layouts.app_front')
@section('content')

<style>
    .project-tab {
    padding: 10%;
    margin-top: -8%;
}
.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: none;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;
}
</style>
<body>

    
    <div class="container">
        <div class="row justify-content-center">
           

            <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Besic Information</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Gallery</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Address</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                 <form action="{{ route('setup_profile.store') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fs-title">Profile Information: </h2>
                                            @if(Session::has('success'))
                                                @if(Session::get('success') == true)
                                                <div class="alert alert-success" role="alert">
                                                    {{Session::get('message')}}
                                                </div>
                                                @elseif(Session::get('success') == false)
                                                <div class="alert alert-success" role="alert">
                                                    {{Session::get('message')}}
                                                </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="profile-pic">
                                                @if(!empty(auth::user()->profile_image))
                                                <img alt="User Pic" src="{{ auth::user()->profile_image_url."/".auth::user()->profile_image }}"
                                                    id="profile-image1" height="200">
                                                @else
                                                <img alt="User Pic" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png"
                                                    id="profile-image1" height="200">
                                                @endif

                                                <input id="profile-image-upload" class="hidden" type="file" name="profile_pic" onchange="previewFile()">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">First Name: *</label>
                                                <input type="text" id="exampleInputEmail1" class="form-control" name="F_name"
                                                    value="{{ Auth::user()->f_name }}" placeholder="First Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail2">Last Name: *</label>
                                                <input type="text" id="exampleInputEmail2" class="form-control" name="l_name"
                                                    value="{{ Auth::user()->l_name }}" placeholder="Last Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Email: *</label>
                                                <input type="email" id="exampleInputEmail3" disabled class="form-control" name="email"
                                                    value="{{ Auth::user()->email }}" placeholder="Email Id" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail4">Phone Number: *</label>
                                                <input type="tel" id="exampleInputEmail4" class="form-control" name="phone"
                                                    value="{{ Auth::user()->phone }}" placeholder="phone" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail5">Occupation</label>
                                                <input type="text" id="exampleInputEmail5" value="{{  auth::user()->occupation }}" class="form-control" name="occupation"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail6">Birthday</label>
                                                <input type="date" id="exampleInputEmail6" class="form-control" name="dob"
                                                placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fieldlabels">Gender</label>  <br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input @if(Auth::user()->gender == "male") checked @endif type="radio" value="male" id="customRadioInline1" name="gender" class="custom-control-input">
                                                <label  class="custom-control-label" for="customRadioInline1">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input @if(Auth::user()->gender == "female") checked @endif type="radio" value="female" id="customRadioInline2" name="gender" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline2">Female</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input  @if(Auth::user()->gender == "other") checked @endif type="radio" value="other" id="customRadioInline3" name="gender" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline3">Other</label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <label class="fieldlabels">Newsletter Membership </label>  <br>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" value="Yes" name="customRadioInline1" class="custom-control-input">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-7 mt-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail7">Facebook</label>
                                                <input type="url" id="exampleInputEmail7" value="{{  auth::user()->facebook }}"  class="form-control" name="facebook"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="exampleInputEmail8">Tweeter</label>
                                                <input type="url" id="exampleInputEmail8" value="{{  auth::user()->tweeter }}"  class="form-control" name="tweeter"
                                                placeholder=" " />
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="exampleInputEmail9">Instagram</label>
                                                <input type="url" id="exampleInputEmail9" value="{{  auth::user()->insta }}" class="form-control" name="insta"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="exampleInputEmail10">linkdin</label>
                                                <input type="url" id="exampleInputEmail10" value="{{  auth::user()->linkdin }}" class="form-control" name="linkdin"
                                                placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                        <button class="btn btn-default btn-lg">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" 
                                    class="dropzone" id="dropzone">
                                 @csrf
                            </form>   
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Contest Name</th>
                                            <th>Date</th>
                                            <th>Award Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">Work 1</a></td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>    
@endsection
<script>
    function previewFile() {
        var preview = document.querySelector('img');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    $(function () {
        $('#profile-image1').on('click', function () {
            $('#profile-image-upload').click();
        });
    });




    Dropzone.options.dropzone =
         {
	    maxFiles: 5, 
            maxFilesize: 4,
            //~ renameFile: function(file) {
                //~ var dt = new Date();
                //~ var time = dt.getTime();
               //~ return time+"-"+file.name;    // to rename file name but i didn't use it. i renamed file with php in controller.
            //~ },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            init:function() {

				// Get images
				var myDropzone = this;
				$.ajax({
					url: gallery,
					type: 'GET',
					dataType: 'json',
					success: function(data){
					//console.log(data);
					$.each(data, function (key, value) {

						var file = {name: value.name, size: value.size};
						myDropzone.options.addedfile.call(myDropzone, file);
						myDropzone.options.thumbnail.call(myDropzone, file, value.path);
						myDropzone.emit("complete", file);
					});
					}
				});
			},
            removedfile: function(file) 
            {
				if (this.options.dictRemoveFile) {
				  return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
					if(file.previewElement.id != ""){
						var name = file.previewElement.id;
					}else{
						var name = file.name;
					}
					//console.log(name);
					$.ajax({
						headers: {
							  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							  },
						type: 'POST',
						url: delete_url,
						data: {filename: name},
						success: function (data){
							alert(data.success +" File has been successfully removed!");
						},
						error: function(e) {
							console.log(e);
						}});
						var fileRef;
						return (fileRef = file.previewElement) != null ? 
						fileRef.parentNode.removeChild(file.previewElement) : void 0;
				   });
			    }		
            },
       
            success: function(file, response) 
            {
				file.previewElement.id = response.success;
				//console.log(file); 
				// set new images names in dropzone’s preview box.
                var olddatadzname = file.previewElement.querySelector("[data-dz-name]");   
				file.previewElement.querySelector("img").alt = response.success;
				olddatadzname.innerHTML = response.success;
            },
            error: function(file, response)
            {
               if($.type(response) === "string")
					var message = response; //dropzone sends it's own error messages in string
				else
					var message = response.message;
				file.previewElement.classList.add("dz-error");
				_ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
				_results = [];
				for (_i = 0, _len = _ref.length; _i < _len; _i++) {
					node = _ref[_i];
					_results.push(node.textContent = message);
				}
				return _results;
            }
            
};
</script>

</html>