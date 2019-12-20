<template>
<div>
    <!-- Barra de Navegación -->
    <b-navbar toggleable="lg" type="dark" variant="dark">
        <b-navbar-brand to="/">Web Boletines</b-navbar-brand>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item to="boletines">Boletines</b-nav-item>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
    <!-- Contenido -->
    <router-view></router-view>
    <modal-boletin-component></modal-boletin-component>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Componente principal montado.')
        }
    }
</script>
