var sidebarBol = true;

function sideBarSwitch() {
	if (sidebarBol==true) {
		sidebarBol=false;
		closeSideBar();
	}

	else if (sidebarBol==false) {
		sidebarBol=true;
		openSideBar();
	}
} 

function openSideBar() {
	console.log('Abrindo sidebar');
	var sidebar = document.querySelector("#sidebar-wrapper");
	var sidebarName = document.querySelector("#sidebar-heading-name");
	var sidebarTitle = document.querySelector("#sidebar-heading-title");
	var sidebarList = document.getElementsByClassName("list-group");
	sidebar.style.width = "300px";
	sidebarName.style.display = "block";
	sidebarTitle.style.display = "block";
	sidebarList[0].style.display = "block";
}

function closeSideBar() {
	console.log('Fechando sidebar');
	var sidebar = document.querySelector("#sidebar-wrapper");
	var sidebarName = document.querySelector("#sidebar-heading-name");
	var sidebarTitle = document.querySelector("#sidebar-heading-title");
	var sidebarList = document.getElementsByClassName("list-group");
	sidebar.style.width = "50px";
	sidebarName.style.display = "none";
	sidebarTitle.style.display = "none";
	sidebarList[0].style.display = "none";
}

function agendarLaboratorio() {
    alert('Opção escolhida: Agendar Laboratório');
}

function agendarDatashow() {
    alert('Opção escolhida: Agendar Datashow');
}

function cadastrarRecurso() {
    alert('Opção escolhida: Cadastro de Recursos');
}

function sair() {
    window.location.href = "/logout.php";
}

async function menuSelecionado(){

    var url = window.location.href;
    var urlPartes = url.split("/");
    var paginaAtual = urlPartes[urlPartes.length-1].replace(".php","").replace("#","");

    console.log(paginaAtual);

    var linkSelecionado = await document.getElementById(paginaAtual);

    if (linkSelecionado) {
        linkSelecionado.classList.add('selecionado');
    } else {
        console.log("Elemento com ID não encontrado: " + paginaAtual);
    }

 }
 document.addEventListener('DOMContentLoaded', function() {
    menuSelecionado();
	document.getElementById('data_hora').addEventListener('change', function(e) {
		var input = e.target;
		var dataHora = new Date(input.value);
		var hora = dataHora.getHours();
	
		if (hora < 7 || hora > 22) {
			alert('Por favor, selecione um horário entre 07:00 e 22:00.');
			input.value = '';
		}
	});
function roundToNearest30Minutes(date) {
    var minutes = date.getMinutes();
    var roundedMinutes = Math.round(minutes / 30) * 30;
    date.setMinutes(roundedMinutes);
    return date;
}

document.addEventListener('DOMContentLoaded', function() {
    var dataHoraInput = document.getElementById('data_hora');

    if (dataHoraInput) {
        dataHoraInput.addEventListener('input', function() {
            let selectedTime = new Date(this.value);
            let timezoneOffset = selectedTime.getTimezoneOffset();
            selectedTime = roundToNearest30Minutes(selectedTime);

            selectedTime.setMinutes(selectedTime.getMinutes() + timezoneOffset);

            this.value = selectedTime.toISOString().slice(0, -8);
        });
    }
});
});
