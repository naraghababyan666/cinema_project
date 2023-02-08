<template>
  <button
    :disabled="disabled"
    :class="[{ 'w-100': fluid }, className, {centered: center}]"
    class="btn text-white text-semi-bold"
  >
    {{ text }}
  </button>
</template>

<script>
export default {
  name: "Btn",
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
    className: {
      required: false,
      type: String,
    },
    center: {
      required: false,
      type: Boolean
    }
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
.centered {
  display: flex;
  // place-self: center;
  margin: 0 auto;

}

@media screen and (max-width: 500px) {
  .btn {
    padding: 6px 30px;
    font-size: 14px;
  }
}
</style>