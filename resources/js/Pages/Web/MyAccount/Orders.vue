<template>
    <MyAccount>
        <div class="card shadow-none mb-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Order</th>
                                <th >Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>                           
                            <tr v-for="order in orders" :key="order.id">
                                <td>{{ `#POD${order.id}` }}</td>
                                <td width="240">{{  displayDate(order.created_at)  }}</td>
                                <td>
                                    <div class="badge  bg-success w-100" v-if="order.payment && order.delivered">Delivered</div>
                                    <div class="badge  bg-warning text-black w-100" v-if="order.payment && !order.delivered">Paid but not delivered</div>
                                    <div class="badge bg-danger w-100" v-if="!order.payment">Incomplete</div>
                                </td>
                                <td>{{ `${displayPrice(order.grand_total)} for ${order.quantity} item`}} </td>
                                <td>
                                    <div class="d-flex gap-2"> 
                                        <inertia-link :href="route('order.show',order.id)" class="btn btn-dark btn-sm rounded-0">View</inertia-link>
                                        <inertia-link :href="route('cart.make.payment')" class="btn btn-dark btn-sm rounded-0" v-if="!order.payment">Pay</inertia-link>
                                        <a href="javascript:;" class="btn btn-dark btn-sm rounded-0" v-if="!order.payment">Cancel</a>
                                    </div>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </MyAccount>
</template>

<script setup>
    import MyAccount from '@/Pages/Web/MyAccount/MyAccountLayout.vue';  
    import { displayDate , displayPrice } from '@/utils';

    defineProps(["orders"]);
</script>

