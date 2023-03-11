<template>
  <div class="pt-16 pl-96">
    <p>{{count}}</p>
    <p>2倍{{doubleCount}}</p>
    <p>3倍{{tripleCount}}</p>
    <button @click="increment(2)">+2</button>
    <button @click="decrement(2)">-2</button>
    <div ref="btn" v-html="content"></div>
  </div>
</template>

<script> 
import { onMounted, computed,  } from 'vue';
import { useStore } from 'vuex';
export default {
  name: 'LoginFromPage',
  setup() {
    const store = useStore();
    const content = `<button class="js-btn" value="12334">クリック</button>aaaa<button class="js-btn" value="56789">クリック</button>`;

    const increment = (number) => {
      store.dispatch('increment', number);
    };
    const decrement = (number) => {
      store.dispatch('decrement', number);
    };

    const count = computed(() => {
      return store.state.count;
    });

    const doubleCount = computed(() => {
      return store.getters.doubleCount;
    });
    const tripleCount = computed(() => {
      return store.getters.tripleCount;
    });
    const click = (chatMessageId) => {
      console.log(chatMessageId);
    }
    onMounted (() => {
      const element = document.getElementsByClassName("js-btn");
      
      for (let i = 0; i < element.length; i++) {
        element[i].addEventListener("click", event => {
          click(event.target.value);
        })
      };
    });
    return {
      content,
      increment,
      decrement,
      count,
      doubleCount,
      tripleCount,
    }
  }
}
</script>
