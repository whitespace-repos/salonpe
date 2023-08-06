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

            
							<!-- My messages -->
								<div class="card-header d-flex align-items-center">
									<h5 class="mb-0">Mega Menus</h5>
									<div class="ms-auto d-flex align-items-center">
                                        <template v-if="newMegaMenuFlag">
                                            <span><input type="text" v-model="megaMenuTitle" class="form-control form-control-sm rounded-0" placeholder="Type Menu Title ... " /></span>
										    <button class="btn btn-primary btn-sm rounded-0" @click="addmegaMenusInstance">Create </button>
                                            <button class="btn btn-danger btn-sm rounded-0" @click="newMegaMenuFlag = false">Cancel </button>
                                        </template>
                                        <template v-else>
                                            <button class="btn btn-success btn-sm" @click="newMegaMenuFlag = true">Create New Menu</button>
                                        </template>										
									</div>
								</div>


								<!-- Tabs -->
			                	<ul class="nav nav-tabs nav-tabs-underline bg-primary bg-opacity-10 fw-semibold">
									<li class="nav-item" v-for="(menu,index) in megaMenusInstance" :key="index">
										<a :href="`#megamenu${index}`" class="nav-link" :class="{'active' : (index == 0) }" data-bs-toggle="tab">
											{{ menu.title }}
										</a>
									</li>
                                    <li class="nav-item align-self-center ms-4">
                                        <a href="javascript:void(0)" class="btn  me-2 py-1 ms-auto align-items-center rounded-0  fw-semibold text-primary" @click="saveMegaMenu">Save Changes</a>
                                    </li>
								</ul>
								<!-- /tabs -->


								<!-- Tabs content -->
								<div class="tab-content card-body">
									<div class="tab-pane fade" :class="{'active show' : (index == 0) }" :id="`megamenu${index}`" v-for="(menu,index) in megaMenusInstance" :key="index">                                        
                                        <div class="container">
                                            <div class="row g-1 mb-2" v-for="(item,indx) in menu.items" :key="indx" >
                                                <div class="col-auto">
                                                    <select class="form-select" v-model="item.type">
                                                        <option value="menu">Menu</option>
                                                        <option value="link">Custom Link</option>
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    <input class="form-control" placeholder="Menu Label" v-model="item.label"/>
                                                </div>
                                                <div class="col">
                                                        <multiselect v-model="item.selectedCategories" :options="categoriesShortHand"  group-values="sub_categories" group-label="name" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true"  :group-select="false" placeholder="Type to search category" track-by="name" label="name"><span slot="noResult">Oops! No category found. Consider changing the search query.</span></multiselect>    
                                                </div>
                                                <div class="col-auto">
                                                    <button class="btn btn-primary" @click="addNewLabelToMegaMenu(menu.items)" v-if="indx == 0"><i class="ph ph-plus"></i></button>
                                                    <button class="btn btn-danger" @click="removeLabelToMegaMenu(indx,menu.items)" v-else><i class="ph ph-minus"></i></button>
                                                </div>
                                            </div>

                                            <hr />                                            
                                            <button class="btn btn-danger" @click="removeTabToMegaMenu(index)">Delete Menu</button>
                                        </div>
									</div>
								</div>
								<!-- /tabs content -->



           

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
    props:['products','FeaturedProducts','BestSelling','BestOffer', 'categories','topCategories','brands',"shopByBrands","brandsList","browseCategories","categoriesMenu","categoriesWithSub","megaMenus"],	
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
                    selectedBrowseCategories : this.browseCategories.categories,
                    megaMenuTitle : '',
                    newMegaMenuFlag : false,
                    megaMenusInstance : this.megaMenus.data,         
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
    computed:{
        categoriesShortHand() {
                return map(this.categoriesWithSub, (category) => { return { id : category.id , name  : category.name , sub_categories : map(category.sub_categories, (sub) => { return { id : sub.id , name : sub.name } }) } });
        } 
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
        addNewLabelToMegaMenu(items){
            items.push({ type :'menu' , label : '' , categories : [] , selectedCategories : [] })
        },
        removeLabelToMegaMenu(index , items){
            items.splice(index,1);
        },
        removeTabToMegaMenu(index){
            this.megaMenusInstance.splice(index,1);
        },
        saveCategoriesMenu(){
            this.form.categoriesMenu.post(this.route('website.save.categories.menu'))
        },
        saveMegaMenu(){
            this.$inertia.form({ menus : this.megaMenusInstance }).post(this.route('website.save.mega.menu'))
        },
        addmegaMenusInstance(){            
            this.megaMenusInstance.push({ title : this.megaMenuTitle , items : [ { type :'menu' , label : '' , selectedCategories : [] }] })
            this.megaMenuTitle = ''
            this.newMegaMenuFlag = false
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