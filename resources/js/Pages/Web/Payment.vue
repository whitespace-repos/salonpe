<template>
    <CheckoutLayout :cart="cart.items" >
        <div class="card rounded-0 shadow-none">
            <div class="card-body">
                <h2 class="h5 mb-0">Choose Shipping Method</h2>
                <div class="my-3 border-bottom"></div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="cart in cart.items" :key="cart.id">
                                <td>{{ cart.product.name }}</td>
                                <td>{{ cart.quantity }}</td>
                                <td>{{ displayPrice(cart.applied_price) }}</td>
                                <td class="text-end">{{ displayPrice(cart.payble_price) }}</td>
                            </tr>
                            <tr>                                
                                <td colspan="3" class="text-end">Sub Total</td>
                                <td class="fw-bold text-end">{{ displayPrice(cart.payble_price) }}</td>
                            </tr>

                            <tr>                                
                                <td colspan="3" class="text-end">Shipping</td>
                                <td class="fw-bold text-end">{{ displayPrice(0) }}</td>
                            </tr>


                            <tr>                                
                                <td colspan="3" class="text-end">Taxes</td>
                                <td class="fw-bold text-end">{{ displayPrice(0) }}</td>
                            </tr>

                            <tr>                                
                                <td colspan="3" class="text-end">Discount</td>
                                <td class="fw-bold text-end">{{ displayPrice(0) }}</td>
                            </tr>

                            <tr>                                
                                <td colspan="3" class="fs-5 text-end text-primary">Order Total</td>
                                <td class="fw-bold text-end fs-5 text-primary">{{ displayPrice(cart.payble_price) }}</td>
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
                            <inertia-link :href="route('cart.shipping.detail')" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Shipping</inertia-link>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid">
                            <button  @click="pay" class="btn btn-success btn-ecomm">Pay With RazorPay </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </CheckoutLayout>
</template>

<script >
import 'https://checkout.razorpay.com/v1/checkout.js';
import CheckoutLayout from '@/Pages/Web/CheckoutLayout.vue'; 
import { displayPrice } from '@/utils';
import sumBy from "lodash/sumBy"
export default {
    props : ["cart","auth"],
    components : { CheckoutLayout },
    data : (prop) => ({ 
                        receiptNo : `salonpe-${Math.round(new Date().getTime() / 1000)}`,
                        displayPrice , sumBy ,
                        form : {
                                    payment : prop.$inertia.form({
                                                                    payment_id : null
                                    })
                        }
            }),
    methods : {
        pay(){
            let notes = { "Customer" : this.auth.user.id };
            var options = {
                    "receipt":this.receiptNo,
                    "key": "rzp_test_89ZTFcGpQgTyzi",
                    "amount": this.cart.payble_price * 100,
                    "name": "Variety Cosmetics",
                    "description": "Cart Payment",
                    "prefill": {
                        "name": this.auth.user.name,
                        "email": this.auth.user.email,
                        "contact": 8219590399
                    },
                    "notes": notes,
                    "handler":(response) => {
                        this.$toast.success("Payment done successfully.");
                        this.form.payment.payment_id =  response.razorpay_payment_id;
                    
                        this.form.payment.post(this.route('cart.payment.handle'), {
                            onSuccess: () => {
                                        this.$toast.success("Your Order Successfully Placed.")
                            },
                        })

                    },
                    "modal": {
                        "ondismiss": () => {
                            this.$toast.error("Payment not done please try again.");
                        }
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
        }
    }
}

</script>