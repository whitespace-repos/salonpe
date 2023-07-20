<template>
    <Head title="Wishlists" />
	<WebLayout>
        <!--start breadcrumb-->
        <section class="border-bottom border-top d-none d-md-flex bg-light"></section>
        
        <!--end breadcrumb-->
        <!--start Featured product-->
        <section class="py-4">
            <div class="container">
                <h5 class="mb-4 d-flex"><i class="bx bxs-heart me-2 fs-4"></i>Wishlists</h5>
                <div class="product-grid">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-4">
                        <div class="col" v-for="wishlist in wishlists" :key="wishlist.id">
                            <div class="card rounded-0 border h-100 ">
                                <div class="product-image bg-thumb" :style="{ padding:'5em 0', backgroundImage : `url(${wishlist.product.thumb_image})`}" ></div>
                                <div class="card-body">
                                    <div class="product-info h-100 d-flex flex-column">                                    
                                        <p class="product-catergory font-13 mb-1">{{ wishlist.product.category.name }}</p>                                        
                                        <span class="product-name  text-dark">{{ wishlist.product.name }}</span>
                                        
                                        <div class="d-flex align-items-center my-2">
                                            <div class="product-price d-flex align-items-center justify-content-start mt-auto gap-0 gap-md-1 flex-wrap flex-md-nowrap" v-html="displayAttributePriceHtml(wishlist.attribute)"></div>
                                        </div>
                                        <div class="product-action mt-auto">
                                            <div class="d-grid gap-2">
                                                <inertia-link :href="route('cart.store')" as="button" method="post" :data="{ product : wishlist.product.id , attribute : wishlist.attribute.id , quantity : 1 , wishlist_id : wishlist.id}" class="btn btn-dark btn-ecomm">	<i class='bx bxs-cart-add'></i>Add to Cart</inertia-link>	
                                                <inertia-link :href="route('toggle.wishlist')" :data="{ product: wishlist.product.id , attribute : wishlist.attribute.id }" class="btn btn-light btn-ecomm"><i class='bx bx-zoom-in'></i>Remove From List</inertia-link>
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
        <!--end Featured product-->
    </WebLayout>
</template>

<script setup>
    import WebLayout from '@/Layouts/WebLayout.vue'; 
    import { displayAttributePriceHtml } from '@/utils' 
    defineProps(["wishlists"])
</script>