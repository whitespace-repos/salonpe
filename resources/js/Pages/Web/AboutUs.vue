<template>
    <Head title="About Us" />
	<WebLayout>
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">{{ aboutUs.data.title  }}</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><inertia-link :href="route('salonpe.index')"><i class="bx bx-home-alt"></i> Home</inertia-link> </li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        
        
        <!--start page content-->
        <section class="py-0 py-lg-4">
            <div class="container">
                <div class="row">
                    <div v-html="aboutUs.data.text" class="col-8"></div>                
                    <div class="col-3 offset-1  ">
                        <img :src="aboutUs.data.path" class="img-fluid" />
                    </div>
                </div>                
            </div>
        </section>
        <section class="py-4">
            <div class="container">
                <h4>Why Choose Us</h4>
                <hr>
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col d-flex">
                        <div class="card rounded-0 shadow-none w-100">
                            <div class="card-body">
                                <img src="@/assets/web/images/icons/delivery.png" width="60" alt="">
                                <h5 class="my-3">FREE SHIPPING</h5>
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr in some form.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 shadow-none w-100">
                            <div class="card-body">
                                <img src="@/assets/web/images/icons/money-bag.png" width="60" alt="">
                                <h5 class="my-3">100% MONEY BACK GUARANTEE</h5>
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr in some form.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 shadow-none w-100">
                            <div class="card-body">
                                <img src="@/assets/web/images/icons/support.png" width="60" alt="">
                                <h5 class="my-3">ONLINE SUPPORT 24/7</h5>
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr in some form.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--start brand-->
        <section class="py-4">
            <div class="container">
                <div class="separator pb-4">
                    <div class="line"></div>
                    <h5 class="mb-0 fw-bold separator-title">Popular Brands</h5>
                    <div class="line"></div>
                    </div>
                <div class="popular-brands">
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-xl-5 g-4">
                        <div class="col" v-for="brand in shopByBrands.brands" :key="brand.id">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img :src="brand.image" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end brand-->
    </WebLayout>
</template>

<script>
    import WebLayout from '@/Layouts/WebLayout.vue';     
    import { Head } from '@inertiajs/vue3';
    
    import { showProductPrice } from "@/utils.js";
    import isEmpty from "lodash/isEmpty"
    
    export default {
        data:(prop) =>({ showProductPrice , isEmpty }),
        props : ["aboutUs", "featuredProducts","shopByBrands"],
        components : {WebLayout , Head }
    }
    
</script>

