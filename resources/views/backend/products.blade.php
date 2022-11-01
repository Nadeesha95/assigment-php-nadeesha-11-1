@extends('backend.layouts.main')
@section('content')

<div class="page-wrapper">
			<div class="page-content">


<div class="row">
					<div class="col-xl-12 mx-auto">






<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">All Products</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Title</th>
											<th scope="col">Category</th>
											<th scope="col">Price</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>

                                    @foreach($data as $datas)
										<tr>
											<th scope="row">{{$datas->id}}</th>
											<td>{{$datas->title}}</td>
											<td>{{$datas->cat}}</td>
											<td>{{$datas->price}}</td>
											<td>{!! Str::limit($datas->des, 100) !!} </td>
                                            <td><img width="30" height="30" src="{{asset('images/product')}}/{{$datas->files}}"></td>

                                            <td>
                                           <a href="{{route('product.edit',$datas->id)}}">     <button type="button" class="btn btn-sm btn-outline-dark"><i class='bx bx-edit me-0'></i>
										</button> </a>

										<a class="delete" data-confirm="Are you sure to delete this item?" href="delete-product/{{$datas->id}}">    <button type="button" class="btn btn-sm btn-outline-dark"><i class='bx bx-trash me-0'></i>
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

							
                            
                        <nav aria-label="...">
							<ul class="pagination">
                            {{ $data->links() }}
							</ul>
						</nav>
					
          


                </div>
                </div>
                </div>
                </div>

				<script>
  var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
  deleteLinks[i].addEventListener('click', function(event) {
      event.preventDefault();

      var choice = confirm(this.getAttribute('data-confirm'));

      if (choice) {
        window.location.href = this.getAttribute('href');
      }
  });
}
					
					</script>

@endsection