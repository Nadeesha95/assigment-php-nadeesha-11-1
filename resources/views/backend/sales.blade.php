@extends('backend.layouts.main')
@section('content')

<div class="page-wrapper">
			<div class="page-content">


<div class="row">
					<div class="col-xl-12 mx-auto">






<div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">Sales History</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">item</th>
											<th scope="col">qun</th>
											<th scope="col">Price</th>
                                            <th scope="col">total</th>
                                            <th scope="col">date</th>
                                            <th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>

                               
								
									</tbody>
								</table>
							</div>
						</div>
                    </div>
                </div>

							
                            
                        <nav aria-label="...">
							<ul class="pagination">
                            
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