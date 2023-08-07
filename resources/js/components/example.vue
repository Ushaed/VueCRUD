<template>
    <div class="main">
        <div class="heading">
            <h1 class="title">Hello!! Daily TODO</h1>
            <add-item 
            v-on:reloadlist="getItems()"
            />
        </div>
        <list-view 
            :items="items"
            v-on:reloadlist = "getItems()"
        />
    </div>
</template>

<script>
import addItem from "./addItem.vue"
import listView from "./listView.vue"

export default{
    components: {
        addItem,
        listView
    },
    data: function(){
        return {
            items: []
        }
    },
    methods: {
        getItems(){
            axios.get('api/items')
            .then( response => {
                this.items = response.data;
            })
            .catch( error => {
                console.log(error); 
            })
        }
    }, 
    created(){
        this.getItems();
    }
}
</script>

<style scoped>
.main{
    width: 400px;
    margin: 0 auto;
    background-color: #999999;
    padding: 40px;
}
.heading{
    text-align: center;
    padding-bottom: 50px;
    border-bottom: 1px dashed #f7f7f7;
}
</style>