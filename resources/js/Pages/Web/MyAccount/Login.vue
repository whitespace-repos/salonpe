<template>
    <Head title="Login" />
	<WebLayout>
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Sign in</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                              
                                <li class="breadcrumb-item active" aria-current="page">Sign In</li>
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
                <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5">
                    <div class="row row-cols-1 row-cols-xl-2">
                        <div class="col mx-auto">
                            <div class="card shadow-none">
                                <div class="card-body px-0 px-md-2">
                                    <div class="rounded px-0 px-md-5">
                                        <div class="form-body">
                                            <div class="text-center mb-3">
                                                <h5 class="mb-0">Login to your account</h5>
                                                <span class="d-block">Enter your credentials below</span>
                                            </div>
                                            <form class="row g-3" @submit.prevent="submit">
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="inputEmailAddress" placeholder="Email Address" v-model="form.email">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                    <div class="input-group" id="show_hide_password"> 
                                                        <input :type="(form.showPassword) ? 'text' : 'password'" class="form-control border-end-0" id="inputChoosePassword" v-model="form.password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent" @click="showPassword"><i class='bx bx-hide'></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked v-model="form.remember">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
                                                </div>
                                                <div class="col-12">                                                    
                                                    <div class="d-grid mb-2">
                                                        <button type="submit" class="btn btn-dark" :disabled="form.processing"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                    </div>
                                                    <p>Don't have an account yet? <inertia-link  :href="route('account.create')">Sign up here</inertia-link></p>
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

<script>
    import WebLayout from '@/Layouts/WebLayout.vue';     
    import { Head , useForm} from '@inertiajs/vue3';  
    export default {
                        props : ["referral"],
                        data:(prop) => ({
                                            form  : prop.$inertia.form({
                                                                        email: '',
                                                                        password: '',
                                                                        remember: false,
                                                                        showPassword : false,
                                                                        referral : prop.referral
                                            })
                        }),
                        methods : {
                            submit(){
                                this.form.post(route('login'), {
                                    onFinish: () => this.form.reset('password'),
                                });
                            }
                       },
                       components : { WebLayout , Head }
    }
</script>