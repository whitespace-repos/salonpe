<template>

    <!--wrapper-->
	<div class="wrapper">
		<!--start top header wrapper-->
		<div class="header-wrapper">
			<div class="top-menu">
				<div class="container">
					<nav class="navbar navbar-expand">
						<div class="shiping-title d-none d-sm-flex">Welcome to Variety Cosmetics, Pune</div>
						<ul class="navbar-nav ms-auto d-none d-lg-flex">
							<li class="nav-item"><a class="nav-link" href="order-tracking.html">Track Order</a>
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
									<i class="bx bx-menu"></i>
								</div>
								<div class="logo">
									<inertia-link :href="route('salonpe.index')">
										<img src="@/assets/images/org/logo.jpeg" class="logo-icon" alt="" style="width: 10em !important;"/>
									</inertia-link>
								</div>
							</div>
						</div>
						<div class="col-12 col-xl order-4 order-xl-0">
							<div class="input-group flex-nowrap pb-3 pb-xl-0">
								<input type="text" class="form-control w-100 border-dark border border-3" placeholder="Search for Products">
								<button class="btn btn-dark btn-ecomm border-3" type="button">Search</button>
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
										<li class="nav-item"><a href="account-dashboard.html" class="nav-link cart-link text-muted"><i class='bx bx-user'></i></a>
										</li>
										<li class="nav-item"><a href="wishlist.html" class="nav-link cart-link  text-muted position-relative"><span class="alert-count shadow-lg">0</span><i class='bx bx-heart'></i> </a>
										</li>
										<li class="nav-item dropdown dropdown-large">
											<a href="#" class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link text-muted" data-bs-toggle="dropdown">	<span class="alert-count shadow-lg">8</span>
												<i class='bx bx-shopping-bag'></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="javascript:;">
													<div class="cart-header">
														<p class="cart-header-title mb-0">8 ITEMS</p>
														<p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
													</div>
												</a>
												<div class="cart-list  overflow-auto">
													<a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="flex-grow-1">
																<h6 class="cart-product-title">Men White T-Shirt</h6>
																<p class="cart-product-price">1 X $29.00</p>
															</div>
															<div class="position-relative">
																<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																</div>
																<div class="cart-product">
																	<img src="@/assets/web/images/products/01.png" class="" alt="product image">
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="flex-grow-1">
																<h6 class="cart-product-title">Puma Sports Shoes</h6>
																<p class="cart-product-price">1 X $29.00</p>
															</div>
															<div class="position-relative">
																<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																</div>
																<div class="cart-product">
																	<img src="@/assets/web/images/products/05.png" class="" alt="product image">
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="flex-grow-1">
																<h6 class="cart-product-title">Women Red Sneakers</h6>
																<p class="cart-product-price">1 X $29.00</p>
															</div>
															<div class="position-relative">
																<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																</div>
																<div class="cart-product">
																	<img src="@/assets/web/images/products/17.png" class="" alt="product image">
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="flex-grow-1">
																<h6 class="cart-product-title">Black Headphone</h6>
																<p class="cart-product-price">1 X $29.00</p>
															</div>
															<div class="position-relative">
																<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																</div>
																<div class="cart-product">
																	<img src="@/assets/web/images/products/10.png" class="" alt="product image">
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="flex-grow-1">
																<h6 class="cart-product-title">Blue Girl Shoes</h6>
																<p class="cart-product-price">1 X $29.00</p>
															</div>
															<div class="position-relative">
																<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																</div>
																<div class="cart-product">
																	<img src="@/assets/web/images/products/08.png" class="" alt="product image">
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="flex-grow-1">
																<h6 class="cart-product-title">Men Leather Belt</h6>
																<p class="cart-product-price">1 X $29.00</p>
															</div>
															<div class="position-relative">
																<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																</div>
																<div class="cart-product">
																	<img src="@/assets/web/images/products/18.png" class="" alt="product image">
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="flex-grow-1">
																<h6 class="cart-product-title">Men Yellow T-Shirt</h6>
																<p class="cart-product-price">1 X $29.00</p>
															</div>
															<div class="position-relative">
																<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																</div>
																<div class="cart-product">
																	<img src="@/assets/web/images/products/04.png" class="" alt="product image">
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="flex-grow-1">
																<h6 class="cart-product-title">Pool Charir</h6>
																<p class="cart-product-price">1 X $29.00</p>
															</div>
															<div class="position-relative">
																<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																</div>
																<div class="cart-product">
																	<img src="@/assets/web/images/products/16.png" class="" alt="product image">
																</div>
															</div>
														</div>
													</a>
												</div>
												<a href="javascript:;">
													<div class="text-center cart-footer d-flex align-items-center">
														<h5 class="mb-0">TOTAL</h5>
														<h5 class="mb-0 ms-auto">$189.00</h5>
													</div>
												</a>
												<div class="d-grid p-3 border-top">	<a href="javascript:;" class="btn btn-dark btn-ecomm">CHECKOUT</a>
												</div>
											</div>
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
								<div class="col-12 col-xl-4">
								  <h6 class="large-menu-title">Fashion</h6>
								  <ul class="list-unstyled">
									<li><a href="javascript:;">Casual T-Shirts</a>
									</li>
									<li><a href="javascript:;">Formal Shirts</a>
									</li>
									<li><a href="javascript:;">Jackets</a>
									</li>
									<li><a href="javascript:;">Jeans</a>
									</li>
									<li><a href="javascript:;">Dresses</a>
									</li>
									<li><a href="javascript:;">Sneakers</a>
									</li>
									<li><a href="javascript:;">Belts</a>
									</li>
									<li><a href="javascript:;">Sports Shoes</a>
									</li>
								  </ul>
								</div>
								<!-- end col-3 -->
								<div class="col-12 col-xl-4">
								  <h6 class="large-menu-title">Electronics</h6>
								  <ul class="list-unstyled">
									<li><a href="javascript:;">Mobiles</a>
									</li>
									<li><a href="javascript:;">Laptops</a>
									</li>
									<li><a href="javascript:;">Macbook</a>
									</li>
									<li><a href="javascript:;">Televisions</a>
									</li>
									<li><a href="javascript:;">Lighting</a>
									</li>
									<li><a href="javascript:;">Smart Watch</a>
									</li>
									<li><a href="javascript:;">Galaxy Phones</a>
									</li>
									<li><a href="javascript:;">PC Monitors</a>
									</li>
								  </ul>
								</div>
								<!-- end col-3 -->
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
						  <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
								Account <i class='bx bx-chevron-down ms-1'></i> 
							</a>
							<ul class="dropdown-menu">
								<li class="nav-item dropdown"><a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="#">Shop Layouts <i class='bx bx-chevron-right float-end'></i></a>
									<ul class="submenu dropdown-menu">
										<li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Shop Grid - Left Sidebar</a>
										</li>
										<li><a class="dropdown-item" href="shop-grid-right-sidebar.html">Shop Grid - Right Sidebar</a>
										</li>
										<li><a class="dropdown-item" href="shop-list-left-sidebar.html">Shop List - Left Sidebar</a>
										</li>
										<li><a class="dropdown-item" href="shop-list-right-sidebar.html">Shop List - Right Sidebar</a>
										</li>
										<li><a class="dropdown-item" href="shop-grid-filter-on-top.html">Shop Grid - Top Filter</a>
										</li>
										<li><a class="dropdown-item" href="shop-list-filter-on-top.html">Shop List - Top Filter</a>
										</li>
									</ul>
								</li>
								<li><a class="dropdown-item" href="product-details.html">Product Details</a>
								</li>
								<li><a class="dropdown-item" href="shop-cart.html">Shop Cart</a>
								</li>
								<li><a class="dropdown-item" href="shop-categories.html">Shop Categories</a>
								</li>
								<li><a class="dropdown-item" href="checkout-details.html">Billing Details</a>
								</li>
								<li><a class="dropdown-item" href="checkout-shipping.html">Checkout Shipping</a>
								</li>
								<li><a class="dropdown-item" href="checkout-payment.html">Payment Method</a>
								</li>
								<li><a class="dropdown-item" href="checkout-review.html">Order Review</a>
								</li>
								<li><a class="dropdown-item" href="checkout-complete.html">Checkout Complete</a>
								</li>
								<li><a class="dropdown-item" href="order-tracking.html">Order Tracking</a>
								</li>
								<li><a class="dropdown-item" href="product-comparison.html">Product Comparison</a>
								</li>
							</ul>
						  </li>
						</ul>
					  </div>					  
					</div>						
				  </nav>
				  <img src="@/assets/web/images/salonpe.gif" class="w-25 py-3 py-md-0" style="height: 45px;"/>
			</div>
		</div>
		<!--end top header wrapper-->
		<!--start slider section-->
		<!--start carousel-->
       
        <!--end carousel-->
		<!--end slider section-->
		<!--start page wrapper -->
		<div class="page-wrapper mt-0">            
			<div class="page-content">
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
						<div class="col ps-0 ps-md-4">
							<div class="footer-section2">
								<h6 class="mb-4 text-uppercase fw-bold text-white">Categories</h6>
								<ul class="list-unstyled">
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Jeans</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> T-Shirts</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sports</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Shirts & Tops</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Clogs & Mules</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sunglasses</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Bags & Wallets</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sneakers & Athletic</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Electronis</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Furniture</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col">
							<div class="footer-section2">
								<h6 class="mb-4 text-uppercase fw-bold text-white">Brands</h6>
								<ul class="list-unstyled">
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Jeans</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> T-Shirts</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sports</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Shirts & Tops</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Clogs & Mules</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sunglasses</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Bags & Wallets</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sneakers & Athletic</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Electronis</a>
									</li>
									<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Furniture</a>
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

<script>
    import "@/assets/web/js/bootstrap.bundle.min.js";
    // import "@/assets/web/plugins/OwlCarousel/js/owl.carousel.min.js"
    // import "@/assets/web/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"
    import "@/assets/web/css/web.css";    
    //
</script>