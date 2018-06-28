@extends('../layouts.app')

@section('page-title') Cookie policy @endsection

@section('content')
<div class="container static-page">
  <div class="row">
    <div class="col-md-12 col-xs-12">

      @if (App::getLocale() == 'es')
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

      @else
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
      @endif

    </div>
  </div>
</div>
@endsection
