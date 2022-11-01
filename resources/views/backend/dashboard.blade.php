@extends('backend.layouts.main')
@section('content')

<div class="page-wrapper">
			<div class="page-content">


<div class="row">
					<div class="col-xl-12 mx-auto">

<div class="card radius-10">
					<div class="card-content">
						<div class="row row-group row-cols-1 row-cols-xl-4">
							<div class="col">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0">Pending Orders</p>
											<h4 class="mb-0 text-primary">0</h4>
										</div>
										<div class="ms-auto"><i class="bx bx-cart font-35 text-primary"></i>
										</div>
									</div>
									<div class="progress radius-10 my-2" style="height:4px;">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 65%"></div>
									</div>
									<!-- <p class="mb-0 font-13">+2.5% from last week</p> -->
								</div>
							</div>
							<div class="col">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0">All Orders</p>
											<h4 class="mb-0 text-danger">0</h4>
										</div>
										<div class="ms-auto"><i class="bx bx-cart font-35 text-danger"></i>
										</div>
									</div>
									<div class="progress radius-10 my-2" style="height:4px;">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
									</div>
									<!-- <p class="mb-0 font-13">+5.4% from last week</p> -->
								</div>
							</div>
							<div class="col">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0">Products</p>
                                    <h4 class="mb-0 text-success">0</h4>
										</div>
										<div class="ms-auto"><i class="bx bx-line-wallet font-35 text-success"></i>
										</div>
									</div>
									<div class="progress radius-10 my-2" style="height:4px;">
										<div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
									</div>
									<!-- <p class="mb-0 font-13">-4.5% from last week</p> -->
								</div>
							</div>
							<div class="col">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0">Categories</p>
											<h4 class="mb-0 text-warning">4</h4>
										</div>
										<div class="ms-auto"><i class="bx bx-tag font-35 text-warning"></i>
										</div>
									</div>
									<div class="progress radius-10 my-2" style="height:4px;">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 65%"></div>
									</div>
									<!-- <p class="mb-0 font-13">+8.4% from last week</p> -->
								</div>
							</div>
						</div>
					</div>
				</div>






@endsection