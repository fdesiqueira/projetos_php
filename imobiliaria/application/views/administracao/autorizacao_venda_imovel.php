<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>DSW3 Imoveis - Autorização de Venda de Imóvel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
             p {
            text-align: justify;
             }
        </style>
    </head>

    <body>
    <center><b>AUTORIZAÇÃO DE VENDA SEM EXCLUSIVIDADE</b></center>
    <p>                       
        Pelo presente instrumento particular, <?php echo strtoupper($proprietario[0]->nome); ?>, 
        RG Nº <?php echo $proprietario[0]->identidade; ?>, residente e domiciliado em <?php echo strtoupper($proprietario[0]->logradouro).", ".$proprietario[0]->numero.", CEP ".$proprietario[0]->cep; ?>; 
        adiante  denominado(a)(s)  CONTRATANTE(S),  AUTORIZA(M)  a  empresa LARDY MONTEIRO IMÓVEIS,  inscrita  no  CRECI  sob   o 
        nº 00000, com sede nesta  Cidade  à  Rua .....,  adiante   denominada  CONTRATADA,  a prestar seus serviços de corretagem 
        nos termos do artigo 722  e seguintes  do  Código Civil, com   o  objetivo de promover  a  negociação do  imóvel  situado 
        na <?php echo strtoupper($imovel[0]->logradouro).", ".$imovel[0]->numero.", CEP ".$imovel[0]->cep; ?>, de acordo com o que segue:
    </p>
    <p>    
        1. As  partes  ajustam  que  o  preço   para   negociação   é   de  <?php echo reais($imovel[0]->vlr_imovel); ?> ( <?php echo strtoupper(valorPorExtenso($imovel[0]->vlr_imovel)); ?> ), 
        nas seguintes condições:_________________________________________________________________________________________.
    </p>
    <p>
        2.Pelos serviços pactuados, o (a/s) CONTRATANTE(s) se obriga(m) a pagar à CONTRATADA a comissão de ______________________, 
        desde que o adquirente, ou a quem este indicar, tenha sido apresentado por nossa empresa.        
    </p>
    <p>
        3.A comissão será paga no momento da assinatura do primeiro instrumento   de   alienação do imóvel, publico ou particular, 
        definitivo ou preliminar, em caráter irrevogável e irretratável, com o adquirente/cessionário apresentado pela CONTRATADA
        ou com terceiro àquele ligado por relação de parentescoou outro vínculo jurídico.        
    </p>
    <p>
        4.Havendo a CONTRATADA apresentado de forma comprovada terceiros interessados  na  aquisição  do  imóvel, fica(m) este(a/s) 
        ciente(s) de que não poderá(ão) o(a/s) CONTRATANTE (S) efetivar a venda do imóvel  de  forma direta,  ou  arrepender-se  da 
        transação, manifestar recusa arbitrária, mesmo na hipótese de o negócio se realizar  após  o  prazo contratual.
    </p>
    <p>
        5.Este contrato tem validade de _________ dias, contados a partir da data de sua  assinatura,  considerando-se renovado por 
        igual período, caso não haja manifestação por escrito em sentido contrário por quaisquer das partes.
    </p>
    <p>
        6.Ressalvado o disposto na Cláusula IV, o(a/s) CONTRATANTE(A/S) compromete(m)-se  a  comunicar  por  escrito  a  CONTRATADA 
        qualquer efetivação de negociação do imóvel, quando concluída particularmente ou por intermédio de terceiros.
    </p>
    <p>
        7.O (a/s) CONTRATANTE (S) declara(m)  que  é  (são) legítimo(s)  proprietário(a/s)  do  imóvel  acima referido, devidamente 
        registrado sob o nº __________________ do ______________ cartório de Registro de Imóveis, e o que o mesmo se encontra livre 
        e desembaraçado de todo e quaisquer ônus judiciais ou extrajudiciais, dívida, dúvidas, hipoteca legal ou convencional, foro 
        ou pensão, a resto, sequestro, impostos, tarifas e taxas, contribuições condominiais, não  havendo  ação pessoal ou real em 
        nome do (a/s) CONTRATANTE(S) declara(m) que o imóvel encontra-se em perfeita condições  de  uso e habitabilidade, assumindo 
        as responsabilidades decorrentes de vícios ocultos ou não, de quantidade, qualidade ou  outros que torne o imóvel impróprio 
        ou inadequado para habitação ou de alguma forma diminua o preço, exceto com relação à _____________________________________
        _____________________________________.
    </p>
    <p>
        8.O(A/S) VENDEDORA(A/S) autoriza(m)  à  CORRETORA  e seus parceiros nacionais e internacionais a divulgar através de fotos o 
        imóvel objeto deste instrumento através de seu web site www.dsw3.com.br/imobiliaria.
    </p>
    <p>
        9. As partes obrigam-se por si, herdeiros e sucessores, ao fiel cumprimento deste contrato  e elegem  o  Foro  da  Cidade de 
        Niterói, como competente para dirimir qualquer dúvida oriunda deste contrato, com renúncia de qualquer outro, por mais 
        privilegiado que seja.
    </p>
    <p>
        Por estarem  as  partes  justas  e  contratadas,  assina  o presente instrumento em 03 (três) vias de igual teor e forma, na 
        presença das também abaixo assinadas.
    </p>
    <br>
    <br>
    <br>
    <p>
                Niterói, ______ de ________________de ______.
    </p>
    <br>
    <br>
    <br>
    <br>
    <center>
    <p> _______________________________________________________________
    </p>
    <p>
        CONTRATANTE(S)                    
    </p>
    <p> _______________________________________________________________
    </p>
    <p>
        CONTRATADA      
    </p>
    </center>
    <br>
    <br>
    <br>
    <br>
    <p>
        Testemunhas:
    </p>
        
    <p>
        1)  ____________________________________________________________________     
    </p>
    <p>
            Nome:                                  
    </p>
    <p>
            Identidade:                            
    </p>
    <p>
        2) _____________________________________________________________________     
    </p>
    <p>
            Nome:                                                
    </p>
    <p>
            Identidade:                                          
    </p>
    
</body>
</html>
