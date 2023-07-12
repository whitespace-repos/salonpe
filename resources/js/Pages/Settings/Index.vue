<template>
    <AuthenticatedLayout>
        <div class="content">
            <!-- Widgets list -->
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header fw-bold p-2 fs-5">
                            About Us
                            <inertia-link :href="route('setting.edit.type','aboutus')" class="text-primary ms-2"><i class="ph-pencil"></i></inertia-link>								
                        </div>
                        <div class="card-body">
                            <h3>{{ aboutus.data.title }}</h3>
                            <p v-html="aboutus.data.text"></p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <!-- User details (with sample pattern) -->
                    <div class="card">
                        <div class="card-header fw-bold p-2 fs-5">
                            Contact
                            <inertia-link :href="route('setting.edit.type','contact')" class="text-primary ms-2"><i class="ph-pencil"></i></inertia-link>								
                        </div>
                        <div class="card-body border-top-0" style="max-height: 21.6em; overflow: auto;">

                            <div>
                                <label class="form-label">Head Office</label>
                                <p>{{ contact.data.headOfficeAddress}}</p>
                            </div>

                            <hr />
                            <div class="d-flex justify-content-between">
                                <div class="w-auto">
                                    <label class="fw-semibold">Heading</label>
                                    <div>{{ contact.data.heading}}</div>
                                </div>

                                <div class="w-auto">
                                    <label class="fw-semibold">Title</label>
                                    <div>{{ contact.data.title }}</div>
                                </div>

                                <div class="w-auto">
                                    <label class="fw-semibold">Email</label>
                                    <div>{{ contact.data.email}}</div>
                                </div>

                                <div class="w-auto">
                                    <label class="fw-semibold">Phone Number</label>
                                    <div>{{  contact.data.phone  }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /user details (with sample pattern) -->
                </div>


                <div class="col-12">
                    <!-- User details (with sample pattern) -->
                    <div class="card">
                        <div class="card-header fw-bold p-2 fs-5">
                            Location
                            <inertia-link :href="route('setting.edit.type','location')" class="text-parimary ms-2"><i class="ph-pencil"></i></inertia-link>								
                        </div>
                        
                        <div class="card-body border-top-0" style="max-height: 21.6em; overflow: auto;">
                            <div class="d-sm-flex flex-sm-wrap mb-3" >
                                <div class="fw-semibold">Title</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ location.data.title }}</div>
                            </div>

                            <hr />

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">First Address</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ location.data.firstAddress }}</div>
                                <br />
                                <label class="form-label me-2">Contact</label>  {{ location.data.firstPhone }}
                            </div>

                            <hr />

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Second Address</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ location.data.secondAddress }}</div>
                                <br />
                                <label class="form-label me-2">Contact</label>  {{ location.data.secondPhone }}
                            </div>

                            <hr />

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Third Address</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ location.data.thirdAddress }}</div>
                                <br />
                                <label class="form-label me-2">Contact</label>  {{ location.data.thirdPhone }}
                            </div>
                        </div>
                    </div>
                    <!-- /user details (with sample pattern) -->
                </div>

             

                <div class="col-12">
                    <!-- User details (with sample pattern) -->
                    <div class="card">
                        <div class="card-header fw-bold p-2 fs-5">
                            Website Footer
                            <inertia-link :href="route('setting.edit.type','website')" class="text-primary ms-2"><i class="ph-pencil"></i></inertia-link>								
                        </div>

                        <div class="card-body border-top-0">
                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Instagram</div>
                                <a :href="website.data.instagram" target="_blank" class="ms-sm-auto mt-1 mt-sm-0">{{  website.data.instagram }}</a>
                            </div>

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Facebook</div>
                                <a :href="website.data.facebook" target="_blank" class="ms-sm-auto mt-1 mt-sm-0">{{ website.data.facebook }}</a>
                            </div>

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Mail</div>
                                <a :href="website.data.mail" target="_blank" class="ms-sm-auto mt-1 mt-sm-0">{{ website.data.mail }}</a>
                            </div>


                            <div class="d-sm-flex flex-sm-wrap mb-3 justify-content-between">
                                <div class="fw-semibold">Support</div>
                                {{ website.data.support }}
                            </div>


                            <div class="d-sm-flex flex-sm-wrap mb-3 justify-content-between">
                                <div class="fw-semibold">Contact</div>
                                {{ website.data.contact }}
                            </div>

                            <hr />

                            <div>
                                <label>Footer Text</label>
                                <p v-html="website.data.footerText"></p>                       
                            </div>

                            <hr />
                            
                            <div>
                                <label>Blog Text</label>
                                <p v-html="website.data.blogText"></p>                       
                            </div>
                        </div>
                    </div>
                    <!-- /user details (with sample pattern) -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

    export default{
        props : ["location","contact","website","aboutus"],
        components:{
            AuthenticatedLayout
        }
    }

</script>