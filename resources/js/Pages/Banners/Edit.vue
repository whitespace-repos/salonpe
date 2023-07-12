<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Update Banner Detail</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveBanner" class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">                        
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Banner Title ..." v-model="form.banner.title"/>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">                        
                                <label class="form-label">Heading</label>
                                <input type="text" class="form-control" placeholder="Banner Heading ..." v-model="form.banner.heading"/>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">                        
                                <label class="form-label">Link</label>
                                <input type="text" class="form-control" placeholder="Banner Link ..." v-model="form.banner.link"/>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">                        
                                <label class="form-label">Link Label</label>
                                <input type="text" class="form-control" placeholder="Banner Link Label ..." v-model="form.banner.link_label"/>
                            </div>
                        </div>

                        <div class="col-4">
                            <label class="form-label d-flex">Banner Status</label>
                            <div class="form-check  d-inline-flex">                                
                                <input class="form-check-input me-2" type="checkbox" v-model="form.banner.active" id="defaultCheck1"  :true-value="true" :false-value="false">
                                <label class="form-check-label text-danger" for="defaultCheck1">
                                    {{ (form.banner.active) ? 'Publish'  : 'Unpublish'  }}
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">                        
                                <label class="form-label d-block">Banner Background Color</label>
                                <div class="d-flex">
                                    <input type="color" class="" placeholder="Banner Link Label ..." v-model="form.banner.bg_color"/>
                                    <b class="ms-3"> {{  form.banner.bg_color }} </b>
                                </div>                                
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3" >
                                <label  class="form-label d-flex">
                                    Banner Image 
                                     <a :href="route('media.index')" class="ms-2" target="_blank">( Open Media )</a>
                                </label>
                                <input placeholder="Banner image path ..." class="form-control" v-model="form.banner.image" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label">Description</label>
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.banner.description" :contentType="'html'"/>
                            </div>
                        </div>
                    </div>                 

                    <div class="text-end">
                        <inertia-link :href="route('banner.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                        <button type="submit" class="btn btn-primary">Update  <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { isEmpty , forEach } from 'lodash';

export default {
    props:['banner'],
	data() {
		return {
                 form : {
                    banner : this.$inertia.form({
                                                            title : this.banner.title,
                                                            heading: this.banner.heading,
                                                            link:this.banner.link,
                                                            link_label:this.banner.link_label,                                                            
                                                            description :this.banner.description,
                                                            image : this.banner.image,
                                                            active : this.banner.active,
                                                            bg_color:this.banner.bg_color
                            })
                 },
                 importFromUrl : false,

		}
	},
    methods:{
                saveBanner  (){                    
                            this.form.banner.patch(this.route('banner.update',this.banner.id));                            
                },
                // fileChange(e){ 
                //     // 
                //     this.form.banner.images =  [];
                //     forEach(e.target.files, (file) => {
                //         this.form.banner.images.push(file);
                //     }) 
                // },
                // bannerFileRemove(e){
                //     const src = e.srcElement.parentElement.parentElement.querySelector("img");
                //     const id = e.srcElement.parentElement.parentElement.querySelector("input");
                //     this.form.banner.deletedAttrImg.push({ path : src.getAttribute("src") , id : id.getAttribute("value") });
                // } 
    },
    components:{
        AuthenticatedLayout
    },
    mounted(){
        // $('.banner-images').imageUploader({                
        //     maxSize: 2 * 1024 * 1024,
        //     maxFiles: 1,
        //     preloaded: ((this.banner.image == '/storage/')) ? [] : [{ id:1,src:this.banner.image}]
        // });        
        //
        // document.querySelector('.banner-images [type="file"]').addEventListener('change', this.fileChange, false);
        // let bannerPreLoadedImage = document.getElementsByClassName('iui-close');
        // for (var i = 0; i < bannerPreLoadedImage.length; i++) {
        //     bannerPreLoadedImage[i].addEventListener('click', this.bannerFileRemove, false);
        // }
    }
}
</script>

<style>
    .ql-editor{
            --bg-opacity: 0.1;
            background-color: rgba(var(--dark-rgb),var(--bg-opacity))!important;
    }
</style>