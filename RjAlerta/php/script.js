$(function () {


    //HEADER
    $(window).scroll(function () {
          if($(this).scrollTop() > 200)
          {
              if (!$('.main_header').hasClass('fixed'))
              {
                  $('.main_header').stop().addClass('fixed').css('top', '-100px').animate(
                      {
                          'top': '0px'
                      }, 500);
              }
          }
          else
          {
              $('.main_header').removeClass('fixed');
          }
    });


});


$("#cep").blur(function(){
// Remove tudo o que não é número para fazer a pesquisa
var cep = this.value.replace(/[^0-9]/, "");

// Validação do CEP; caso o CEP não possua 8 números, então cancela
// a consulta
if(cep.length != 8){
    return false;
}

// A url de pesquisa consiste no endereço do webservice + o cep que
// o usuário informou + o tipo de retorno desejado (entre "json",
// "jsonp", "xml", "piped" ou "querty")
var url = "https://viacep.com.br/ws/"+cep+"/json/";

// Faz a pesquisa do CEP, tratando o retorno com try/catch para que
// caso ocorra algum erro (o cep pode não existir, por exemplo) a
// usabilidade não seja afetada, assim o usuário pode continuar//
// preenchendo os campos normalmente
$.getJSON(url, function(dadosRetorno){
    try{
        // Preenche os campos de acordo com o retorno da pesquisa
        $("#endereco").val(dadosRetorno.logradouro);
        $("#bairro").val(dadosRetorno.bairro);
        $("#cidade").val(dadosRetorno.localidade);
        $("#uf").val(dadosRetorno.uf);
    }catch(ex){}
});
});

$(function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
  if (strCPF == "00000000000") return false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;

    return true;

    var strCPF = "12345678909";
    alert(TestaCPF(strCPF));

});
var strCPF = "12345678909";
alert(TestaCPF(strCPF));
