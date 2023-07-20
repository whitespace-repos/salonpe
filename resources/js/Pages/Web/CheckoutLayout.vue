<template>
    <Head title="Contact Us" />
	<WebLayout>
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Checkout</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section class="py-4">
            <div class="container">
                <div class="shop-cart">
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <div class="checkout-details">
                                <div class="card bg-transparent rounded-0 shadow-none" v-if="showSteps">
                                    <div class="card-body">
                                        <div class="steps steps-light">
                                            <inertia-link :href="route('cart.index')" class="step-item active">
                                                <div class="step-progress"><span class="step-count">1</span>
                                                </div>
                                                <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
                                            </inertia-link>
                                            <inertia-link :href="route('cart.checkout.detail')" class="step-item current" :class="{ 'active':($page.url === '/cart/checkout/detail' || $page.url === '/cart/shipping/detail' || $page.url === '/cart/make/payment') }">
                                                <div class="step-progress"><span class="step-count">2</span>
                                                </div>
                                                <div class="step-label"><i class='bx bx-user-circle'></i>Details</div>
                                            </inertia-link>
                                            <inertia-link :href="route('cart.shipping.detail')" class="step-item" :class="{ 'active':($page.url === '/cart/shipping/detail' || $page.url === '/cart/make/payment') }">
                                                <div class="step-progress"><span class="step-count">3</span>
                                                </div>
                                                <div class="step-label"><i class='bx bx-cube'></i>Shipping</div>
                                            </inertia-link>
                                            <inertia-link :href="route('cart.make.payment')" class="step-item" :class="{ 'active':($page.url === '/cart/make/payment') }">
                                                <div class="step-progress"><span class="step-count">4</span>
                                                </div>
                                                <div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
                                            </inertia-link>
                                        </div>
                                    </div>
                                </div>

                                <slot />
                               
                            </div>
                        </div>
                        <div class="col-12 col-xl-4" v-if="showSummary">
                            <div class="order-summary">
                                <div class="card rounded-0 shadow-none">
                                    <div class="card-body py-0">
                                        <!-- <div class="card rounded-0 border bg-transparent shadow-none mb-3">
                                            <div class="card-body">
                                                <p class="fs-5">Apply Discount Code</p>
                                                <div class="input-group">
                                                    <input type="text" class="form-control rounded-0" placeholder="Enter discount code">
                                                    <button class="btn btn-dark btn-ecomm" type="button">Apply</button>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="card rounded-0 border bg-transparent shadow-none">
                                            <div class="card-body" style="max-height: 30em;overflow: auto;">
                                                <p class="fs-5">Order summary</p>
                                                <div class="my-3 border-top"></div>
                                                <template v-for="(cart,index) in cart" :key="cart.id">
                                                    <div class="d-flex align-items-center" >
                                                        <div class="cart-img text-center text-lg-start bg-thumb p-5" :style="{ backgroundImage : `url(${cart.product.thumb_image})`}"></div>
                                                        <div class="ps-2">
                                                            <h6 class="mb-1"><a href="javascript:;" class="text-dark">White Polo T-Shirt</a></h6>
                                                            <div class="widget-product-meta">
                                                                {{ cart.quantity}} * {{ displayPrice(cart.applied_price)  }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-1 border-top" v-if="index != cart.length-1"></div>
                                                </template>                                                
                                            </div>
                                        </div>
                                        <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                            <div class="card-body">
                                                <p class="mb-2">Subtotal: <span class="float-end">{{ displayPrice(sumBy(cart , 'payble_price' )) }}</span>
                                                </p>
                                                <p class="mb-2">Shipping: <span class="float-end">--</span>
                                                </p>
                                                <p class="mb-2">Taxes: <span class="float-end">{{ displayPrice(0) }}</span>
                                                </p>
                                                <p class="mb-0">Discount: <span class="float-end">--</span>
                                                </p>
                                                <div class="my-3 border-top"></div>
                                                <h5 class="mb-0">Order Total: <span class="float-end">{{ displayPrice(sumBy(cart , 'payble_price' )) }} </span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </WebLayout>
</template>

<script>
    import WebLayout from '@/Layouts/WebLayout.vue';     
    import { Head } from '@inertiajs/vue3';
    import { displayPrice } from '@/utils';
    import sumBy from 'lodash/sumBy'
    export default{
        props: {
            cart:  Array,
            showSummary : {
                    type:Boolean,
                    default : true,
            },
            showSteps : {
                        type :Boolean,
                        default : true
            }
        },
        data:(prop)=>({ 
                            displayPrice , sumBy 
                    }),
        components : { WebLayout , Head }       
    }
</script>