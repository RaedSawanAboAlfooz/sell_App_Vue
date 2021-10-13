<template>



                <div>
                    <span id="loading-category" v-if="isLoading">
                        <div
                            class="spinner-grow"
                            style="width: 3rem; height: 3rem;"
                            role="status"
                        >
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </span>
                    <div class=" row">
                        <div
                            class="card"
                            id="contnent-category"
                            style="width: 18rem;"
                            v-for="(category, index) in categorys"
                            v-bind:key="index"
                        >
                            <img
                                height="300px"
                                :src="category.image"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h5 class="card-title mb-5">
                                    {{ category.title }}
                                </h5>

                                <a
                                    v-on:click="goToProducts(category.id)"
                                    class="btn btn-outline-dark"
                                >
                                    show getProducts
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
 </template>
<script>

export default {
    name: "home",
    data() {
        return {
            isLoading: false,
            categorys: [
                {
                    id: 1,
                    title: "category 1",
                    image: "assets/images/category/1.jpg"
                },
                {
                    id: 2,
                    title: "category 2",
                    image: "assets/images/category/2.jpg"
                },
                {
                    id: 3,
                    title: "category 3",
                    image: "assets/images/category/3.jpg"
                },
                {
                    id: 4,
                    title: "category 4",
                    image: "assets/images/category/4.jpg"
                },
                {
                    id: 5,
                    title: "category 5",
                    image: "assets/images/category/5.jpg"
                },
                {
                    id: 6,
                    title: "category 6",
                    image: "assets/images/category/6.jpg"
                },
                {
                    id: 7,
                    title: "category 7",
                    image: "assets/images/category/7.jpg"
                }
            ]
        };
    },

    methods: {
        goToProducts(id) {
            this.$router.push({
                name: "products",
                params: { id: id }
            });
        }
    }
};
</script>
<style>
#loading-category {
    z-index: 1023;
    top: 50%;
    position: fixed;
}
#content-home {
    margin-top: 60px;
}
.navbar-expand-md .navbar-collapse {
    height: 10px;
}
#contnent-category {
    text-align: center;
    margin: 10px;
    transition-property: all;
    transition: 1500ms;
}
#contnent-category:hover {
    box-shadow: 5px 5px 25px rgb(74, 78, 70);
    background-color: rgb(200, 199, 200);
}
.card-img,
.card-img-top {
    padding-top: 15px;
}
</style>
