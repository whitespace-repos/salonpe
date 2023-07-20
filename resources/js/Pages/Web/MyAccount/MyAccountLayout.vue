<template>
    <WebLayout>
        <!--start shop cart-->
        <section class="py-4">
            <div class="container">
                <h3 class="d-none">Account</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow-none mb-3 mb-lg-0 border rounded-0">
                                    <div class="card-body">
                                        <div class="list-group list-group-flush">	
                                            <inertia-link :href="route('salonpe.account.dashboard')" :class="{ 'active': $page.url.startsWith('/account-dashboard') , 'bg-transparent' : !$page.url.startsWith('/account-dashboard')}" class="list-group-item d-flex justify-content-between align-items-center">Dashboard <i class='bx bx-tachometer fs-5'></i></inertia-link>
                                            <inertia-link :href="route('salonpe.account.order')" :class="{ 'active': $page.url.startsWith('/account-order') , 'bg-transparent' : !$page.url.startsWith('/account-order')}" class="list-group-item d-flex justify-content-between align-items-center">Orders <i class='bx bx-cart-alt fs-5'></i></inertia-link>                                           
                                            <inertia-link :href="route('salonpe.account.addresses')" :class="{ 'active': $page.url.startsWith('/account-addresses')  , 'bg-transparent' : !$page.url.startsWith('/account-addresses') }" class="list-group-item d-flex justify-content-between align-items-center">Addresses <i class='bx bx-home-smile fs-5'></i></inertia-link>
                                            <!-- <inertia-link :href="route('salonpe.account.payment.method')" :class="{ 'active': $page.url.startsWith('/account-payment-method')  , 'bg-transparent' : !$page.url.startsWith('/account-payment-method') }" class="list-group-item d-flex justify-content-between align-items-center">Payment Methods <i class='bx bx-credit-card fs-5'></i></inertia-link> -->
                                            <inertia-link :href="route('salonpe.account.detail')" :class="{ 'active': $page.url.startsWith('/account-detail') , 'bg-transparent' : !$page.url.startsWith('/account-detail') }" class="list-group-item d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></inertia-link>
                                            <inertia-link :href="route('logout')" method="post" as="button"  class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></inertia-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                               <slot />
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </WebLayout>
</template>

<script setup>
    import WebLayout from '@/Layouts/WebLayout.vue';     
</script>