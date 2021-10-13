<template>

        <v-app-bar
            app
            color="dark"
            light
            elevate-on-scroll
            elevation="6"
            style="padding:0px 90px"
        >
            <v-toolbar-title>Mada_IT</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-list id="v-list-item" class="d-flex align-center" color="dark">
                <v-list-item router  v-for="(itme ,index ) in items" :key="index"
                  :to="'/profile'"  ><v-list-item-title>{{
                        itme.text
                    }}</v-list-item-title>
                              <v-list-item-icon>
            <v-icon v-text="itme.icon"></v-icon>
          </v-list-item-icon>
                    </v-list-item
                >
            </v-list>
        </v-app-bar>

 </template>

<script>
export default {
    data() {
        return {
            collapseOnScroll: true,
            selectedItem: 1,
            items: [
                { text: "Real-Time", icon: "mdi-clock" },
                { text: "Audience", icon: "mdi-account" },
                { text: "Conversions", icon: "mdi-flag" }
            ]
        };
    }
};
</script>
<style>

#content-test {
    margin-top: 60px;
}
#v-list-item {
    height: 30px;
    background-color: #f5f5f5;
}
</style>
