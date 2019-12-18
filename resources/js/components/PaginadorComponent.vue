<template>
<nav aria-label="Navegación">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Primero</span>
            </a>
        </li>
        <li :class="links.prev ? 'page-item': 'page-item disabled'">
            <a class="page-link"
                @click.prevent="leerBoletinesDeURI(links.prev)"
                :tabindex="hayAnterior ? '-1': ''"
                href="#">
                Anterior
            </a>
        </li>
        <template v-for="n in meta.last_page">
            <li :class="n == meta.current_page ? 'page-item active' : 'page-item'"
                :key="n">
                <a class="page-link" href="#">
                    {{n}}
                </a>
            </li>
        </template>
        <li :class="links.next ? 'page-item': 'page-item disabled'">
            <a class="page-link"
                @click.prevent="leerBoletinesDeURI(links.next)"
                :tabindex="haySiguiente  ? '-1': ''"
                href="#">
                Siguiente
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Último">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Última</span>
            </a>
        </li>
    </ul>
</nav>
</template>

<script>
    import { mapActions } from 'vuex'
    import { mapState } from 'vuex'

    export default {
        data() {
            return {

            }
        },
        mounted() {
            console.log('Paginador montado.')
        },
        methods: {
            ...mapActions([
                'leerBoletinesDeURI'
            ]),
        },
        computed: {
            ...mapState({
                links: state => state.boletines.links,
                meta: state => state.boletines.meta,
            }),
            siguiente(){
                return this.meta.current_page + 1;
            },
            anterior(){
                return this.meta.current_page - 1;
            },
            haySiguiente(){
                return this.meta.current_page < this.meta.last_page;
            },
            hayAnterior(){
                return this.meta.current_page > 1;
            },
        },
    }
</script>
