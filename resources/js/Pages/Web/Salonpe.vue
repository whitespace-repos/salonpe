<template>
    <Head title="Home" />
	<WebLayout>
        <!-- Main Crousel -->
        <MainCarousel  :banners="banners"/>

        <!--Top brands-->        
        <TopBrands  :heading="'Top Brands'" :id="'topBrands'" :brands="shopByBrands.brands"/>
        <!--end brands-->
        
        <!-- Featured Products -->
        <Carousel :products="featuredProductInstance" :heading="'FEATURED PRODUCTS'" @selected-product="quickPreview" :id="'featuredProducts'" :timeout="3000" :name="'featured'"/>
        
		<!-- Top Categories -->
        <TopCategories :categories="topCategoriesInstance" @selected-product="quickPreview" :name="'topCategories'"/>
        
        <!-- Best Selling -->
        <Carousel :products="bestSellingInstance" :heading="'Best Selling'" @selected-product="quickPreview" :id="'bestSellingProducts'" :timeout="3500"  :name="'bestSelling'"/>

        <!-- Best Offers -->
        <Carousel :products="bestOfferInstance" :heading="'Best Offers'" @selected-product="quickPreview" :id="'bestOffersProducts'" :timeout="5500"  :name="'bestOffer'"/>
       
        <!--start Advertise banners-->
        <section class="py-4 bg-dark">
            <div class="container">
                <div class="add-banner">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 g-4">
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100 border-0 shadow-none">
                                <img src="@/assets/web/images/promo/04.png" class="img-fluid" alt="...">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Sunglasses Sale</h5>
                                    <p class="card-text">See all Sunglasses and get 10% off at all Sunglasses</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">SHOP BY GLASSES</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100 border-0 shadow-none">
                                <img src="@/assets/web/images/promo/08.png" class="img-fluid" alt="...">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-80%</span>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Cosmetics Sales</h5>
                                    <p class="card-text">Buy Cosmetics products and get 30% off at all Cosmetics</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">SHOP BY COSMETICS</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100 border-0 shadow-none">
                                <img src="@/assets/web/images/promo/06.png" class="img-fluid h-100" alt="...">
                                <div class="card-img-overlay text-center top-20">
                                    <div class="border border-white border-2 py-3 bg-dark-3">
                                        <h5 class="card-title text-white">Fashion Summer Sale</h5>
                                        <p class="card-text text-uppercase fs-1 lh-1 mt-3 mb-2 text-white">Up to 80% off</p>
                                        <p class="card-text fs-5 text-white">On Top Fashion Brands</p>	<a href="javascript:;" class="btn btn-white btn-ecomm">SHOP BY FASHION</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100 border-0 shadow-none">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-50%</span>
                                </div>
                                <img src="@/assets/web/images/promo/07.png" class="img-fluid" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-2 fw-bold text-uppercase">Super Sale</h5>
                                    <p class="card-text text-uppercase fs-5 lh-1 mb-2">Up to 50% off</p>
                                    <p class="card-text">On All Electronic</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">HURRY UP!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        

        <!-- Browse categories -->
        <CategoryCarousel :categories="browseCategories.categories" :id="'browseCategory'"/>

        
        <!--start support info-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
                    <div class="col">
                        <div class="text-center border p-3 bg-white">
                            <div class="font-50 text-dark"><i class='bx bx-cart-add' ></i>
                            </div>
                            <h5 class="fs-5 text-uppercase mb-0 fw-bold">Free delivery</h5>
                            <p class="text-capitalize">Free delivery over $199</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center border p-3 bg-white">
                            <div class="font-50 text-dark"><i class='bx bx-credit-card'></i>
                            </div>
                            <h5 class="fs-5 text-uppercase mb-0 fw-bold">Secure payment</h5>
                            <p class="text-capitalize">We possess SSL / Secure сertificate</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center border p-3 bg-white">
                            <div class="font-50 text-dark">	<i class='bx bx-rupee'></i>
                            </div>
                            <h5 class="fs-5 text-uppercase mb-0 fw-bold">Free returns</h5>
                            <p class="text-capitalize">We return money within 30 days</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center border p-3 bg-white">
                            <div class="font-50 text-dark">	<i class='bx bx-support'></i>
                            </div>
                            <h5 class="fs-5 text-uppercase mb-0 fw-bold">Customer Support</h5>
                            <p class="text-capitalize">Friendly 24/7 customer support</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        

        

        <div class="modal fade" id="QuickViewProduct"  data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-xl-down">            
                <div class="modal-content rounded-0 border-0">
                    <div class="modal-body" v-if="quickPreviewProduct != null">
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
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
                                    <h6 class="mt-3 mt-lg-0 mb-0 fw-bold">{{ quickPreviewProduct.name }}</h6>
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
                                            <template v-for="(attribute,index) in quickPreviewProduct.attributes" :key="attribute.id">
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
                                                <template v-for="(attribute,index) in quickPreviewProduct.attributes" :key="attribute.id">
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
                                        <a href="javascript:;" class="btn btn-light border-0 btn-ecomm bg-yellow px-4 text-black" @click="addToCart">	<i class="bx bxs-cart-add"></i>Cart  <sup class="text-semibold  ms-2">{{  displayPrice(getQuickPreviewTotal) }}</sup></a>
                                        <a href="javascript:;" class="btn btn-light btn-ecomm wishlist-link px-4" @click="addToWishlist">
                                            <span class="spinner-border spinner-border-sm d-none"></span>
                                            <i class="bx " :class="{ 'bxs-heart' : quickPreviewAttribute.wishlist , 'bx-heart' : !quickPreviewAttribute.wishlist}"></i>Wishlist
                                        </a>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                        <div class="row g-0 border-top mt-4">
                            <div class="col-12 col-lg-3 bg-light">
                                <div class="nav flex-column nav-pills">
                                    <button class="nav-link rounded-0 active" data-bs-toggle="pill" data-bs-target="#detail" type="button"> Product Description </button>
                                    <button class="nav-link rounded-0" data-bs-toggle="pill" data-bs-target="#howToUse" type="button"> How To Use </button>
                                    <button class="nav-link  rounded-0" data-bs-toggle="pill" data-bs-target="#ingredients" type="button"> Ingredients </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-9">
                                <div class="tab-content p-3" :style="{ maxHeight: '14em' , overflow : 'auto' , textAlign : 'justify'}">
                                    <div class="tab-pane fade show active" id="detail">
                                        <div v-html="quickPreviewProduct.product_description"></div>
                                    </div>
                                    <div class="tab-pane fade " id="howToUse">
                                        <div v-html="quickPreviewProduct.how_to_use"></div>
                                    </div>
                                    <div class="tab-pane fade" id="ingredients">
                                        <div v-html="quickPreviewProduct.ingredients"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </WebLayout>	
</template>

<script>
    import WebLayout from '@/Layouts/WebLayout.vue';    
    import Carousel from './components/Carousel.vue';
    import CategoryCarousel from './components/CategoryCarousel.vue';
    import MainCarousel from './components/MainCarousel.vue';
    import TopCategories from './components/TopCategories.vue';
    import QuickPreview from './components/QuickPreview.vue';
    import TopBrands from './components/TopBrands.vue';
    // 
    import { Head } from '@inertiajs/vue3';
    import { showProductPrice , slickCarouselConfig , currency , discountedPricePercentage , displayPrice} from "@/utils";
    import isEmpty from 'lodash/isEmpty';
    import head from 'lodash/head'
    import find from 'lodash/find'
    import { Modal } from 'bootstrap';
    import "@fancyapps/ui/dist/carousel/carousel.autoplay.css";
    import '@fancyapps/ui/dist/carousel/carousel.css';
    // 
    export default {    
        props: ["FeaturedProducts","TopCategories","BestOffer","BestSelling","banners","shopByBrands","browseCategories","wishlistCount" , "auth"],
        data: (prop) => ({ 
                            isEmpty , head ,
                            currency, discountedPricePercentage,
                            showProductPrice, displayPrice, 
                            quickPreviewProduct : null,
                            quickPreviewAttribute : null,
                            quickPreviewMedia : [],
                            quickPreviewQuantity:1,
                            quickPreviewImage : null,
                            quickPreviewModule : null,
                            categoryProducts : [],
                            featuredProductInstance : prop.FeaturedProducts.products,
                            bestOfferInstance : prop.BestOffer.products,
                            bestSellingInstance : prop.BestSelling.products,
                            topCategoriesInstance : prop.TopCategories.categories                            
                        }),
        computed:{
                    getQuickPreviewTotal(){
                        let attribute = this.quickPreviewAttribute
                        let quantity = this.quickPreviewQuantity
                        return (attribute.discounted_mrp == 0) ? (attribute.mrp * quantity) : (attribute.discounted_mrp * quantity);
                    }            
        },
        components : { WebLayout , Head , Carousel , CategoryCarousel, MainCarousel, TopCategories , QuickPreview , TopBrands},
        methods:{
                    quickPreview(obj){
                        let product = head(obj)
                        this.quickPreviewModule = obj[1]
                        if(this.quickPreviewModule == 'topCategories')
                            this.categoryProducts = obj[2].products
                        //
                        this.quickPreviewProduct = product
                        if(isEmpty(product.attributes)){
                            this.quickPreviewMedia = []
                        }else{                            
                            this.quickPreviewAttribute = head(product.attributes)
                            this.quickPreviewMedia =  this.quickPreviewAttribute.media
                        }
                    },
                    addToWishlist(e){ 
                        if(isEmpty(this.auth.user)){
                            this.$toast.error("Login is required for Wishlist.") 
                            return 
                        }

                        let element = (e.target.nodeName == 'A') ? e.target : e.target.parentElement;
                        element.querySelector("span").classList.remove("d-none")
                        this.axios
                            .get(this.route('add.to.wishlist'),  { params: { product : this.quickPreviewProduct.id , attribute : this.quickPreviewAttribute.id } })
                            .then((res) =>{

                                
                                
                                let menuIconEle = document.querySelector(".wishlist span");
                                element.querySelector("span").classList.add("d-none")
                                let products = []
                                switch (this.quickPreviewModule) {
                                    case 'featured':
                                        products = this.featuredProductInstance
                                        break;                                
                                    case 'bestSelling':
                                        products = this.bestSellingInstance
                                        break;  
                                    case 'bestOffer':
                                        products = this.bestOfferInstance
                                        break; 
                                    case 'topCategories':
                                        products = this.categoryProducts
                                        break;                                
                                    default:
                                        break;
                                }
                                // 
                                let product = find(products,item =>  { return item.id == this.quickPreviewProduct.id })
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
                   

                        this.axios
                            .post(this.route('cart.store'),  { product : this.quickPreviewProduct.id , attribute : this.quickPreviewAttribute.id , quantity : this.quickPreviewQuantity })
                            .then((res) =>{ 
                                cartCountIconEle.innerHTML = parseInt(cartCountIconEle.innerText) + 1;  
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
        mounted () {            
            const quickPreviewModal = document.getElementById('QuickViewProduct')
            quickPreviewModal.addEventListener('shown.bs.modal', e => {                 
                this.quickPreviewQuantity = 1
            })
        }
    }
</script>

