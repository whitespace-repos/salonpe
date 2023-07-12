<template>
    <div class="modal fade" id="QuickViewProduct">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-xl-down">            
            <div class="modal-content rounded-0 border-0">
                <div class="modal-body" v-if="getProduct != null">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                    <div class="row g-0">
                        <div class="col-12 col-lg-5">
                            <div class="image-zoom-section">
                                <div class="product-gallery border mb-3 p-3" data-slider-id="1">
                                    <div class="item">
                                        <img :src="selectedImgQuickPreview" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                    <div class="owl-thumb-item card h-auto rounded cursor-pointer" v-for="media in getMedia" :key="media.id" @click="selectedImgQuickPreview = media.path" >
                                        <img :src="media.path" class="" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 ps-4">
                            <div class="product-info-section p-3">
                                <h6 class="mt-3 mt-lg-0 mb-0 fw-bold">{{ getProduct.name }}</h6>
                                <div class="product-rating d-flex align-items-center mt-2">
                                    <div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                    <div class="ms-1">
                                        <p class="mb-0">(24 Ratings)</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3 gap-2">
                                    <h5 class="mb-0 text-decoration-line-through text-light-3">$98.00</h5>
                                    <h4 class="mb-0">$49.00</h4>
                                </div>
                                <div class="mt-3" v-if="!isEmpty(getProduct.product_description)">
                                    <span class="mb-1 text-black">Discription </span>
                                    <div v-html="getProduct.product_description" v-snip="{ lines: 5 }"></div>
                                </div>
           
                                <div class="row row-cols-auto align-items-center mt-3">
                                    <div class="col">
                                        <label class="form-label">Quantity</label>
                                        <select class="form-select form-select-sm">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Size</label>
                                        <select class="form-select form-select-sm">
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>XS</option>
                                            <option>XL</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Colors</label>
                                        <div class="color-indigators d-flex align-items-center gap-2">
                                            <div class="color-indigator-item bg-primary"></div>
                                            <div class="color-indigator-item bg-danger"></div>
                                            <div class="color-indigator-item bg-success"></div>
                                            <div class="color-indigator-item bg-warning"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="d-flex gap-2 mt-3">
                                    <a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import isEmpty from 'lodash/isEmpty'
    import head from 'lodash/head'
    // 
    export default {
        props : ["data"],
        data:(prop)=>({ 
                            isEmpty,
                            selectedProduct : prop.data,
                            attribute : null,
                            attirbuteMedia : [],
                            selectedImgQuickPreview : null
        }),
        computed:{
                    getProduct(){
                        return this.data;
                    },
                    getAttribute(){                        
                            return head(this.data.attributes)                                                    
                    },
                    getMedia(){
                        let attribute = this.getAttribute
                        if(isEmpty(attribute.media)){
                            this.selectedImgQuickPreview = null                    
                        }else{
                            this.selectedImgQuickPreview = head(attribute.media).path                     
                        }    
                        //  
                        return attribute.media;                           
                    }
           
        }
    }
</script>