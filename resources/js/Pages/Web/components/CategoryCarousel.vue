<template>
        <section class="pt-4 pb-5">
            <div class="container-fluid">
                <div class="separator pb-4">
                    <div class="line"></div>
                    <h5 class=" mb-0 fw-bold separator-title">Browse Catergory</h5>
                    <div class="line"></div>
                </div>

                <div class="product-grid f-carousel" id="browseCategory">
                    <div class="f-carousel__viewport px-12">
                        <div class="f-carousel__slide shadow-sm  border  p-0" v-for="category in categories" :key="category.id">
                            <div class="card rounded-0" style="height:20em  !important">
                                <div class="position-relative overflow-hidden">
                                    <div class="bg-thumb-cover" :style="{ backgroundImage : `url(${category.image})` , padding : '15em'}" ></div>
                                </div>
                                <div class="card-body d-flex  flex-column">                                    
                                    <h6 class="mb-0 text-uppercase fw-bold">{{ category.name }}</h6>
                                </div>
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>

<script>
    import { showProductPrice } from "@/utils.js";
    import isEmpty from "lodash/isEmpty"
    import { Carousel } from '@fancyapps/ui/dist/carousel/carousel.esm.js';    
    
    export default {
        data:(prop) =>({ showProductPrice , isEmpty }),
        props:["heading" , "id" , "categories"],
        emits: ['selectedProduct'],        
        mounted () {
            new Carousel(document.getElementById('browseCategory'), {
               Navigation:false,
               Dots: true
           });
        }
    }
</script>

<style>
    @media (max-width: 576px) { .browse-category  .f-carousel__slide.item {  --f-carousel-slide-width: calc(100% / 2); } }

    @media (min-width: 768px) { .browse-category  .f-carousel__slide.item {  --f-carousel-slide-width: calc(100% / 3); } }

    @media (min-width: 992px) { .browse-category  .f-carousel__slide.item {  --f-carousel-slide-width: calc(100% / 5); } }

    .border-f-carousel-light {        
        --bs-border-opacity: 1;
        border-left-color: rgba(var(--bs-light-rgb), var(--bs-border-opacity))!important;
        border-right-color: rgba(var(--bs-light-rgb), var(--bs-border-opacity))!important;
        border-top-color: rgba(var(--bs-light-rgb), var(--bs-border-opacity))!important;
    }

    .browse-category .f-carousel__slide.item {    
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

</style>