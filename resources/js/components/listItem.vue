<template>
    <div class="item">
        <input type="checkbox" v-model="isChecked" @change="updateCheck()" />
        <!-- <button :class="[item.completed ? 'completed' : '', 'itemDone']" @click="updateCheck()">Done</button> -->
        <span :class="[item.completed ? 'completed' : '', 'itemText']">{{ item['name'] }}</span>
        <!-- <span>Completed Testing: {{ item.completed }} </span> -->
        <button class="deleteItem" @click="deleteCheck()">Delete</button>
    </div>
</template>

<script>
export default{
    props: ['item'],
    data: function(){
        return {
            isChecked: this.item.completed ? true : false
        }
    },
    methods: {
        updateCheck(){
            axios.put('api/item/' + this.item.id, {
                item: this.item
            })
            .then( response => {
                console.log(response)
                if(response.status == 200){
                    this.$emit('itemChanged');
                }
            })
            .catch( error => {
                console.log(error);
            })
        },
        deleteCheck(){
            axios.delete('api/item/' + this.item.id, {
                item: this.item
            })
            .then( response=>{
                if(response.status == 200){
                    this.$emit('itemChanged');
                }
            })
            .catch( error=>{
                console.log(error);
            })
        }
    }
}

</script>

<style scoped>
    .item{
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        margin-top: 10px;
        background-color: #cdcdcd;
    }
    .itemText{
        width: 100%;
        margin-left: 10px;
    }
    .itemDone.completed{
        text-transform: lowercase;
    }
    .itemDone.completed::before{
        content: "Un";
        text-transform: capitalize;
    }
    .itemText.completed{
        text-decoration: line-through;
        color: #999999;
    }
</style>