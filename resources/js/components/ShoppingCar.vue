<style>
    .shopping-car{
        display:grid;
        grid-template-columns: 2fr 1fr;
        gap:40px;
        overflow:hidden;
        padding:20px;

    }

    .shopping-car .product-box{
        margin-top:8px;
        display:flex;
        flex-direction:row;
    }
    .shopping-car .product-box img{
        width:140px;
    }

    .shopping-car .borderbox{
        border:solid black 2px;
        border-radius:5px;
        height:fit-content;
        padding:10px;
    }

</style>

<template>
    <div class="shopping-car">
        <div class="">
                <div v-for="(product,index) in products"  style="display:flex; flex-direction:column; align-items:center; gap:10px;">
                <div class="card product-box" style="width: 90%;">
                    <img class="card-img-top" src="/storage/images/test.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{product.name}}</h5>
                        <p class="card-text">{{product.description}}</p>
                        <div style="display:flex; flex-direction:row; justify-content:space-between">
                            <a href="#" class="btn btn-dark">COMPRAR $ {{product.price}}</a>
                            <div style="display:flex; flex-direction:row; align-items:center; gap:10px;">
                                <a href="#" class="btn btn-dark"
                                @click="decrementProducts(index)">-</a>
                                <h5 :id="index" style="margin-top:9px;">1</h5>
                                <a href="#" class="btn btn-dark"
                                 @click="incrementProducts(index)">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


        </div>
        <div class="price-bar borderbox">
            <h3>
                Total a pagar: $40000 COP
            </h3>
            <a href="#" style="width:100%" class="btn btn-dark">Pagar</a>

        </div>
    </div>
</template>

<script>
    import Product from './Product.vue'




    export default {

        components: {Product} ,
        mounted() {
            this.getCategories();
        },
        data(){
            return {

                products: [
                    {
                        name:"PC Gamer",
                        description:"PC Con todos los componentes",
                        price:1000000,
                    },
                    {
                        name:"PC Gamer",
                        description:"PC Con todos los componentes",
                        price:1000000,
                    },
                    {
                        name:"PC Gamer",
                        description:"PC Con todos los componentes",
                        price:1000000,
                    },

                ]
            }
        },
        methods:{
            async getShoppingCar()
            {
                try {
                    const data = await axios.get('/shoppingcar/')
                    this.products = data.data;
                } catch (error) {
                    await console.log(error)
                }
            },
            incrementProducts(product){
                let counter = document.getElementById(product.toString());
                let currentValue = parseInt(counter.innerHTML, 10);
                counter.innerHTML = currentValue + 1;
            },
            getTotalPrice(product){
                let counter = document.getElementById(product.toString());
                let currentValue = parseInt(counter.innerHTML, 10);
                counter.innerHTML = currentValue + 1;
            },

            decrementProducts(product){
                let counter = document.getElementById(product.toString());
                let currentValue = parseInt(counter.innerHTML, 10);
                if( currentValue != 0 ){
                    counter.innerHTML = currentValue - 1;
                }
            },

            async incrementIn()
            {
                try {
                    const data = await axios.get('/shoppingcar/')
                    this.category_list = data.data;
                } catch (error) {
                    await console.log(error)
                }
            },
        }
    }
</script>
