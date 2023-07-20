<template>
    <section class="slider-section" style="margin-top: 198px;">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <template v-for="(banner,index) in banners" :key="banner.id">
                    <button type="button" data-bs-target="#carouselExampleCaptions" :data-bs-slide-to="index" :class="{ 'active' : (index == 0) }"  aria-current="true"></button>
                </template>
            </div>
            <div class="carousel-inner">
                <template v-for="(banner,index) in banners" :key="banner.id">
                    <div class="carousel-item" :style="{ 'background-color' : `${banner.bg_color}` }" :class="{'active' : (index== 0)  , 'bg-dark bg-opacity-10' : (banner.bg_color == null)}">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-5 d-none d-lg-flex " style="width:621px;height:415px;" >
                                <div class="my-auto">
                                    <h5 class="h5 fw-light text-white fw-bold">{{ banner.title }}</h5>
                                    <h3 class="h3 text-white fw-bold">{{ banner.heading }}</h3>
                                    <div v-html="banner.description"></div>
                                    <div class="mt-2">
                                        <a class="btn btn-dark btn-ecomm" :href="banner.link">{{ banner.link_label }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <a :href="banner.link">
                                    <div :style="{ backgroundImage : `url(${banner.image})`}" style="height:300px;" class="bg-thumb w-100"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
</template>

<script>
    export default {
        props : ["banners"]
    }
</script>