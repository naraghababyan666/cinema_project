<template>
  <button @click="$emit('onEdit')" :class="{'margin': !showText}" class="text-regular">
    <template v-if="showText">Изменить</template>
    <img :src="EditIcon" alt="Изменить" />
  </button>
</template>

<script>
import EditIcon from "@/assets/images/dashboard/edit.svg";
export default {
  data() {
    return {
      EditIcon,
    };
  },
  props: {
    showText: {
      type: Boolean,
      required: false,
      default: true,
    },
  },
};
</script>

<style lang="scss" scoped>
.margin {
    margin-right: -25px;
}
button {
  display: flex;
  align-items: center;
  background: transparent;
  font-size: 16px;
  color: #27ae60;
  border: 0;
  outline: 0;
  cursor: pointer;
  &:hover {
    text-decoration: underline;
  }
  img {
    margin-left: 10px;
  }
}
</style>