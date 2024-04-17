
const container = document.querySelector('.container');
const button = document.getElementById('icon');
const sidebar = document.querySelector('.sidebar');
const backdrop = document.querySelector('.backdrop');

button.addEventListener('click', function () {
    sidebar.classList.add('show')
    container.classList.add('move');
    backdrop.classList.add('show');
})

backdrop.addEventListener('click', function () {
    sidebar.classList.remove('show')
    container.classList.remove('move');
    backdrop.classList.remove('show');
})

//VENTANA POPUP MODAL
const abrirmodal = document.querySelector('.btn-abrirmodal');
const cerrarmodal = document.querySelector('.btn-cerrar');
const modal = document.querySelector('.modal');

abrirmodal.addEventListener('click', ()=>{modal.showModal()});
cerrarmodal.addEventListener('click', ()=>{modal.close()});

//BARRA DE BUSQUEDA
const searchbar = document.querySelector('.searchbar');
const rows = document.querySelectorAll('tbody tr');

searchbar.addEventListener('keyup', searchTable);

function searchTable(){
    rows.forEach((row,i) => {
        let datos = row.textContent.toLowerCase();
        let busqueda = searchbar.value.toLowerCase();

        row.classList.toggle('hide', datos.indexOf(busqueda) < 0);
    })
}


