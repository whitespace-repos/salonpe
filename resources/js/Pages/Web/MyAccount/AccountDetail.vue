<template>
    <MyAccount>
        <div class="card shadow-none mb-0 border">
            <div class="card-body">
                <form class="row g-3">                    
                    <div class="col-12">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" :value="user.name">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Email address</label>
                        <input type="text" class="form-control" :value="user.email" :disabled="true">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Current Password</label>
                        <input type="text" class="form-control" v-model="user.password">
                    </div>
                    <div class="col-12">
                        <label class="form-label">New Password</label>
                        <input type="text" class="form-control" v-model="user.new_password">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Confirm New Password</label>
                        <input type="text" class="form-control" v-model="user.confirm_password">
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-dark btn-ecomm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </MyAccount>
</template>

<script >
    import MyAccount from '@/Pages/Web/MyAccount/MyAccountLayout.vue';  

    export default {
        props : ["auth"],
        components  : { MyAccount },
        data:(prop) => ( { 
                                user : prop.$inertia.form({
                                                            name : prop.auth.user.name,
                                                            email : prop.auth.user.email,
                                                            password : null,
                                                            new_password : null,
                                                            confirm_password : null,
                                })
        })
    }
</script>