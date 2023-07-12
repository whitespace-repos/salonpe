<template>
    <AuthenticatedLayout>
        <!-- My messages -->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="mb-0">Product Detail</h5>
            </div>
            <!-- Tabs -->
            <ul class="nav nav-tabs nav-tabs-underline nav-justified bg-primary bg-opacity-10">                

                <li class="nav-item">
                    <a href="#productAttributes" class="nav-link active fw-bold" data-bs-toggle="tab">
                        Product Attributes
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#productDetail" class="nav-link  fw-bold" data-bs-toggle="tab">
                        Product Detail
                    </a>
                </li>
            </ul>
            <!-- /tabs -->


            <!-- Tabs content -->
            <div class="tab-content card-body p-0">
                <div class="tab-pane fade" id="productDetail">
                    <form @submit.prevent="updateProduct" class="container-fluid p-4">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name ..." v-model="form.product.name"/>
                                </div>
                            </div>       

                            <div class="col-4">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Product Type</label>                        
                                    <multiselect v-model="form.product.productType" :options="productTypes" :multiple="true"  placeholder="Type to search type"  :searchable="false"></multiselect>    
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Category</label>                        
                                    <multiselect v-model="form.product.category" value="Integer" :options="categories"  group-values="sub_categories" group-label="name"  :group-select="false" placeholder="Type to search category" track-by="name" label="name"><span slot="noResult">Oops! No category found. Consider changing the search query.</span></multiselect>    
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Brand</label>                        
                                    <multiselect v-model="form.product.brand" :options="brands"  :group-select="false" placeholder="Type to search brand" track-by="name" label="name"></multiselect>    
                                </div>
                            </div>
                            

                            <div class="col-12">
                                <div class="form-group mb-3" >
                                    <label  class="form-label">Product Image</label>
                                    <div class="input-field">
                                        <div class="input-images"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Skin type</label>  
                                    <multiselect v-model="form.product.skinType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="name" :options="skinTags" :multiple="true"></multiselect>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Hair type</label>                                                            
                                    <multiselect v-model="form.product.hairType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="name" :options="hairTags" :multiple="true"></multiselect>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Product Description</label>                        
                                    <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.product.description" :contentType="'html'"/>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Product Ingredients</label>                        
                                    <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.product.ingredients" :contentType="'html'"/>
                                </div>
                            </div> 
        
                            <div class="col-12">
                                <div class="form-group  mb-3">
                                    <label class="form-label">How To Use</label>                        
                                    <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.product.howToUse" :contentType="'html'"/>
                                </div>
                            </div> 

                            <div class="text-end col-12 py-4">                                                        
                                <button type="submit" class="btn btn-primary">Update Details  <i class="ph-paper-plane-tilt ms-2"></i></button>
                            </div>
                        </div>  
                    </form>
                </div>

                <div class="tab-pane fade active show" id="productAttributes">   
                                    
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Attribute</th>
                                <th>Attribute Images</th>
                                <th>Quantity</th>
                                <th width="180">
                                    <inertia-link :href="route('create.product.attribute',this.product.id)" class="btn btn-primary btn-sm">
                                        <i class="ph-plus-circle me-1"></i>
                                        Add Attribute
                                    </inertia-link>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="attribute in product.attributes" :key="attribute.id">
                                <td><kbd>{{ attribute.id }}</kbd></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a href="#" class="text-body fw-semibold letter-icon-title">{{ attribute.attribute_data.name }}</a>
                                            <div class="d-flex align-items-center text-muted fs-sm">
                                                <span class="rounded-pill p-1 me-2" :style="{background:attribute.attribute_data.color}"></span>
                                                {{attribute.attribute_data.size}}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>                                    
                                    <div class="d-flex align-items-center">
                                        <div class="d-inline-block me-1" v-for="media in attribute.media" :key="media.id">
                                            <img :src="media.path" class="rounded-circle" width="40" height="40" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{  attribute.quantity }}
                                </td>
                                <td class="text-center"><inertia-link :href="route('edit.product.attribute',attribute.id)" class="fw-bold"><i class="ph-caret-right fw-bold"></i></inertia-link></td>
                            </tr>                           
                        </tbody>
                   </table>
                </div>
            </div>
            <!-- /tabs content -->

        </div>
        <!-- /my messages -->
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Multiselect from 'vue-multiselect'
import {forEach, includes, isEmpty} from 'lodash';

export default {    
    props:['categories','productTypes','brands','product','tags'],
	data() {
		return {
                 includes,
                 form : {
                            product : this.$inertia.form({
                                                            name : this.product.name,
                                                            category : this.product.sub_category,
                                                            productType : this.product.product_type,
                                                            brand : this.product.brand, 
                                                            description:this.product.product_description,
                                                            ingredients:this.product.ingredients,
                                                            skinType:this.product.skin_type,
                                                            hairType:this.product.hair_type,
                                                            howToUse:this.product.how_to_use,
                                                            images : [],
                                                            _method: 'put',
                                                            deletedAttrImg : [],
                            }),
                            productAttribute : this.$inertia.form({
                                                                     product : this.product.id,
                                                                     attributes : [],
                                                                     images : [],
                            })
                 },
                 options : this.tags,
                 skinTags : [
                                { id : 1 , name : 'Normal Skin' , description : "Balanced skin with no excessive oiliness or dryness." },
                                { id : 2 , name : 'Dry Skin' , description : "Lacks moisture and tends to feel tight, flaky, or dull." },
                                { id : 3 , name : 'Oily Skin' , description : "Produces excess sebum, leading to a shiny complexion and potential breakouts." },
                                { id : 4 , name : 'Combination Skin' , description : "Exhibits characteristics of both oily and dry skin, with an oily T-zone (forehead, nose, and chin) and dryness in other areas." },
                                { id : 5 , name : 'Sensitive Skin' , description : "Easily irritated, prone to redness, itching, or stinging. Requires gentle and hypoallergenic products." },
                                { id : 6 , name : 'Acne-Prone Skin' , description : "Susceptible to frequent breakouts, blemishes, and clogged pores." },
                                { id : 7 , name : 'Mature Skin' , description : "Shows signs of aging, such as wrinkles, fine lines, and loss of elasticity." },
                                { id : 8 , name : 'Hyperpigmented Skin' , description : "Uneven skin tone, dark spots, or patches caused by sun damage, acne scars, or hormonal changes." },
                                { id : 9 , name : 'Rosacea Skin' , description : "Experiences persistent redness, visible blood vessels, and sometimes acne-like bumps." },
                                { id : 10 , name : 'Eczema Skin' , description : "Inflamed, itchy, and dry skin due to a chronic condition characterized by flare-ups." },
                            ] ,
                hairTags : [
                            { id : 1 , name : "Straight Hair" , description : "Hair that is naturally straight from the roots to the ends." },
                            { id : 2 , name : "Wavy Hair" , description : "Hair with loose or defined waves that may range from slight bends to more pronounced curls." },
                            { id : 3 , name : "Curly Hair" , description : "Hair that forms spiral or ringlet-shaped curls." },
                            { id : 4 , name : "Coily Hair" , description : "Hair with tightly coiled or zigzag-shaped curls." },
                            { id : 5 , name : "Fine Hair" , description : "Thin and delicate strands that may lack volume and appear flat." },
                            { id : 6 , name : "Medium Hair" , description : "Hair that falls between fine and coarse, offering a balance of volume and manageability." },
                            { id : 7 , name : "Coarse Hair" , description : "Thick strands that are sturdy and resistant, often requiring extra moisture and care." },
                            { id : 8 , name : "Dry Hair" , description : "Hair that lacks moisture, leading to frizz, dullness, and brittleness." },
                            { id : 9 , name : "Oily Hair" , description : "Hair that gets greasy quickly due to excessive sebum production." },
                            { id : 10 , name : "Damaged Hair" , description : "Hair that is chemically treated, heat-damaged, or prone to breakage and split ends." },   
                        ]
		}
	},
    methods:{
                updateProduct(e){                                          
                 //   this.$inertia.post(this.route('product.update',this.product.id) , this.form.product);
                    this.form.product.post(this.route('product.update',this.product.id));                            
                },
                nameWithLang ({ name, created_at }) {
                       return `${name}`
                },
                fileChange(e){ 
                    // 
                    this.form.product.images =  [];
                    forEach(e.target.files, (file) => {
                        this.form.product.images.push(file);
                    }) 
                },
                attributeFileChange(e){
                    this.form.productAttribute.images =  [];
                    forEach(e.target.files, (file) => {
                        this.form.productAttribute.images.push(file);
                    }) 
                },
                addSkinTypeTag (newTag) {
                    this.form.product.skinType.push({ id : 0 , name : newTag });
                    this.options.push({ id : 0 , name : newTag });
                } ,
                addHairTypeTag (newTag) {
                    this.form.product.hairType.push({id : 0 , name : newTag});
                    this.options.push({ id : 0 , name : newTag });
                },
                productFileRemove(e){
                    const src = e.srcElement.parentElement.parentElement.querySelector("img");
                    const id = e.srcElement.parentElement.parentElement.querySelector("input");
                    this.form.product.deletedAttrImg.push({ path : src.getAttribute("src") , id : id.getAttribute("value") });
                }         
    },
    components:{
        AuthenticatedLayout, 
        Multiselect,
    },
    mounted(){
        $('.input-images').imageUploader({                
            maxSize: 2 * 1024 * 1024,
            maxFiles: 1,
            preloaded: ((this.product.thumb_image == '/storage/')) ? [] : [{ id:1,src:this.product.thumb_image}] 
        });        
        //
        document.querySelector('.input-images [type="file"]').addEventListener('change', this.fileChange, false);
        let attributePreLoadedImage = document.getElementsByClassName('iui-close');
        for (var i = 0; i < attributePreLoadedImage.length; i++) {
            attributePreLoadedImage[i].addEventListener('click', this.productFileRemove, false);
        }
    }
}
</script>