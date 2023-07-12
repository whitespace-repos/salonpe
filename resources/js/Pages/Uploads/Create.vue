<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Upload</h5>
            </div>

            <div class="card-body">
                <div class="alert alert-success fw-bold" v-if="startUploading"> You have been patient so far, and this should only take another minute </div>
                <form @submit.prevent="saveUpload" class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3" >
                                <label  class="form-label">Product Image</label>
                                <div class="input-field">
                                    <div class="input-images"></div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Associated Names <small> spareated by comma's for multiple images </small></label>
                                <textarea v-model="form.upload.names" class="form-control"></textarea>
                            </div>

                            <hr />

                            <button type="submit" v-if="!startUploading" class="btn btn-primary px-5">Upload  <i class="ph-paper-plane-tilt ms-2"></i></button>
                        </div>
                    </div>  
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import {forEach} from 'lodash';

export default {
	data() {
		return { 
                startUploading  : false,
                form : {    
                            upload : this.$inertia.form({
                                                            images : [],
                                                            names : null
                            })
                 }
		}
	},
   
    methods:{
                fileChange(e){ 
                    // 
                    this.form.upload.images =  [];
                    forEach(e.target.files, (file) => {
                        this.form.upload.images.push(file);
                    }) 
                } ,
                saveUpload(){       
                                this.startUploading = true
                                this.form.upload.post(this.route('media.store'));                            
                },
    },
    mounted(){
        $('.input-images').imageUploader({ 
            maxFiles: 10
        });
        //
        document.querySelector('[type="file"]').addEventListener('change', this.fileChange, false);
    },
    components:{
        AuthenticatedLayout
    }
}
</script>