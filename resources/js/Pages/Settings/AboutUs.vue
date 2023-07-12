<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Aboutus Information</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveLocation" class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Title ..." v-model="form.aboutus.title"/>
                            </div>  
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label d-flex">
                                    Path
                                    <a :href="route('media.index')" class="ms-2" target="_blank">( Open Media )</a>
                                </label>
                                <input type="text" class="form-control" placeholder="Media Url ..." v-model="form.aboutus.path"/>
                            </div>  
                        </div>

                       

                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label">Text</label>
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.aboutus.text" :contentType="'html'"/>
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
export default {
    props:["aboutus"],
	data() {
		return {
                 form : {
                            aboutus : this.$inertia.form({
                                                            title : this.aboutus.data.title,
                                                            text : this.aboutus.data.text,
                                                            path : this.aboutus.data.path,
                            })
                 }     
		}
	},
    methods:{
                saveLocation(){                    
                            this.form.aboutus.post(this.route('setting.store.type','aboutus'));                            
                }
    },
    components:{
        AuthenticatedLayout
    }
}
</script>