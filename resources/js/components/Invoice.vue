<template>
        <div class="wrapper">
        <div class="title-wrapper" style="font-size: 1.8rem;text-align: center;margin-bottom: 0px;">Invoice</div>
        
        <div class="form-wrapper ">
            <form class="row">
                <div class="col-md-12">
                    <span style="font-size:2rem;color:blue">inv</span><span style="font-size:1.5rem;color:grey">CREATOR</span>
                </div>

                <div class="col-md-12" style="margin-top: 1rem">
                    <p style="margin-bottom:2px">Mr.Jon</p>
                    <p style="margin-bottom:2px">Muradpur</p>
                    <p style="margin-bottom:2px">Chittagong</p>
                    <p style="margin-bottom:2px">Bangladesh</p>
                </div>

                <div class="row col-md-12" style="margin-top:3rem">
                    <h5>Bill To:</h5>
                    <div class="col-md-7" >
                        
                        <p style="margin-bottom:2px">{{invoice.customer_name }}</p>
                        <p style="margin-bottom:2px">{{invoice.customer_phone }}</p>
                        <p style="margin-bottom:2px">{{invoice.customer_street }}</p>
                        <p style="margin-bottom:2px">{{invoice.customer_city }}</p>
                        <p style="margin-bottom:2px">{{invoice.customer_country }}</p>
                    </div>

                    <div class="col-md-5">
                            <div class="total-section">
                                <span class="label">Invoice :</span> <span class="value">{{ invoice.id }}</span>
                            </div>
                            <div class="total-section">
                                <span class="label">Invoice Date :</span> <span class="value">{{ getInvDate(invoice.inv_date)  }}</span>
                            </div>
                           
                        </div>
                </div>

                
                

                <div class="col-md-12 vl" style="margin-top:3rem">
                    

                    <table class="table table-striped">
                        <thead style="background: darkgrey;">
                            <tr>
                            
                            <th scope="col">Name</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Amount</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.id">                            
                                <td>{{product.name}}</td>
                                <td>{{product.rate}}</td>
                                <td>{{product.qty}}</td>
                                <td>{{product.amount}}</td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                    
                    <div class="row">
                        <div class="col-md-6"></div>

                        <div class="col-md-6">
                            <div class="total-section">
                                <span class="label">subtotal :</span> <span class="value">{{ invoice.subtotal }}</span>
                            </div>
                            <div class="total-section">
                                <span class="label">tax(%) :</span> <span class="value">{{  invoice.tax }}</span>
                            </div>
                            <div class="total-section">
                                <span class="label">total :</span> <span class="value">{{  invoice.total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            invoice : [],
            products : [],
        }
    },
   
    async beforeMount(){
        await fetch(`/api/invoice/${this.$route.params.id}`,{
			
			"method" : "GET"
		})
		.then(r => r.json())
		.then(r=>{
			this.invoice = r.invoice[0];
            //console.log(this.invoice);
		});

        await fetch(`/api/invoices/products/${this.$route.params.id}`,{
			
			"method" : "GET"
		})
		.then(r => r.json())
		.then(r=>{
			this.products = r.products;
            //console.log(this.products);
		});

        
    },

    methods: {
        //formats date
         getInvDate(date){
            const month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Augt","Sep","Oct","Nov","Dec"];
            const newDate = new Date(date);
            //let name = month[d.getMonth()];
            let formattedDate =  newDate.getDate() +'-'+ month[newDate.getMonth()] +'-'+ newDate.getFullYear();
            return formattedDate;
        }
    }
}
</script>

<style scoped>
.form-wrapper form{
    width: -webkit-fill-available;
    border:  none !important;
    padding: 2rem 4rem 2rem 4rem;
    border-radius: 25px;
}
</style>