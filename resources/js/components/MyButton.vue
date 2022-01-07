<template>
  <div>
    <button :type="type" class="my-button" v-text="test.name">My Button</button>
  </div>
</template>

<script>
export default {
  props: ["type"],

  data() {
    return {
      test: "",
    };
  },

  mounted() {
    console.log("Component mounted.");

    axios.post("api/vue", {}).then((res) => {
      this.test = res.data;
    });
  },
};
</script>

<style>
.my-button {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
}
</style>