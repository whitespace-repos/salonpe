<template>
    <Head title="Our Store" />
	<WebLayout>
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Shop Categories</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Categories</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop categories-->
        <section class="py-4">
            <div class="container">
                <div class="product-categories">
                    <div class="row row-cols-1 row-cols-lg-4 g-5">
                        <div class="col" v-for="category in browseCategories.categories" :key="category.id">
                            <div class="card">
                                <div class="bg-thumb p-5" :style="{ backgroundImage : `url(${category.image})`}"></div>
                                <div class="list-group list-group-flush">
                                    <a href="javascript:;" class="list-group-item bg-transparent text-center">
                                        <div class="mb-0 text-uppercase text-center text-truncate">{{ category.name }}</div>
                                    </a>
                                	<a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        Blazers & Suits
                                    </a>
                                    <a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        Dresses
                                    </a>
                                    <a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        Sportswear
                                    </a>
                                    <a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                        Hoodie & Sweatshirts
                                    </a>
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end shop categories-->
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

<script setup>
    import WebLayout from '@/Layouts/WebLayout.vue';     
    import { Head } from '@inertiajs/vue3';
    defineProps(['shopByBrands', 'browseCategories']);
</script>