	<!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					
				</div>
				<div>
					<h6 class="logo-text">ADMIN</h6>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="/admin" >
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				
				</li>
			
				<li class="menu-label">Products Section</li>
			
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Products</div>
					</a>
					<ul>
					<li> <a href="{{route('product.index')}}"><i class="bx bx-right-arrow-alt"></i> Products</a>
						</li>
						<li> <a href="{{route('product.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Products</a>
						</li>
	
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-tag'></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
					<li> <a href="{{route('category.index')}}"><i class="bx bx-right-arrow-alt"></i> All Categories</a>
						</li>
					
	
					</ul>
				</li>




				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title"> Sales </div>
					</a>
					<ul>
					<li> <a href="{{route('sales.index')}}"><i class="bx bx-right-arrow-alt"></i> View sales</a>
						</li>
						
					
	
					</ul>
				</li>
			
			
			
		
	
			
			
		
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->