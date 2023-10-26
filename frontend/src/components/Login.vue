<template>
  <body>
    <div class="limiter">
        <div class="container-login100 bg-image">
        <div class="wrap-login100">
          <form class="login100-form validate-form" @submit.prevent="submitLogin">
            <span class="login100-form-logo">
              <i class="zmdi title-login">ERP</i>
            </span>

            <span class="login100-form-title p-b-34 p-t-27">
              <img  src="/src/assets/images/riologo.svg" 
                    alt="" 
                    style="width: 50%;">
            </span>

            <div  :class="isError ?'wrap-input100-red':'wrap-input100 validate-input'"
                  data-validate="Enter username">
              <input  class="input100" 
                      type="text" 
                      name="email" 
                      placeholder="Email" 
                      v-model="email">
              <span class="focus-input100" 
                    data-placeholder="&#xf207;">
              </span>
            </div>

            <div  :class="isError ?'wrap-input100-red':'validate-input'"
                  data-validate="Enter password">
              <input  class="input100" 
                      type="password" 
                      name="password" 
                      placeholder="Mot de passe" 
                      v-model="password">
              <span class="focus-input100" 
                    data-placeholder="&#xf191;">
              </span>
              
            </div>

            <div class="contact100-form-checkbox">
              <input  class="input-checkbox100" 
                      id="ckb1" 
                      type="checkbox" 
                      name="remember-me">
              <label class="label-checkbox100" for="ckb1">
                Se souvenir de moi
              </label>
            </div>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn" 
                      name="login" 
                      type="submit" 
                      ng-click="actionLogin(login)">
                Se connecter
              </button>
            </div>

            <div class="text-center p-t-45">
              <a class="txt1" href="#">
                Mot de passe oublier ?
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  name: 'LoginForm',
  data: function () {
    return {
      email:'',
      password:'',
      isError: false
    };
  },
  methods: {
    submitLogin () {
      this.$api.loginApi.checkUser(this.email, this.password)
        .then((data) => {
          this.$router.push('home');
        }).catch((error) => {
          this.isError = true;
          this.hideErrorInputInFewSecond();
        });
    },
    hideErrorInputInFewSecond () {
      setTimeout(() => { 
            this.isError = false;
      }, 3000);
    }
  }
});

</script>

<style>

.bg-image {
  background-image: url('/src/assets/images/bg-erp.png');
}

.title-login {
  font-size: 40px;color: #c4c4cf; /* #a6a6bb; */
}

.wrap-input100-red {
    border-bottom: 2px solid red !important;
}

</style>
