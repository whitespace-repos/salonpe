<template>
    <section class="pt-4 pb-5">
        <div class="container-fluid">
            <h3 class="my-4 text-center">{{ heading }}</h3>
            <div class="brand-grid f-carousel" :id="id">
                <div class="brands-shops border f-carousel__viewport">
                    <div class="item border-end f-carousel__slide" v-for="brand in brands" :key="brand.id">
                        <div class="p-4">
                            <a href="javascript:;">
                                <img :src="brand.image" class="img-fluid" alt="...">
                            </a>
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
    import { Autoplay } from "@fancyapps/ui/dist/carousel/carousel.autoplay.esm.js";
    
    export default {
        data:(prop) =>({ showProductPrice , isEmpty }),
        props:["heading" , "id","brands" ],
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
                    timeout: 3000,
                    showProgress:false
               }
           },{ Autoplay });
        }
    }
</script>

<style>
    @media (max-width: 576px) { .brands-shops .f-carousel__slide.item {  --f-carousel-slide-width: calc(100% / 2); } }

    @media (min-width: 768px) { .brands-shops  .f-carousel__slide.item {  --f-carousel-slide-width: calc(100% / 3); } }

    @media (min-width: 992px) { .brands-shops .f-carousel__slide.item {  --f-carousel-slide-width: calc(100% / 5); } }

    .border-f-carousel-light {        
        --bs-border-opacity: 1;
        border-left-color: rgba(var(--bs-light-rgb), var(--bs-border-opacity))!important;
        border-right-color: rgba(var(--bs-light-rgb), var(--bs-border-opacity))!important;
        border-top-color: rgba(var(--bs-light-rgb), var(--bs-border-opacity))!important;
    }

    .brands-shops .f-carousel__slide.item {  
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