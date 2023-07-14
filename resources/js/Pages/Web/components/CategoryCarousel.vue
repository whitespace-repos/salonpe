<template>
        <section class="pt-4 pb-5">
            <div class="container-fluid">
                <div class="separator pb-4">
                    <div class="line"></div>
                    <h5 class=" mb-0 fw-bold separator-title">Browse Catergory</h5>
                    <div class="line"></div>
                </div>

                <div class="product-grid f-carousel" :id="id">
                    <div class="f-carousel__viewport">
                        <div class="f-carousel__slide" v-for="category in categories" :key="category.id">
                            <div class="card card-body px-0 px-md-3 border shadow-none">
                                <div class="bg-thumb p-5" :style="{ backgroundImage : `url(${category.image})`}"></div>
                                <div class="list-group list-group-flush border-0">
                                    <a href="javascript:;" class="list-group-item bg-transparent text-center">
                                        <div class="mb-0 text-uppercase text-center text-truncate">{{ category.name }}</div>
                                    </a>	
                                    <a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center px-1 px-md-0">
                                        Blazers & Suits
                                    </a>
                                    <a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center px-1 px-md-0 ">
                                        Dresses
                                    </a>
                                    <a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center px-1 px-md-0">
                                        Sportswear
                                    </a>
                                    <a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center px-1 px-md-0">
                                        Hoodie & Sweatshirts
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>

<style>
    .f-carousel__slide{
        --f-carousel-slide-padding : 0 2px !important;
    }
</style>
<script>
    import { showProductPrice } from "@/utils.js";
    import isEmpty from "lodash/isEmpty"
    import { Carousel } from '@fancyapps/ui/dist/carousel/carousel.esm.js';   
    import { Autoplay } from "@fancyapps/ui/dist/carousel/carousel.autoplay.esm.js";
    export default {
        data:(prop) =>({ showProductPrice , isEmpty }),
        props:["heading" , "id" , "categories"],
        mounted () {
            new Carousel(document.getElementById(this.id), {
               Navigation:false,
               infinite: true,
               center: true,
               slidesPerPage: 'auto',
               transition: false,
               Dots: true,
               Autoplay: {
                    timeout: 5000,
                    showProgress:false
               }
           },{ Autoplay });
        }
    }
</script>
