<template>
    <!--all auth function in file auth.js -->
    <div class="container">
         <div class="row d-flex justify-content-center">
            <div style="margin-top: 10%">
                <div id="main_dev_login" class="card">
                    <form @submit.prevent="login">
                        >
                        <div id="signin">
                            Sign In
                        </div>
                        <div class="mb-3  ">
                            <label for="exampleInputEmail1" class="form-label"
                                >Email address</label
                            >

                            <input
                                v-model="formData.email"
                                id="email"
                                type="email"
                                class="form-control"
                                name="email"
                                value=" "
                                required
                                autocomplete="email"
                                autofocus
                            />
                        </div>

                        <div class="mb-3">
                            <label
                                for="exampleInputPassword1"
                                class="form-label"
                                >Password</label
                            >
                            <input
                                v-model="formData.password"
                                id="password"
                                type="password"
                                class="form-control "
                                name="password"
                                required
                                autocomplete="current-password"
                            />
                        </div>

                        <div class="mb-3 form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                            />
                            <label class="form-check-label" for="exampleCheck1"
                                >Remember Me</label
                            >
                        </div>

                        <button
                            type="submit"
                            style="width: 100%;color:white;font-size:20px"
                            class="btn btn-outline-secondary"
                        >
                            sign in
                        </button>
                        <div id="row">
                            <router-link to="register" class="col-lg-12">
                                register
                            </router-link>

                            <router-link to="register" class="col-lg-6">
                                forget pawword
                            </router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
 export default {
    data() {
        return {
            errorEmail: "",
            errorPasswrd: "",
            formData: {
                email: "",
                password: ""
            }
        };
    },

    methods: {
        login() {
            this.$store.dispatch("loginAction", this.formData).then(res => {
                console.log(res);
                   this.$router.push({name:'home'})
            });
        }
    }
};
</script>

<style>
#main_dev_login {
    margin-left: calc(50% - 225px);
    width: 450px;
    text-shadow: 2px 2px 4px #ffffff;
    font-weight: 800;
    box-shadow: 10px 10px 10px #41414152;
    padding: 50px;
    background-color: #666666ce;
    transition: 1000ms; /*  مده ال  */
    transition-property: all;
}
#main_dev_login:hover {
    box-shadow: 13px 18px 10px #3b3a3a52;
    background-color: #5e5d5de5;
}
#signin {
    font-family: "Script MT";
    text-shadow: 2px 2px 4px #ffffff;
    /* x , y */
    transform: translate(0, -50%);
    color: black;
    font-size: 40px;
    font-weight: bold;
}
</style>
