import axios from "axios";
import VuexPersist from "vuex-persist";




 export default {
    state: {
        loggedIn: false,
        user: {
            name: null,
            email: null,
            access_token: null
        }
    },
    plugins: [new VuexPersist().plugin],
    getters: {
        loggedIn(state) {
            return state.loggedIn;
        },
        user(state) {
            return state.user;
        }
    },
    mutations: {
        Set_loggedIn(state, payLoad) {
            state.loggedIn = payLoad;
        },
        Set_user(state, payLoad) {
            state.user = payLoad;
        }
    },
    actions: {
        loginAction({ commit }, payLoad) {
          return  new Promise((resolve , reject) => {
                axios
                .post("/api/auth/loginUser", payLoad)
                .then(res => {
                    commit('Set_user',res.data.user)
                    commit("Set_loggedIn", true);
                    resolve(res);
                })
                .catch(error => {
                    reject(error)
                    console.log(error);
                })
            });
        },
        logoutAction(){
            
        }
    }
};
