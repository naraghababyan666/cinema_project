<template>
  <button class="text-regular">
    <template v-if="showText">Удалить</template> <img :src="DeleteIcon" alt="" />
  </button>
</template>

<script>
import DeleteIcon from "@/assets/images/dashboard/cancel.svg";

export default {
  data() {
    return {
      DeleteIcon,
    };
  },
  props: {
    showText: {
      require: false,
      type: Boolean,
      default: true
    }
  }
};
</script>

<style lang="scss" scoped>
button {
  background: transparent;
  color: #27ae60;
  border: 0;
  outline: 0;
  cursor: pointer;
  display: flex;
  align-items: center;
  font-size: 16px;
  &:hover {
    text-decoration: underline;
  }
  img {
    margin-left: 10px;
  }
}
</style>