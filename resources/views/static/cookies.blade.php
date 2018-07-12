@extends('../layouts.app')

@section('page-title') Cookie policy @endsection

@section('content')
<div class="container static-page">
  <div class="row">
    <div class="col-md-12 col-xs-12">

      @if (App::getLocale() == 'en')
        <h2 class="page-title">Cookies Policy</h2>
        <div class="well">
          <h3 class="mt-0">1. What Cookies are?</h3>
          <p>A cookie is a text file that a web server can save on your computer's hard drive to store some type of information about you as a user. Cookies are used for purposes such as storing data for future visits, to recognize the user and avoid asking for new authentication, to know which pages you visit, or to save your preferences in customizable areas ...). Normally, websites use cookies to obtain statistical information about their web pages, and analyze the behavior of their customers.</p>

          <h3>2. Types of cookies</h3>
          <p>Cookies can be classified according to the following criteria:</p>
          <p>According to who installs the cookie, it can be:</p>
          <ul>
            <li><strong>Own cookies:</strong> Are those that are sent to the user's terminal equipment from a computer or domain managed by the editor itself and from which the service requested by the user is provided.</li>
            <li><strong>Third party cookies:</strong> Those that are sent to the user's terminal equipment from a computer or domain managed by us or by a third party, but the information collected by the cookies is managed by a third party other than the owner of the website.</li>
          </ul>
          <p>Depending on their shelf life, cookies can be:</p>
          <ul>
            <li><strong>Session cookies:</strong> These are the ones that last as long as the user is browsing the Web page and they are deleted when the navigation ends.</li>
            <li><strong>Persistent cookies:</strong> They are stored in the user's terminal, for a longer time, thus facilitating the control of the preferences chosen without having to repeat the parameters each time you visit the website.</li>
          </ul>
          <p>Depending on their purpose, the cookies can be:</p>
          <ul>
            <li><strong>Technical cookies:</strong> Technical cookies are essential and strictly necessary for the proper functioning of a website and the use of the various options and services offered. For example, session maintenance tasks, those that use security elements, share content with social networks, etc.</li>
            <li><strong>Personalization cookies:</strong> Allow the user to choose or customize the characteristics of the Web page such as language, regional or browser type.</li>
            <li><strong>Analytical cookies:</strong> User Web, navigation profiles and to know the preferences of the users in order to improve the offer of products and services. They allow to control geographic areas of greater interest of the user, the information of the web of more acceptance, etc.</li>
            <li><strong>Advertising/advertising cookies:</strong> They allow the management of advertising spaces based on specific criteria. For example, the frequency of access, the edited content, etc. Advertising cookies allow the communication of habits, studying the accesses and forming a profile of user preferences, to offer advertising related to the interests of their profile.</li>
          </ul>

          <h3>3. Cookies used on our website</h3>
          <p>www.talentedeurope.eu uses the following types of cookies on the web:</p>
          <strong>Technical cookies</strong>
          <p>They allow the user to browse the web and use features such as the shopping cart.</p>
          <strong>Personalization cookies</strong>
          <p>They allow to know the preferences of the user: language, products visited.</p>
          <strong>Analysis cookies</strong>
          <p>Cookies of Google Analytics and Smartlook to quantify the number of users who visit the Web. These cookies allow you to measure and analyze the way in which users browse the Web. This information allows CIFP CESAR MANRIQUE to continuously improve its services and the experience of the users of the Web. For more information, you can consult the Google Analytics privacy page:</p>
          <p><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage" target="_blank">https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage</a></p>
          <strong>Advertising and behavioral advertising cookies</strong>
          <p>These cookies are used to display relevant ads for users based on their use of our website. In addition, they limit the number of times each user views an ad and help CIFP CESAR MANRIQUE to measure the effectiveness of their advertising campaigns. When browsing the Web, the user agrees to install this type of cookies on their device and register them when the user visits the CIFP CESAR MANRIQUE website in the future.</p>
          <strong>Cookies installed in our web domain:</strong>
          <div class="table-responsive">
            <table class="cookies-table table table-bordered">
              <thead>
                <tr>
                  <th>Cookie name</th>
                  <th>Purpose</th>
                  <th>Own/third-party</th>
                  <th>Duration</th>
                  <th>When is it installed?</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Session Cookie</td>
                  <td>Technique</td>
                  <td>Own</td>
                  <td>Session</td>
                  <td>When the website is accessed</td>
                </tr>
                <tr>
                  <td>
                    optimizelySegments<br/>
                    optimizelyEndUserId<br/>
                    optimizelyBuckets
                  </td>
                  <td>Performance and user identification cookies</td>
                  <td>Third parties</td>
                  <td>10 years</td>
                  <td>When browsing the web</td>
                </tr>
                <tr>
                  <td>
                    _biz_uid<br/>
                    _biz_pendingA<br/>
                    _biz_nA<br/>
                    _biz_flagsA<br/>
                    __cfduid
                  </td>
                  <td>Cookies to store information content personalization</td>
                  <td>Third parties</td>
                  <td>1 year</td>
                  <td>When browsing the web</td>
                </tr>
                <tr>
                  <td>
                    1P_JAR<br/>
                    APISID<br/>
                    NID<br/>
                    HSID<br/>
                    SAPISID<br/>
                    SID<br/>
                    SIDCC<br/>
                    SSID
                  </td>
                  <td>Cookies stored on the user's computer in order to remain connected to your Google account when visiting your services again. While you remain with this active session and use add-ons on other websites like ours, Google will use these cookies to improve your user experience. The purposes of cookies are varied: management of preferences, analysis of user behavior, security, identification of users...</td>
                  <td>Third parties</td>
                  <td>The duration depends on the type of cookie installed: From 10 minutes to 20 years</td>
                  <td>When browsing the web</td>
                </tr>
              </tbody>
            </table>
          </div>

          <p>This website, like most websites, includes features provided by third parties.</p>
          <p>Our website is a live web and new designs or third-party services can be included. This may occasionally modify the configuration of cookies and the appearance of cookies not detailed in detail in this policy.</p>
          <p>Our site does not control the cookies used by these third parties. For more information about cookies from social networks or other third-party websites, we advise you to review your own cookie policies.</p>

          <h3>4. Information and obtaining consent for installation</h3>
          <p>www.talentedeurope.eu will try at all times to establish adequate mechanisms to obtain the consent of the User for the installation of cookies that require it. When a user accesses our website, a pop-up appears informing them of the existence of cookies and that if you continue browsing our website, you consent to the installation of cookies.</p>

          <h3>5. How can I prevent the installation of cookies?</h3>
          <p>The user can configure his browser to accept, or not, the cookies he receives or for the browser to notify him when a server wants to save a cookie. If some technical cookies are disabled, the correct functioning of some of the web's utilities is not guaranteed.</p>
          <p>The user may exclude that Google Analytics "analytical and advertising" cookies are stored on their terminal using the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">exclusion systems provided by Google Analytics</a>.</p>
          <p>Here are some examples of how to disable cookies:</p>
          <ol type="a">
            <li>
              <strong>By configuring the browser itself:</strong>
              <ul>
                <li>Internet Explorer: <a href="http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies" target="_blank">http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies</a></li>
                <li>Firefox: <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web" target="_blank">https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web</a></li>
                <li>Safari: <a href="http://support.apple.com/kb/HT1677?viewlocale=en_US" target="_blank">http://support.apple.com/kb/HT1677?viewlocale=en_US</a></li>
                <li>Chrome: <a href="https://support.google.com/accounts/answer/61416?hl=en" target="_blank">https://support.google.com/accounts/answer/61416?hl=en</a></li>
                <li>Opera: <a href="http://help.opera.com/Windows/11.50/es-ES/cookies.html" target="_blank">http://help.opera.com/Windows/11.50/es-ES/cookies.html</a></li>
              </ul>
              To expand this information go to the website of the Spanish Agency for Data Protection that helps to configure privacy in social networks, browsers and mobile operating systems. <a href="http://www.agpd.es/portalwebAGPD/CanalDelCiudadano/protegetuprivacidad/index-ides-idphp.php" target="_blank">More information</a>.
            </li>
            <li>
              <strong>Using third-party tools:</strong><br/>
              There are third-party tools, available online, that allow users to detect cookies on each website they visit and manage their deactivation, for example:<br/>
              <a href="http://www.ghostery.com" target="_blank">http://www.ghostery.com</a><br/>
              <a href="http://www.youronlinechoices.com/es/" target="_blank">http://www.youronlinechoices.com/es/</a>
            </li>
          </ol>

          <h3>6. Links to other websites</h3>
          <p>If you choose to leave our website through links to other websites not belonging to our entity, we will not be responsible for the privacy policies of such websites or the cookies they may store on the user's computer.</p>

          <h3>7. How do we collect and use IP addresses?</h3>
          <p>Web servers can automatically detect the IP address and domain name used by users.</p>
          <p>An IP address is a number automatically assigned to a computer when it connects to the Internet. This information allows the subsequent processing of the data in order to know if you have given your consent for the installation of cookies, make only statistical measurements that allow knowing the number of visits made to the Web, the order of visits, the access point, etc.</p>

          <h3>8. Updating our cookies policy</h3>
          <p>This policy is reviewed periodically to ensure its validity, so it can be modified. We recommend that you visit the page regularly where we will inform you of any update about it.</p>
        </div>

      @elseif (App::getLocale() == 'es')
        <h2 class="page-title">Política de Cookies</h2>
        <div class="well">
          <h3 class="mt-0">1. ¿Qué son las Cookies?</h3>
          <p>Una cookie es un archivo de texto que un servidor web puede guardar en el disco duro de tu equipo para almacenar algún tipo de información sobre ti como usuario. Las cookies se utilizan con diversas finalidades tales como almacenar datos para próximas visitas, para reconocer al usuario y evitar pedir de nuevo la autentificación, para saber que paginas visitas, o para guardar tus preferencias en áreas personalizables...). Normalmente los sitios web utilizan las cookies para obtener información estadística sobre sus páginas web, y analizar el comportamiento de sus clientes/usuarios.</p>

          <h3>2. Tipos de cookies</h3>
          <p>Las cookies pueden clasificarse según los siguientes criterios:</p>
          <p>Según <strong>quien instala</strong> la cookie éstas pueden ser:</p>
          <ul>
            <li><strong>Cookies propias:</strong> Son aquéllas que se envían al equipo terminal del usuario desde un equipo o dominio gestionado por el propio editor y desde el que se presta el servicio solicitado por el usuario.</li>
            <li><strong>Cookies de terceros:</strong> Son aquéllas que se envían al equipo terminal del usuario bien desde un desde un equipo o dominio gestionado por nosotros o por un tercero, pero la información que se recoja las cookies es gestionada por un tercero distinto del titular de la web.</li>
          </ul>
          <p>Según su <strong>plazo</strong> de conservación las cookies pueden ser:</p>
          <ul>
            <li><strong>Cookies de sesión:</strong> Son aquellas que duran el tiempo que el usuario está navegando por la página Web y se borran cuando finaliza la navegación.</li>
            <li><strong>Cookies persistentes:</strong> Quedan almacenadas en el terminal del usuario, por un tiempo más largo, facilitando así el control de las preferencias elegidas sin tener que repetir ciertos parámetros cada vez que se visite el sitio Web.</li>
          </ul>
          <p>Según su <strong>finalidad</strong> las cookies pueden ser:</p>
          <ul>
            <li><strong>Cookies técnicas:</strong> Las cookies técnicas son aquellas imprescindibles y estrictamente necesarias para el correcto funcionamiento de un sitio Web y el uso de las diversas opciones y servicios que ofrece. Por ejemplo, las de mantenimiento de sesión, las que permiten utilizar elementos de seguridad, compartir contenido con redes sociales, etc.</li>
            <li><strong>Cookies de personalización:</strong> Permiten al usuario escoger o personalizar características de la página Web como el idioma, configuración regional o tipo de navegador.</li>
            <li><strong>Cookies analíticas:</strong> Son las utilizadas por los portales Web, para elaborar perfiles de navegación y poder conocer las preferencias de los usuarios con el fin de mejorar la oferta de productos y servicios. Permiten controlar áreas geográficas de mayor interés de un usuario, la información de la web de más aceptación, etc.</li>
            <li><strong>Cookies publicitarias/de publicidad:</strong> Permiten la gestión de los espacios publicitarios en base a criterios concretos. Por ejemplo, la frecuencia de acceso, el contenido editado, etc. Las cookies de publicidad permiten a través de la gestión de la publicidad almacenar información del comportamiento a través de la observación de hábitos, estudiando los accesos y formando un perfil de preferencias del usuario, para ofrecerle publicidad relacionada con los intereses de su perfil.</li>
          </ul>

          <h3>3. Cookies utilizadas en nuestra web</h3>
          <p>www.talentedeurope.eu utiliza los siguientes tipos de cookies en la web:</p>
          <strong>Cookies técnicas</strong>
          <p>Permiten al usuario navegar por la Web y usar funcionalidades como el carrito de la compra.</p>
          <strong>Cookies de personalización</strong>
          <p>Permiten saber las preferencias del usuario: idioma, productos visitados...</p>
          <strong>Cookies de análisis</strong>
          <p>Utilizamos cookies de Google Analytics y Smartlook para cuantificar el número de usuarios que visitan la Web. Estas cookies permiten medir y analizar la forma en que los usuarios navegan por la Web. Esta información permite a CIFP CESAR MANRIQUE mejorar continuamente sus servicios y la experiencia de los usuarios de la Web. Para obtener más información, puedes consultar la página de privacidad de Google Analytics:</p>
          <p><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage" target="_blank">https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage</a></p>
          <strong>Cookies publicitarias y publicitarias comportamentales</strong>
          <p>Estas cookies son utilizadas para mostrar anuncios relevantes para los usuarios en función del uso que realicen de nuestra web. Además, limitan el número de veces que cada usuario visualiza un anuncio y ayudan a CIFP CESAR MANRIQUE a medir la efectividad de sus campañas publicitarias. Al navegar por la Web, el usuario acepta instalemos este tipo de cookies en su dispositivo y realicemos consultas cuando el usuario visite la Web de CIFP CESAR MANRIQUE en el futuro.</p>
          <strong>Cookies instaladas en nuestro dominio web:</strong>
          <div class="table-responsive">
            <table class="cookies-table table table-bordered">
              <thead>
                <tr>
                  <th>Nombre de la cookie</th>
                  <th>Finalidad</th>
                  <th>Propia/de terceros</th>
                  <th>Duración</th>
                  <th>¿Cuando se instala?</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Cookie de sesión</td>
                  <td>Técnica</td>
                  <td>Propia</td>
                  <td>De sesión</td>
                  <td>Cuando se accede al sitio Web</td>
                </tr>
                <tr>
                  <td>
                    optimizelySegments<br/>
                    optimizelyEndUserId<br/>
                    optimizelyBuckets
                  </td>
                  <td>Cookies de rendimiento y de identificación de usuario</td>
                  <td>Terceros</td>
                  <td>10 años</td>
                  <td>Cuando se navega por la web</td>
                </tr>
                <tr>
                  <td>
                    _biz_uid<br/>
                    _biz_pendingA<br/>
                    _biz_nA<br/>
                    _biz_flagsA<br/>
                    __cfduid
                  </td>
                  <td>Cookies para almacenar información personalización de contenidos</td>
                  <td>Terceros</td>
                  <td>1 año</td>
                  <td>Cuando se navega por la web</td>
                </tr>
                <tr>
                  <td>
                    1P_JAR<br/>
                    APISID<br/>
                    NID<br/>
                    HSID<br/>
                    SAPISID<br/>
                    SID<br/>
                    SIDCC<br/>
                    SSID
                  </td>
                  <td>Cookies almacenadas en el ordenador del usuario con el fin de permanecer conectado a su cuenta de Google al visitar sus servicios de nuevo. Mientras permanezca con esta sesión activa y use complementos en otros sitios Web como el nuestro, Google hará uso de estas cookies para mejorar su experiencia de uso. Las finalidades de las cookies son variadas: gestión de preferencias,  análisis del comportamiento de los usuarios, seguridad, identificación de los usuarios...</td>
                  <td>Terceros</td>
                  <td>La duración depende del tipo de cookie instalada: De los 10 minutos a los 20 años</td>
                  <td>Cuando se navega por la web</td>
                </tr>
              </tbody>
            </table>
          </div>

          <p>Esta web, como la mayoría de sitios web, incluye funcionalidades proporcionadas por terceros.</p>
          <p>Nuestra web es una web viva y se pueden incluir nuevos diseños o servicios de terceros. Esto puede modificar ocasionalmente la configuración de cookies y que aparezcan cookies no detalladas de forma pormenorizada en la presente política.</p>
          <p>Nuestro sitio no controla las cookies utilizadas por estos terceros. Para más información sobre las cookies de las redes sociales u otras Webs ajenas, aconsejamos revisar sus propias políticas de cookies.</p>

          <h3>4. Información y obtención del consentimiento para la instalación</h3>
          <p>www.talentedeurope.eu procurará en todo momento establecer mecanismos adecuados para obtener el consentimiento del Usuario para la instalación de cookies que lo requieran. Cuando un usuario accede a nuestra web aparece un pop-up en el que se informa de la existencia de cookies y de que si continúa navegando por nuestra página presta su consentimiento para la instalación de cookies.</p>

          <h3>5. ¿Cómo puedo impedir la instalación de cookies?</h3>
          <p>El usuario puede configurar su navegador para aceptar, o no, las cookies que recibe o para que el navegador le avise cuando un servidor quiera guardar una cookie. Si se deshabilitan algunas cookies técnicas no se garantiza el correcto funcionamiento de algunas de las utilidades de la web.</p>
          <p>El usuario podrá excluir que se almacenen en su terminal las cookies "analíticas y publicitarias” de Google Analytics mediante los <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">sistemas de exclusión facilitados por Google Analytics</a>.</p>
          <p>A continuación, también le facilitamos algunos ejemplos de cómo deshabilitar las cookies:</p>
          <ol type="a">
            <li>
              <strong>Mediante la configuración del propio navegador:</strong>
              <ul>
                <li>Internet Explorer: <a href="http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies" target="_blank">http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies</a></li>
                <li>Firefox: <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web" target="_blank">https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web</a></li>
                <li>Safari: <a href="http://support.apple.com/kb/HT1677?viewlocale=es_ES" target="_blank">http://support.apple.com/kb/HT1677?viewlocale=es_ES</a></li>
                <li>Chrome: <a href="https://support.google.com/accounts/answer/61416?hl=es" target="_blank">https://support.google.com/accounts/answer/61416?hl=es</a></li>
                <li>Opera: <a href="http://help.opera.com/Windows/11.50/es-ES/cookies.html" target="_blank">http://help.opera.com/Windows/11.50/es-ES/cookies.html</a></li>
              </ul>
              Para ampliar esta información acuda a la página de la Agencia Española de Protección de Datos que ayuda a configurar la privacidad en redes sociales, navegadores y sistemas operativos móviles. <a href="http://www.agpd.es/portalwebAGPD/CanalDelCiudadano/protegetuprivacidad/index-ides-idphp.php" target="_blank">Más información</a>.
            </li>
            <li>
              <strong>Mediante herramientas de terceros:</strong><br/>
              Existen herramientas de terceros, disponibles on line, que permiten a los usuarios detectar las cookies en cada sitio web que visita y gestionar su desactivación, por ejemplo:<br/>
              <a href="http://www.ghostery.com" target="_blank">http://www.ghostery.com</a><br/>
              <a href="http://www.youronlinechoices.com/es/" target="_blank">http://www.youronlinechoices.com/es/</a>
            </li>
          </ol>

          <h3>6. Enlaces a otros sitios web</h3>
          <p>Si opta por abandonar nuestro sitio Web a través de enlaces a otros sitios Web no pertenecientes a nuestra entidad, no nos haremos responsables de las políticas de privacidad de dichos sitios Web ni de las cookies que estos puedan almacenar en el ordenador del usuario.</p>

          <h3>7. ¿Cómo recopilamos y usamos las direcciones IP?</h3>
          <p>Los servidores de la Web podrán detectar de manera automática la dirección IP y el nombre de dominio utilizados por los usuarios.</p>
          <p>Una dirección IP es un número asignado automáticamente a un ordenador cuando éste se conecta a Internet. Esta información permite el posterior procesamiento de los datos con el fin de saber si ha prestado su consentimiento para la instalación de cookies, realizar mediciones únicamente estadísticas que permitan conocer el número de visitas realizadas a la Web, el orden de visitas, el punto de acceso, etc.</p>

          <h3>8. Actualización de nuestra política de cookies</h3>
          <p>Esta política se revisa periódicamente para asegurar su vigencia, por lo que puede ser modificada. Le recomendamos que visite la página con regularidad donde le informaremos de cualquier actualización al respecto.</p>
        </div>

      @elseif (App::getLocale() == 'it')
        <h2 class="page-title">Politica sui cookie</h2>
        <div class="well">
          <h3 class="mt-0">1. Cosa sono i cookie?</h3>
          <p>Un cookie è un file di testo che un server web può salvare sul disco rigido del tuo computer per memorizzare un certo tipo di informazioni su di te come utente. I cookie vengono utilizzati per scopi quali la memorizzazione dei dati per le visite future, il riconoscimento dell'utente e l'evitamento dei requisiti per la nuova autenticazione, la conoscenza delle pagine visitate o il salvataggio delle preferenze in aree personalizzabili.... Normalmente, i siti web utilizzano i cookie per ottenere informazioni statistiche sulle loro pagine web e per analizzare il comportamento dei loro clienti.</p>

          <h3>2. Tipi di cookie</h3>
          <p>I cookie possono essere classificati secondo i seguenti criteri:</p>
          <p>A seconda di chi installa i cookie:</p>
          <ul>
            <li><strong>Propri cookie:</strong> Sono quelli che vengono inviati all'apparecchiatura terminale dell'utente da un computer o dominio gestito dall'editor stesso e da cui viene fornito il servizio richiesto dall'utente.</li>
            <li><strong>Cookie di terze parti:</strong> Vengono inviati all'apparecchiatura terminale dell'utente da un computer o dominio gestito da noi o da una terza parte, ma le informazioni raccolte dai cookie sono gestite da terze parti diverse dal proprietario del sito web.</li>
          </ul>
          <p>A seconda data della scadenza:</p>
          <ul>
            <li><strong>Cookie / sessioni temporanee:</strong> File che durano fino a quando l'utente visualizza la pagina Web e verranno rimossi dopo la navigazione.</li>
            <li><strong>Cookie persistenti:</strong> Vengono memorizzati nel terminale dell'utente per un periodo più lungo, facilitando così il controllo delle preferenze scelte senza dover ripetere i parametri ogni volta che si visita il sito.</li>
          </ul>
          <p>A seconda dello scopo:</p>
          <ul>
            <li><strong>Cookie tecnici:</strong> I cookie tecnici sono essenziali e strettamente necessari per il corretto funzionamento di un sito web e l'uso delle varie opzioni e servizi offerti, ad es. attività di manutenzione della sessione, quelle che utilizzano elementi di sicurezza, condividono il contenuto con i social network, ecc.</li>
            <li><strong>Cookie personalizzati:</strong> Consente agli utenti di selezionare o personalizzare le proprietà del sito web come lingua, regione o tipo di browser.</li>
            <li><strong>Cookie analitici:</strong> Utilizzano i loro siti web per creare profili di navigazione e riconoscere le preferenze dell'utente finale al fine di migliorare la gamma di prodotti e servizi. Consentono di gestire aree geografiche di maggiore interesse per l'utente, informazioni più ampie sul sito, ecc.</li>
            <li><strong>Cookie pubblicitari:</strong> Consentono la gestione degli spazi pubblicitari in base a criteri specifici, come frequenza di connessione, contenuto modificato, ecc. I cookie pubblicitari consentono di comunicare abitudini, esplorare l'accesso e creare un profilo di preferenze utente per pubblicare annunci correlati ai loro interessi di profilo.</li>
          </ul>

          <h3>3. I cookie utilizzati sul nostro sito web</h3>
          <p>www.talentedeurope.eu utilizza i seguenti tipi di cookie sul web:</p>
          <strong>Cookie tecnici</strong>
          <p>Consentono all'utente di navigare nel sito e utilizzare gli elementi come carrello.</p>
          <strong>Cookie personalizzati</strong>
          <p>Ti consentono di conoscere le preferenze dell'utente: lingua, prodotti visitati.</p>
          <strong>Analisi dei cookie</strong>
          <p>Utilizziamo i cookie provenienti da Google Analytics e Smartlook per quantificare il numero di utenti che hanno visitato il sito. Questi cookie consentono di misurare e analizzare come gli utenti navigano nel sito. Queste informazioni consentono a CIFP CESAR MANRIQUE di migliorare continuamente i suoi servizi e l'esperienza degli utenti del web. Per ulteriori informazioni, si prega di contattare l'informativa sulla privacy di Google Analytics:</p>
          <p><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage" target="_blank">https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage</a></p>
          <strong>Cookie pubblicitari e di pubblicità comportamentale</strong>
          <p>Questi cookie vengono utilizzati per visualizzare annunci pertinenti per gli utenti in base al loro utilizzo del nostro sito. Inoltre, limitano il numero di visualizzazioni degli annunci a ciascun utente e aiutano CIFP CESAR MANRIQUE a misurare l'efficacia delle loro campagne pubblicitarie. Durante la navigazione sul web, l'utente si impegna a installare questo tipo di cookie sul proprio dispositivo e registrarli quando l'utente visita il sito web CIFP CESAR MANRIQUE in futuro.</p>
          <div class="table-responsive">
            <table class="cookies-table table table-bordered">
              <thead>
                <tr>
                  <th>Nome del cookie</th>
                  <th>Scopo</th>
                  <th>Propria/terza parte</th>
                  <th>Durata</th>
                  <th>Quando è installato?</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Cookie temporaneo</td>
                  <td>Tecnica</td>
                  <td>Propria</td>
                  <td>Temporaneo / sessione</td>
                  <td>Quando si accede al sito web</td>
                </tr>
                <tr>
                  <td>
                    optimizelySegments<br/>
                    optimizelyEndUserId<br/>
                    optimizelyBuckets
                  </td>
                  <td>Cookie per prestazioni e identificazione dell'utente</td>
                  <td>Parti terze</td>
                  <td>10 anni</td>
                  <td>Durante la navigazione sul web</td>
                </tr>
                <tr>
                  <td>
                    _biz_uid<br/>
                    _biz_pendingA<br/>
                    _biz_nA<br/>
                    _biz_flagsA<br/>
                    __cfduid
                  </td>
                  <td>Cookie per preservare la personalizzazione del contenuto informativo</td>
                  <td>Parti terze</td>
                  <td>1 anno</td>
                  <td>Durante la navigazione sul web</td>
                </tr>
                <tr>
                  <td>
                    1P_JAR<br/>
                    APISID<br/>
                    NID<br/>
                    HSID<br/>
                    SAPISID<br/>
                    SID<br/>
                    SIDCC<br/>
                    SSID
                  </td>
                  <td>Cookie memorizzati sul computer dell'utente per rimanere connessi al vostro account Google quando visitate nuovamente i vostri servizi. Mentre rimanete in questa sessione attiva e utilizzate componenti aggiuntivi su altri siti web come il nostro, Google utilizzerà questi cookie per migliorare la vostra esperienza utente. Lo scopo dei cookie è diverso: gestione delle preferenze, analisi del comportamento degli utenti, sicurezza, identificazione dell'utente</td>
                  <td>Parti terze</td>
                  <td>La durata dipende dal tipo di cookie installato: da 10 minuti a 20 anni</td>
                  <td>Durante la navigazione sul web</td>
                </tr>
              </tbody>
            </table>
          </div>

          <p>Questo sito web, come la maggior parte dei siti web, contiene funzionalità fornite da terze parti.</p>
          <p>Il nostro sito Web è un sito web in diretta e nuovi design o servizi di terze parti possono essere inclusi. Questo può occasionalmente alterare la configurazione e l'aspetto dei cookie, che non sono dettagliati in queste regole.</p>
          <p>Il nostro sito non gestisce i cookie utilizzati da queste terze parti. Per ulteriori informazioni sui cookie dei social o altri siti web di terze parti, vi invitiamo a leggere la vostra politica sui cookie.</p>

          <h3>4. Informazioni e ottenimento del consenso per l'installazione</h3>
          <p>www.talentedeurope.eu cercherà sempre di creare meccanismi appropriati per ottenere il consenso dell'utente all'installazione dei cookie che lo richiedono. Quando un utente accede al nostro sito web, viene visualizzata una finestra popup che indica l'esistenza di cookie e, se si continua a navigare nei nostri siti, si accetta di installare i cookie.</p>

          <h3>5. Come impedire l'installazione dei cookie ?</h3>
          <p>L'utente può configurare il proprio browser per accettare o meno i cookie che ricevono o il browser per avvisarlo quando il server vuole salvare il cookie. Se alcuni cookie tecnici sono disabilitati, alcuni degli strumenti del sito non sono garantiti per funzionare correttamente.</p>
          <p>L'utente può escludere che i cookie "analitici e pubblicitari" di Google Analytics siano memorizzati sul proprio terminale utilizzando i <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">sistemi di esclusione forniti da Google Analytics</a>.</p>
          <p>Ecco alcuni esempi su come disattivare i cookie:</p>
          <ol type="a">
            <li>
              <strong>Configurando il browser stesso:</strong>
              <ul>
                <li>Internet Explorer: <a href="http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies" target="_blank">http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies</a></li>
                <li>Firefox: <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web" target="_blank">https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web</a></li>
                <li>Safari: <a href="http://support.apple.com/kb/HT1677?viewlocale=en_US" target="_blank">http://support.apple.com/kb/HT1677?viewlocale=en_US</a></li>
                <li>Chrome: <a href="https://support.google.com/accounts/answer/61416?hl=en" target="_blank">https://support.google.com/accounts/answer/61416?hl=en</a></li>
                <li>Opera: <a href="http://help.opera.com/Windows/11.50/es-ES/cookies.html" target="_blank">http://help.opera.com/Windows/11.50/es-ES/cookies.html</a></li>
              </ul>
              Per espandere queste informazioni, visitare il sito web dell'Agenzia spagnola per la protezione dei dati (Spanish Agency for Data Protection) che consente di configurare la privacy nei social network, nei browser e nei sistemi operativi mobili. <a href="http://www.agpd.es/portalwebAGPD/CanalDelCiudadano/protegetuprivacidad/index-ides-idphp.php" target="_blank">Maggiori informazioni</a>.
            </li>
            <li>
              <strong>Utilizzo di strumenti di terze parti:</strong><br/>
              Esistono strumenti di terze parti disponibili online che consentono agli utenti di riconoscere i cookie su qualsiasi sito Web visitato e di gestirne la disattivazione, ad esempio:<br/>
              <a href="http://www.ghostery.com" target="_blank">http://www.ghostery.com</a><br/>
              <a href="http://www.youronlinechoices.com/en/" target="_blank">http://www.youronlinechoices.com/en/</a>
            </li>
          </ol>

          <h3>6. Collegamenti ad altri siti web</h3>
          <p>Se scegliete di lasciare il nostro sito Web tramite collegamenti ad altri siti web che non appartengono alla nostra azienda, non saremo responsabili per l'informativa sulla privacy su tali siti web o cookie che potrebbero essere memorizzati sul computer dell'utente.</p>

          <h3>7. Come raccogliamo e usiamo gli indirizzi IP?</h3>
          <p>I server Web possono rilevare automaticamente l'indirizzo IP e il nome di dominio utilizzati dagli utenti.</p>
          <p>Un indirizzo IP è il numero assegnato automaticamente al computer quando si connette a Internet. Queste informazioni consentono di elaborare i dati al fine di determinare se l'utente ha accettato di installare i cookie per eseguire solo misurazioni statistiche che consentono di conoscere il numero di visite al sito, l'ordine delle visite, il punto di accesso, ecc.</p>

          <h3>8. Aggiornamento della nostra politica sui cookie</h3>
          <p>Queste regole sono riviste periodicamente per garantirne la validità in modo che possano essere modificate. Vi consigliamo di visitare regolarmente il sito per informarvi di eventuali aggiornamenti.</p>
        </div>

      @elseif (App::getLocale() == 'de')
        <h2 class="page-title">Politik der cookie - Dateien</h2>
        <div class="well">
          <h3 class="mt-0">1. Was sind cookie - Dateien?</h3>
          <p>Cooklie – Datei ist eine Textdatei, die der Webserver auf Ihre Festplatte speichern kann, um gewisse Typs von Informationen über Sie als Nutzer speichern zu können. Die cooie – Dateien werden für folgende Zwecke gespeichert, das Speichern der Angaben für die zukünftigen Besuche, die Erkennung des Nutzers, Vermeiden der wiederholten Erkennung des Nutzers, Erkennung der Webseiten, die Sie besuchen, oder das Speichern von Vorwahlen in den einstellbaren Bereichen... In normalen Fall sammeln die cookie – Dateien statistische Angaben über ihre Webseiten und zur Analyse der Verhaltensweise der Kunden.</p>

          <h3>2. Arten von cookie - Dateien</h3>
          <p>Die cookie – Dateien können folgend qualifiziert werden:</p>
          <p>Nach dem, wer die cookie – Dateien installiert:</p>
          <ul>
            <li><strong>Eigene cookie - Dateien:</strong> Sind Dateien, die an den Endnutzer von dem Computer oder der Domäne, die vom Editor verwaltet wird und von wo aus die Dienstleistung angefordert wird, gesendet.</li>
            <li><strong>Cookie – Dateien von Drittpersonen:</strong> Dateien, die an den Endnutzer von dem Computer oder der von uns oder von einer Drittperson verwalteten Domäne, aber die von cookie – Dateien gesammelten Informationen werden von einer Drittperson als Inhaber der Webseiten verwaltet.</li>
          </ul>
          <p>Nach der Dauer der Aufbewahrung:</p>
          <ul>
            <li><strong>Teilzeitige cookie – Dateien / Relationen:</strong> Dateien, die solange gelten, bis der  der Nutzer das Durchsehen der Webseite beendet, danach werden Sie entfernt.</li>
            <li><strong>Langzeitige cookie - Dateien:</strong> Werden auf dem Terminal des Nutzers für eine längere Zeit gespeichert, was eine Regelung der ausgewählten Preferenzen ermöglicht, ohne die Notwendigkeit von wiederholten Parametern bei erneuten Besuchen der Webseite.</li>
          </ul>
          <p>Nach dem Zweck:</p>
          <ul>
            <li><strong>Technische cookie - Dateien:</strong> Technische cookie – Dateien sind wichtig und notwendig für das richtige Funktionieren der Webseite und das Nutzen von verschiedenen Möglichkeiten und Dienstleistungen, z. B. kurzzeitige Aufgaben der Wartung der cookie – Dateien, die Sicherheitselemente beinhalten, den Inhalt mit den sozialen Netzwerken teilen, usw.</li>
            <li><strong>Personalisierte cookie - Dateien:</strong> Ermöglichen den Nutzer die Eigenschaften der Webseite auszuwählen oder einzustellen, wie z. B. Sprache, Region oder Art des Browsers.</li>
            <li><strong>Analytische cookie - Dateien:</strong> Werden von den Webseiten beim Erstellen von Profilen der Erkennung  von Präferenzen von Endnutzern genutzt, um das Angebot der Produkte und Dienstleistungen zu verbessern. Sie ermöglichen geographische Bereiche des Nutzers und die Informationen eines breiteren Maßes zu verwalten, usw.</li>
            <li><strong>Werbe – cookie - Dateien:</strong> Ermöglichen die Verwaltung von Werbebereichen auf Grund von konkreten Kriterien, z. B. der Anschlussfrequenz, der bearbeitet Inhalt usw. Werbe –cookie – Dateien ermöglichen die Kommunikation , Erforschung von der Anschlüsse und die Erstellung des Profils der Nutzerpräferenzen  mit dem Zweck der zielgerichteten Werbung.</li>
          </ul>

          <h3>3. Cookie – Dateien, die auf unserer Webseite benutze werden</h3>
          <p>www.talentedeurope.eu nutz folgenden Arten von cookie - Dateien:</p>
          <strong>Technische cookie - Dateien</strong>
          <p>Ermöglichen den Nutzer die Webseite anzusehen und Elemente, wie Einkaufswagen zu benutzen.</p>
          <strong>Personalisierte cookie - Dateien</strong>
          <p>Ermöglichen die Präferenzen des Nutzers zu kennen: Sprache, die besuchten Produkte.</p>
          <strong>Analyse der cookie - Dateien</strong>
          <p>Die verwendeten cookie – Dateien von den Dienstleistungsanbietern Google Analytics und Smartlook, um die Anzahl der Webbesucher zu kennen. Diese ermöglichen, die Art zu messen und zu analysieren wie sich die Nutzer auf der Webseite verhalten. Diese Informationen ermöglichen dem Unternehmen CIFP CESAR MANRIQUE die Dienstleistungen anhand der Erfahrungen der Nutzer ständig zu verbessern. Für weiter Information können Sie die Seite der Dienstleistung Google Analytics anklicken:</p>
          <p><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage" target="_blank">https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage</a></p>
          <strong>Werbe-  und Verhaltungs- cookie - Dateien</strong>
          <p>Diese Dateien für das Versenden zielgerichteter Werbung aufgrund des Verhaltens auf unserer Webseite. Außerdem beschränken Sie Anzahl der Werbungen und helfen  CIFP CESAR MANRIQUE die Effektivität der Werbekampagne zu messen. Beim Browsen im Web verpflichtet sich der Nutzer, auf seinem Rechner diesen Typ von cookie – Dateien zu installieren und sie zu registrieren, wenn der Nutzer in der Zukunft die Webseite CIFP CESAR MANRIQUE besucht.</p>
          <div class="table-responsive">
            <table class="cookies-table table table-bordered">
              <thead>
                <tr>
                  <th>Name der cookie - Datei</th>
                  <th>Zweck</th>
                  <th>Eigene/Drittperson</th>
                  <th>Dauer</th>
                  <th>Wann wird Sie installiert?</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Teilzeitige cookie  Datei</td>
                  <td>Technik</td>
                  <td>Eigene</td>
                  <td>teilzeitige/Relation</td>
                  <td>Beim Zutritt auf die Webseite</td>
                </tr>
                <tr>
                  <td>
                    optimizelySegments<br/>
                    optimizelyEndUserId<br/>
                    optimizelyBuckets
                  </td>
                  <td>Cookie- Dateien zur  Leistungsoptimalisierung   und Identifizierung von NUtzern</td>
                  <td>Drittpersonen</td>
                  <td>10 Jahre</td>
                  <td>Beim Browsen im Web</td>
                </tr>
                <tr>
                  <td>
                    _biz_uid<br/>
                    _biz_pendingA<br/>
                    _biz_nA<br/>
                    _biz_flagsA<br/>
                    __cfduid
                  </td>
                  <td>Cookie – Dateien zur Erhaltung der Personalisierung des Informationsinhalt</td>
                  <td>Drittpersonen</td>
                  <td>1 Jahr</td>
                  <td>Beim Browsen im Web</td>
                </tr>
                <tr>
                  <td>
                    1P_JAR<br/>
                    APISID<br/>
                    NID<br/>
                    HSID<br/>
                    SAPISID<br/>
                    SID<br/>
                    SIDCC<br/>
                    SSID
                  </td>
                  <td>Cookie Dateien, die in dem Computer des Nutzers gespeichert sind, um bei dem wiederholten Besuch der Dienstleistungen bei Ihrem Google –Konto angemeldet zu bleiben. Solange Sie in dieser aktiven Relation bleiben und die Elemente  auf anderen Webseiten nutzen, wie die unsere, verwendet das Unternehmen Google diese Dateien, um Ihre Nutzererlebnis zu verbessern.  Die Zwecke der cookie – Dateien sind verschieden: Verwaltung der Präferenzen, Verhaltensanalyse der Nutzer, Sicherheit, Identifizierung der Nutzer</td>
                  <td>Drittpersonen</td>
                  <td>Die Dauer hängt von der Art der Datei ab von 10 Minuten bis 20 Jahren</td>
                  <td>Beim Browsen im Web</td>
                </tr>
              </tbody>
            </table>
          </div>

          <p>Diese Webseite, ähnlich wie die anderen, beinhaltet auch die Funktionen, die von Drittpersonen angeboten werden.</p>
          <p>Unserer Webseite ist eine lebendige Webseite und neue Vorschläge oder Dienstleistungen von Drittpersonen können vorgeschlagen werden. Das kann möglicherweise die Konfigurierung der cookie – Dateien ändern, die nicht in diesen Regeln angeführt sind.</p>
          <p>Unsere Webseite verwaltet keine cookie – Dateien, die von den Drittpersonen verwendet werden. Für mehr Informationen über die cookie – Dateien von den Sozialnetzen oder anderen Webseiten von Drittpersonen empfehlen wir Ihnen, Ihre eigen Regeln, für die Nutzung der cookie – Dateien zu lesen.</p>

          <h3>4. Information und die Einverständnis mit der Installierung</h3>
          <p>www.talentedeurope.eu versucht immer adäquate Mechanismen für das Einverständnis des Nutzers, für die Installierung der cookie – Dateien, zu bilden, die verlangt werden. Wenn der Nutzer unsere Webseiten besucht, erscheint ein Pop-up Fenster mit der Information über die Existenz der cookie – Dateien und falls Sie weiter die Webseiten benutzen, so sind Sie mit der Installierung einverstanden.</p>

          <h3>5. Wie kann man die Installierung der cookie – Dateien vermeiden?</h3>
          <p>Der Nutzer kann sein Browser so konfigurieren, dass er die cookie – Dateien bekommt oder nicht bekommt, oder dass ihn der Browser benachrichtigt, wenn solche Dateien installiert werden. Wenn gewisse cookie – Dateien verboten sind, ist nicht Funktionalität mancher Elemente nicht gewährleistet.</p>
          <p>Der Nutzer kann vermeiden, dass cookie – Dateien der „analytischen und Werbungs-„ Dienstleistungen von Google Analytics Google Analytics auf seinem Terminal mithilfe der <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">ausgeschlossenen Systeme, die durch Google Analytics angeboten, gespeichert werden</a>.</p>
          <p>Hier ein paar Beispiele, wie man cookie – Dateien ausschalten kann:</p>
          <ol type="a">
            <li>
              <strong>Konfiguration des eigenen Browsers:</strong>
              <ul>
                <li>Internet Explorer: <a href="http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies" target="_blank">http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies</a></li>
                <li>Firefox: <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web" target="_blank">https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web</a></li>
                <li>Safari: <a href="http://support.apple.com/kb/HT1677?viewlocale=en_US" target="_blank">http://support.apple.com/kb/HT1677?viewlocale=en_US</a></li>
                <li>Chrome: <a href="https://support.google.com/accounts/answer/61416?hl=en" target="_blank">https://support.google.com/accounts/answer/61416?hl=en</a></li>
                <li>Opera: <a href="http://help.opera.com/Windows/11.50/es-ES/cookies.html" target="_blank">http://help.opera.com/Windows/11.50/es-ES/cookies.html</a></li>
              </ul>
              Für die Erweiterung dieser Information besuchen Sie die Webseite der Spanischen Agentur für den Schutz von personenbezogener Angaben (Spanish Agency for Data Protection), die hilft die Privatsphäre in Sozialnetzwerken, Browsern und mobilen Operationssystemen zu konfigurieren. <a href="http://www.agpd.es/portalwebAGPD/CanalDelCiudadano/protegetuprivacidad/index-ides-idphp.php" target="_blank">Mehr Informationen</a>.
            </li>
            <li>
              <strong>Nutzung der Elemente von Drittpersonen:</strong><br/>
              Es existieren Elemente von Drittpersonen, die online zur Verfügung stehen, die eine Erkennung von cookie – Dateien in jeder Lokalität ermöglichen und ihre Deaktivation erlauben, z. B.:<br/>
              <a href="http://www.ghostery.com" target="_blank">http://www.ghostery.com</a><br/>
              <a href="http://www.youronlinechoices.com/en/" target="_blank">http://www.youronlinechoices.com/en/</a>
            </li>
          </ol>

          <h3>6. Verweise auf andere Webseiten</h3>
          <p>Wenn Sie sich entscheiden, unsere Webseite zu verlassen, durch einen Verweis auf eine andere Webseite, so tragen wir keine Verantwortung für die Prinzipien des Schutzes von personenbezogenen Angaben, oder für die cookie – Dateien, die auf Ihren Rechner gespeichert werden können.</p>

          <h3>7. Wie wir IP – Adressen sammeln und nutzen?</h3>
          <p>Webserver können automatisch die IP Adresse und den Namen Domäne erkennen.</p>
          <p>Adresse ist eine automatisch erteilte Nummer des Rechners, wenn er am Netz angeschlossen ist. Diese Information ermöglichen die folgende Verarbeitung der Angaben, mit dem Ziel zu erfahren: ob Sie mit der Installation der cookie – Dateien einverstanden waren, nur um statistische Messungen zu realisieren, die ermöglichen die Anzahl der Besuche im Web, ihre Reihenfolge, den Zutrittspunkt zu erkennen, usw.</p>

          <h3>8. Aktualisierungen unserer Regeln von cookie - Dateien</h3>
          <p>Diese Regeln werden periodisch kontrolliert, um Ihre Gültigkeit zu gewährleisten, so ist es möglich sie zu bearbeiten. Wir empfehlen die Webseite regelmäßig zu besuchen, wo wir Sie über sämtliche Änderungen informieren werden.</p>
        </div>

      @elseif (App::getLocale() == 'fr')
        <h2 class="page-title">Politique de cookies</h2>
        <div class="well">
          <h3 class="mt-0">1. Que sont les cookies ?</h3>
          <p>Un cookie est un fichier texte qu'un serveur Web peut enregistrer sur le disque dur de votre ordinateur pour stocker certains types d'informations vous concernant en tant qu'utilisateur. Les cookies sont utilisés à des fins telles que le stockage des données pour les visites futures, la reconnaissance de l'utilisateur et pour éviter les exigences pour une nouvelle authentification, savoir quelles sites vous visitez, ou enregistrer vos préférences dans des zones personnalisables...). Normalement, les sites Web utilisent des cookies pour obtenir des informations statistiques sur leurs sites Web et pour analyser le comportement de leurs clients.</p>

          <h3>2. Types de cookies</h3>
          <p>Les cookies peuvent être classés selon les critères suivants:</p>
          <p>Qui installe le cookie:</p>
          <ul>
            <li><strong>Cookies personnels:</strong> Sont ceux qui sont envoyés à l'équipement terminal de l'utilisateur à partir d'un ordinateur ou d'un domaine géré par l'éditeur lui-même et à partir duquel le service demandé par l'utilisateur est fourni.</li>
            <li><strong>Cookies tiers:</strong> Ils sont envoyés à l'équipement terminal de l'utilisateur à partir d'un ordinateur ou d'un domaine géré par nous ou par un tiers, mais les informations collectées par les cookies sont gérées par le tiers autre que le propriétaire du site.</li>
          </ul>
          <p>Durée de conservation:</p>
          <ul>
            <li><strong>Cookies de session:</strong> Ceux-ci sont ceux qui durent tant que l'utilisateur navigue sur le site Web et ils sont supprimés lorsque la navigation se termine.</li>
            <li><strong>Cookies persistants:</strong> Ils sont stockés dans le terminal de l'utilisateur, plus longtemps, ce qui facilite le contrôle des préférences choisies sans avoir à répéter les paramètres chaque fois que vous visitez le site.</li>
          </ul>
          <p>Objectif:</p>
          <ul>
            <li><strong>Cookies techniques:</strong> Les cookies techniques sont essentiels et strictement nécessaires au bon fonctionnement d'un site Web et à l'utilisation des différentes options et services offerts, par ex. tâches de maintenance de session, celles qui utilisent des éléments de sécurité, partagent du contenu avec les réseaux sociaux, etc.</li>
            <li><strong>Cookies de personnalisation:</strong> permettent à l'utilisateur de choisir ou de personnaliser les caractéristiques du site Web telles que la langue, la région ou le type de navigateur.</li>
            <li><strong>Cookies analytiques:</strong> Ils sont utilisés par les sites Web pour faire des profils de navigation et pour connaître les préférences des utilisateurs finaux afin d'améliorer l'offre de produits et de services. Ils permettent de contrôler les zones géographiques d'un plus grand intérêt de l'utilisateur, l'information du Web de plus d'acceptation, etc.</li>
            <li><strong>Cookies publicitaires:</strong> Ils permettent la gestion d'espaces publicitaires sur la base de critères spécifiques. Par exemple, la fréquence d'accès, le contenu édité, etc. Les cookies publicitaires permettent la communication des habitudes, l'étude des accès et la formation d'un profil des préférences des utilisateurs, pour proposer des publicités liées aux intérêts de leur profil.</li>
          </ul>

          <h3>3. Cookies utilisés sur notre site</h3>
          <p>www.talentedeurope.eu utilise les types de cookies suivants sur le web:</p>
          <strong>Cookies techniques</strong>
          <p>Ils permettent à l'utilisateur de naviguer sur le Web et d'utiliser des fonctionnalités telles que le panier.</p>
          <strong>Cookies de personnalisation</strong>
          <p>Ils permettent de connaître les préférences de l'utilisateur: langue, produits visités.</p>
          <strong>Cookies analytiques</strong>
          <p>Nous utilisons des cookies provenant de Google Analytics et Smartlook afin de quantifier le nombre d'utilisateurs qui visitent le Web. Ces cookies vous permettent de mesurer et d'analyser la façon dont les utilisateurs naviguent sur le Web. Ces informations permettent à CIFP CESAR MANRIQUE d'améliorer en permanence ses services et l'expérience des utilisateurs du Web. Pour plus d'informations, vous pouvez consulter le site de confidentialité de Google Analytics:</p>
          <p><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage" target="_blank">https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage</a></p>
          <strong>Cookies publicitaires et publicitaires comportementales</strong>
          <p>Ces cookies sont utilisés pour afficher des annonces pertinentes pour les utilisateurs en fonction de leur utilisation de notre site Web. De plus, ils limitent le nombre de visionnements d'une annonce par un internaute et aident CIFP CESAR MANRIQUE à mesurer l'efficacité de ses campagnes publicitaires. Lors de la navigation sur le Web, l'utilisateur accepte d'installer ce type de cookies sur son appareil et de les enregistrer lorsque l'utilisateur visite le site Web de CIFP CESAR MANRIQUE à l'avenir.</p>
          <div class="table-responsive">
            <table class="cookies-table table table-bordered">
              <thead>
                <tr>
                  <th>Nom de cookie</th>
                  <th>Objectif</th>
                  <th>Personnels/tiers</th>
                  <th>Durée</th>
                  <th>Quand est-il installé?</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Cookie de sesión</td>
                  <td>Technique</td>
                  <td>Personnel</td>
                  <td>Session</td>
                  <td>Lorsque le site est accédé</td>
                </tr>
                <tr>
                  <td>
                    optimizelySegments<br/>
                    optimizelyEndUserId<br/>
                    optimizelyBuckets
                  </td>
                  <td>Performance et cookies d'identification de l'utilisateur</td>
                  <td>Tiers</td>
                  <td>10 ans</td>
                  <td>Lorsque vous naviguez sur le Web</td>
                </tr>
                <tr>
                  <td>
                    _biz_uid<br/>
                    _biz_pendingA<br/>
                    _biz_nA<br/>
                    _biz_flagsA<br/>
                    __cfduid
                  </td>
                  <td>Cookies pour stocker la personnalisation du contenu de l'information</td>
                  <td>Tiers</td>
                  <td>1 an</td>
                  <td>Lorsque vous naviguez sur le Web</td>
                </tr>
                <tr>
                  <td>
                    1P_JAR<br/>
                    APISID<br/>
                    NID<br/>
                    HSID<br/>
                    SAPISID<br/>
                    SID<br/>
                    SIDCC<br/>
                    SSID
                  </td>
                  <td>Les cookies stockés sur l'ordinateur de l'utilisateur afin de rester connecté à votre compte Google lorsque vous visitez à nouveau vos services. Tant que vous restez avec cette session active et que vous utilisez des modules complémentaires sur d'autres sites Web comme le nôtre, Google utilise ces cookies pour améliorer votre expérience utilisateur. Les objectifs des cookies sont variés: gestion des préférences, analyse du comportement des utilisateurs, sécurité, identification des utilisateurs...</td>
                  <td>Tiers</td>
                  <td>La durée dépend du type de cookie installé : De 10 minutes à 20 ans</td>
                  <td>Lorsque vous naviguez sur le Web</td>
                </tr>
              </tbody>
            </table>
          </div>

          <p>Ce site Web, comme la plupart des sites Web, comprend des fonctionnalités fournies par des tiers.</p>
          <p>Notre site Web est un site Web en direct et de nouveaux modèles ou services tiers peuvent être inclus. Cela peut parfois modifier la configuration des cookies et l'apparition de cookies non détaillés dans cette politique.</p>
          <p>Notre site ne contrôle pas les cookies utilisés par des tiers. Pour plus d'informations sur les cookies des réseaux sociaux ou d'autres sites Web de tiers, nous vous conseillons de consulter vos propres politiques de cookies.</p>

          <h3>4. Information et obtention du consentement pour l'installation</h3>
          <p>www.talentedeurope.eu essaiera à tout moment d'établir des mécanismes adéquats pour obtenir le consentement de l'utilisateur pour l'installation des cookies qui le nécessitent. Lorsqu'un utilisateur accède à notre site Web, une fenêtre contextuelle apparaît pour l'informer de l'existence de cookies. Si vous continuez à naviguer sur notre site Web, vous consentez à l'installation de cookies.</p>

          <h3>5. Comment puis-je empêcher l'installation de cookies?</h3>
          <p>L'utilisateur peut configurer son navigateur pour accepter, ou non, les cookies qu'il reçoit ou pour que le navigateur l'avertisse lorsqu'un serveur souhaite enregistrer un cookie. Si certains cookies techniques sont désactivés, le bon fonctionnement de certains utilitaires Web n'est pas garanti.</p>
          <p>L'utilisateur peut exclure que les cookies «analytiques et publicitaires» de Google Analytics soient stockés sur son terminal à l'aide des <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">systèmes d'exclusion fournis par Google Analytics</a>.</p>
          <p>Voici quelques exemples de désactivation des cookies:</p>
          <ol type="a">
            <li>
              <strong>En configurant le navigateur lui-même:</strong>
              <ul>
                <li>Internet Explorer: <a href="http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies" target="_blank">http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies</a></li>
                <li>Firefox: <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web" target="_blank">https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web</a></li>
                <li>Safari: <a href="http://support.apple.com/kb/HT1677?viewlocale=en_US" target="_blank">http://support.apple.com/kb/HT1677?viewlocale=en_US</a></li>
                <li>Chrome: <a href="https://support.google.com/accounts/answer/61416?hl=en" target="_blank">https://support.google.com/accounts/answer/61416?hl=en</a></li>
                <li>Opera: <a href="http://help.opera.com/Windows/11.50/es-ES/cookies.html" target="_blank">http://help.opera.com/Windows/11.50/es-ES/cookies.html</a></li>
              </ul>
              Pour développer cette information, visitez le site Web de l'Agence espagnole pour la protection des données qui aide à configurer la confidentialité dans les réseaux sociaux, les navigateurs et les systèmes d'exploitation mobiles. <a href="http://www.agpd.es/portalwebAGPD/CanalDelCiudadano/protegetuprivacidad/index-ides-idphp.php" target="_blank">Plus d'information</a>.
            </li>
            <li>
              <strong>En utilisant des outils tiers:</strong><br/>
              Il existe des outils tiers, disponibles en ligne, qui permettent aux utilisateurs de détecter les cookies sur chaque site Web qu'ils visitent et de gérer leur désactivation, par exemple:<br/>
              <a href="http://www.ghostery.com" target="_blank">http://www.ghostery.com</a><br/>
              <a href="http://www.youronlinechoices.com/en/" target="_blank">http://www.youronlinechoices.com/en/</a>
            </li>
          </ol>

          <h3>6. Liens vers d'autres sites</h3>
          <p>Si vous choisissez de quitter notre site Web via des liens vers d'autres sites n'appartenant pas à notre entité, nous ne serons pas responsables des politiques de confidentialité de ces sites ou des cookies qu'ils peuvent stocker sur l'ordinateur de l'utilisateur.</p>

          <h3>7. Comment recueillons-nous et utilisons-nous les adresses IP?</h3>
          <p>Les serveurs Web peuvent détecter automatiquement l'adresse IP et le nom de domaine utilisés par les utilisateurs.</p>
          <p>Une adresse IP est un numéro attribué automatiquement à un ordinateur lorsqu'il se connecte à Internet. Cette information permet le traitement ultérieur des données afin de savoir si vous avez donné votre consentement pour l'installation de cookies, de ne faire que des mesures statistiques permettant de connaître le nombre de visites sur le Web, l'ordre des visites, le point d'accès, etc.</p>

          <h3>8. Mise à jour de notre politique de cookies</h3>
          <p>Cette politique est revue périodiquement pour assurer sa validité, de sorte qu'elle peut être modifiée. Nous vous recommandons de visiter régulièrement le site où nous vous informerons de toute mise à jour à ce sujet.</p>
        </div>

      @elseif (App::getLocale() == 'sk')
        <h2 class="page-title">Politika súborov cookie</h2>
        <div class="well">
          <h3 class="mt-0">1. Čo sú súbory cookie?</h3>
          <p>Súbor cookie je textový súbor, ktorý webový server môže uložiť na pevný disk vášho počítača, aby mohol uložiť nejaký typ informácií o vás ako používateľovi. Súbory cookie sa používajú na účely, ako je ukladanie údajov pre budúce návštevy, rozpoznanie používateľa a vyhnutie sa požiadavkám na nové overenie, poznanie stránok, ktoré navštevujete alebo ukladanie vašich predvolieb v prispôsobiteľných oblastiach .... Za normálnych okolností webové stránky používajú cookie na získanie štatistických informácií o svojich webových podstránkach a na analýzu správania svojich zákazníkov.</p>

          <h3>2. Typy súborov cookie</h3>
          <p>Súbory cookie  môžu byť klasifikované podľa nasledujúcich kritérií:</p>
          <p>Podľa toho, kto inštaluje súbory cookie:</p>
          <ul>
            <li><strong>Vlastné súbory cookie:</strong> sú súbory, ktoré sa odosielajú koncovému používateľskému zariadeniu z počítača alebo domény spravovanej samotným editorom a z ktorého je poskytovaná služba požadovaná používateľom.</li>
            <li><strong>Súbory cookie tretej strany:</strong> Súbory, ktoré sú odosielané do koncového zariadenia používateľa z počítača alebo domény spravovanej nami alebo treťou stranou, ale informácie zhromaždené súbormi cookie sú spravované inou treťou stranou ako majiteľom webových stránok.</li>
          </ul>
          <p>Podľa doby uchovateľnosti:</p>
          <ul>
            <li><strong>Dočasné súbory cookie/relácie:</strong> súbory, ktoré trvajú tak dlho, ako používateľ prezerá webovú stránku, a po skončení navigácie sa odstránia.</li>
            <li><strong>Trvalé súbory cookie:</strong> Sú ukladané na termináli používateľa dlhší čas, čo uľahčuje riadenie vybraných preferencií bez nutnosti opakovania parametrov pri každej návšteve webových stránok.</li>
          </ul>
          <p>Podľa účelu:</p>
          <ul>
            <li><strong>Technické  súbory cookie:</strong> Technické súbory cookie sú potrebné a striktne nevyhnutné na správne fungovanie webovej stránky a využívanie rôznych ponúkaných možností a služieb, napr. dočasné úlohy údržby, súbory cookie, ktoré používajú bezpečnostné prvky, zdieľajú obsah so sociálnymi sieťami atď.</li>
            <li><strong>Personalizované súbory cookie:</strong> Umožnia používateľovi vybrať alebo prispôsobiť vlastnosti webovej podstránky, ako je jazyk, región alebo typ prehliadača.</li>
            <li><strong>Analytické súbory cookie:</strong> Používajú ich webové stránky na vytváranie profilov prehliadania a na rozpoznanie preferencií koncových používateľov za účelom zlepšenia ponuky produktov a služieb. Umožňujú spravovať geografické oblasti väčšieho záujmu používateľa, informácie o webe v širšom rozsahu atď.</li>
            <li><strong>Reklamné súbory cookie:</strong> Umožňujú správu reklamných priestorov na základe konkrétnych kritérií, napríklad frekvencia pripojenia, upravený obsah atď. Reklamné súbory cookie umožňujú komunikáciu zvykov, skúmanie prístupov a vytváranie profilu používateľských preferencií za účelom ponúkanutia reklamy súvisiacej so záujmami ich profilu.</li>
          </ul>

          <h3>3. Súbory cookie používané na našej webovej stránke</h3>
          <p>www.talentedeurope.eu používa nasledujúce typy súborov cookies na webe:</p>
          <strong>Technické súbory cookie</strong>
          <p>Umožňujú používateľovi prehliadať web a používať prvky ako nákupný vozík.</p>
          <strong>Personalizované súbory cookie</strong>
          <p>Umožňujú poznať preferencie používateľa: jazyk, navštívené produkty.</p>
          <strong>Analýza súborov cookie</strong>
          <p>Používame súbory cookie prichádzajúce zo služieb Google Analytics a Smartlook, aby sme kvantifikovali počet používateľov, ktorí navštívili web. Tieto súbory cookie Vám umožňujú merať a analyzovať spôsob, akým používatelia prehliadajú web. Tieto informácie umožňujú spoločnosti CIFP CESAR MANRIQUE neustále zlepšovať svoje služby a skúsenosti používateľov webu. Pre ďalšie informácie môžete kontaktovať stránku ochrany osobných údajov služby Google Analytics:</p>
          <p><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage" target="_blank">https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage</a></p>
          <strong>Reklamné a behaviorálne reklamné súbory cookie</strong>
          <p>Tieto súbory cookie sa používajú na zobrazenie relevantných reklám pre používateľov na základe ich využívania našich webových stránok. Okrem toho limitujú počet zobrazení reklamy každým používateľom a pomáha CIFP CESAR MANRIQUE merať efektívnosť svojich reklamných kampaní. Pri surfovaní na webe sa používateľ zaväzuje na svojom zariadení nainštalovať tento typ súborov cookie a zaregistrovať ich, keď používateľ v budúcnosti navštívi webovú stránku CIFP CESAR MANRIQUE.</p>
          <div class="table-responsive">
            <table class="cookies-table table table-bordered">
              <thead>
                <tr>
                  <th>Názov súboru cookie</th>
                  <th>Účel</th>
                  <th>Vlastná/tretia strana</th>
                  <th>Trvanie</th>
                  <th>Kedy je to inštalované?</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Dočasný súbor cookie</td>
                  <td>Technika</td>
                  <td>Vlastná</td>
                  <td>Dočasné/relácia</td>
                  <td>Pri prístupe na webovú stránku</td>
                </tr>
                <tr>
                  <td>
                    optimizelySegments<br/>
                    optimizelyEndUserId<br/>
                    optimizelyBuckets
                  </td>
                  <td>Súbory cookie pre výkonnosť a identifikáciu používateľov</td>
                  <td>Tretie strany</td>
                  <td>10 rokov</td>
                  <td>Pri prehliadaní webu</td>
                </tr>
                <tr>
                  <td>
                    _biz_uid<br/>
                    _biz_pendingA<br/>
                    _biz_nA<br/>
                    _biz_flagsA<br/>
                    __cfduid
                  </td>
                  <td>Súbory cookie na uchovanie personalizácie informačného obsahu</td>
                  <td>Tretie strany</td>
                  <td>1 rok</td>
                  <td>Pri prehliadaní webu</td>
                </tr>
                <tr>
                  <td>
                    1P_JAR<br/>
                    APISID<br/>
                    NID<br/>
                    HSID<br/>
                    SAPISID<br/>
                    SID<br/>
                    SIDCC<br/>
                    SSID
                  </td>
                  <td>Súbory cookie uložené v počítači používateľa, aby pri opätovnej návšteve vašich služieb zostali pripojení k vášmu účtu Google.  Kým zostanete v tejto aktívnej relácii a používate doplnky na iných webových stránkach, ako je tá naša, spoločnosť Google tieto cookies použije na zlepšenie Vášho používateľského zážitku. Účely súborov cookie sú rôzne: správa preferencií, analýza správania používateľov, bezpečnosť, identifikácia používateľov.</td>
                  <td>Tretie strany</td>
                  <td>Trvanie závisí od typu inštalovaného súboru cookie: od 10 minút do 20 rokov</td>
                  <td>Pri prehliadaní webu</td>
                </tr>
              </tbody>
            </table>
          </div>

          <p>Táto webová stránka, podobne ako väčšina webových stránok, obsahuje funkcie poskytované tretími stranami.</p>
          <p>Naša webová stránka je živý web a nové návrhy alebo služby tretích strán môžu byť zahrnuté. Toto môže príležitostne zmeniť konfiguráciu a vzhľad súborov cookie, ktoré v týchto pravidlách nie sú detailne uvedené.</p>
          <p>Naša stránka nespravuje súbory cookie, ktoré tieto tretie strany používajú. Pre viac informácií o súboroch cookie zo sociálnych sietí alebo iných webových stránok tretích strán vám odporúčame, aby ste si prečítali svoje vlastné pravidlá súborov cookie.</p>

          <h3>4. Informácie a získanie súhlasu s inštaláciou</h3>
          <p>www.talentedeurope.eu sa pokúsi vždy vytvoriť adekvátne mechanizmy na získanie súhlasu používateľa na inštaláciu súborov cookie, ktoré ho vyžadujú. Keď používateľ pristupuje k našim webovým stránkam, objaví sa pop-up okno s informáciou o existencii súborov cookie a že ak pokračujete v prehliadaní našich webových stránok, súhlasíte s inštaláciou súborov cookie.</p>

          <h3>5. Ako zabrániť inštalácii súborov cookie?</h3>
          <p>Používateľ môže nakonfigurovať svoj prehliadač tak, aby prijal, či nie, súbory cookie, ktoré dostáva, alebo pre prehliadač, aby ho upozornil, keď server chce uložiť súbor cookie. Ak sú niektoré technické súbory cookie zakázané, nie je zaručené správne fungovanie niektorých nástrojov webu.</p>
          <p>Používateľ môže zabrániť, aby boli súbory cookie "analytickej a reklamnej" služby Google Analytics uložené na jeho termináli pomocou <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">vylúčených systémov poskytovaných službou Google Analytics</a>.</p>
          <p>Tu je niekoľko príkladov, ako vypnúť súbory cookies:</p>
          <ol type="a">
            <li>
              <strong>Konfiguráciou samotného prehliadača:</strong>
              <ul>
                <li>Internet Explorer: <a href="http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies" target="_blank">http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies</a></li>
                <li>Firefox: <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web" target="_blank">https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-web</a></li>
                <li>Safari: <a href="http://support.apple.com/kb/HT1677?viewlocale=en_US" target="_blank">http://support.apple.com/kb/HT1677?viewlocale=en_US</a></li>
                <li>Chrome: <a href="https://support.google.com/accounts/answer/61416?hl=en" target="_blank">https://support.google.com/accounts/answer/61416?hl=en</a></li>
                <li>Opera: <a href="http://help.opera.com/Windows/11.50/es-ES/cookies.html" target="_blank">http://help.opera.com/Windows/11.50/es-ES/cookies.html</a></li>
              </ul>
              Pre rozšírenie týchto informácií prejdite na webovú stránku Španielskej agentúry pre ochranu údajov (Spanish Agency for Data Protection), ktorá pomáha konfigurovať súkromie v sociálnych sieťach, prehliadačoch a mobilných operačných systémoch. <a href="http://www.agpd.es/portalwebAGPD/CanalDelCiudadano/protegetuprivacidad/index-ides-idphp.php" target="_blank">Viac informácií</a>.
            </li>
            <li>
              <strong>Používanie nástrojov tretej strany:</strong><br/>
              Existujú nástroje tretích strán, ktoré sú k dispozícii online, ktoré umožňujú používateľom rozpoznať súbory cookie na každej navštívenej webovej lokalite a spravovať ich deaktiváciu, napríklad:<br/>
              <a href="http://www.ghostery.com" target="_blank">http://www.ghostery.com</a><br/>
              <a href="http://www.youronlinechoices.com/en/" target="_blank">http://www.youronlinechoices.com/en/</a>
            </li>
          </ol>

          <h3>6. Odkazy na iné webové stránky</h3>
          <p>Ak sa rozhodnete opustiť našu webovú stránku prostredníctvom odkazov na iné webové stránky, ktoré nepatria do našej spoločnosti, nebudeme zodpovední za zásady ochrany osobných údajov na takýchto webových stránkach alebo súbory cookie, ktoré môžu uložiť v počítači používateľa.</p>

          <h3>7. Ako zhromažďujeme a používame IP adresy?</h3>
          <p>Webové servery dokážu automaticky zistiť adresu IP a názov domény používaných používateľmi.</p>
          <p>IP adresa je číslo automaticky pridelené počítaču, keď sa pripája na internet. Tieto informácie umožňujú následné spracovanie údajov s cieľom zistiť, či ste súhlasili s inštaláciou súborov cookie, aby ste vykonali iba štatistické merania, ktoré umožňujú poznať počet návštev na webe, poradie návštev, prístupový bod , atď.</p>

          <h3>8. Aktualizácia našich pravidiel súborov cookie</h3>
          <p>Tieto pravidlá sa periodicky kontrolujú, aby sa zabezpečila ich platnosť, takže je možné ich upraviť. Odporúčame pravidelne navštevovať stránku, kde vás budeme informovať o akejkoľvek aktualizácii.</p>
        </div>
      @endif

    </div>
  </div>
</div>
@endsection
