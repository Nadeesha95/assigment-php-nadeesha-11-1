@extends('backend.layouts.main')
@section('content')

<div class="page-wrapper">
	<div class="page-content">


      <div class="row">
          <div class="col-xl-4 mx-auto">
          <h6 class="mb-0 text-uppercase">Add Categories</h6>
						<hr/>

          <div class="card">
							<div class="card-body">
								<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
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
										<label class="form-label">Category Name:</label>
										<input name="cat_name" type="text" class="form-control">
									</div>

                                    <div class="mb-3">
									
                                    <button type="submit" class="btn btn-primary px-5 rounded-0">Submit</button>
										
									</div>

                                </form>

                                    </div>
                                    </div>


          </div>


          <div class="col-xl-8 mx-auto">

          <h6 class="mb-0 text-uppercase">All Categories</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Category</th>
											<th scope="col">status</th>
                                            <th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>

                                    @foreach($data as $datas)
										<tr>
											<th scope="row">{{$datas->id}}</th>
											<td>{{$datas->cat_name}}</td>
										
                                            <td>@if($datas->status == 1)<span class="badge bg-success">Active</span> @else <span class="badge bg-danger">Inactive</span> @endif</td>

                                            <td>
                                           <a href="{{route('category.edit',$datas->id)}}">     <button type="button" class="btn btn-sm btn-outline-dark"><i class='bx bx-edit me-0'></i>
										</button> </a>

										<a class="delete" data-confirm="Are you sure to delete this item?" href="{{route('category.show',$datas->id)}}">    <button type="button" class="btn btn-sm btn-outline-dark">@if($datas->status == 1) inactive @else Active @endif
										</button></a>
                                    
                                    
                                    </td>
										</tr>
                                        @endforeach
								
									</tbody>
								</table>
							</div>
						</div>












</div>

      </div> 
      
    </div> 
</div> 



@endsection









