<template>
    <Head title="Contact Us" />
	<WebLayout>
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Shop Cart</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section class="py-4" >
            <div class="container">
                <div class="shop-cart" v-if="cart != null && cart.items.length  != 0">
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <div class="shop-cart-list mb-3 p-3">
                                <template v-for="item in cart.items" :key="cart.id">
                                    <div class="row align-items-center g-3">
                                        <div class="col-12 col-lg-6">
                                            <div class="d-lg-flex align-items-center gap-3">
                                                <div class="cart-img text-center text-lg-start bg-thumb p-5" :style="{ backgroundImage : `url(${item.product.thumb_image})`}"></div>
                                                <div class="cart-detail text-center text-lg-start">
                                                    <b class="mb-2 d-block">{{ item.product.name  }}</b>
                                                    <span class="mb-0 d-block">Quantity : <span>{{ item.quantity}} * {{ item.applied_price  }}</span></span>
                                                    <span class="text-bold">{{  item.attribute.attribute_data.size  }}</span>
                                                    <span :style="{ height : '10px' , width : '10px' , display : 'inline-block' , backgroundColor : item.attribute.attribute_data.color}" class="ms-2 rounded-circle"></span>                                               
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <h5 class="mb-0">{{ displayPrice(item.payble_price) }}</h5>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="text-center">
                                                <div class="d-flex gap-3 justify-content-center justify-content-lg-end">
                                                    <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm" @click="removeCart(item.id)"><i class='bx bx-x'></i>Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>	
                                </template>	
                                <div class="d-lg-flex align-items-center gap-2">
                                    <inertia-link :href="route('salonpe.index')" class="btn btn-dark btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shoping</inertia-link>
                                    <inertia-link :href="route('cart.clear')" as="button" method="delete" class="btn btn-light btn-ecomm ms-auto"><i class='bx bx-x-circle'></i> Clear Cart</inertia-link>
                                    <!-- <a href="javascript:;" class="btn btn-white btn-ecomm"><i class='bx bx-refresh'></i> Update Cart</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="checkout-form p-3 bg-light">
                                <div class="card rounded-0 border bg-transparent shadow-none">
                                    <div class="card-body">
                                        <p class="fs-5">Apply Discount Code</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-0" placeholder="Enter discount code">
                                            <button class="btn btn-dark btn-ecomm" type="button">Apply</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                    <div class="card-body">
                                        <p class="mb-2">Subtotal: <span class="float-end">{{ displayPrice(cart.payble_price)}}</span>
                                        </p>
                                        <p class="mb-2">Shipping: <span class="float-end">--</span>
                                        </p>
                                        <p class="mb-2">Taxes: <span class="float-end">{{ displayPrice(0) }}</span>
                                        </p>
                                        <p class="mb-0">Discount: <span class="float-end">--</span>
                                        </p>
                                        <div class="my-3 border-top"></div>
                                        <h5 class="mb-0">Order Total: <span class="float-end">{{ displayPrice(cart.payble_price)}}</span></h5>
                                        <div class="my-4"></div>
                                        <div class="d-grid"> <inertia-link :href="route('cart.checkout.detail')" class="btn btn-dark btn-ecomm">Proceed to Checkout</inertia-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <div class="card card-body w-md-50 shadow-none text-center mx-auto" v-else>
                    <i class='bx bx-cart-add display-1'></i>
                    <p>Your cart is empty ! Please add some item to cart </p>
                    <inertia-link :href="route('salonpe.index')" class="btn btn-warning rounded-2 mx-auto px-5" href="index.html">Go back shopping</inertia-link>
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
        props:["cart"],
        data:(prop)=>({ displayPrice , sumBy }),
        components : { WebLayout , Head },
        methods:{
            removeCart(id){
                if (confirm('Are you sure you want to remove this item ?')) {
                    this.$inertia.delete(`/cart/${id}`)
                }
            }
        }
    }
</script>