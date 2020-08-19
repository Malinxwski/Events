<template>
<div>

    <h1>Редактировать участника</h1>
    <form  class="w-75">

        <div class="input-group mb-3">

            <select
                class="custom-select"
                id="event"
                ref="event"
            >

                <option v-for="event in events"
                        :selected="event.id === eventSelected"
                        v-bind:value="event.id"
                        :key="event.id">{{event.event_name}}</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="name">Имя</span>
            </div>
            <input type="text" :class="{'is-invalid': $v.name.$dirty && !$v.name.required}"
                   ref="name" class="form-control" placeholder="Имя" aria-label="name" aria-describedby="name">

        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="surname">Фамилия</span>
            </div>
            <input type="text"  :class="{'is-invalid': $v.surname.$dirty && !$v.surname.required}"
                   ref="surname" class="form-control" placeholder="Фамилия" aria-label="surname" aria-describedby="surname">


        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="email">Email</span>
            </div>
            <input type="text" :class="{'is-invalid': $v.email.$dirty && !$v.email.required}"
                   ref="email" class="form-control" placeholder="Email" aria-label="surname" aria-describedby="email">
        </div>

        <button type="submit" @click.prevent="updatePerson" class="btn btn-success">Обновить</button>
    </form>




</div>



</template>

<script>
    import {required} from "vuelidate/lib/validators";

    export default {
        name: "Create",
        data:()=>({
            events:{},
            eventSelected:null
        }),
        props:{
            id:{
                type: Number,
                required: true,
            }
        },
        mounted() {
            this.getPerson();
            this.getEvents();
        },
        validations: {
            name: {required},
            surname: {required},
            email: {required},
        },
        methods:{
            getEvents(){
                axios.get('/api/events').then(response =>{
                    this.events = response.data.data
                })

            },

            getPerson(){
                axios.get('/api/people/' + this.id).then(response =>{
                    this.eventSelected = response.data.data.event_id;
                    this.$refs.name.value = response.data.data.name;
                    this.$refs.surname.value = response.data.data.surname;
                    this.$refs.email.value = response.data.data.email;
                })
            },

            updatePerson(){
                let event_id = this.$refs.event.value;
                let name = this.$refs.name.value;
                let surname = this.$refs.surname.value;
                let email =  this.$refs.email.value;
                axios.put('/api/people/' + this.id, {
                    event_id, name , surname , email
                })
                    .then( response => {
                        console.log(response)
                    }).catch(error=>{
                        console.log(error)
                })

            }
        }
    }
</script>

<style scoped>

</style>
