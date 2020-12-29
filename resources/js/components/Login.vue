<template>
  <div>
      <form v-if="!authenticated" action="#" @submit.prevent="submit">
        <div class="field-container">
          <label for="email">Email address</label>
          <input type="text" name="email" id="email" v-model="credentials.email">
        </div>
        <div class="field-container">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" v-model="credentials.password">
        </div>
        <div class="field-container">
          <button type="submit">
            Sign in
          </button>
        </div>
      </form>
      <span style="font-size:20px;" v-else>
        user: {{ user.name }} has been authenticated!
        <a @click.prevent="logout" href="#">Log out</a>
      </span>
  </div>
</template>

<script>
import axios from 'axios'
import { computed, ref } from 'vue'
import { useStore } from 'vuex'
export default {
  name: "Login",
  setup(){
    const store = useStore()

    const credentials = ref({
      email: null,
      password: null
    })

    const user = computed(() => store.getters['auth/user']);
    const authenticated = computed(() => store.getters['auth/authenticated']);

    const submit = async() => {
      await store.dispatch('auth/login', credentials.value)
    }

    const logout = async() => {
      user ? await store.dispatch('auth/logout', {userId: user.value.id}) : 'No user is logged in'
    }

    return{

      authenticated,
      user,
      credentials,
      submit,
      logout
    }
  }
}

</script>

<style>
.field-container{
    display: flex;
    flex-direction: column;
}
</style>