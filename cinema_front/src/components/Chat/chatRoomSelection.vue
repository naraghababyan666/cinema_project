<template>
  <div class="grid grid-cols-2 ">
      <div class="font-bold text-xl ">
        {{selected.name}} Chat
      </div>
    <div>
      <select v-model="selected"
              @change="$emit('roomchanged', selected)"
              class="float-right">
        <option v-for="(room, id) in rooms" :key="id" :value="room"
                >{{ room.name }}</option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  name: "chatRoomSelection",
  props: ['rooms', 'currentRoom'],
  data(){
    return {
      selected: '',
    }
  },
  created() {
    this.selected = this.currentRoom
  },
}
</script>

<style scoped>

</style>