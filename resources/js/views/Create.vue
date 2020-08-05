<template>
<div>
    <h1>Добавить участника</h1>
    <form class="w-75" >

        <div class="input-group mb-3">

            <select
                class="custom-select"
                id="event"
                ref="event"
            >

                <option v-for="event in events"
                        v-bind:value="event.id"
                        :key="event.id">{{event.event_name}}</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="name">Имя</span>
            </div>
            <input type="text"  ref="name" class="form-control" placeholder="Имя" aria-label="name" aria-describedby="name">

        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="surname">Фамилия</span>
            </div>
            <input type="text"  ref="surname" class="form-control" placeholder="Фамилия" aria-label="surname" aria-describedby="surname">


        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="email">Email</span>
            </div>
            <input type="text" ref="email" class="form-control" placeholder="Email" aria-label="surname" aria-describedby="email">
        </div>

        <button type="submit" @click.prevent="createPerson" class="btn btn-success">Добавить</button>
    </form>




</div>



</template>

<script>
    export default {
        name: "Create",
        data:()=>({
            events:{},
        }),
        methods:{
            getEvents(){
                axios.get( "/api/events").then(response => {
                    this.events = response.data.data;
                });
            },
            createPerson(){
                const formData = new FormData();
                formData.append("event_id", this.$refs.event.value)
                formData.append("name", this.$refs.name.value)
                formData.append("surname", this.$refs.surname.value)
                formData.append("email", this.$refs.email.value)


                axios
                    .post('/api/people',formData)
                    .then(response => {
                        console.log('OK')
                    })

                this.$refs.name.value = "";
                this.$refs.surname.value = "";
                this.$refs.email.value = "";

            }
        },
        mounted() {
            this.getEvents();
        }
    }
</script>

<style scoped>

</style>
