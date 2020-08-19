<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link class="navbar-brand"  :to="{name:'index'}">Events</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <router-link tag="a" class="nav-link" :to="{name:'create'}">Пригласить</router-link>
                    </li>
                </ul>
                <div class="d-inline-block ml-auto  ">
                    <p class="d-inline-block  my-2">{{ userName }} </p>
                    <p @click.prevent="logout" class="float-right ml-3 my-2" style="cursor: pointer">| Выйти</p>
                </div>



            </div>
        </nav>


        <div class="container mt-4">
            <router-view></router-view>
        </div>


    </div>


</template>

<script>
    export default {
        name:'Homepage',
        props: {
            userId: {
                type: Number,
                required: true
            },
            userName: {
                type: String,
                required: true
            }
        },
        data() {
            return {};
        },
        methods: {
            logout() {
                axios.post("/logout").then(() => {
                    window.location = "/";
                });
            }
        }
    };
</script>

<style scoped>

</style>
