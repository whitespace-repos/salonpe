<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Website Information</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveWebsite" class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Instagram</label>
                                <input type="text" class="form-control" placeholder="Instagram ..." v-model="form.website.instagram"/>
                            </div>  
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" placeholder="Facebook ..." v-model="form.website.facebook"/>
                            </div>  
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Mail</label>
                                <input type="text" class="form-control" placeholder="Mail ..." v-model="form.website.mail"/>
                            </div>  
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Support</label>
                                <input type="text" class="form-control" placeholder="support  ..." v-model="form.website.support"/>
                            </div>  
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">contact</label>
                                <input type="text" class="form-control" placeholder="contact ..." v-model="form.website.contact"/>
                            </div>  
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Categories</label>
                                <multiselect v-model="form.website.categories" :options="categoriesShortHand"  group-values="sub_categories" group-label="name" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true"  :group-select="false" placeholder="Type to search category" track-by="name" label="name"><span slot="noResult">Oops! No category found. Consider changing the search query.</span></multiselect>    
                            </div>  
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Brands</label>
                                <multiselect placeholder="Brand ..." v-model="form.website.brands" label="name" track-by="name" :options="brands" :multiple="true" ></multiselect>
                            </div>  
                        </div>



                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label">Footer Text</label>                              
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.website.footerText" :contentType="'html'"/>
                            </div>  
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label">Blog Text</label>
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.website.blogText" :contentType="'html'"/>
                            </div>  
                        </div>
                    </div>                                   

                    <div class="text-end">
                        <inertia-link :href="route('setting.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                        <button type="submit" class="btn btn-primary">Save  <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Multiselect from 'vue-multiselect'
import map from 'lodash/map'
export default {
    props:["website", "brands", "categories"],
	data() {
		return {
                 form : {
                            website : this.$inertia.form({
                                                            instagram : this.website.data.instagram,
                                                            facebook : this.website.data.facebook,
                                                            mail : this.website.data.mail,
                                                            footerText : this.website.data.footerText,
                                                            blogText : this.website.data.blogText,
                                                            support : this.website.data.support,
                                                            contact : this.website.data.contact,
                                                            categories : this.website.data.categories,
                                                            brands : this.website.data.brands,

                            }),
                 }     
		}
	},
    methods:{
                saveWebsite(){                    
                    this.form.website.post(this.route('setting.store.type','website'));                            
                }
    },
    components:{
        AuthenticatedLayout, Multiselect
    },
    computed:{
        categoriesShortHand() {
                return map(this.categories, (category) => { return { id : category.id , name  : category.name , sub_categories : map(category.sub_categories, (sub) => { return { id : sub.id , name : sub.name } }) } });
        } 
    }
}
</script>