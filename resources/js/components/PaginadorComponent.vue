<template>
<nav aria-label="Navegación">
    <ul class="pagination">
        <li :class="links.prev ? 'page-item': 'page-item disabled'">
            <a class="page-link"
                @click.prevent="leerPrimero()"
                href="#"
                aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Primero</span>
            </a>
        </li>
        <li :class="links.prev ? 'page-item': 'page-item disabled'">
            <a class="page-link"
                @click.prevent="leerAnterior()"
                :tabindex="links.prev ? '-1': ''"
                href="#">
                Anterior
            </a>
        </li>
        <template v-for="n in listaPaginas">
            <li :class="n == meta.current_page ? 'page-item active' : 'page-item'"
                :key="n">
                <a class="page-link"
                    href="#"
                    @click.prevent="leerPagina(n)">
                    {{n}}
                </a>
            </li>
        </template>
        <li :class="links.next ? 'page-item': 'page-item disabled'">
            <a class="page-link"
                @click.prevent="leerSiguiente()"
                :tabindex="links.next  ? '-1': ''"
                href="#">
                Siguiente
            </a>
        </li>
        <li :class="links.next ? 'page-item': 'page-item disabled'">
            <a class="page-link"
                href="#"
                @click.prevent="leerUltimo()"
                aria-label="Último">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Última</span>
            </a>
        </li>
    </ul>
</nav>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import api from '../services/api'
    export default {
        mounted() {
            console.log('Paginador montado.');
        },
        methods: {
            leerSiguiente(){
                this.leerBoletinesDeURI(this.links.next);
            },
            leerAnterior(){
                this.leerBoletinesDeURI(this.links.prev);
            },
            leerPrimero(){
                this.leerBoletinesDeURI(this.links.first);
            },
            leerUltimo(){
                this.leerBoletinesDeURI(this.links.last);
            },
            leerPagina(pag){
                let uri = `${api.baseURL}boletines?page=${pag}`;
                this.leerBoletinesDeURI(uri);
            },
            ...mapActions([
                'leerBoletinesDeURI',
                'leerBoletinesPorPagina',
            ]),
        },
        computed: {
            listaPaginas(){
                let centro = this.meta.current_page;
                let ultima = this.meta.last_page;
                let lista_paginas = [];
                let cuenta = 0;
                for (let i = centro-2; i <= ultima; i++) {
                    if(i < 1) continue;
                    lista_paginas.push(i);
                    cuenta++;
                    if(cuenta == 5) break;
                }
                return lista_paginas;
            },
            ...mapGetters([
                'links',
                'meta',
            ]),
        },
        created() {
            // console.log(this.links);
            // console.log(this.meta);
        },
    }
</script>
