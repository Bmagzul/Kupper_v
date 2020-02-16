<template>
  <div class="container" style="max-with: 100vh;">
    <h1>Example vue with laravel and jwt</h1>
    <div>
      This project, show a little example of how run jwt from laravel to vuejs
      Is a basic example, please, any question, let it in comments; or send tweet a @kevinmendez3096
      Follow me! 
    </div>
    <br><br>
    {{ this.$store.state.usuario.nombre}}
    <br><br>
    {{ this.$store.state.token ? this.$store.state.token : "Token vacio" }}
  </div>
</template>

<script>
	
	export default {
		created: function() {
			console.log(this.$store.state);
		}

	}
</script>
