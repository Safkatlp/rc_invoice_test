<template>
    <div class="wrapper">
        <div class="title-wrapper">Create New Invoice</div>
        
        <div class="form-wrapper ">
            <form class="row">
                <div class="col-md-6">                    
                    <div class="separator separator-customer-details">Customer Details</div>

                    <div class="row">
                        <div class=" col-md-6 form-field">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" class="form-control" id="customer_name" v-model="customer_name" placeholder="Ex: Mr. Tony">
                        </div>
                        <div class=" col-md-6 form-field">
                            <label for="customer_phone">Customer Phone</label>
                            <input type="tel" class="form-control" id="customer_phone" v-model="customer_phone" placeholder="1234">
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="customer_street">Customer Street</label>
                        <input type="text" class="form-control" id="customer_street" v-model="customer_street" placeholder="Ex: 1234 Main St">
                    </div>
                    <div class="row">
                        <div class=" col-md-6 form-field">
                            <label for="customer_city">Customer City</label>
                            <input type="text" class="form-control" id="customer_city" v-model="customer_city" placeholder="Ex: Chittagong">
                        </div>
                        <div class=" col-md-6 form-field">
                            <label for="customer_country">Customer Country</label>
                            <input type="text" class="form-control" id="customer_country" v-model="customer_country" placeholder="Ex: Bangladesh">
                        </div>
                    </div>

                    <div class="separator separator-add-products">Add Tax</div>
                    
                    <div class="form-field">
                        <label for="customer_street">Tax(%)</label>
                        <input type="text" class="form-control" id="tax" @change="reCalculate" v-model="tax" placeholder="">
                    </div>

                    <div class="separator separator-add-products">Add Products</div>
                    
                    <div class="row">
                        <div class=" col-md-6 form-field">
                            <label for="products">Product Name</label>
                            <select class="form-control products-dropdown" name="" id="products" v-model="selectedProductID" @change="pickProduct(selectedProductID)">
                                    <option v-for="product in products" :key="product.id" :value="product.id">{{product.name}}</option>
                                    
                            </select>
                        </div>
                        <div class=" col-md-3 form-field">
                            <label for="add_product_price">Price</label>
                            <input type="text" class="form-control" id="add_product_price" v-model="selectedProduct.price" placeholder="">
                        </div>
                        <div class=" col-md-3 form-field">
                            <label for="add_product_qty">Qty</label>
                            <input type="number" class="form-control" id="add_product_qty" v-model="qty" placeholder="">
                        </div>                   
                    </div>                
                    <button type="button" @click="addProducts" class="btn btn-primary">Add Product</button>
                    <button type="button" @click="createInvoice" class="btn btn-success create-button">Create Invoice</button>
                </div>


                <div class="col-md-6 vl">
                    <div class="separator separator-customer-details">Added Products</div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                            
                            <th scope="col">Name</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Amount</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in addedProducts" :key="product.id">                            
                                <td>{{product.name}}</td>
                                <td>{{product.price}}</td>
                                <td>{{product.qty}}</td>
                                <td>{{product.qty * product.price}}</td>
                                <td><button class="remove-btn" type="button" @click="remove(product.id)">x</button></td>
                            </tr>
                            
                        </tbody>
                    </table>

                    <div class="total-section">
                        <span class="label">subtotal :</span> <span class="value">{{subtotal}}</span>
                    </div>
                    <div class="total-section">
                        <span class="label">tax :</span> <span class="value">{{tax}}</span>
                    </div>
                    <div class="total-section">
                        <span class="label">total :</span> <span class="value">{{total}}</span>
                    </div>

                </div>
            </form>
        </div>
    </div>

   
</template>

<script>
export default {
   data(){
        return{
            products: [],
            addedProducts: [],
            selectedProduct : [],
            qty: '',
            tax: 0,
            selectedProductID : '',
            customer_name: '',
            customer_phone: '',
            customer_street: '',
            customer_city: '',
            customer_country: '',
            total: 0,
            subtotal:0,
        }
   },
    async mounted(){       
        // window.$('#products').select2();

        await fetch('/api/products',{
				
				"method" : "GET"
			})
			.then(r => r.json())
			.then(r=>{
				this.products = r.products;
                //console.log(this.products);
			});
        
    },
    methods: {
        // add products to side table for purchase
        addProducts(){

            //check if product is already added to table 
            if(this.addedProducts.find( (item) => item.id == this.selectedProduct.id)){
                Swal.fire({
                    
                    icon: 'warning',
                    title: 'Product Already Added',
                    text: 'Please remove from list and add again',
                    showConfirmButton: false,
                    timer: 2500
                })
                return ;
            }
            else if(!this.selectedProduct.name){
               Swal.fire({
                    
                    icon: 'error',
                    title: 'Please Select a Product',
                    text: 'Product name field is empty',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#products").focus(); 
            }
            else if(!this.selectedProduct.price){
                Swal.fire({
                    
                    icon: 'error',
                    title: 'Please Add Price',
                    text: 'Price field is empty',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#add_product_price").focus();
            }
            else if(!this.qty ){
                Swal.fire({
                    
                    icon: 'error',
                    title: 'Please Add Quantity',
                    text: 'Qty field is empty',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#add_product_qty").focus();
                
            }
            else{
                //pushing products to table
                this.addedProducts.push( {
                    "id":this.selectedProduct.id,
                    "name":this.selectedProduct.name,
                    "price": this.selectedProduct.price,
                    "qty":this.qty,
                    "amount" : this.selectedProduct.price* this.qty,
                    } );
                
                this.subtotal = Math.round( (this.subtotal + (this.selectedProduct.price * this.qty) )*100 ) /100;
                this.total = Math.round( (this.subtotal + (this.subtotal * this.tax * 0.01) )*100 ) /100;
                this.selectedProduct = [];
                this.selectedProductID = '';
                this.qty = '';
                //console.log(this.addedProducts);
            }
            
        },

        //re-calculates total amount if tax value get changes
        reCalculate(){
            this.total = Math.round( (this.subtotal + (this.subtotal * this.tax * 0.01) )*100 ) /100;
        },

        //remove from side table
        remove(id){
            let price = this.addedProducts.find( (item) => item.id == id ).price;
            let qty = this.addedProducts.find( (item) => item.id == id ).qty;
            this.addedProducts = this.addedProducts.filter( (item) => item.id != id );

            this.calculateOnRemove(price,qty);
        },

        //re-calculate after removing an item from side table
        calculateOnRemove(price, qty){
            this.subtotal = Math.round( (this.subtotal - (price * qty) )*100 ) /100;
            this.total = Math.round( (this.subtotal + (this.subtotal * this.tax * 0.01) )*100 ) /100;
        },

        createInvoice(){
            //toggling the preloader
            document.querySelector("#loader-container")?.classList.toggle("hide");

            if(!this.customer_name){
                Swal.fire({                    
                    icon: 'error',
                    title: 'Please Add Customer Name',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#customer_name").focus();
            }

            else if(!this.customer_phone){
                Swal.fire({
                    
                    icon: 'error',
                    title: 'Please Add Customer Phone',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#customer_phone").focus();
            }

            else if(!this.customer_street){
                Swal.fire({
                    
                    icon: 'error',
                    title: 'Please Add Customer Street',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#customer_street").focus();
            }
            
            else if(!this.customer_city){
                Swal.fire({
                    
                    icon: 'error',
                    title: 'Please Add Customer City',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#customer_city").focus();
            }

            else if(!this.customer_country){
                Swal.fire({
                    
                    icon: 'error',
                    title: 'Please Add Customer Country',
                    showConfirmButton: false,
                    timer: 2000
                })
                document.querySelector("#customer_country").focus();
            }

            else if(Object.keys(this.addedProducts).length === 0){
                Swal.fire({
                    
                    icon: 'error',
                    title: 'Please Add Products First',
                    showConfirmButton: false,
                    timer: 2000
                })
            }

            else {
                let payload = new FormData();

                payload.append("customer_name",this.customer_name);
                payload.append("customer_phone",this.customer_phone);
                payload.append("customer_street",this.customer_street);
                payload.append("customer_city",this.customer_city);
                payload.append("customer_country",this.customer_country);
                payload.append("products",JSON.stringify(this.addedProducts));
                payload.append("tax",this.tax);
                payload.append("subtotal",this.subtotal);
                payload.append("total",this.total);


                fetch(`${window.location.origin}/api/create-invoice`,{
                    method : "post",
                    body : payload,
                   
                })
                .then( r => r.json())
                .then( r => {
                    if(r.msg == "success"){
                        document.querySelector("#loader-container")?.classList.toggle("hide")
                        Swal.fire(
                            'Succesfully Created',
                            ``,
                            'success'
                        )
                        this.customer_name = '';
                        this.customer_phone = '';
                        this.customer_street = '';
                        this.customer_city = '';
                        this.customer_country = '';
                        this.addedProducts = [];
                        this.subtotal = 0;
                        this.total= 0;
                        this.tax = 0;
                    }
                    else{
                        document.querySelector("#loader-container")?.classList.toggle("hide")
                        Swal.fire(
                            'Failed',
                            ``,
                            'error'
                        ) 
                    }
                }); 
            }
            
        },

        //selected product from products dropdown list
        pickProduct(id){
            this.selectedProduct = this.products.find( (item) => item.id == id );
            //console.log(this.selectedProduct);
        },

    }
}
</script>

<style scoped>
.separator {
  display: flex;
  align-items: center;
  text-align: center;
}

.separator::before,
.separator::after {
  content: '';
  flex: 1;
  border-bottom: 1px solid #000;
}

.separator:not(:empty)::before {
  margin-right: .5em;
}

.separator:not(:empty)::after {
  margin-left: .5em;
}

.separator-customer-details{
    margin-bottom: 1rem;
}

.separator-add-products{
    margin-top: 1.5rem;
    margin-bottom: 1rem;
}

.vl {
    border: 1px dashed grey;

  
}
</style>