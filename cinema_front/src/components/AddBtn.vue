<template>
  <button @click.prevent :disabled="disabled" class="addBtn text-white text-semi-bold p-sm">
    {{ text }}
    <span><img :src="PlusIcon" alt="" /></span>
  </button>
</template>

<script>
import PlusIcon from "@/assets/images/common/plus.svg";

export default {
  name: "AddBtn",
  data() {
    return {
      PlusIcon,
    };
  },
  props: {
    text: {
      required: true,
      type: String,
    },
    disabled: {
      required: false,
      type: Boolean
    }
  },
};
</script>

<style lang="scss" scoped>
.addBtn {
  display: flex;
  align-items: center;
  cursor: pointer;
  border: 0;
  border-radius: 0;
  background: transparent;
  outline: 0;
  &:hover {
    text-decoration: underline;
    span {
      background: #d8004e;
    }
  }
  span {
    margin-left: 10px;
    background: #333333;
    padding: 6px 8px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.31);
    display: flex;
    align-items: center;
    transition: 0.2s;
  }
}

@media screen and (max-width: 834px) {
  .addBtn span {
    background: #d8004e;
  }
}
@media screen and (max-width: 480px) {
  .addBtn {
    font-size: 14px;
  }
}
</style>