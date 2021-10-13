<template>
    <div>

        <v-card
            id="content-profile-page"
            class="container "
            elevation="2"
            color="rgb(61, 63, 63);"
        >
            <center>
                <v-avatar height="130px" width="130px" color="white">
                    {{ getUserData.name[0] }}
                </v-avatar>
            </center>
            <hr />
            <div id="content-profile-min">
                <h6>name</h6>
                <p>{{ getUserData.name }}</p>
                <h6>email</h6>
                <p>{{ getUserData.email }}</p>
            </div>
        </v-card>
    </div>
</template>

<script>
 export default {
    computed: {
        getUserData() {
            return this.$store.getters.user;
        }
    },

};
</script>

<style>
#content-profile-min{
    padding: 30px;
}
#content-profile-page {
    background-color: rgb(61, 63, 63);
    padding: 10px;

    margin-top: 60px;
}
#content-profile-page p {
    color: white;
    font-size: 20px;
}
</style>
