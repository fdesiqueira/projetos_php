<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller']                       = "home";
$route['sobre']                                    = "home/sobre";
$route['contato']                                  = "contato/index";
$route['imoveis/consultar_por_categoria/(:any)']   = "imoveis/consultar_por_categoria/$1";
$route['imoveis/agendar_visita/(:any)']            = "imoveis/agendar_visita/$1";

$route['administracao/home/(:any)']                = "administracao/home/$1";
$route['administracao/home/painel/(:any)']         = "administracao/home/painel/$1";

$route['administracao/login/autenticar']           = "administracao/login/autenticar";
$route['administracao/login/encerrar_sessao']      = "administracao/login/encerrar_sessao";

$route['administracao/categorias/cadastrar/(:any)']        = "administracao/categorias/cadastrar/$1";
$route['administracao/categorias/adicionar/(:any)']        = "administracao/categorias/salvar_inclusao/$1";
$route['administracao/categorias/excluir/(:any)']          = "administracao/categorias/excluir/$1";
$route['administracao/categorias/editar/(:any)']           = "administracao/categorias/editar/$1";
$route['administracao/categorias/salvar_alteracao/(:any)'] = "administracao/categorias/salvar_alteracao/$1";
$route['administracao/categorias/consultar/(:any)']        = "administracao/categorias/consultar/$1";
$route['administracao/categorias/(:any)']                  = "administracao/categorias/index/$1";

$route['administracao/clientes/cadastrar/(:any)']        = "administracao/clientes/cadastrar/$1";
$route['administracao/clientes/adicionar/(:any)']        = "administracao/clientes/salvar_inclusao/$1";
$route['administracao/clientes/excluir/(:any)']          = "administracao/clientes/excluir/$1";
$route['administracao/clientes/editar/(:any)']           = "administracao/clientes/editar/$1";
$route['administracao/clientes/salvar_alteracao/(:any)'] = "administracao/clientes/salvar_alteracao/$1";
$route['administracao/clientes/consultar/(:any)']        = "administracao/clientes/consultar/$1";
$route['administracao/clientes/(:any)']                  = "administracao/clientes/index/$1";

$route['administracao/imoveis/cadastrar/(:any)']                = "administracao/imoveis/cadastrar/$1";
$route['administracao/imoveis/adicionar/(:any)']                = "administracao/imoveis/salvar_inclusao/$1";
$route['administracao/imoveis/excluir/(:any)']                  = "administracao/imoveis/excluir/$1";
$route['administracao/imoveis/editar/(:any)']                   = "administracao/imoveis/editar/$1";
$route['administracao/imoveis/salvar_alteracao/(:any)']         = "administracao/imoveis/salvar_alteracao/$1";
$route['administracao/imoveis/consultar/(:any)']                = "administracao/imoveis/consultar/$1";
$route['administracao/imoveis/fotos/(:any)'] 	                = "administracao/imoveis/fotos/$1";
$route['administracao/imoveis/salvar_foto/(:any)']              = "administracao/imoveis/salvar_foto/$1";
$route['administracao/imoveis/excluir_foto/(:any)']             = "administracao/imoveis/excluir_foto/$1/$2";
$route['administracao/imoveis/reservar_imovel/(:any)']          = "administracao/imoveis/reservar_imovel/$1";
$route['administracao/imoveis/salvar_reserva_imovel/(:any)']    = "administracao/imoveis/salvar_reserva_imovel/$1";
$route['administracao/imoveis/emitir_autorizacao_venda/(:any)'] = "administracao/imoveis/emitir_autorizacao_venda/$1";
$route['administracao/imoveis/autorizar_venda/(:any)']          = "administracao/imoveis/autorizar_venda/$1";
$route['administracao/imoveis/(:any)']                          = "administracao/imoveis/index/$1";

$route['administracao/usuarios/adicionar']               = "administracao/usuarios/adicionar";
$route['administracao/usuarios/excluir/(:any)']          = "administracao/usuarios/excluir/$1";
$route['administracao/usuarios/editar/(:any)']           = "administracao/usuarios/editar/$1";
$route['administracao/usuarios/salvar_alteracao/(:any)'] = "administracao/usuarios/salvar_alteracao/$1";
$route['administracao/usuarios/consultar/(:any)']        = "administracao/usuarios/consultar/$1";
$route['administracao/usuarios/(:any)']   	         = "administracao/usuarios/index/$1";

$route['visitas/agendar_visita/(:any)']                  = "visitas/agendar_visita/$1";
$route['visitas/cadastrar_visita/(:any)']                = "visitas/cadastrar_visita/$1";
$route['administracao/visitas/remarcar_visita/(:any)']   = "administracao/visitas/remarcar_visita/$1";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */