<template>
    <WebLayout>        
        <!--start shop area-->
        <section class="py-4">
            <div class="container-fluid">
                <div class="btn btn-dark btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y z-index-1"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i class='bx bx-filter-alt me-1'></i>Filters</span></div>
                <div class="row">
                    <div class="col-12 col-xl-2 filter-column">
                        <nav class="navbar navbar-expand-xl flex-wrap p-0">
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarFilter" aria-labelledby="offcanvasNavbarFilterLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title mb-0 fw-bold" id="offcanvasNavbarFilterLabel">Filters</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="filter-sidebar">
                                <div class="card rounded-0 shadow-none border">
                                    <div class="card-header d-none d-xl-block bg-transparent">
                                        <h5 class="mb-0 fw-bold">Filters</h5>
                                    </div>
                                    <div class="card-body p-0">
                                    <h6 class="p-1 fw-bold bg-light">Categories</h6>
                                        <div class="categories">
                                        <div class="categories-wrapper height-1 p-1">
                                            <template v-for="category in categoriesWithSub" :key="category.id">
                                                <label class="text-muted fw-bold mb-1" v-if="category.sub_categories.length != 0"><i class='bx bx-category'></i> {{  category.name }} ({{ category.sub_categories.length}})</label>
                                                <div class="form-check" v-for="sub in category.sub_categories" :key="sub.id">
                                                    <input class="form-check-input" type="checkbox" v-model="form.categories" :id="`cate-sub-${sub.id}`" :value="sub.id">
                                                    <label class="form-check-label cursor-pointer" :for="`cate-sub-${sub.id}`">
                                                        <span>{{  sub.name }}</span><span class="product-number">({{ sub.products_count}})</span>
                                                    </label>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="brands">
                                        <h6 class="p-1 fw-bold bg-light">Brands</h6>
                                        <div class="brands-wrapper height-1 p-1">
                                            <div class="form-check" v-for="brand in brands" :key="brand.id">
                                                <input class="form-check-input" type="checkbox" :value="brand.id" v-model="form.brands" :id="`brand-${brand.id}`" >
                                                <label class="form-check-label cursor-pointer" :for="`brand-${brand.id}`">
                                                    <span>{{ brand.name }}</span><span class="product-number">(1548)</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>                                    
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-12 col-xl-10">
                        <div class="product-wrapper">
                            <div class="toolbox d-flex align-items-center mb-3 gap-2 border-bottom p-3">
                                <div class="d-flex flex-wrap flex-grow-1 gap-1">
                                    <div class="d-flex align-items-center flex-nowrap">
                                        <p class="mb-0 font-13 text-nowrap">Sort By:</p>
                                        <select class="form-select ms-3 rounded-0">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="product-grid" style="background: #fecd07">
                                <div class="row row-cols-2 row-cols-md-5 row-cols-lg-5 row-cols-xl-5 row-cols-xxl-5 filter-grid-design" v-if="productsInstance != null">
                                    <div class="col" v-for="product in productsInstance.data" :key="product.id">
                                        <div class="card"  style="height:22em  !important">
                                            <div class="position-relative overflow-hidden">
                                                <div class="quick-view position-absolute start-0 bottom-0 end-0 p-0">
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#QuickViewProduct" @click="quickPreview(product)" class="p-2">Quick View</a>
                                                </div>
                                                <div class="product-image bg-thumb" :style="{ backgroundImage : `url(${product.thumb_image})`}" ></div>
                                            </div>
                                            <div class="card-body d-flex  flex-column py-2">
                                                <div class="d-flex justify-content-between">
                                                    <small>{{ isEmpty(product.category) ? '' : product.category.name }}</small> 
                                                    <small class="text-success">{{ isEmpty(product.brand) ? '' : product.brand.name }}</small>                                                    
                                                </div>
                                                <a :href="route('salonpe.product.detail',product.id)" class="mb-0 text-primary product-detail" v-snip="{ lines: 2 }">{{ product.name }}</a>
                                                <div class="product-price d-flex align-items-center justify-content-start mt-auto gap-0 gap-md-1 flex-wrap flex-md-nowrap" v-html="displayPriceHtml(product)"></div>
                                            </div>        
                                        </div>
                                    </div>                                      
                                </div><!--end row-->    
                            </div>
                            <hr>
                            <nav class="d-flex justify-content-center" aria-label="Page navigation">                                                               
                                <ul class="pagination">
                                    <template v-for="(link, key) in productsInstance.links">						
                                        <li class="page-item d-none d-sm-block" v-if="link.url === null">
                                            <inertia-link href="javascript:void(0)" class="page-link disabled" v-html="link.label"></inertia-link>
                                        </li>						
                                        <li class="page-item d-none d-sm-block" :class="{ 'active': link.active }"  v-else >
                                            <inertia-link :href="link.url" class="page-link" v-html="link.label" style="box-shadow : none !important"></inertia-link>
                                        </li>
                                    </template>                                    
                                </ul>                                
                            </nav>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end shop area-->

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

<style>
    .filter-grid-design{
        --bs-gutter-x: 0.1rem;
        --bs-gutter-y: 0.1rem;
    }
</style>

<script>
    import WebLayout from '@/Layouts/WebLayout.vue';
    // 
    import { showProductPrice , currency , discountedPricePercentage , displayPrice, displayPriceHtml } from "@/utils";
    import isEmpty from 'lodash/isEmpty';
    import head from 'lodash/head'
    import debounce from 'lodash/debounce'
    import pickBy from 'lodash/pickBy'
    import find from 'lodash/find'
    // 
    export default {
        props : ['products','auth',"categoriesWithSub",'filteredCategories' ,'brands','filteredBrands'],
        data : (prop) => ({ 
                            isEmpty , head ,
                            currency, discountedPricePercentage,
                            showProductPrice, displayPrice, displayPriceHtml,
                            productsInstance : prop.products,
                            quickPreviewProduct : null,
                            quickPreviewAttribute : null,
                            quickPreviewMedia : [],
                            quickPreviewQuantity:1,
                            quickPreviewImage : null,
                            quickPreviewModule : null,
                            form: {
                                    categories:prop.filteredCategories,
                                    brands : prop.filteredBrands
                            }
        }),
        components : { WebLayout },
        computed:{
                    getQuickPreviewTotal(){
                        let attribute = this.quickPreviewAttribute
                        let quantity = this.quickPreviewQuantity
                        return (attribute.discounted_mrp == 0) ? (attribute.mrp * quantity) : (attribute.discounted_mrp * quantity);
                    }            
        },
        methods:{
                    quickPreview(product){
                        //
                        this.quickPreviewProduct = product
                        console.log(product)
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
                                // 
                                let products = this.productsInstance.data
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
            form: {
                deep: true,
                handler: debounce(function () {				
                    this.$inertia.get   (this.route('salonpe.product.filter'), pickBy(this.form))
                }, 800),
            },
        },
        mounted () {  
            console.log(this.categoriesWithSub)          
            const quickPreviewModal = document.getElementById('QuickViewProduct')
            quickPreviewModal.addEventListener('shown.bs.modal', e => {                 
                this.quickPreviewQuantity = 1
            })
        }
    }

</script>