<template>
    <div class="wrapper">
        <div class="title-wrapper">Create New Invoice</div>
        
        <div class="form-wrapper ">
            <div class="row">
                <div class="row" style="border:1px dashed black; padding-top:1rem; padding-bottom:1rem; margin-bottom:2rem">
                    <div class="col-md-3">
                        
                        <input class="form-control" type="text" placeholder="Invoice Id" id="search-invoice" v-model="search_inv_id"/>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" type="text" placeholder="Customer Name" id="search-invoice" v-model="search_customer_name"/>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" type="text" placeholder="Customer Phone" id="search-invoice" v-model="search_customer_phone"/>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success" @click="search">Search</button>
                    </div>                    
                </div>




            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        
                        <th scope="col">Inv Id #</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Phone</th>
                        <th scope="col">INV Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="invoice in invoices" :key="invoice.id">                            
                            <td>{{invoice.id}}</td>
                            <td>{{invoice.customer_name}}</td>
                            <td>{{invoice.customer_phone}}</td>
                            <td>{{invoice.inv_date}}</td>
                            <td>{{invoice.total}}</td>
                            <td>
                                <router-link style="margin-left:5px; margin-right:5px" :to="{name:'Invoice', params:{id: invoice.id} }" type="button" class="btn btn-success"><i class="fa-sharp fa-solid fa-eye"></i></router-link>
                                <button style="margin-left:5px; margin-right:5px" type="button" class="btn btn-secondary" @click="selectInvoice(invoice.id)" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button style="margin-left:5px; margin-right:5px" type="button" class="btn btn-danger" @click="deleteInvoice(invoice.id)"><i class="fa-solid fa-trash-can"></i></button>
                                <button style="margin-left:5px; margin-right:5px" type="button" @click="generatePDF(invoice.id)" class="btn btn-primary"><i class="fa-solid fa-download"></i></button>
                                <button style="margin-left:5px; margin-right:5px" data-bs-toggle="modal" data-bs-target="#social-share-modal" type="button" @click="share(invoice.id,invoice.customer_name)" class="btn btn-secondary"><i class="fa-solid fa-share-from-square"></i></button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="display:flex; justify-content:center;margin-top:5px">
                <InvoicePagination
                    :pagination="pagination"
                    @gotoPage="gotoPage"
                />
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="social-share-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Socail Share</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="social-links"><ul>
                        <li><a :href="`https://www.facebook.com/sharer/sharer.php?u=${share_url}`" class="social-button " id="" title="" rel=""><span class="fab fa-facebook-square"></span></a></li>
                        <li><a :href="`https://twitter.com/intent/tweet?text=${share_text}&url=${share_url}`" class="social-button " id="" title="" rel=""><span class="fab fa-twitter"></span></a></li>
                        <li><a :href="`https://www.linkedin.com/sharing/share-offsite?mini=true&url=${share_url}&title=${share_text}&summary=`" class="social-button " id="" title="" rel=""><span class="fab fa-linkedin"></span></a></li>
                        <li><a target="_blank" :href="`https://wa.me/?text=${share_url}`" class="social-button " id="" title="" rel=""><span class="fab fa-whatsapp"></span></a></li>
                        <li><a target="_blank" :href="`https://telegram.me/share/url?url=${share_url}&text=${share_text}`" class="social-button " id="" title="" rel=""><span class="fab fa-telegram"></span></a></li>
                        <li><a target="_blank" :href="`https://www.reddit.com/submit?title=${share_text}&url=${share_url}`" class="social-button " id="" title="" rel=""><span class="fab fa-reddit"></span></a></li>
                    </ul></div>
                </div>
                
                </div>
            </div>
            </div>

           

            </div>
            

        </div>


        

        <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="width:100%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Invoice</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
                                <button type="button" @click="addProducts" class="btn btn-success">Add Product</button>
                                <button type="button" @click="UpdateInvoice" class="btn btn-success create-button">Update Invoice</button>
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
                                            <td>{{product.rate}}</td>
                                            <td>{{product.qty}}</td>
                                            <td>{{product.qty * product.rate}}</td>
                                            <td><button class="remove-btn" type="button" @click="remove(product.product_id)">x</button></td>
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
            </div>
        </div>


    </div>
</template>

<script>
import InvoicePagination from "./InvoicePagination";

export default {
    components:{InvoicePagination},
    data(){
        return {
            pagination: {
				"current_page": 1,
				"data": [],
				"first_page_url": "",
				"from": 1,
				"last_page": 0,
				"last_page_url": "",
				"links": [],
				"next_page_url": "",
				"path": "",
				"per_page": 0,
				"prev_page_url": null,
				"to": 0,
				"total": 0
			},
            invoices : [],
            selectedInvoice : [],


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
            inv_customer_name : '',
            inv_id : '',
            share_url: '',
            share_text: '',
            search_inv_id : '',
            search_customer_name : '',
            search_customer_phone : '',
        }
    },
    async mounted(){       
        // window.$('#products').select2();
        await this.fetchPageData();
       

        await fetch('/api/products',{
				
				"method" : "GET"
			})
			.then(r => r.json())
			.then(r=>{
				this.products = r.products;
                // //console.log(this.products);
			});
        
    },
    methods: {

        async fetchPageData(url=null, attempt = 0) {

			if ( !url ) {
				url = `${window.location.origin}/api/invoices`;
			}

			await fetch(url,{
				method: "GET"
			})
            .then(r => r.json())
			.then(r=>{
				
                this.invoices = r.invoices.data;
                this.pagination = r.invoices;
			});

		},

         // pagination
		async gotoPage(url) {
			let u = `api/orders/filter`;
			if ( url.includes(u) ) {
				this.filterorders(url);
			} 
            else {
				this.fetchPageData(url);
			}
		},

        //selects a specific invoice from invoice list
        async selectInvoice(id){
            await fetch(`/api/invoices/products/${id}`,{
				
				"method" : "GET"
			})
			.then(r => r.json())
			.then(r=>{
				this.addedProducts = r.products;
                //console.log(this.addedProducts);
			});

            this.selectedInvoice = this.invoices.find( (item) => item.id == id );
            this.customer_name = this.selectedInvoice.customer_name;
            this.customer_phone = this.selectedInvoice.customer_phone;
            this.customer_city = this.selectedInvoice.customer_city;
            this.customer_country = this.selectedInvoice.customer_country;
            this.customer_street = this.selectedInvoice.customer_street;
            this.total = Number(this.selectedInvoice.total);
            this.subtotal = Number(this.selectedInvoice.subtotal);
            this.tax = Number(this.selectedInvoice.tax);
        },

        //add products to edit modal side table
        addProducts(){

           //check if product is already added to table 
            if(this.addedProducts.find( (item) => item.product_id == this.selectedProduct.id)){
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
                    "product_id":this.selectedProduct.id,
                    "name":this.selectedProduct.name,
                    "rate": this.selectedProduct.price,
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

        //remove from side table
        remove(id){
            //console.log(id);
            //console.log(this.addedProducts);
            let price = this.addedProducts.find( (item) => item.product_id == id ).rate;
            let qty = this.addedProducts.find( (item) => item.product_id == id ).qty;
            this.addedProducts = this.addedProducts.filter( (item) => item.product_id != id );

            this.calculateOnRemove(price,qty);
        },

        //re-calculates total amount if tax value get changes
        reCalculate(){
            this.total = Math.round( (this.subtotal + (this.subtotal * this.tax * 0.01) )*100 ) /100;
        },

        //re-calculate after removing an item from side table
        calculateOnRemove(price, qty){
            this.subtotal = Math.round( (this.subtotal - (price * qty) )*100 ) /100;
            this.total = Math.round( (this.subtotal + (this.subtotal * this.tax * 0.01) )*100 ) /100;
        },

        //selects a products from products dropdown
        pickProduct(id){
            this.selectedProduct = this.products.find( (item) => item.id == id );
            //console.log(this.selectedProduct);
        },

        UpdateInvoice(){
            //toggling prelaoder
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

                payload.append("invoice_id",this.selectedInvoice.id);
                payload.append("customer_name",this.customer_name);
                payload.append("customer_phone",this.customer_phone);
                payload.append("customer_street",this.customer_street);
                payload.append("customer_city",this.customer_city);
                payload.append("customer_country",this.customer_country);
                payload.append("products",JSON.stringify(this.addedProducts));
                payload.append("tax",this.tax);
                payload.append("subtotal",this.subtotal);
                payload.append("total",this.total);


                fetch(`${window.location.origin}/api/update-invoice`,{
                    method : "post",
                    body : payload,
                   
                })
                .then( r => r.json())
                .then( r => {
                    if(r.msg == "success"){
                        document.querySelector("#loader-container")?.classList.toggle("hide");
                        Swal.fire(
                            'Succesfully Updated',
                            ``,
                            'success'
                        )
        
                        //replacing old valued with new values
                        this.selectedInvoice.customer_name =  this.customer_name ;
                        this.selectedInvoice.customer_phone =  this.customer_phone ;
                        this.selectedInvoice.customer_city = this.customer_city ;
                        this.selectedInvoice.customer_country = this.customer_country ;
                        this.selectedInvoice.customer_street =  this.customer_street ;
                        this.selectedInvoice.total = this.total ;
                        this.selectedInvoice.subtotal = this.subtotal ;
                        this.selectedInvoice.tax =  this.tax;

                        //resetting fields
                        this.customer_name = '';
                        this.customer_phone = '';
                        this.customer_street = '';
                        this.customer_city = '';
                        this.customer_country = '';
                        this.addedProducts = [];
                        this.subtotal = 0;
                        this.total= 0;
                        this.tax = 0;
                        window.$('#bd-example-modal-lg').modal('toggle');
                    }
                    else{
                        document.querySelector("#loader-container")?.classList.toggle("hide");
                        Swal.fire(
                            'Failed',
                            ``,
                            'error'
                        ) 
                    }
                }); 
            }

            
        },

        deleteInvoice(InvId){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector("#loader-container")?.classList.toggle("hide");

                let payload = new FormData();

                payload.append("invoice_id",InvId);

                fetch(`${window.location.origin}/api/delete-invoice`,{
                        method : "post",
                        body : payload,
                    
                    })
                    .then( r => r.json())
                    .then( r => {
                        if(r.msg == "success"){
                            document.querySelector("#loader-container")?.classList.toggle("hide");
                            this.invoices = this.invoices.filter( (item) => item.id != InvId );
                        
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            
                        }
                        else{
                            document.querySelector("#loader-container")?.classList.toggle("hide");
                            Swal.fire(
                                'Failed',
                                ``,
                                'error'
                            ) 
                        }
                    }); 

                }
            })
        },
        generatePDF(InvId){
            window.open(`${window.location.origin}/api/invoice/generatePdf/${InvId}`, "_blank");           
        },

        share(InvId,customer_name){

            this.inv_id = InvId;
            this.inv_customer_name = customer_name;
            this.share_url = `${window.location.origin}/invoice/${InvId}`;
            this.share_text = `invoice ID: ${InvId}, Customer: ${customer_name}`;
                  
        },


        async search(){
            let payload = new FormData();

            payload.append("inv_id",this.search_inv_id);
            payload.append("customer_name",this.search_customer_name);
            payload.append("customer_phone",this.search_customer_phone);

			await fetch(`${window.location.origin}/api/search/invoices/`,{
				method: "POST",
                body: payload
			})
            .then(r => r.json())
			.then(r=>{
				if(r.msg == "success"){
                this.invoices = r.invoices.data;
                this.pagination = r.invoices;
                }
			});
            // alert("click");
        }
       
    }
}
</script>

<style scoped>
.form-wrapper{
    display: flex;
    justify-content: center;
    margin: 1rem 3rem 1rem 4rem !important;
}

.form-wrapper form{
    width: -webkit-fill-available;
    border:  1px solid black;
    padding: 2rem 1rem 2rem 1rem !important;
    border-radius: 25px;
}


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

#social-links{
    display: flex;
    justify-content: center;
}

#social-links ul li{
    display: inline-block;
    margin: 3px;
}

#social-links ul li a{
    padding: 12px;
    margin: 2px;
    font-size: 24px;
    color: rgb(46, 41, 114);
    background-color:#ccc
}

#social-links ul li a:hover{
    background-color: rgb(46,41,114);
    color: white;
}

</style>