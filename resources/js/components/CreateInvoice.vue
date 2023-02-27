<template>
   create new invoice

   <select class="products-dropdown" name="" id="products">
        <option v-for="product in products" :key="product.id" :value="product.id">{{product.name}}</option>
        
   </select>
</template>

<script>
export default {
   data(){
        return{
            products: []
        }
   },
    async mounted(){       
        window.$('#products').select2();

        await fetch('/api/products',{
				
				"method" : "GET"
			})
			.then(r => r.json())
			.then(r=>{
				this.products = r.products;
                console.log(this.products);
			});
        
    },
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