<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
            <li class="nav-item">
                <router-link :to="{name:'CreateInvoice'}" class="nav-link" href="#">Create New Invoice</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="{name:'Invoices'}" class="nav-link" href="#">View Invoices</router-link>
            </li>
         
            </ul>
        </div>
    </nav>

    <router-view></router-view>
</template>

<script>
export default {
    
}
</script>