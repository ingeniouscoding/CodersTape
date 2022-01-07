<template>
  <div>
    <button :type="type" class="my-button" v-text="test.name">My Button</button>
    <ol>
      <li v-for="(item, index) in arr" :key="index">{{ item }}</li>
    </ol>
  </div>
</template>

<script>
export default {
  props: ["type"],

  data() {
    return {
      test: "",
      arr: [],
    };
  },

  mounted() {
    console.log("Component mounted.");

    for (let i = 0; i < 20; i++) {
      this.arr.push(Math.random());
    }

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