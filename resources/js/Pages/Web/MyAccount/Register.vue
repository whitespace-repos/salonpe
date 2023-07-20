<template>
    <Head title="Register" />
	<WebLayout>
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Sign Up</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section class="">
            <div class="container">
                <div class="section-authentication-signin d-flex align-items-center justify-content-center">
                    <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
                        <div class="col mx-auto">
                            <div class="card mb-0 shadow-none">
                                <div class="card-body">
                                    <div class="p-0 px-md-4 rounded">                                        
                                        <div class="form-body">
                                            <div class="text-center mb-3">
                                                <h5 class="mb-0">Create your account</h5>
                                                <span class="d-block">Enter your detail below</span>
                                            </div>

                                            <form class="row g-3" @submit.prevent="submit">
                                                <div class="col-12">
                                                    <label for="inputFirstName" class="form-label">Name</label>
                                                    <input v-model="form.name" class="form-control" id="inputFirstName" placeholder="Jhon">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                    <input type="email" v-model="form.email" class="form-control" id="inputEmailAddress" placeholder="example@user.com">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" v-model="form.password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" autocomplete >
                                                        <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    </div>
                                                </div>                                               
                                                <div class="col-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid mb-1">
                                                        <button type="submit" class="btn btn-dark"><i class='bx bx-user'></i>Sign up</button>
                                                    </div>
                                                    <p>Already have acount ? <inertia-link  :href="route('account.show',['login'])">login</inertia-link></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end shop cart--> 
    </WebLayout>
</template>

<style>
.form-control:focus {
    border-color: none !important;
    box-shadow: none !important;
}
</style>

<script setup>
    import WebLayout from '@/Layouts/WebLayout.vue';     
    import { Head , useForm } from '@inertiajs/vue3';    
    const form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const submit = () => {    
        form.password_confirmation = form.password
        form.post(route('register'), {
            onFinish: () => form.reset('password'),
        });
    };
</script>