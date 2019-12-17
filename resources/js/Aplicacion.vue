<template>
<div>
    <p>
        <router-link :to="{ name: 'home' }">Home</router-link> |
        <router-link :to="{ name: 'about' }">About Us</router-link>
    </p>
    <div class="row justify-content-start pt-md-4">
        <router-view></router-view>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            // this.read()
        }
    }
</script>
