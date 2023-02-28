<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left:1rem">
        <router-link class="navbar-brand" :to="{name:'Home'}"><span style="font-size:2rem;color:blue">inv</span><span style="font-size:1.5rem;color:grey">CREATOR</span></router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
            <li class="nav-item">
                <router-link :to="{name:'CreateInvoice'}" class="nav-link" >Create New Invoice</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{name:'Invoices'}" class="nav-link" >All Invoices</router-link>
            </li>

                        <!-- <li class="nav-item">
                <router-link :to="{name:'Invoice'}" class="nav-link" href="#">Invoice</router-link>
            </li> -->
         
            </ul>
        </div>
    </nav>

    <router-view></router-view>
</template>

<script>
export default {
    
}
</script>