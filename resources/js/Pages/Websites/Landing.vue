<template>
    <AuthenticatedLayout>
        <div class="card mb-3">
            <div class="card-header fw-bold">Website Landing Page Configuration</div>
            <div class="card-body">
                <form class="container" @submit.prevent="storeFeaturedOfferSellingProduct">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label class="form-label">Choose Brands</label>
                                <multiselect placeholder="Brand ..." v-model="filter.selectedBrand" label="name" track-by="name" :options="brands" ></multiselect>
                            </div>                                
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="form-label">Type</label>
                                <multiselect placeholder="Brand ..." v-model="form.data.type" :options="['FeaturedProducts','BestOffer','BestSelling']" ></multiselect>
                            </div>
                        </div>


                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label class="form-label">Choose Product </label>
                                <multiselect placeholder="Products ..." v-model="selectedProducts" label="name" track-by="name" :options="products" :multiple="true" :custom-label="customLabel" :show-labels="false"></multiselect>
                            </div>                                
                        </div>

                        

                        <div class="col-12 pt-4     ">
                            <div class="form-group">
                                <button type="submit" class="px-5 btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr />
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="card shadow-none">
                                <div class="card-header fw-bold">Featured Product</div>
                                <div class="card-body p-1" style="max-height: 26em;overflow: auto;">
                                    <div class="d-flex align-items-center mb-2" v-for="product in FeaturedProducts.products" :key="product.id">
                                        <div class="bg-thumb p-4 me-2" :style="{ backgroundImage: `url(${product.thumb_image})` }"> </div>
                                        <div class="text-truncate">
                                            <inertia-link :href="route('product.edit',product.id)" class="text-body fw-semibold letter-icon-title text-truncate">{{ product.name }}</inertia-link>
                                            <div class="text-muted fs-sm ">
                                                <template v-for="productType in product.product_type" :key="productType.id">
                                                        {{ productType }}  &nbsp;
                                                </template>
                                                <inertia-link :href="route('removeFeaturedOfferSellingProduct',[product.id,'FeaturedProducts'])" class="text-danger d-inline-flex fw-bold"><i class="ph-x fs-xs"></i></inertia-link>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>                                                       
                        </div>


                        <!--  -->

                        <div class="col-4">
                            <div class="card shadow-none">
                                <div class="card-header fw-bold">Best Offer Product</div>
                                <div class="card-body p-1" style="max-height: 26em;overflow: auto;">
                                    <div class="d-flex align-items-center mb-2" v-for="product in BestOffer.products" :key="product.id">
                                        <div class="bg-thumb p-4 me-2" :style="{ backgroundImage: `url(${product.thumb_image})` }"> </div>
                                        <div class="text-truncate">
                                            <inertia-link :href="route('product.edit',product.id)" class="text-body fw-semibold letter-icon-title text-truncate">{{ product.name }}</inertia-link>
                                            <div class="text-muted fs-sm ">
                                                <template v-for="productType in product.product_type" :key="productType.id">
                                                        {{ productType }}   &nbsp;
                                                </template>
                                                <inertia-link :href="route('removeFeaturedOfferSellingProduct',[product.id,'BestOffer'])" class="text-danger d-inline-flex fw-bold"><i class="ph-x fs-xs"></i></inertia-link>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>                                                       
                        </div>

                        <!--  -->

                        <div class="col-4">
                            <div class="card shadow-none">
                                <div class="card-header fw-bold">Best Selling Product</div>
                                <div class="card-body p-1" style="max-height: 26em;overflow: auto;">
                                    <div class="d-flex align-items-center mb-2" v-for="product in BestSelling.products" :key="product.id">
                                        <div class="bg-thumb p-4 me-2" :style="{ backgroundImage: `url(${product.thumb_image})` }"> </div>
                                        <div class="text-truncate">
                                            <inertia-link :href="route('product.edit',product.id)" class="text-body fw-semibold letter-icon-title text-truncate">{{ product.name }}</inertia-link>
                                            <div class="text-muted fs-sm ">
                                                <template v-for="productType in product.product_type" :key="productType.id">
                                                        {{ productType }}   &nbsp;
                                                </template>
                                                <inertia-link :href="route('removeFeaturedOfferSellingProduct',[product.id,'BestSelling'])" class="text-danger d-inline-flex fw-bold"><i class="ph-x fs-xs"></i></inertia-link>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>                                                       
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-header fw-bold">Top Categories</div>
            <div class="card-body">
                <form class="container" @submit.prevent="storeTopCategory">
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <label class="form-label">Choose Category </label>
                                <multiselect placeholder="Categories ..." v-model="selectedCategories" label="name" track-by="name" :options="categories" :multiple="true" :searchable="true"></multiselect>
                            </div>                                
                        </div>

                        <div class="col-2 py-4">
                            <div class="form-group">
                                <button type="submit" class="px-5 btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <!-- shopByBrands -->

            <div class="card-header fw-bold">Shop By Brand</div>
            <div class="card-body">
                <form class="container" @submit.prevent="storeShopByBrands">
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <label class="form-label">Choose Brands </label>
                                <multiselect placeholder="Brands ..." v-model="selectedBrands" label="name" track-by="name" :options="brandsList" :multiple="true" :searchable="true"></multiselect>
                            </div>                                
                        </div>

                        <div class="col-2 py-4">
                            <div class="form-group">
                                <button type="submit" class="px-5 btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <!-- shopByBrands -->

            <div class="card-header fw-bold">Browse Categories</div>
            <div class="card-body">
                <form class="container" @submit.prevent="storeShopByBrands">
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <label class="form-label">Choose Categories </label>
                                <multiselect placeholder="Categories ..." v-model="selectedBrowseCategories" label="name" track-by="name" :options="categories" :multiple="true" :searchable="true"></multiselect>
                            </div>                                
                        </div>

                        <div class="col-2 py-4">
                            <div class="form-group">
                                <button type="submit" class="px-5 btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <!-- Categories Menu -->
            <div class="card-header fw-bold">Categories Menu</div>
            <div class="card-body">
                <form class="container" @submit.prevent="saveCategoriesMenu">
                    <div class="row mb-2" v-for="(menu,index) in form.categoriesMenu.menus">
                        <div class="col-2">
                            <div class="form-group">
                                <label class="form-label" v-if="index == 0">Menu Label</label>
                                <input type="text" class="form-control" placeholder="Menu Label ..." v-model="menu.label"/>
                            </div>                                
                        </div>

                        <div class="col-9">
                            <div class="form-group">
                                <label class="form-label" v-if="index == 0">Choose Categories </label>
                                <multiselect placeholder="Choose Categories ..." v-model="menu.categories" label="name" track-by="name" :options="categoriesShortList" :multiple="true" :searchable="true"></multiselect>
                            </div>                                
                        </div>

                        <div class="col-1  d-flex align-items-end">
                            <span class="btn btn-primary py-2 px-3" @click="addNewLabelToCategoriesMenu" v-if="index == 0"><i class="ph ph-plus"></i></span>
                            <span class="btn btn-danger py-2 px-3" @click="removeLabelToCategoriesMenu(index)" v-else><i class="ph ph-minus"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto py-4">
                            <div class="form-group">
                                <button type="submit" class="px-5 btn btn-primary">Save Categories Menu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </AuthenticatedLayout>    
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Multiselect from 'vue-multiselect'
import isEmpty from 'lodash/isEmpty'
import debounce from 'lodash/debounce'
import { map } from 'lodash'

export default {
    props:['products','FeaturedProducts','BestSelling','BestOffer', 'categories','topCategories','brands',"shopByBrands","brandsList","browseCategories","categoriesMenu"],	
    data(){
        return {
                    filter : {
                                selectedBrand : null                               
                    },
                    form : {
                                data :this.$inertia.form({
                                                                                        type : 'FeaturedProducts',
                                                                                        idsToArray : []
                                }),
                                categoriesMenu : this.$inertia.form({
                                                                        menus  : this.categoriesMenu.data
                                })

                    } ,
                    categoriesShortList : map(this.categories, (category) => { return { id : category.id , name  : category.name } }),
                    selectedProducts : null,
                    selectedCategories : this.topCategories.categories,
                    selectedValue : null,     
                    selectedBrands : this.shopByBrands.brands,
                    selectedBrowseCategories : this.browseCategories.categories          
        }
    },
    watch: {
		filter: {
			deep: true,
			handler: debounce(function () {		
                let  brand = this.filter.selectedBrand.id;	
				this.$inertia.get(this.route('website.page.landing'), { selectedBrand : brand }, { preserveState: true })
			}, 800),
		},
	},
    methods: {
        customLabel ({ name, category , sub_category }) {          
                return `${name} ( ${ (!isEmpty(category)) ? category.name : '' } - ${ (!isEmpty(sub_category)) ? sub_category.name : '' } )`;           
        },
        storeFeaturedOfferSellingProduct(){
                this.selectedProducts.filter( item => {  this.form.data.idsToArray.push(item.id) });
                this.form.data.post(this.route('storeFeaturedOfferSellingProduct'));
                this.form.data.reset();                
                this.selectedProducts = null
        },
        storeTopCategory(){
            this.form.data.type = "TopCategories";
            this.selectedCategories.filter( item => { this.form.data.idsToArray.push(item.id) });
            this.form.data.post(this.route('storeFeaturedOfferSellingProduct'));
            this.form.data.reset();
        },
        storeShopByBrands(){
            this.form.data.type = "ShopByBrands";
            this.selectedBrands.filter( item => { this.form.data.idsToArray.push(item.id) });
            this.form.data.post(this.route('storeFeaturedOfferSellingProduct'));
            this.form.data.reset();
        },
        storeShopByBrands(){
            this.form.data.type = "BrowseCategories";
            this.selectedBrowseCategories.filter( item => { this.form.data.idsToArray.push(item.id) });
            this.form.data.post(this.route('storeFeaturedOfferSellingProduct'));
            this.form.data.reset();
        },
        addNewLabelToCategoriesMenu(){
            this.form.categoriesMenu.menus.push({ label : null , categories : null })
        },
        removeLabelToCategoriesMenu(index){
            this.form.categoriesMenu.menus.splice(index,1);
        },
        saveCategoriesMenu(){
            this.form.categoriesMenu.post(this.route('website.save.categories.menu'))
        }
    },
    components:{
        AuthenticatedLayout,
        Multiselect
    }
}
</script>

<style>
    .p-treeselect-label{
        padding-top: 0.3125rem!important;
        padding-bottom: 0.3125rem!important;
    }
    .p-treeselect-items-wrapper .p-tree.p-component{
        border-radius: 0!important;
        padding: 0.3125rem!important;
    }
</style>