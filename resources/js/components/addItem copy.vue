<template>
    <div class="addItem">
        <input type="text" name="addTask" id="addTask" v-model="item.name">
        <button type="submit" @click="addItem()" :class="[ item.name ? 'active' : 'inactive', 'addButton' ]"
        >Add</button>
    </div>
</template>

<script>
export default{
    data: function(){
        return {
            item: {
                name: ""
            }
        }
    },
    methods: {
        addItem() {
            if(this.item.name == ''){
                return;
            }
            axios.post(/api/item, {
                name: this.item
            })
            .then(response =>{
                if(response.status == 201){
                    this.item.name == "";
                }
            })
            .catch(error =>{
                console.log(error);
            })
        }
    }
}

</script>

<style>
.addItem{
    display: block;
}
#addTask{
    display: inline-block;
}
.addButton{
    border-color: #888888;
}
.active{
    background-color: rgb(71, 189, 71);
    border-color: rgb(55, 146, 55);
}
.inactive{
    background-color: #999999;
    pointer-events: none;
}
</style>