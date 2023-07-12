<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-tree-structure me-1"></i> Update Category Detail</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveCategory">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Brand Name ..." v-model="form.category.name"/>
                    </div>  

                    <div class="form-group mb-3" >
                        <label  class="form-label">Thumbnail </label>
                        <div class="input-field">
                            <div class="input-images"></div>
                        </div>
                    </div>

                    <div class="text-end">
                        <inertia-link :href="route('category.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                        <button type="submit" class="btn btn-primary">Update  <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import forEach  from 'lodash/forEach';
export default {
    props:['category'],
	data() {
		return {
                 form : {
                            category : this.$inertia.form({
                                                            name : this.category.name,
                                                            _method: 'put',
                                                            images : [],
                                                            deletedAttrImg : []
                            }),
                            
                 }    
		}
	},
    methods:{
                saveCategory(){                    
                            console.log(this.form.category);
                            this.form.category.post(this.route('category.update',this.category.id));                            
                },
                fileChange(e){ 
                    // 
                    this.form.category.images =  [];
                    forEach(e.target.files, (file) => {
                        this.form.category.images.push(file);
                    }) 
                },
                fileRemove(e){
                    const src = e.srcElement.parentElement.parentElement.querySelector("img");
                    const id = e.srcElement.parentElement.parentElement.querySelector("input");
                    this.form.category.deletedAttrImg.push({ path : src.getAttribute("src") , id : id.getAttribute("value") });
                    
                }
    },
    components:{
        AuthenticatedLayout
    },
    mounted(){
        $('.input-images').imageUploader({                
            maxSize: 2 * 1024 * 1024,
            maxFiles: 1,
            preloaded: ((this.category.image == '/storage/' || this.category.image == null)) ? [] : [{ id:1,src:this.category.image}] 
        });
        //
        document.querySelector('[type="file"]').addEventListener('change', this.fileChange, false);

        //
        let attributePreLoadedImage = document.getElementsByClassName('iui-close');
        for (var i = 0; i < attributePreLoadedImage.length; i++) {
            attributePreLoadedImage[i].addEventListener('click', this.fileRemove, false);
        }
    }
}
</script>