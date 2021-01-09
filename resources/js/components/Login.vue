<template>
  <div class="form-container">
      <form class="login-form" v-if="!authenticated" action="#" @submit.prevent="submit">
        <div class="field-container">
          <input type="text" placeholder="email" name="email" id="email" v-model="credentials.email">
        </div>
        <div class="field-container">
          <input type="password" placeholder="password" name="password" id="password" v-model="credentials.password">
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
import { computed, ref, onBeforeMount } from 'vue'
import { useStore } from 'vuex'
import { getToken} from "../utils"

export default {
  name: "Login",
  setup(){
    const store = useStore()

    const credentials = ref({
      email: null,
      password: null
    })

    onBeforeMount( async () => {
      // auto login if token present is localStorage - by utils.getToken()
      let token = getToken();
      if(token) await store.dispatch('auth/me', token)
    })

    const user = computed(() => store.getters['auth/user']);
    const authenticated = computed(() => store.getters['auth/authenticated']);

    const submit = async() => {
      await store.dispatch('auth/login', credentials.value)
    }

    const logout = async() => {
      if(user) await store.dispatch('auth/logout', {userId: user.value.id}) 
    }

    return{
      credentials,
      user,
      authenticated,
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
    padding: 0.5rem;
}

/* .field-container:not(:first-child){
  margin-bottom: 1rem;
} */

.field-container > input {
  font-size: 1.8rem;
  height: 3rem;
  padding: 0.4rem;
}

.field-container > button {
  font-size: 1.8rem;
  background-color: white;
  border: 1px solid black;
  height: 4rem;
}

.form-container{
  height: 100%;
  margin-top: 2rem;
}

.login-form{
  display: flex;
  flex-direction: column;
  height: 100%;
}

</style>