<template>
<div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary" @click="filterEvents()" type="button">Фильтр</button>
        </div>
        <select
            class="custom-select"
            id="event"
            ref="event"
            >
            <option value="all">Все</option>
            <option v-for="event in events"
                    v-bind:value="event.id"
                    :key="event.id">{{event.event_name}}</option>
        </select>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Email</th>
            <th scope="col">Мероприятие</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(person, idx) in peopleFiltered" :key="person.id">
            <td scope="row" >{{idx+1}}</td>
            <td>{{person.name}}</td>
            <td>{{person.surname}}</td>
            <td>{{person.email}}</td>
            <td>{{getEventName(person.event_id)}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <router-link  tag="button" class="btn btn-warning"
                                  :to="{name:'update', params:{id:person.id}}"
                    >Изменить</router-link>
                    <button type="button" @click.prevent="deletePerson(person.id)" class="btn btn-danger" >Удалить</button>
                </div>
            </td>

        </tr>

        </tbody>
    </table>
    <div>
        <button v-if="prev" type="button" @click="navigate(prev)" class="m-3 btn btn-primary">Previous </button>
        <button v-if="next" type="button" @click="navigate(next)" class="m-3 btn btn-primary">Next </button>

    </div>
</div>
</template>

<script>
    export default {
        name: "Show",

        data:()=>({
            id: null,
            people:{},
            events:{},
            peopleFiltered:{},
            next: null,
            prev: null

        }),
        mounted() {
            this.getEvents();
            this.getPeople();

        },
        computed:{

        },
        methods:{
            getEventName(id){
                let  event = this.events.find(e => e.id === id)
                return  event.event_name
            },
            filterEvents(){
                if(this.$refs.event.value === 'all'){
                    return this.peopleFiltered = this.people
                }else{
                   return  this.peopleFiltered =  this.people.filter(person => person.event_id == this.$refs.event.value)
                }
            },

            getEvents(){
                axios.get( "/api/events").then(response => {
                    this.events = response.data.data;
                });
            },
            getPeople(address){
                axios.get( address ? address : "/api/people").then(response => {
                    this.people = response.data.data;
                    this.peopleFiltered = response.data.data;
                    this.prev = response.data.links.prev;
                    this.next = response.data.links.next;

                });
            },

            deletePerson(id){
                axios.delete('/api/people/' + id ).then(response => this.getPeople())
            },
            navigate(address){
                this.getPeople(address)
            }
        }
    }
</script>

<style scoped>

</style>
