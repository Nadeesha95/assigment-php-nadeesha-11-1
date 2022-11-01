@extends('backend.layouts.main')
@section('content')

<div class="page-wrapper">
	<div class="page-content">


      <div class="row">
          <div class="col-xl-8 mx-auto">
          <h6 class="mb-0 text-uppercase">Edit Categories</h6>
						<hr/>

          <div class="card">
							<div class="card-body">
								<form action="{{route('category.update',$cat->id)}}" method="post" enctype="multipart/form-data">
								@csrf
								@method('PUT')
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
										<label class="form-label">Category Name:</label>
										
									
                                        <input name="cat_name" value="{{$cat->cat_name}}" type="text" class="form-control">
									</div>

                                    <div class="mb-3">
									
                                    <button type="submit" class="btn btn-primary px-5 rounded-0">Update</button>
										
									</div>

                                </form>

                                    </div>
                                    </div>


          </div>



      </div> 
      
    </div> 
</div> 



@endsection









