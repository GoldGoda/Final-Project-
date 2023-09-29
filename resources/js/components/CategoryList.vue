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
    <div v-for="category in category_list">
        <h1>
            {{category.name}}
            <a :href="'/categories/'+category.id">Ver mas...</a>
        </h1>
        <div class="container">
            <div v-for="(product, i) in category.products" >
                <product  v-if="i < 5" :img="product.img" :description="product.description" :price="product.price"
                    :title="product.name"
                    :pId="product.id"/>
            </div>
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

                category_list: [
                ]
            }
        },
        methods:{
            async getCategories()
            {
                try {
                    const data = await axios.get('/categories/')
                    this.category_list = data.data;
                } catch (error) {
                    await console.log(error)
                }
            }

        }
    }
</script>
