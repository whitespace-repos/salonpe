<template>
    <CheckoutLayout :cart="order.cart.items" :showSteps="false">
        <section class="py-4">
					<div class="container">
						<h6 class="mb-0">Order ID: {{ `#POD${order.id}`}}</h6>
						<hr>
						<div class="row row-cols-1 row-cols-lg-4 rounded-4 gx-3 m-0 border">
							<div class="col p-4 text-center border-end">
								<h6 class="mb-1">Estimated Delivery</h6>
								<p class="mb-0">{{ displayDate(order.track.created_at,'MMMM Do YY ,      h:mm A')}}</p>
							</div>
							<div class="col p-4 text-center border-end">
								<h6 class="mb-1">Shipping BY:</h6>
								<p class="mb-0">BLUEDART </p>
							</div>
							<div class="col p-4 text-center border-end">
								<h6 class="mb-1">Status:</h6>
								<p class="mb-0">Picked by the courier</p>
							</div>
							<div class="col p-4 text-center">
								<h6 class="mb-1">Tracking #:</h6>
								<p class="mb-0">{{ `#PODTRK${order.track.id}`}}</p>
							</div>
						</div>
						<!--end row-->
						<div class="mt-3"></div>
						<div class="checkout-payment">
							<div class="card bg-transparent rounded-0 shadow-none">
								<div class="card-body">
									<div class="steps steps-light">
										<a class="step-item" :class="{ 'active' : order.track.confirmed}" href="javascript:;">
											<div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
											</div>
											<div class="step-label">Order confirmed</div>
										</a>
										<a class="step-item" href="javascript:;" :class="{ 'active' : order.track.shipped}">
											<div class="step-progress"><span class="step-count"><i class='bx bx-user-circle' ></i></span>
											</div>
											<div class="step-label">Picked by courier</div>
										</a>
										<a class="step-item" href="javascript:;" :class="{ 'active' : order.track.on_the_way}">
											<div class="step-progress"><span class="step-count"><i class='bx bx-car'></i></span>
											</div>
											<div class="step-label">On the way</div>
										</a>
										<a class="step-item" href="javascript:;" :class="{ 'active' : order.track.delivered}">
											<div class="step-progress"><span class="step-count"><i class='bx bx-planet'></i></span>
											</div>
											<div class="step-label">Ready for pickup</div>
										</a>
									</div>
								</div>
							</div>
						</div>
                        <hr />
                        <inertia-link :href="route('salonpe.account.order')" class="btn btn-dark px-5">Return Back</inertia-link>
					</div>
				</section>
    </CheckoutLayout>
</template>

<script setup>
    import CheckoutLayout from "@/Pages/Web/CheckoutLayout.vue"
    import { displayDate } from '@/utils'
    defineProps(["order"])
</script>
