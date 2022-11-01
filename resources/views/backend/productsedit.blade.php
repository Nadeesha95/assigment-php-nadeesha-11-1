@extends('backend.layouts.main')
@section('content')

<link href="{{asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />

<div class="page-wrapper">
			<div class="page-content">


<div class="row">
					<div class="col-xl-9 mx-auto">




<h6 class="mb-0 text-uppercase">Edit Product</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<form action="{{route('product.update',$data->id)}}" method="post" enctype="multipart/form-data">
								@method('PUT')
								@csrf
                    @foreach ($errors->all() as $error )
                    <div class="flash-message">
                    <p class="alert alert-danger"> {{$error}}</p>
                     </div>
                      @endforeach 


					  @foreach (['success','danger'] as $msg)
                    @if(Session::has('alert-' . $msg))

				

					<script>
						
						function info_noti(){
		Lobibox.notify('default', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		size: 'mini',
		position: 'top right',
		icon: 'bx bx-info-circle',
		msg: "{{ Session::get('alert-' . $msg) }}"
		});
	  } 
	  
					</script>

          
                       @endif
                       @endforeach
							
					           				
									<div class="mb-3">
										<label class="form-label">Title:</label>
										<input name="title" type="text" value="{{$data->title}}" class="form-control">
									</div>

                                    <div class="mb-3">
										<label class="form-label">Category:</label>
                                        <select name="cat" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
									
									@foreach($cat as $cats)
									 @if($data->cat_id == $cats->id)
										<option value="{{$cats->id}}" selected>{{$cats->cat_name}}</option>
										@endif
									<option value="{{$cats->id}}">{{$cats->cat_name}}</option>
									@endforeach
								        </select>
									</div>

                                    <div class="mb-3">
										<label class="form-label">Price:</label>
										<input type="number" name="price" value="{{$data->price}}"  class="form-control">
									</div>

                                    <div class="mb-3">
										<label class="form-label">Description:</label>
                                        <textarea id="mytextarea"  name="description">{{$data->des}}</textarea>

									</div>

                                    <div class="col">
                                    <label class="form-label">Images:</label>
							<img width="30" height="30" src="{{asset('images/product')}}/{{$data->files}}">

						<hr/>
						<div class="card">
							<div class="card-body">
								<input id="fancy-file-upload" value="{{$data->files}}" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" >
							</div>
						</div>
					     </div>
				     </div>

                                    <div class="col" style="margin-left: 16px;">
										<button type="submit" class="btn btn-primary px-5 rounded-0">Submit</button>
									</div>
</br>
</br>


                                    <div class="row">
           
                              
								
								</form>
							</div>
						</div>


<script src="{{asset('https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js')}}" referrerpolicy="origin">	</script>

<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
	<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
	<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
	<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
	<script src="{{asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
                 
                          
                 
                 
                 
                 
                 
                 
                 <script>


		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>


<script>
		$('#fancy-file-upload').FancyFileUpload({
			params: {
				action: 'fileuploader'
			},
			maxfilesize: 1000000
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})






		
	</script>



@endsection