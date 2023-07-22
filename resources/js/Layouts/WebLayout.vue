<template>

    <!--wrapper-->
	<div class="wrapper">
		<!--start top header wrapper-->
		<div class="header-wrapper fixed-top">
			<div class="top-menu">
				<div class="container">
					<nav class="navbar navbar-expand">
						<div class="shiping-title d-none d-sm-flex">Welcome to Variety Cosmetics, Pune</div>
						<ul class="navbar-nav ms-auto d-none d-lg-flex">
							<li class="nav-item">
								<inertia-link class="nav-link" :href="route('salonpe.account.order')">Track Order</inertia-link>
							</li>
							<li class="nav-item">
								<inertia-link class="nav-link" :href="route('salonpe.aboutus')">About</inertia-link>
							</li>
							<li class="nav-item">
								<inertia-link class="nav-link" :href="route('salonpe.store')">Our Stores</inertia-link>
							</li>
							<li class="nav-item">
								<inertia-link class="nav-link" :href="route('salonpe.contactus')">Contact</inertia-link>
							</li>
							<li class="nav-item"><a class="nav-link" href="javascript:;">Help & FAQs</a>
							</li>
						</ul>
						<ul class="navbar-nav social-link ms-lg-2 ms-auto">
							<li class="nav-item"> <a class="nav-link" :href="$page.props.website.data.facebook"><i class='bx bxl-facebook'></i></a>
							</li>
							<li class="nav-item"> <a class="nav-link" :href="$page.props.website.data.instagram"><i class='bx bxl-instagram'></i></a>
							</li>
							<li class="nav-item"> <inertia-link class="nav-link" :href="route('salonpe.contactus')"><i class='bi bi-telephone'></i></inertia-link>
							</li>

							<li class="nav-item"> <a class="nav-link" :href="$page.props.website.data.mail"><i class='bi bi-envelope'></i></a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="header-content" style="background-color: rgb(0 0 0);">
				<div class="container">
					<div class="row align-items-center gx-4">
						<div class="col-auto">
							<div class="d-flex align-items-center gap-3">
								<div class="mobile-toggle-menu d-inline d-xl-none" data-bs-toggle="offcanvas"
									data-bs-target="#offcanvasNavbar">
									<i class="bx bx-menu text-yellow"></i>
								</div>
								<div class="logo">
									<inertia-link :href="route('salonpe.index')">
										<img src="@/assets/images/org/logo.jpeg" class="logo-icon" alt="" style="width: 9em !important;"/>
									</inertia-link>
								</div>
							</div>
						</div>
						<div class="col-12 col-xl order-4 order-xl-0">
							<div class="input-group input-group-md flex-nowrap pb-3 pb-xl-0">
								<input type="text" class="form-control w-100 border-dark border border-3" placeholder="Search for Products">
								<button class="btn btn-dark  bg-yellow text-black text-semibold" type="button">Search</button>
							</div>
						</div>
						<div class="col-auto d-none d-xl-flex">
							<div class="d-flex align-items-center gap-3">
								<div class="fs-1"><i class='bx bx-headphone'></i></div>
								<div class="">
									<p class="mb-0">CALL US NOW</p>
									<h6 class="mb-0 text-white">{{ $page.props.website.data.contact }}</h6>
								</div>
							</div>
						</div>
						<div class="col-auto ms-auto">
							<div class="top-cart-icons">
								<nav class="navbar navbar-expand">
									<ul class="navbar-nav">
										<li class="nav-item" v-if="$page.props.auth.user != null"><inertia-link :href="route('salonpe.account.dashboard')" class="nav-link cart-link text-muted"><i class='bx bx-user'></i></inertia-link>
										</li>
										<li class="nav-item"><inertia-link :href="route('wishlists')" class="nav-link cart-link  text-muted position-relative wishlist"><span class="alert-count shadow-lg">{{ ( $page.props.auth.user == null )  ? 0 : $page.props.auth.user.wishlists_count}}</span><i class='bx bx-heart'></i> </inertia-link>
										</li>
										<li class="nav-item dropdown dropdown-large">
											<inertia-link :href="route('cart.index')" class="nav-link  cart-link text-muted cart-count" >	<span class="alert-count shadow-lg">{{ ( $page.props.auth.user == null || $page.props.auth.user.active_cart == null)  ? 0 : $page.props.auth.user.active_cart.quantity}}</span>
												<i class='bx bx-shopping-bag'></i>
											</inertia-link>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
			<div class="primary-menu d-flex container mx-auto align-items-center">
				<nav class="navbar navbar-expand-xl w-100 navbar-dark container mb-0 p-0">
					<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
					  <div class="offcanvas-header">
						<div class="offcanvas-logo"><img src="@/assets/images/org/logo.jpeg" width="100" alt="">
						</div>
						<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					  </div>
					  <div class="offcanvas-body primary-menu">
						<ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
						  <li class="nav-item">
							<inertia-link :href="route('salonpe.index')" class="nav-link" >Home</inertia-link>
						  </li>
						  <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="tv-shows.html"
							  data-bs-toggle="dropdown">
							  Categories 
							</a>
							<div class="dropdown-menu dropdown-large-menu">
							  <div class="row">
								<div class="col-12 col-xl-4" v-for="(menu,index) in $page.props.categoriesMenu.data" :key="index">
								  <h6 class="large-menu-title text-muted">{{ menu.label }}</h6>
								  <ul class="list-unstyled" style="font-size: .9em;">
									<li v-for="category in menu.categories" :key="category.id"><a class="text-truncate" href="javascript:;">{{ category.name }}</a></li>								
								  </ul>
								</div>
								<div class="col-12 col-xl-4 d-none d-xl-block">
								  <div class="pramotion-banner1">
									<img src="@/assets/web/images/gallery/menu-img.jpg" class="img-fluid" alt="" />
								  </div>
								</div>
								<!-- end col-3 -->
							  </div>
							  <!-- end row -->
							</div>
						  </li>
						  <li class="nav-item d-block d-md-none">
								<inertia-link class="nav-link" :href="route('salonpe.aboutus')">About</inertia-link>
							</li>
							<li class="nav-item d-block d-md-none">
								<inertia-link class="nav-link" :href="route('salonpe.store')">Our Stores</inertia-link>
							</li>
							<li class="nav-item d-block d-md-none">
								<inertia-link class="nav-link" :href="route('salonpe.contactus')">Contact</inertia-link>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
								Account
								</a>
								<ul class="dropdown-menu">
									<li v-if="$page.props.auth.user != null"><inertia-link class="dropdown-item" :href="route('salonpe.account.dashboard')">Dashboard</inertia-link>
									</li>
									<li v-if="$page.props.auth.user != null"><inertia-link class="dropdown-item" :href="route('salonpe.account.order')">My Orders</inertia-link>
									</li>
									<li v-if="$page.props.auth.user != null"><inertia-link class="dropdown-item" :href="route('salonpe.account.detail')">User Detail</inertia-link>
									</li>
									<li v-if="$page.props.auth.user == null"><inertia-link class="dropdown-item" :href="route('account.create')">Register</inertia-link></li>
									<li v-if="$page.props.auth.user == null"><inertia-link class="dropdown-item" :href="route('account.show','login')">Login</inertia-link></li>
								</ul>
							</li>
						  
						</ul>
					  </div>					  
					</div>						
				  </nav>
				  <img src="@/assets/web/images/salonpe.gif" class="logo-icon-gif  py-3 py-md-0"/>
			</div>
		</div>
		<!--end top header wrapper-->
		<!--start slider section-->
		<!--start carousel-->
       
        <!--end carousel-->
		<!--end slider section-->
		<!--start page wrapper -->
		<div class="page-wrapper mt-0">            
			<div class="page-content page-content-margin-top">
                <slot />				
			</div>
		</div>
		<!--end page wrapper -->
		<!--start footer section-->
		<footer>
			<section class="py-5 border-top bg-black">
				<div class="container">
					<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
						<div class="col">
							<div class="footer-section1 mb-4">
								<img src="@/assets/images/org/logo.jpeg" class="logo-img mb-3" alt="" width="170">
            					<div v-html="$page.props.website.data.footerText"></div>
             					<inertia-link class="link-dark text-white mb-3" :href="route('salonpe.aboutus')">Read More</inertia-link>
							</div>
						</div>
						<div class="col ps-2 ps-md-4">
							<div class="footer-section2">
								<h6 class="ps-1 mb-4 text-uppercase fw-bold text-white">Categories</h6>
								<ul class="list-unstyled">
									<li class="mb-1" v-for="category in $page.props.website.data.categories" :key="category.id">
										<a href="javascript:;"><i class='bx bx-chevron-right'></i> {{  category.name }}</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col">
							<div class="footer-section2">
								<h6 class="mb-4 text-uppercase fw-bold text-white">Brands</h6>
								<ul class="list-unstyled">
									<li class="mb-1" v-for="brand in $page.props.website.data.brands" :key="brand.id">
										<a href="javascript:;"><i class='bx bx-chevron-right'></i> {{ brand.name }}</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col">
							<div class="footer-section4">
								<h6 class="mb-3 fw-bold text-white">Follow Us</h6>
								<div class="social-link d-flex align-items-center gap-2">
									<a :href="$page.props.website.data.facebook"><i class="bi bi-facebook"></i></a>
									<a :href="$page.props.website.data.mail"><i class="bi bi-envelope"></i></a>
									<a href="javascript:;"><i class="bi bi-youtube"></i></a>
									<a :href="$page.props.website.data.instagram"><i class="bi bi-instagram"></i></a>
								</div>
								<div class="mb-3 mt-3">
									<h6 class="fw-bold text-white">Support</h6>
									<p class="mb-0 text-muted">{{ $page.props.website.data.support }}</p>
								</div>
								<div class="">
									<h6 class="fw-bold text-white">Phone Number</h6>
									<p class="mb-0 text-muted">{{ $page.props.website.data.contact }}</p>
								</div>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</section>

			<section class="footer-strip text-center py-3 border-top positon-absolute bottom-0">
				<div class="container">
					<div class="d-flex flex-column flex-lg-row align-items-center gap-3 justify-content-center">
						<p class="mb-0">Copyright © 1963 Variety Cosmetics Pvt Ltd. All rights reserved</p>
					</div>
				</div>
			</section>
		</footer>
		<!--end footer section-->
		
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	</div>
	<!--end wrapper-->

</template>


<script setup>
    import "@/assets/web/js/bootstrap.bundle.min.js";
    // import "@/assets/web/plugins/OwlCarousel/js/owl.carousel.min.js"
    // import "@/assets/web/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"
    import "@/assets/web/css/web.css";    
    //

	defineProps(['categoriesMenu'])
</script>