<template>
    <WebLayout>        
        <!--start product detail-->
        <section class="py-4" v-if="productInstance != null && quickPreviewAttribute != null">
            <div class="container">
                <div class="product-detail-card">
                    <div class="product-detail-body">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5">
                                <div class="image-zoom-section">
                                    <div class="product-gallery border mb-3 p-5 bg-thumb border-0" :style="{ height : '20em',backgroundImage : `url(${quickPreviewImage})`}" data-slider-id="1"></div>
                                    <!--  -->
                                    <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                        <div class="owl-thumb-item ms-0 me-1  card rounded cursor-pointer bg-thumb" v-for="media in quickPreviewMedia" :key="media.id" @click="quickPreviewImage = media.path"  :style="{ backgroundImage : `url(${media.path})` , height : '40px' , width : '40px'}"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 ps-md-4">
                                <div class="product-info-section pb-3 px-3 d-flex flex-column h-100">
                                    <h6 class="mt-3 mt-lg-0 mb-0 fw-bold">{{ productInstance.name }}</h6>
                                    <div class="product-rating d-flex align-items-center mt-2 d-none">
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

                                    <hr />

                                    <div class="d-flex align-items-center mt-3 gap-2">
                                        <template v-if="quickPreviewAttribute.discounted_mrp > 0">
                                            <div class="h4 fw-bold">{{ currency(quickPreviewAttribute.discounted_mrp) }}</div>
                                            <div class="h5 fw-light text-muted text-decoration-line-through"> {{ currency(quickPreviewAttribute.mrp)  }}</div>
                                            <div class="h6 fw-bold text-danger">({{ discountedPricePercentage(quickPreviewAttribute.discounted_mrp,quickPreviewAttribute.mrp) }}% off)</div>
                                        </template>
                                        <template v-else>
                                            <div class="h4 fw-bold">{{ currency(quickPreviewAttribute.mrp) }}</div>
                                        </template>  
                                    </div>
                                              
                                    <div class="row row-cols-auto align-items-center mt-3">
                                        <div class="col-12 mb-2" :style="{ maxHeight: '8.56em' , overflow : 'auto'}">
                                            <template v-for="(attribute,index) in productInstance.attributes" :key="attribute.id">
                                                <template v-if="attribute.attribute_type.includes('Color')">
                                                    <label class="form-label d-block" v-if="index == 0">Colors</label>                                                    
                                                    <div class="color-indigator-item d-inline-flex me-1" :data-id="attribute.id" :data-data="attribute.attribute_data.color" :style="{ background : attribute.attribute_data.color }" @click="quickPreviewMedia = attribute.media; quickPreviewAttribute = attribute;"></div>                                                    
                                                </template>
                                            </template>
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Quantity</label>
                                            <select class="form-select form-select-sm" v-model="quickPreviewQuantity">
                                                <option v-for="quantity in 10" :key="quantity" :value="quantity">{{ quantity }}</option>
                                            </select>
                                        </div>
                                        <div class="col">                                            
                                            <template v-if="quickPreviewAttribute.attribute_type.includes('Size') && quickPreviewAttribute.attribute_type.includes('Color')">                                                
                                                <label class="form-label">Size</label>
                                                <div class="p-1 px-2 cursor-pointer">{{ quickPreviewAttribute.attribute_data.size}}</div>
                                            </template>
                                            <div class="size-chart" style="max-height: 10em; overflow: auto;" v-else>                                                
                                                <template v-for="(attribute,index) in productInstance.attributes" :key="attribute.id">
                                                    <template v-if="attribute.attribute_type.includes('Size') && !attribute.attribute_type.includes('Color')">                                                        
                                                        <label class="form-label d-block" v-if="index == 0">Size</label>
                                                        <div class="d-inline-flex me-1 mb-1" :data-id="attribute.id" :data-data="attribute.attribute_data.size"  @click="quickPreviewMedia = attribute.media; quickPreviewAttribute = attribute;" >
                                                            <div class="btn btn-sm rounded border " :class="{ 'btn-warning' : (attribute.id == quickPreviewAttribute.id) }">{{ attribute.attribute_data.size}}</div>
                                                        </div>
                                                    </template>                           
                                                </template>                     
                                            </div>
                                        </div>                                        
                                    </div>
                                    <!--end row-->
                                    <div class="d-flex gap-2 pt-2 mt-auto">
                                        <a href="javascript:;" class="btn btn-light border-0 btn-ecomm bg-yellow px-4 text-black" @click="addToCart" :class="{'disabled' : cartProcessing}">	<i class="bx bxs-cart-add"></i>Cart  <sup class="text-semibold  ms-2">{{  displayPrice(getQuickPreviewTotal) }}</sup></a>
                                        <a href="javascript:;" class="btn btn-light btn-ecomm wishlist-link px-4" @click="addToWishlist">
                                            <span class="spinner-border spinner-border-sm d-none"></span>
                                            <i class="bx " :class="{ 'bxs-heart' : quickPreviewAttribute.wishlist , 'bx-heart' : !quickPreviewAttribute.wishlist}"></i>Wishlist
                                        </a>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </section>
        <!--end product detail-->
        <!--start product more info-->
        <section class="py-5 bg-light text-black">
            <div class="container">
                <div class="product-more-info">
                    <ul class="nav nav-tabs mb-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#discription">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title text-uppercase fw-500">Description</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ingredients">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title text-uppercase fw-500">Ingredients</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#howToUse">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title text-uppercase fw-500">How To Use</div>
                                </div>
                            </a>
                        </li>                        
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade active show" id="discription">
                            {{ product.product_description }}
                        </div>
                        <div class="tab-pane fade" id="ingredients">
                            {{  product.ingredients }}
                        </div>
                        <div class="tab-pane fade" id="howToUse">
                            {{ product.how_to_use }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end product more info-->
    </WebLayout>
</template>

<script>
    import WebLayout from '@/Layouts/WebLayout.vue';
    // 
    import { showProductPrice , currency , discountedPricePercentage , displayPrice} from "@/utils";
    import isEmpty from 'lodash/isEmpty';
    import head from 'lodash/head'
    // 
    export default {
        props : ['product','auth'],
        data : (prop) => ({ 
                            isEmpty , head ,
                            currency, discountedPricePercentage,
                            showProductPrice, displayPrice, 
                            quickPreviewAttribute : null,
                            quickPreviewMedia : [],
                            quickPreviewQuantity:1,
                            quickPreviewImage : null,
                            quickPreviewModule : null,
                            cartProcessing : false,
                            productInstance : prop.product
        }),
        computed:{
                    getQuickPreviewTotal(){
                        let attribute = this.quickPreviewAttribute
                        let quantity = this.quickPreviewQuantity
                        return (attribute.discounted_mrp == 0) ? (attribute.mrp * quantity) : (attribute.discounted_mrp * quantity);
                    }            
        },
        components : { WebLayout },
        methods:{
                    addToWishlist(e){ 
                        if(isEmpty(this.auth.user)){
                            this.$toast.error("Login is required for Wishlist.") 
                            return 
                        }

                        let element = (e.target.nodeName == 'A') ? e.target : e.target.parentElement;
                        element.querySelector("span").classList.remove("d-none")
                        this.axios
                            .get(this.route('add.to.wishlist'),  { params: { product : this.productInstance.id , attribute : this.quickPreviewAttribute.id } })
                            .then((res) =>{                                
                                let menuIconEle = document.querySelector(".wishlist span");
                                element.querySelector("span").classList.add("d-none")                               
                                // 
                                let product = this.productInstance
                                let attribute = find(product.attributes , attr => { return attr.id == this.quickPreviewAttribute.id })

                                if(res.data){                                   
                                    menuIconEle.innerHTML = parseInt(menuIconEle.innerText) - 1;                               
                                    //element.querySelector("i").classList.remove("bxs-heart")                                  
                                    attribute.wishlist = false
                                    this.$toast.success("Product removed from wishlist.") 
                                }else{
                                    menuIconEle.innerHTML = parseInt(menuIconEle.innerText) + 1;                               
                                    //element.querySelector("i").classList.add("bxs-heart")                                  
                                    attribute.wishlist = true
                                    this.$toast.success("Product added to wishlist.") 
                                }                                
                            });       
                    },
                    addToCart(e){ 
                        if(isEmpty(this.auth.user)){
                            this.$toast.error("Login is required for Cart.") 
                            return 
                        }
                        let cartCountIconEle = document.querySelector(".top-cart-icons .cart-count span");
                        this.cartProcessing = true

                        this.axios
                            .post(this.route('cart.store'),  { product : this.productInstance.id , attribute : this.quickPreviewAttribute.id , quantity : this.quickPreviewQuantity })
                            .then((res) =>{ 
                                cartCountIconEle.innerHTML = parseInt(cartCountIconEle.innerText) + 1;  
                                this.cartProcessing = false
                                this.$toast.success("Product added to cart.")                              
                            });       
                    }
        },
        watch: {
            quickPreviewMedia: {
                deep: true,
                handler: function () {	  
                    this.quickPreviewImage = (this.quickPreviewMedia.length > 0) ? head(this.quickPreviewMedia).path : null 
                },
            },
        },
        mounted(){
            let product = this.productInstance
            if(isEmpty(product.attributes)){
                console.log("NO Attribute")
                this.quickPreviewMedia = []
            }else{          
                console.log("Has Attribute")                  
                this.quickPreviewAttribute = head(product.attributes)
                this.quickPreviewMedia =  this.quickPreviewAttribute.media
            }
        }
    }

</script>