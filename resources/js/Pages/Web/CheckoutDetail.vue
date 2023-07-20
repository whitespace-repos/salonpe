<template>
    <Head title="Contact Us" />
	<CheckoutLayout :cart="cart.items">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="">
                        <img src="@/assets/web/images/avatars/avatar-1.png" width="90" alt="" class="rounded-circle p-1 border">
                    </div>
                    <div class="ms-2">
                        <h6 class="mb-0">Jhon Michle</h6>
                        <p class="mb-0">michle@example.com</p>
                    </div>
                    <div class="ms-auto">	
                        <button class="btn btn-light btn-ecomm me-3" @click="addNewAddressFlag = true">Add New Address</button>
                        <inertia-link :href="route('salonpe.account.detail')" class="btn btn-light btn-ecomm"><i class='bx bx-edit'></i> Edit Profile</inertia-link>
                    </div>
                </div>
                <div class="border p-3">
                    
                    <h2 class="h5 mb-0">Shipping Address</h2>
                    <div class="my-3 border-bottom"></div>
                    <div class="form-body">
                        <form  v-if="!addNewAddressFlag">
                            <div class="row g-3"  >
                                <div class="col-md-6" v-for="(address,index) in addresses" :key="address.id">
                                    <div class="list-group mb-3">
                                        <label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-2">
                                            <div class="d-flex flex-fill my-1">
                                                <div class="form-check-label d-flex me-2">
                                                    <i class="ph-sun ph-lg me-3"></i>
                                                    <div>
                                                        <span class="fw-bold">Address {{ ++index }} </span>
                                                        <div class="fs-sm text-muted" v-html="address.plain"></div>
                                                    </div>
                                                </div>
                                                <input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme" v-model="shippingAddress" :value="address.id">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-grid">	
                                        <inertia-link :href="route('cart.index')" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</inertia-link>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-grid">	
                                        <inertia-link :href="route('cart.shipping.detail')" :data="{ address : shippingAddress }"  class="btn btn-dark btn-ecomm">Proceed to Checkout<i class='bx bx-chevron-right'></i></inertia-link>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form class="row g-3" v-if="addNewAddressFlag" @submit.prevent="saveAddress">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control rounded-0" v-model="form.address.first_name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control rounded-0" v-model="form.address.last_name">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Address 1</label>
                                <textarea class="form-control rounded-0" v-model="form.address.address_1"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address 2</label>
                                <textarea class="form-control rounded-0" v-model="form.address.address_2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control rounded-0" v-model="form.address.email">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control rounded-0" v-model="form.address.phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Company</label>
                                <input type="text" class="form-control rounded-0" v-model="form.address.company">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State/Province</label>
                                <input type="text" class="form-control rounded-0" v-model="form.address.state">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Zip/Postal Code</label>
                                <input type="text" class="form-control rounded-0" v-model="form.address.zip">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control rounded-0" v-model="form.address.country">
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-md-6">
                                <div class="d-grid">	
                                    <button class="btn btn-light btn-ecomm" @click="addNewAddressFlag = false"><i class='bx bx-x'></i>Cancel</button>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="d-grid">	
                                    <button type="submit" class="btn btn-dark btn-ecomm" :disabled="form.address.processing">Save Address<i class='bx bx-chevron-right'></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </CheckoutLayout>
</template>

<script>
    import CheckoutLayout from '@/Pages/Web/CheckoutLayout.vue';     
    import { Head } from '@inertiajs/vue3';
    import { displayPrice } from '@/utils';
    import sumBy from 'lodash/sumBy'
    export default{
        props:["cart","addresses"],
        data:(prop)=>({ 
                            displayPrice , sumBy , 
                            addNewAddressFlag : false ,
                            shippingAddress : prop.cart.address_id,
                            form : {
                                        address : prop.$inertia.form({
                                                                        first_name : '',
                                                                        last_name : '',
                                                                        address_1 : '',
                                                                        address_2 : null,
                                                                        email : '',
                                                                        phone : '',
                                                                        company : '',
                                                                        state :'',
                                                                        zip : '',
                                                                        country : '',
                                                                        customer : null,
                                                                        plain : null
                                        })
                            } 

                    }),
        components : { CheckoutLayout , Head },
        methods : {
                        saveAddress(){
                                this.form.address.post(this.route('cart.save.address'),{
                                    onSuccess : () => {
                                        this.$toast.success("Address Saved !")
                                        this.addNewAddressFlag = false
                                    }
                                });
                                
                        }
        }
    }
</script>