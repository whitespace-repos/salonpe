<template>
    <AuthenticatedLayout>
        <!-- Media library -->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h6 class="mb-0">Media library emulation</h6>
                <div class="ms-auto">
                    <inertia-link :href="route('media.create')" class="btn btn-primary">New Uploads</inertia-link>
                </div>
            </div>

            <div class="card-body">
                <div class="w-50 d-flex">
                    <div>
                        <label></label>
                        <input class="form-control d-flex-grow"  placeholder="Filter brands ..." v-model="form.search"/>
                    </div>
                    <!--  -->					
                </div>
            </div>

            <table class="table media-library">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Preview</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>File info</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(media,index) in uploads.data" :key="media.id">
                        <td>
                            {{ Number(uploads.from) + (index++) }}
                        </td>
                        <td>
                            <a :href="media.path" data-bs-popup="lightbox">
                                <img :src="media.path" alt="" class="img-preview rounded img-fluid">
                            </a>
                        </td>
                        <td>{{ media.name }}</td>
                        <td>{{ media.author.name }}</td>
                        <td>{{ media.create_at}}</td>
                        <td>
                            <ul class="list-unstyled mb-0">					                        		
                                <li><span class="fw-semibold">Size:</span> {{ media.size }}</li>
                                <li><span class="fw-semibold">Format:</span> {{ "."+media.format}}</li>
                            </ul>
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <a href="javascript:void(0)" class="dropdown-item" @click="copyText(media.path)">
                                    <i class="ph-copy me-2"></i>                            
                                </a>

                                <a href="#" class="dropdown-item">
                                    <i class="ph-trash me-2"></i>
                                </a>
                            </div>
                        </td>
                    </tr>                    
                </tbody>
            </table>
        </div>
        <span ref="path" v-html="pathToCopy"></span>
        <!-- /media library -->
    </AuthenticatedLayout>    
</template>

<script>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import "@/assets/js/vendor/media/glightbox.min.js";
    import Pagination from '@/Components/Pagination.vue';
    import { Tooltip } from 'bootstrap';
    
    export default{
        props : ["uploads"],
        components:{
            AuthenticatedLayout,
            Pagination
        },
        data(){
            return {
                    form: {
                            search: null,
                            trashed: null,
                            category:null,
                            by:'name'
                    },
                    pathToCopy : null
            }
        },
        methods:{
            copyText(textToCopy){
                // text area method
                let textArea = document.createElement("textarea");
                textArea.value = textToCopy;
                textArea.style.position = "fixed";
                textArea.style.left = "-999999px";
                textArea.style.top = "-999999px";
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                return new Promise((res, rej) => {
                    document.execCommand("copy") ? res() : rej();
                    textArea.remove();
                    this.$toast.success('Media path is copied !');
                });                
            }
        },
        mounted(){
            const lightbox = GLightbox({
                selector: '[data-bs-popup="lightbox"]',
                loop: true,
                svg: {
                    next: document.dir == "rtl" ? '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/></g></svg>' : '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"> <g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"/></g></svg>',
                    prev: document.dir == "rtl" ? '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"/></g></svg>' : '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/></g></svg>'
                }
            });
        }
    }

</script>