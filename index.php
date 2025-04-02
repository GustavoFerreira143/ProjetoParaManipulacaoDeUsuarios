<?php

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="./src/assets/Logo.png" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="./index.css" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Site de Cadastro de User</title>
</head>

<body>
<!--                                                                                     Modal Editar                                                             -->
<div id="CaixaDeEdicao" class="d-none">
        <div class="caixaCentro">
            <div class="container">
                <div class="row" id="Editar">
                    <div class="col-md-12">
                        <p class="mt-3 text-dark text-center" id="EditaDados">Edição de Dados do Corretor</p>
                        <p class="text-center" id="IdCorretor"></p>
                    </div>

                    <div class="col-md-6">
                            <span class="mt-2 text-dark ">CPF:</span>
                            <input class="editInput text-dark" id="CPFEdit" type="text" placeholder="Digite Seu CPF" minlength="2" maxlength="11">
                    </div>
                    <div class="col-md-6">
                            <span class="mt-2 text-dark " > Creci:</span>
                            <input class="editInput text-dark" id="CreciEdit" type="text" placeholder="Digite Seu Creci" minlength="2">
                    </div>
                    <div class="col-md-12">
                            <span class="mt-2 text-dark" >Nome:</span>
                            <input class="editInput text-dark" id="NomeEdit" type="text" placeholder="Digite Seu Nome" minlength="2">
                    </div>
                    <div class="col-md-6 mt-2">
                        <button class="botaoModalEditar" onclick="ConfirmaEdicao()">Envia</button>
                    </div>
                    <div class="col-md-6 mt-2" >
                        <button class="botaoModalEditar" onclick="CancelaEdicao()">Cancelar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!--                                                                                     Modal Alerta                                                             -->
    <div id="CaixaDeAlerta" class="d-none">
        <div class="caixaCentro">
            <div class="container">
                <div class="row" id="Alertas">
                    <div class="col-md-12">
                        <p class="mt-3 text-danger text-center">ERRO</p>
                    </div>
                    <div class="col-md-12">
                        <div class="texto d-flex justify-content-center">
                            <p class="mt-3 text-danger align-self-center" id="TipoErro"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="botao" onclick="FechaModal()">Retornar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!--                                                                                     Modal Deleta User                                                             -->
    <div id="DeletaUser" class="d-none">
        <div class="caixaCentro">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="Titulo">
                        <p class="mt-3 text-warning text-center ">Confirmar deleção?</p>
                    </div>
                    <div class="col-md-12 ">
                        <div class="userDados">
                            <p class="mt-2 text-danger text-center" id="Usuario"></p>
                            <span class="mt-5 mr-3 text-danger text-center" id="IDUsuario"></span>
                            <span class="mt-5 ml-3 text-danger text-center" id="NomeUsuario"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="botaoModalDeletar" onclick="ConfirmaDelecao(event)">Sim</button>
                    </div>
                    <div class="col-md-6">
                        <button class="botaoModalDeletar" onclick="CancelaDelecao()">Não</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!--                                                                                     Inicio Pagina                                                             -->

    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-start ml-5">Pagina para Cadastro de Corretor</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container" id="Conteudo">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Cadastro de Corretor</h2>
            </div>
            <div class="col-md-5">
                <p class="ml-1 text-dark">
                    Digite seu CPF
                </p>
                <input class="input" id="CPF" type="text" placeholder="Digite Seu CPF" minlength="11" maxlength="11">
            </div>
            <div class="col-md-7">
                <p class="ml-1 text-dark">
                    Digite seu Creci
                </p>
                <input class="input" id="Creci" type="text" placeholder="Digite Seu Creci" minlength="2">
            </div>
            <div class="col-md-12">
                <p class="ml-1 mt-3 text-dark">
                    Digite seu Nome
                </p>
                <input class="input text-dark" id="Nome" type="text" placeholder="Digite Seu Nome" minlength="2">
            </div>
            <div class="col-md-12">
                <button class="botao" onclick="EnviaCadastro()">Enviar</button>
            </div>
            <div class="col-md-12" id="Tabela">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" id="Valores">
                                <div class="col-md-1">
                                    <p>ID</p>
                                    <hr>
                                </div>
                                <div class="col-md-5 borda">
                                    <p>Nome</p>
                                    <hr>
                                </div>
                                <div class="col-md-2 borda">
                                    <p>CPF</p>
                                    <hr>
                                </div>
                                <div class="col-md-2 borda">
                                    <p>Creci</p>
                                    <hr>
                                </div>
                                <div class="col-md-2 borda">
                                    <p>Configurações</p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row" id="RecebeValores">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center pt-2">Desenvolvido por Gustavo Ferreira de Olveira Coelho</h4>
                </div>
            </div>

        </div>

    </footer>
    <script>
        async function EnviaCadastro() {

            let cpf = document.getElementById("CPF").value;
            let nome = document.getElementById("Nome").value;
            let creci = document.getElementById("Creci").value;

            cpf = cpf.trim();
            nome = nome.trim();
            creci = creci.trim();

            if (cpf.length < 11) {
                document.getElementById("CaixaDeAlerta").className = "show";
                document.getElementById("TipoErro").innerText = "CPF Inválido Digitado";
                return;
            }
            if (nome.length < 2) {
                document.getElementById("CaixaDeAlerta").className = "show";
                document.getElementById("TipoErro").innerText = "NOME Inválido Digitado";
                return;
            }
            if (creci.length < 2) {
                document.getElementById("CaixaDeAlerta").className = "show";
                document.getElementById("TipoErro").innerText = "CRECI Inválido Digitado";
                return;
            }
            if (!/^\d+$/.test(cpf)) {
                document.getElementById("CaixaDeAlerta").className = "show";
                document.getElementById("TipoErro").innerText = "CPF Deve Conter Somente Numeros";
                return;
            }

            try {
                const result = await fetch("recebeDados.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        Nome: nome,
                        CPF: cpf,
                        Creci: creci
                    })
                })
                const resposta = await result.json();
                if (result.ok) {
                    document.getElementById("RecebeValores").innerHTML = "";
                    resposta.usuarios.forEach((Valores) => {

                        document.getElementById("RecebeValores").innerHTML += `
                    <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1" id="id">
                                    <p>${Valores.id}</p>
                                      <hr>
                                </div>
                                <div class="col-md-5 borda" id="Nome">
                                    <p>${Valores.nome} </p>
                                      <hr>
                                </div>
                                <div class="col-md-2 borda" id="Cpf">
                                    <p>${Valores.cpf} </p>
                                      <hr>
                                </div>
                                <div class="col-md-2 borda" id="Creci">
                                    <p>${Valores.Creci}</p>
                                    <hr>
                                </div>
                                <div class="col-md-2 borda">

                                    <div class="d-flex ">
                                        <button class="botaoDelete" onClick="DeletaValor(event)" ><img src="./img/trash-fill.svg" /></button>
                                        <button class="botaoEditar" onClick="EditarValor(event)" ><img src="./img/pencil.svg"  /></button>
                                    </div>
                                <hr>
                                </div>
                            </div>
                        </div>
                `
                    })

                } else {
                    document.getElementById("CaixaDeAlerta").className = "show";
                    document.getElementById("TipoErro").innerText = resposta.mensagem;
                    return;
                }

            } catch (ex) {
                console.log("Erro");
            }

        }

        function FechaModal() {
            document.getElementById("CaixaDeAlerta").className = "hide";
            setTimeout(() => {
                document.getElementById("CaixaDeAlerta").className = "d-none";
            }, 400)

        }
        async function CarregaPagina() {
            try {
                const result = await fetch("recebeDados.php", {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                const resposta = await result.json();

                if (result.ok) {
                    resposta.usuarios.forEach((Valores) => {
                        document.getElementById("RecebeValores").innerHTML += `
                    <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1" id="id">
                                    <p>${Valores.id}</p>
                                      <hr>
                                </div>
                                <div class="col-md-5 borda" id="Nome">
                                    <p>${Valores.nome} </p>
                                      <hr>
                                </div>
                                <div class="col-md-2 borda" id="Cpf">
                                    <p>${Valores.cpf} </p>
                                      <hr>
                                </div>
                                <div class="col-md-2 borda" id="Creci">
                                    <p>${Valores.Creci}</p>
                                    <hr>
                                </div>
                                <div class="col-md-2 borda">

                                    <div class="d-flex ">
                                        <button class="botaoDelete" onClick="DeletaValor(event)"><img src="./img/trash-fill.svg" /></button>
                                        <button class="botaoEditar"  onClick="EditarValor(event)"><img src="./img/pencil.svg" /></button>
                                    </div>
                                <hr>
                                </div>
                            </div>
                        </div>
                `
                    })
                } else {
                    document.getElementById("CaixaDeAlerta").className = "show";
                    document.getElementById("TipoErro").innerText = resposta.mensagem;
                    return;
                }
            } catch (ex) {
                document.getElementById("CaixaDeAlerta").className = "show";
                document.getElementById("TipoErro").innerText = "Erro Interno tente Novamente"
                return;
            }
        }
        CarregaPagina();
        //----------------------------------------------------------------------------Deleta valores-----------------------------------------------------
        function DeletaValor(event) {
            let tagAtual = event.target;
            let tagPai = tagAtual.parentElement;
            tagPai = tagPai.parentElement;
            tagPai = tagPai.parentElement;
            tagPai = tagPai.parentElement;
            let nomeElemento = tagPai.querySelector("#Nome");
            let idElemento = tagPai.querySelector("#id");
            nomeElemento = nomeElemento.querySelector("p").innerText;
            idElemento = idElemento.querySelector("p").innerText;
            document.getElementById("Usuario").innerText = `Usuário`;
            document.getElementById("IDUsuario").innerText = `ID: ${idElemento}`
            document.getElementById("NomeUsuario").innerText = ` Nome: ${nomeElemento}`
            document.getElementById("DeletaUser").className = "show";
        }

        function CancelaDelecao() {
            document.getElementById("DeletaUser").className = "hide";
            setTimeout(() => {
                document.getElementById("DeletaUser").className = "d-none";
            }, 400)
        }
        async function ConfirmaDelecao(event) {
            let tagAtual = event.target;
            let tagPai = tagAtual.parentElement;
            tagPai = tagPai.parentElement;
            let Iduser = tagPai.querySelector("#IDUsuario").innerText;
            Iduser = Iduser.replace("ID: ", "");

            try {
                const result = await fetch("excluir.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        Id: Iduser
                    })
                })
                const resposta = await result.json();
                if (result.ok) {
                    document.getElementById("DeletaUser").className = "hide";
                    setTimeout(() => {
                        document.getElementById("DeletaUser").className = "d-none";
                    }, 400)
                    document.getElementById("RecebeValores").innerHTML = "";

                    resposta.usuarios.forEach((Valores) => {
                        document.getElementById("RecebeValores").innerHTML += `

                    <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1" id="id">
                                    <p>${Valores.id}</p>
                                      <hr>
                                </div>
                                <div class="col-md-5 borda" id="Nome">
                                    <p>${Valores.nome} </p>
                                      <hr>
                                </div>
                                <div class="col-md-2 borda" id="Cpf">
                                    <p>${Valores.cpf} </p>
                                      <hr>
                                </div>
                                <div class="col-md-2 borda" id="Creci">
                                    <p>${Valores.Creci}</p>
                                    <hr>
                                </div>
                                <div class="col-md-2 borda">

                                    <div class="d-flex ">
                                        <button class="botaoDelete" onClick="DeletaValor(event)"><img src="./img/trash-fill.svg" /></button>
                                        <button class="botaoEditar"  onClick="EditarValor(event)"><img src="./img/pencil.svg" /></button>
                                    </div>
                                <hr>
                                </div>
                            </div>
                        </div>
                `
                    })
                } else {
                    document.getElementById("CaixaDeAlerta").className = "show";
                    document.getElementById("TipoErro").innerText = resposta.mensagem;
                    return;
                }
            } catch (ex) {
                console.log("Erro");
            }

        }

//------------------------------------------------------------------------------------------Editar Valores dos Usuarios--------------------------------------------------------------


        function EditarValor(event)
        {
            let tagAtual = event.target;
            let tagPai = tagAtual.parentElement;
            tagPai = tagPai.parentElement;
            tagPai = tagPai.parentElement;
            tagPai = tagPai.parentElement;
            console.log(tagPai)

            let nomeElemento = tagPai.querySelector("#Nome");
            let idElemento = tagPai.querySelector("#id");
            let creciElemento = tagPai.querySelector("#Creci");
            let cpfElemento = tagPai.querySelector("#Cpf");
            nomeElemento = nomeElemento.querySelector("p").innerText;
            idElemento = idElemento.querySelector("p").innerText;
            creciElemento = creciElemento.querySelector("p").innerText;
            cpfElemento = cpfElemento.querySelector("p").innerText;

            document.getElementById("CPFEdit").value = `${cpfElemento}`;
            document.getElementById("CreciEdit").value = `${creciElemento}`
            document.getElementById("NomeEdit").value = `${nomeElemento}`
            document.getElementById("IdCorretor").innerText = `Num: ${idElemento}` 

            document.getElementById("CaixaDeEdicao").className = "show";
            
        }
        async function ConfirmaEdicao()
        {
            let cpf = document.getElementById("CPFEdit").value;
            let nome = document.getElementById("NomeEdit").value;
            let creci = document.getElementById("CreciEdit").value;
            let Id = document.getElementById("IdCorretor").innerText;
            Id = Id.replace("Num: ",""); 
            cpf = cpf.trim();
            nome = nome.trim();
            creci = creci.trim();


            if (cpf.length < 11) {
                document.getElementById("CaixaDeAlerta").className = "show";
                document.getElementById("TipoErro").innerText = "CPF Inválido Digitado";
                return;
            }
            if (nome.length < 2) {
                document.getElementById("CaixaDeAlerta").className = "show";
                document.getElementById("TipoErro").innerText = "NOME Inválido Digitado";
                return;
            }
            if (creci.length < 2) {
                document.getElementById("CaixaDeAlerta").className = "show";
                document.getElementById("TipoErro").innerText = "CRECI Inválido Digitado";
                return;
            }
            if (!/^\d+$/.test(cpf)) {
                document.getElementById("CaixaDeAlerta").className = "show";
                document.getElementById("TipoErro").innerText = "CPF Deve Conter Somente Numeros";
                return;
            }
            try{
            const result = await fetch("editar.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        Nome: nome,
                        CPF: cpf,
                        Creci: creci,
                        id: Id
                    })
                })
                const resposta = await result.json();
                if(result.ok)
                {
                    document.getElementById("CaixaDeEdicao").className = "hide";
                    setTimeout(() => {
                        document.getElementById("CaixaDeEdicao").className = "d-none";
                    }, 400)
                    document.getElementById("RecebeValores").innerHTML = "";

                    resposta.usuarios.forEach((Valores) => {
                        document.getElementById("RecebeValores").innerHTML += `

                    <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1" id="id">
                                    <p>${Valores.id}</p>
                                      <hr>
                                </div>
                                <div class="col-md-5 borda" id="Nome">
                                    <p>${Valores.nome} </p>
                                      <hr>
                                </div>
                                <div class="col-md-2 borda" id="Cpf">
                                    <p>${Valores.cpf} </p>
                                      <hr>
                                </div>
                                <div class="col-md-2 borda" id="Creci">
                                    <p>${Valores.Creci}</p>
                                    <hr>
                                </div>
                                <div class="col-md-2 borda">

                                    <div class="d-flex ">
                                        <button class="botaoDelete" onClick="DeletaValor(event)"><img src="./img/trash-fill.svg" /></button>
                                        <button class="botaoEditar"  onClick="EditarValor(event)"><img src="./img/pencil.svg" /></button>
                                    </div>
                                <hr>
                                </div>
                            </div>
                        </div>
                `
                    })
                }
                else
                {
                    document.getElementById("CaixaDeAlerta").className = "show";
                    document.getElementById("TipoErro").innerText = resposta.mensagem;
                    return;
                }
            }
            catch(ex)
            {
                console.log(ex);
            }
        }


        function CancelaEdicao()
        {
            document.getElementById("CaixaDeEdicao").className = "hide";
                    setTimeout(() => {
                        document.getElementById("CaixaDeEdicao").className = "d-none";
                    }, 400)
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>