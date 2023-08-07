<template>
    <div v-for="(item, index) in items" :key="index">
        <list-item
        :item="item"
        class="item"
        v-on:itemChanged="$emit('reloadlist')"
        />
    </div>
</template>

<script>
import listItem from "./listItem.vue"
export default{
    props: ['items'],
    components: {
        listItem
    }
}
</script>