<template>
    <Head title="Contact Us" />
	<CheckoutLayout :cart="cart.items">
       <!--start breadcrumb-->
       <div class="card rounded-0 shadow-none">
            <div class="card-body">
                <h2 class="h5 mb-0">Choose Shipping Method</h2>
                <div class="my-3 border-bottom"></div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Method</th>
                                <th>Time</th>
                                <th>Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Flat Rate</td>
                                <td>2 days</td>
                                <td>{{ displayPrice(10) }}</td>
                            </tr>
                            <tr>
                                <td>International shipping</td>
                                <td>12 days</td>
                                <td>{{ displayPrice(12) }}</td>
                            </tr>
                            <tr>
                                <td>Same day delivery</td>
                                <td>1 day</td>
                                <td>{{ displayPrice(22) }}</td>
                            </tr>
                            <tr>
                                <td>Expedited shipping</td>
                                <td>--</td>
                                <td>{{ displayPrice(15) }}</td>
                            </tr>
                            <tr>
                                <td>Local Pickup</td>
                                <td>--</td>
                                <td>{{ displayPrice(0) }}</td>
                            </tr>
                            <tr>
                                <td>UPS Ground</td>
                                <td>2-5 days</td>
                                <td>{{ displayPrice(16) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card rounded-0 shadow-none">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-grid">	
                            <inertia-link :href="route('cart.checkout.detail')" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Address</inertia-link>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid">
                            <inertia-link :href="route('cart.make.payment')" class="btn btn-dark btn-ecomm">Proceed to Payment <i class="bx bx-chevron-right"></i> </inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end shop cart-->
    </CheckoutLayout>
</template>

<script>  
    import CheckoutLayout from '@/Pages/Web/CheckoutLayout.vue';   
    import { Head } from '@inertiajs/vue3';
    import { displayPrice } from '@/utils';
    import sumBy from 'lodash/sumBy'
    export default{
        props:["cart"],
        data:()=>({ displayPrice }),
        components : { CheckoutLayout , Head },
      
    }
</script>