<template>
    <div class="col-12">
        <p>{{ txt }}</p>
    </div>
</template>

<script>
    const axios = require('axios');

    export default {
        // Define variable
        data() {
            return {
                txt: 'Base e-commerce project'
            }
        },
        // Init function
        created: function()
        {
            this.testCallAPIUsingFetch();
            this.testCallAPIUsingAxios();
        },
        // Define all function here
        methods: {

            /**
             * Demo function call API using Fetch
             *
             * @returns {Promise<void>}
             */
            async testCallAPIUsingFetch () {
                const headers = new Headers();
                headers.append(
                    "Authorization",
                    "Bearer token"
                );
                let testAPI = await fetch('/api/test-api', {
                    // Custom request here
                    method: "GET",
                    headers,
                    mode: "cors",
                    cache: "default",
                    // body: JSON.stringify("String json format") // using with POST method
                });
                let data = await testAPI.json();
                console.log(data);
            },

            /**
             * Demo function call API using Axios
             *
             * @returns {Promise<void>}
             */
            async testCallAPIUsingAxios () {
                let testAPI = await axios({
                    url : '/api/test-api',
                    method: "GET",
                    headers: {
                        Authorization: 'Bearer token'
                    }
                });
                console.log(testAPI);
            }
        },
        // Function mounted:
        mounted() {
            console.log("Example component mounted");
        },
        // Define compute here:  When the component is initialized, the computed will be transformed like a property
        // computed() {
        //
        // }

        // Define watch here: When the value of a variable changes, the function in watch will be executed
        // watch() {
        //
        // },
    }
</script>

<style scoped>
    /**
    * Scope local CSS for component
    */
</style>
