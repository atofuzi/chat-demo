<template>
  <div class="pt-16 pl-96">
    <p>{{count}}</p>
    <p>2倍{{doubleCount}}</p>
    <p>3倍{{tripleCount}}</p>
    <button @click="increment(2)">+2</button>
    <button @click="decrement(2)">-2</button>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  name: 'LoginFromPage',
  computed: {
    ...mapGetters([ "doubleCount", "tripleCount" ]),
    count() {
      return this.$store.state.count;
    },
  },
  // {
  //   count() {
  //     return this.$store.state.count;
  //   },
  //   // doubleCount() {
  //   //   return this.$store.getters.doubleCount;
  //   // },
  //   // tripleCount() {
  //   //   return this.$store.getters.tripleCount;
  //   // },
  // },
  methods: {
    increment(number) {
      // this.$store.commit('increment', 2);
      this.$store.dispatch('increment', number);
    },
    decrement(number) {
      this.$store.dispatch('decrement', number);
    },
  }
}
</script>
