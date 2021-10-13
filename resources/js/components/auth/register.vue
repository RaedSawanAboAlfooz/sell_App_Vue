<template>
    <!--all auth function in file auth.js -->
    <div
        class="row d-flex justify-content-center"
        style="padding: 0;margin: 0;"
    >
         <div id="main_dev_register" class="card">
            <form method="POST" @submit.prevent="register">
                <div id="register">Register</div>
                <div class="mb-3  ">
                    <label for="exampleInputName1" class="form-label">
                        Name
                    </label>
                    <input
                        id="name"
                        type="text"
                        class="form-control  "
                        name="name"
                        v-model="formData.name"
                        required
                        autocomplete="name"
                        autofocus
                    />
                </div>

                <div class="mb-3  ">
                    <label for="exampleInputEmail1" class="form-label"
                        >Email address</label
                    >
                    <input
                        id="email"
                        type="email"
                        :class="[
                            'form-control',
                           errors. erroremail ? 'is-invalid ' : ''
                        ]"
                        name="email"
                        v-model="formData.email"
                        required
                        autocomplete="email"
                        autofocus
                    />
                    <span>{{errors. erroremail }}</span>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"
                        >Password</label
                    >
                    <input
                        id="password"
                        type="password"
                        :class="[
                            'form-control',
                           errors. errorpassword ? 'is-invalid ' : ''
                        ]"
                         v-model="formData.password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />
                    <span>{{ errors.errorpassword }}</span>
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label">
                        Confirm Password
                    </label>
                    <input
                        id="password-confirm"
                        type="password"
                        :class="[
                            'form-control',
                           errors. errorconfirmpassword ? 'is-invalid ' : ''
                        ]"
                        v-model="formData.confirmPassword"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />
                    <span>{{ errors.errorconfirmpassword }} </span>
                </div>
                <button
                    style="width: 100%"
                    type="submit"
                    class="btn btn-outline-secondary"
                >
                    Register
                </button>
                <router-link to="/login">login </router-link>
            </form>
        </div>
    </div>
</template>
<script>
import axios from "axios";

// import { AuthFunction, errorValidate, pathRegister } from "./../../auth";
export default {
    data() {
        return {
            formData: {
                name: "",
                email: "",
                password: "",
                confirmPassword: ""
            },
            errors: {
                erroremail: "",
                errorpassword: "",
                errorconfirmpassword: ""
            }
        };
    },

    methods: {
        async register() {
            this.resetError();
            if (this.formData.password == this.formData.confirmPassword) {
                //register her

                await axios
                    .post("/api/auth/registerUser", this.formData)
                    .then(res => {
                        if (res.data.status) {
                            localStorage.setItem(
                                "access_token",
                                res.data.access_token
                            );
                            localStorage.setItem(
                                "access_token",
                                res.data.access_token
                            );
                            console.log(res.data);
                        } else {
                            this.errors.erroremail = res.data.error;
                            console.log(res.data.error);
                        }
                    }).catch (($e)=>{
                        console.log($e);
                    });
            } else {
                this.errors.errorconfirmpassword = "error confiem password";
            }
        },
        resetError() {
            this.errors.erroremail = "";
            this.errors.errorpassword = "";
            this.errors.errorconfirmpassword = "";
        }
    }
};
</script>
<style>
.btn-outline-secondary {
    text-shadow: 2px 2px 4px #000000;
    width: 100%;
    color: white;
    font-size: 20px;
}
#main_dev_register {
    margin-top: 100px;
    box-shadow: 10px 10px 10px #41414152;
    width: 500px;
    text-shadow: 2px 2px 4px #ffffff;
    font-weight: 800;
    padding: 50px;
    padding-bottom: 10px;
    background-color: #666666ce;
    transition: 1000ms;
}
#main_dev_register:hover {
    box-shadow: 13px 18px 10px #3b3a3a52;
    background-color: #5e5d5de5;
}
#register {
    font-family: "Script MT";
    text-shadow: 2px 2px 4px #ffffff;
    /* x , y */
    transform: translate(0, -50%);
    color: black;
    font-size: 40px;
    font-weight: bold;
}
span {
    font-family: "";
    margin-left: 10px;
    color: red;
}
</style>
