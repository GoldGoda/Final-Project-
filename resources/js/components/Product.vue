<style>
    .product{
        min-width: 240px;
        max-width: 240px;
        transition: transform 0.2s;
    }

    .product:hover{
        transform: scale(1.05);
    }

    .product img{
        width:100%;
        height:200px;
    }

    h4{
        text-decoration:none;
    }
</style>

<template>
    <a :href="'/products/'+pId" class="card product">
        <div class="card-body">

            <img :src="img" alt=""/>
            <h5>{{title}}</h5>
            <p>{{description}}</p>
            <h4>$ {{price}} COP</h4>
        </div>
    </a>
</template>

<script>
    export default {
        props:['title', 'description', 'price', 'img', 'pId'],
        mounted() {

        }
    }
</script>
