<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Products</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveProduct" class="container-fluid">
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
                                <multiselect v-model="form.product.productType" :options="productTypes" :multiple="true"  placeholder="Type to search type"></multiselect>      
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group  mb-3">
                                <label class="form-label">Category</label>                        
                                <multiselect v-model="form.product.category" :options="categories"  group-values="sub_categories" group-label="name"  :group-select="false" placeholder="Type to search category" track-by="name" label="name"><span slot="noResult">Oops! No category found. Consider changing the search query.</span></multiselect>    
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
                            <inertia-link :href="route('product.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                            <button type="submit" class="btn btn-primary">Save  <i class="ph-paper-plane-tilt ms-2"></i></button>
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
import {forEach} from 'lodash';

export default {
    props:['categories','productTypes','brands','tags'],
	data() {
		return {                
                form : {
                            product : this.$inertia.form({
                                                            name : null,
                                                            category : null,
                                                            productType : null,
                                                            brand : null, 
                                                            description:null,
                                                            ingredients:null,
                                                            skinType:[],
                                                            customSkinType:[],
                                                            hairType:[],
                                                            customHairType:[],
                                                            howToUse:null,
                                                            images : [],
                            })
                 } ,
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
                saveProduct(){                                              
                            this.form.product.post(this.route('product.store'));                            
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
                } ,
                addSkinTypeTag (newTag) {
                    this.form.product.skinType.push({ id : 0 , name : newTag });
                    this.options.push({ id : 0 , name : newTag });
                } ,
                addHairTypeTag (newTag) {
                    this.form.product.hairType.push({id : 0 , name : newTag});
                    this.options.push({ id : 0 , name : newTag });
                } 
    },
    mounted(){
        $('.input-images').imageUploader({                
            maxSize: 2 * 1024 * 1024,
            maxFiles: 1
        });
        //
        document.querySelector('[type="file"]').addEventListener('change', this.fileChange, false);
    },
    components:{
        AuthenticatedLayout,
        Multiselect
    }
}
</script>
