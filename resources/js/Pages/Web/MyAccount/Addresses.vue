<template>
    <MyAccount>
        <div class="card shadow-none mb-0">
            <div class="card-body">
                <h6 class="mb-4">The following addresses will be used on the checkuot page by default.</h6>
                <div class="row">
                    <div class="col-12 col-lg-6" v-for="(address,index) in addresses" :key="address.id">
                        <h6>Address {{ ++index }} </h6>
                        <address v-html="address.plain"></address>
                    </div>                   
                </div>
                <!--end row-->
            </div>
        </div>
    </MyAccount>
</template>

<script setup>
    import MyAccount from '@/Pages/Web/MyAccount/MyAccountLayout.vue'; 
    defineProps(['addresses'])    
</script>