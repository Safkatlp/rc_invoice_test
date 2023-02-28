<template>
   <div class="container">
        <h5>Welcome to <span style="font-size:2rem;color:blue">inv</span><span style="font-size:1.5rem;color:grey">CREATOR</span></h5><br>
        <p>To create new invoices go to <router-link :to="{name:'CreateInvoice'}">Create New Invoice</router-link></p>
        <p>To see the list of invoices <router-link :to="{name:'Invoices'}">All Invoices</router-link></p>
   </div>

</template>

<script>
export default {
    methods: {
        show(){
            swal.fire(
                'ss',
                '',
                'success'
            );
        }
    }
}
</script>

<style scoped>
.container{
   text-align: center;
}
</style>