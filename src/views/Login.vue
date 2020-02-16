<template>
    <div class="home">
        <div class="wrapper fadeInDown">
            <div id="formContent">

            <!-- Login Form -->
            <form v-on:submit.prevent="ingresar">
                <input
                    type="text"
                    name="login"
                    placeholder="login"
                    v-model="formData.usuario"
                ><br><br>
                <input
                    type="password"
                    name="login"
                    placeholder="password"
                    v-model="formData.password"
                ><br><br>
                <input type="submit" value="Log In">
            </form>
            </div>
        </div>
    </div>
</template>

<script>
    
    export default {
        data() {
            return {
                formData: {
                    usuario: "bmagzul",
                    password: "bryam/1312."
                }
            }
        },

        methods: {
            ingresar: function() {
                const self = this;

                this.$http.post(
                    'sesion/iniciar',
                    this.formData
                )
                .then(response => {
                    let res = response.data;
                    self.Notificar("Login", res.mensaje, res.exito)
                    if (res.exito) {
                        self.$store.commit('setUsuario', res.usuario)
                        self.$store.commit('setToken', res.userToken)
                    }
                })
                .catch(error => {
                    console.log(error);
                });
                    

            },

            salir: function() {

            },
        }

    }
</script>