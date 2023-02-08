<template>
  <router-link
    :to="{ name: href }"
    tag="button"
    v-if="href"
    :disabled="disabled"
    :class="[{ 'w-100': fluid }, className]"
    class="btn text-white text-semi-bold"
    >{{ text }}</router-link
  >
</template>

<script>
export default {
  name: "LinkBtn",
  props: {
    text: {
      required: true,
      type: String,
    },
    fluid: {
      type: Boolean,
      required: false,
    },
    disabled: {
      required: false,
      type: Boolean,
    },
    href: {
      required: false,
      type: String,
    },
    className: {
      required: false,
      type: String,
    },
  },
};
</script>

<style lang="scss" scoped>
.btn {
  font-size: 16px;
  text-decoration: none;
  padding: 13px 92px;
  background: #27ae60;
  border-radius: 10px;
  transition: 0.1s;
  border: 0;
  outline: 0;
  &:hover {
    background: #279e48;
  }
  &:disabled,
  &[disabled] {
    background: #7fa48e;
  }
}
.w-100 {
  width: 100%;
}

@media screen and (max-width: 500px) {
  .btn {
    padding: 6px 30px;
    font-size: 14px;
  }
}
</style>