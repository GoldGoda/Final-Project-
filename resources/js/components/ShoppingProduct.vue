<style>
    .container{
        display:flex;
        flex-direction:row;
        flex-wrap:wrap;
        align-items:start;
        justify-content:start;
        gap:20px;
        overflow:hidden;
        padding:20px;
    }

    h1{
        margin-top:30px;
        margin-left:50px;
    }

    h1 a{
        color:red;
    }

</style>

<template>
        <h1>
            {{this.category.name}}
        </h1>
        <div class="container">
            <div v-for="product in category.products" >
                <product :img="product.img" :description="product.description" :price="product.price"
                    :title="product.name"
                    :pId="product.id"/>
            </div>
        </div>
</template>

<script>
    import Product from './Product.vue'
    export default {
        props:["id"],
        components: {Product} ,
        mounted() {
            this.getCategories();
        },
        data(){
            return {

                category: [
                ]
            }
        },
        methods:{
            async getCategories()
            {
                try {
                    const data = await axios.get('/categories/'+this.id)
                    this.category = data.data;

                    console.log(data)

                } catch (error) {
                    await console.log(error)
                }
            }

        }
    }
</script>
