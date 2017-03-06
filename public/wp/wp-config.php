<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'akloud-dtb-api');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'bddv102');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-v<yv8 Es6m=lO-w%U`WcGkeF!PdmNQ9Or![$K4^yZop99<[mYL*nM.XjErz5Fdp');
define('SECURE_AUTH_KEY',  '7,SlBQ34Q7zCepXm`]HF()(=|#]OB^N:#)C$~T~GH*1vC:i|HbeC|?09K{11(BHT');
define('LOGGED_IN_KEY',    '~yG,~L5D,dnpQjm~8[Os$}w-lpY)e=3#dgJ}9E..5BKE`<Se*0ySM*43%*|c^GeY');
define('NONCE_KEY',        'FvRm@T,L7n0&))6a/tCzh@Aj/mj?GAH~0HMCH])CLJ)&j3[B#TywkUHxEkSh;qZu');
define('AUTH_SALT',        '^w<Kt2r6uZmu1Gt4;)C}Ob;LSQjN/f !e~dd>37jV(=u8O>m&P.B7h7Ji<)8^B_x');
define('SECURE_AUTH_SALT', 'PqUS+NSAnwV:Jo.79Uq/h$8aqt$<[CE}y&^^_;0{A`lOF)aa<ZR!~91*M2tA$FZq');
define('LOGGED_IN_SALT',   '6VG$ TY0>:o}uSbS8G]?Z>{7sid/Ew~5i0F*FW#aqrx#.ah7-QiM*j9dNiEYD^nx');
define('NONCE_SALT',       '%q-GX7c=1y3o(: r@usEz5by/MVqj*[t-3ufyDBu_j7~(+O#Ul6L[6-QS]Q*|[ z');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_akloud_api_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

define( 'WP_AUTO_UPDATE_CORE', false );

define('WPLANG', 'pt_BR');

// define('WP_USE_THEMES', false);
/* Isto é tudo, pode parar de editar! :) */

define('JWT_AUTH_SECRET_KEY', '6O:m5b,P^+_*@UD> am+0[o/x0J15zun/SqO/ZU$N-`%yuxt2FS#R_sBT_cuH9t)');
// define('JWT_AUTH_CORS_ENABLE', true);

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
