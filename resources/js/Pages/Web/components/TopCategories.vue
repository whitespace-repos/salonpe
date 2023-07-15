<template>
    <section class="product-tab-section py-4 bg-light">
        <div class="container">
            <div class="text-center pb-3">
                <h3 class="mb-0 h3 fw-bold">Top Categories</h3>
                <p class="mb-0 text-capitalize">Top Categories & Associated Products</p>
            </div>
            <div class="row">
                <div class="col-auto mx-auto">
                    <div class="product-tab-menu table-responsive">
                        <ul class="nav nav-pills flex-nowrap" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation" v-for="(category,index) in categories" :key="category.id">
                                <button class="nav-link" :class="{ 'active' : (index == 0)}" data-bs-toggle="pill" :data-bs-target="'#topCategory-'+category.id"  type="button">{{  category.name  }}</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="tab-content tabular-product">
                <div class="tab-pane fade"   v-for="(category,index) in categories" :key="category.id" :id="'topCategory-'+category.id" :class="{ 'active show' : (index == 0)}">

                    <div class="product-grid">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-1" >
                            <div class="col" v-for="product in category.products" :key="product.id">
                                <div class="card h-100 shadow-sm rounded-1">
                                    <div class="position-relative overflow-hidden">
                                        <div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
                                            <a href="javascript:;"><i class='bx bx-cart-add' ></i></a>
                                        </div>
                                        <div class="quick-view position-absolute start-0 bottom-0 end-0">
                                            <a href="javascript:;" @click="$emit('selectedProduct',product)" data-bs-toggle="modal" data-bs-target="#QuickViewProduct">Quick View</a>
                                        </div>
                                        <div class="product-image bg-thumb" :style="{ backgroundImage : `url(${product.thumb_image})`}" ></div>
                                    </div>
                                    <div class="card-body  d-flex flex-column">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="">
                                                <p class="mb-1 product-short-name">{{ isEmpty(product.category) ? '' : product.category.name }}</p>
                                                <p class="mb-0 fw-bold product-short-title" v-snip="{ lines: 2 }">{{ product.name }}</p>
                                            </div>
                                            <div class="icon-wishlist">
                                                <a href="javascript:;"><i class="bx bx-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="cursor-pointer rating mt-auto">
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                        </div>
                                        <div class="product-price d-flex align-items-center justify-content-start gap-0 gap-md-1 flex-wrap flex-md-nowrap mt-2" v-html="displayPriceHtml(product)"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                      
                </div>                   
            </div>
        </div>
    </section>
</template>

<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: #fecd07 !important;
        color: black !important;
    }
</style>
<script>
    import { showProductPrice , displayPriceHtml } from '@/utils';
    import isEmpty from 'lodash/isEmpty'
    export default {
        data: (prop) => ({ isEmpty , showProductPrice , displayPriceHtml }),
        props : ["categories"],
        emits: ['selectedProduct'],  
    }
</script>