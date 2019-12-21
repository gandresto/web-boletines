export default {
    colocarBoletines(state, boletines){
        state.boletines = boletines;
    },
    colocarEstadoApi(state, estadoApi){
        state.estadoApi = estadoApi;
    },
    colocarEstadoBoletines(state, estadoBoletine){
        state.estadoBoletines = estadoBoletine;
    },
    colocarEstadoBoletinActual(state, estadoBoletinActual){
        state.estadoBoletinActual = estadoBoletinActual;
    },
    colocarBoletinActual(state, boletin){
        state.boletinActual = boletin;
    },
    colocarCategorias(state, categorias){
        state.categorias = categorias;
},
};
