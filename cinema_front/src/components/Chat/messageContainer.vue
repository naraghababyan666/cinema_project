<template>
  <div class="h-96 w-full">
    <div class="h-full p-2 flex flex-col-reverse overflow-scroll">
      <div v-for="(message, idx) in messages" :key="idx">
          <message-item :message="message"/>
      </div>
    </div>
  </div>
</template>

<script>
import MessageItem from "./MessageItem";
export default {
  name: "messageContainer",
  components: {MessageItem},
  props: ['messages'],
}
</script>

<style scoped>

</style>