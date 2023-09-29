<style>
    .containerpv{
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        overflow:hidden;
        padding:20px;
    }

    .product-view{
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        border:solid black 2px;
        border-radius:5px;
        padding: 100px;
        max-width:60%;
    }

    .cs-btn{
        border:solid black 3px;
        border-radius:5px;
        padding:5px;
        text-decoration:none;
        color:black;
        font-weight:bold;
    }

</style>

<template>
    <div class="containerpv">

    <div class="card" style="width: 50rem; ">
    <div class="card-body" style="display:flex; flex-direction:column; align-items:center;">
            <img width="400" :src="product.img"/>
        <h5 class="card-title">{{product.name}}</h5>
        <p class="card-text">{{product.description}}</p>
        <h3 href="#" class="card-link">$ {{product.price}} COP</h3>
        <a href="/carshop" class="cs-btn" @click="addProduct(product.id)">ADD TO CAR SHOP</a>
    </div>
    </div>
</div>

</template>

<script>

    export default {
        props:["id"],
        mounted() {
            this.getProduct();
        },
        data(){
            return {

                product: [
                ]
            }
        },
        methods:{
            async getProduct()
            {
                try {
                    const data = await axios.get('/products/'+this.id)
                    this.product = data.data;
                    console.log(data)

                } catch (error) {
                    await console.log(error)
                }
            },
            async addProduct(id) {
            try {
                const data = { product_id: id };
                const response = await axios.post('/products/ap', data);
                console.log(response.data);
            } catch (error) {
                console.error(error);
            }
        }

        }
    }
</script>
