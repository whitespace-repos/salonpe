<template>
    <MyAccount>
        <div class="card shadow-none mb-0">
            <div class="card-body">
                <p>Hello <strong>{{ $page.props.auth.user.name }}</strong> (not <strong>{{$page.props.auth.user.name}}?</strong>  <inertia-link :href="route('logout')" method="post" as="button" class="btn btn-link btn-sm py-0">Logout</inertia-link>)</p>
                <p>From your account dashboard you can view your Recent Orders, manage your shipping and billing addesses and edit your password and account details</p>
            </div>
        </div>
    </MyAccount>
</template>

<script setup>
    import MyAccount from '@/Pages/Web/MyAccount/MyAccountLayout.vue';     
</script>