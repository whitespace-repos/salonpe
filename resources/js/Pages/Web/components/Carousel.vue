<template>
   <section class="py-4">
        <div class="container-fluid">
            <div class="separator pb-4">
                <div class="line"></div>
                <h5 class="mb-0 fw-bold separator-title">{{ heading }}</h5>
                <div class="line"></div>
            </div>
            
            <div class="product-grid">
                <div :id="id" class="my-4 py-10 f-carousel bg-gray-50">
                    <div class="f-carousel__viewport px-12">
                        <div class="f-carousel__slide shadow-sm  border-f-carousel-light p-0" v-for="product in products" :key="product.id">
                            <div class="card h-auto rounded-0 shadow-none" style="height:24em  !important">
                                <div class="position-relative overflow-hidden">
                                    <div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
                                        <a href="javascript:;"><i class='bx bx-cart-add' ></i></a>
                                    </div>
                                    <div class="quick-view position-absolute start-0 bottom-0 end-0 p-0">
                                        <a href="javascript:void(0);" @click="$emit('selectedProduct',[product,name])" data-bs-toggle="modal" data-bs-target="#QuickViewProduct" class="p-2">Quick View</a>
                                    </div>
                                    <div class="product-image bg-thumb" :style="{ backgroundImage : `url(${product.thumb_image})`}" ></div>
                                </div>
                                <div class="card-body d-flex  flex-column py-2">
                                    <small>{{ isEmpty(product.category) ? '' : product.category.name }}</small>
                                    <a :href="route('salonpe.product.detail',product.id)" class="mb-0 text-primary product-detail" v-snip="{ lines: 2 }">{{ product.name }}</a>
                                    <div class="product-price d-flex align-items-center justify-content-start mt-auto gap-0 gap-md-1 flex-wrap flex-md-nowrap" v-html="displayPriceHtml(product)"></div>
                                </div>
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</template>
<script>
    import { showProductPrice , displayPriceHtml} from "@/utils.js";
    import isEmpty from "lodash/isEmpty"
    import { Carousel } from '@fancyapps/ui/dist/carousel/carousel.esm.js';    
    import { Autoplay } from "@fancyapps/ui/dist/carousel/carousel.autoplay.esm.js";
    
    export default {
        data:(prop) =>({ showProductPrice , isEmpty , displayPriceHtml}),
        props:["products" , "heading" , "id" ,'timeout' , 'name'],
        emits: ['selectedProduct'],        
        mounted () {
            new Carousel(document.getElementById(this.id), {
               Navigation:false,
               infinite: true,
               center: false,
               slidesPerPage: '1',
               transition: false,
               Dots: true,
               Autoplay: {
                    timeout: this.timeout,
                    showProgress:false
               }
           },{ Autoplay });
        }
    }
</script>

<style>
    .border-f-carousel-light {        
        --bs-border-opacity: 1;
        border-left-color: rgba(var(--bs-light-rgb), var(--bs-border-opacity))!important;
        border-right-color: rgba(var(--bs-light-rgb), var(--bs-border-opacity))!important;
        border-top-color: rgba(var(--bs-light-rgb), var(--bs-border-opacity))!important;
    }

    @media (max-width: 576px) { .f-carousel__slide {  --f-carousel-slide-width: calc(100% / 2); } }

    @media (min-width: 768px) { .f-carousel__slide {  --f-carousel-slide-width: calc(100% / 3); } }

    @media (min-width: 992px) { .f-carousel__slide {  --f-carousel-slide-width: calc(100% / 6); } }

    .f-carousel__slide {    
    --f-carousel-spacing: 0;
    --f-carousel-slide-padding: 0 1rem;

    --f-button-prev-pos: 5rem;
    --f-button-next-pos: 5rem;

    --f-button-bg: #fff;
    --f-button-color: #333;

    --f-button-width: 48px;
    --f-button-height: 48px;
    --f-button-border-radius: 50%;

    --f-button-svg-width: 27px;
    --f-button-svg-height: 27px;
    --f-button-svg-stroke-width: 1.5;

    --f-button-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
        rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.1) 0px 4px 6px -1px,
        rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
    }

    .product-detail:hover{
        opacity: .6;
    }



</style>