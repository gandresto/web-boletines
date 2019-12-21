export default {
    categorias: state=> state.categorias,
    boletines: state => state.boletines.data,
    links: state => state.boletines.links,
    meta: state => state.boletines.meta,
    boletinActual: state => state.boletinActual.data,
    estadoApi: state => state.estadoApi,
    estadoBoletines: state => state.estadoBoletines,
    estadoBoletinActual: state => state.estadoBoletinActual,
}
