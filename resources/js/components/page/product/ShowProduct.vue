<template>
    <div id="content-home" class="container  ">
         <center>
            <span id="loading-category" v-if="isLoading">
                <div
                    class="spinner-grow"
                    style="width: 3rem; height: 3rem;"
                    role="status"
                >
                    <span class="visually-hidden">Loading...</span>
                </div>
            </span>
            <div v-if="length > 0" class=" row">
                    <!-- class="col-lg-4 col-md-3 col-sm-6 col-xs-6 card" -->

                <div
                    class="card"
                    id="contnent-category"
                    style="width: 18rem;"
                    v-for="(product, index) in products[0]"
                    v-bind:key="index"
                >
                    <img
                        height="300px"
                        :src="'assets/images/category/1.jpg'"
                        class="card-img-top"
                    />
                    <div class="card-body">
                        <h5 class="card-title mb-5">
                            {{ product.name }}
                        </h5>
                        <div
                            :title="product.description"
                            id="product-description"
                        >
                            <center>
                                <p class="card-text">
                                    {{ product.description }}
                                </p>
                            </center>
                        </div>
                        <a class="btn btn-outline-dark">
                            show this product
                        </a>
                    </div>
                </div>
            </div>
        </center>
    </div>
</template>
<script>

import { Product } from "../../../vueJs/product/product";
export default {

    props: ["id"],

    data() {
        return {
            length: 0,
            isLoading: false,
            products: []
        };
    },

    methods: {
        async getproduct() {
            var res = await Product.getProducts(this.id);
            var data = res.data.data;
            this.products.push(data);
            this.length = this.products[0].length;
            console.log(this.products[0][0]);
        }
    },

    mounted() {
        console.log(this.id );
        this.getproduct();
    }
};
</script>
<style>
#product-description {
    width: 15rem;
    height: 100px;
    text-overflow: ellipsis;
}
#product-description p {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    transition: 1000ms;
    transition-property: all;
}
</style>
