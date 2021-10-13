import Login from "./../components/auth/login.vue";
import Register from "./../components/auth/register.vue";
import Home from "./../components/page/home.vue";
import dashboard from "./../components/page/dashboard.vue";
import welcome from "./../components/page/welcome.vue";
import Product from "./../components/page/product/ShowProduct.vue";
import NotFound from "./../components/particles/NotFound.vue";
import VueRouter from "vue-router";
import Profile from './../components/particles/profile.vue'
 // https://vuetifyjs.com/en/components/application/#default-application-markup     min app vue
const router =new VueRouter({
    mode: "history",
    routes: [
        {
            meta: { requiresAuth: true },
            props: true,
            name: "products",
            path: "/products",
            component: Product
        },
        {
            meta: { guest: true },
            name: "welcome",
            path: "/",
             component: welcome
        },
        {
            meta: { guest: true },
            name: "login",
            path: "/login",
            component: Login
        },

        {
            meta: { guest: true },
            name: "register",
            path: "/register",
            component: Register
        },
        {
            meta: { requiresAuth: true },
            name: "home",
            path: "/home",
            // component:NavigationDrawers
            component: Home
        },
        {
            meta: { requiresAuth: true },
            name: "dashboard",
            path: "/dashboard",
            component: dashboard
        },
        {
            meta: { requiresAuth: true },
            name: "profile",
            path: "/profile",
            component: Profile
            // component: Auth
        },
        {
            path: "*",
            component: NotFound
        }
    ]});

    router.beforeEach((to, from, next) => {
        // get loggedIn from user
        var loggedIn = router.app.$store.state.loggedIn;
        console.log(loggedIn);
        console.log('aap .js  loggedIn val  = > ' + loggedIn);
        if (to.matched.some(record => record.meta.requiresAuth)) {
            // login in required to th completing ..
            if (loggedIn) {
                console.log(loggedIn);
                console.log("next");
                next();
            } else {
                console.log(loggedIn);
                console.log("login");
                next({ path: "/login" });
            }
        }
        else if (to.matched.some(record => record.meta.guest)) {
            if (!loggedIn) {
                console.log(loggedIn);
                console.log("login");
                next();
            }
             else {
                console.log(loggedIn);
                console.log("next 2");
                next({ path: "/home" });
            }
        }
    });

export default router ;
