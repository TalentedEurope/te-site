@extends('../layouts.app')

@section('page-title') Cookie policy @endsection

@section('content')
<div class="container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">

      @if (App::getLocale() == 'en')
        <h2 class="page-title">Information about cookies</h2>
        <div class="well">
          <p>
            According with Law 34/2002 about Services of the Information Society, we inform you that this website uses cookies.
          </p>

          <p>
            Cookies are small text files used by the website you are visiting and they are stored on your computer. They are widely used in order to make the website work right and efficiently, since it provides information to the owners of the site. The use of cookies is standardized in the most of the websites. If you refuse to send cookies to our systems, you can “disable” and manage from your browser, removing them from your browsing history (cache) when the visit ends.
          </p>

          <h3>Types of cookies</h3>
          <ul>
            <li>“Session” cookies: they stay in your browser during your visit (for instance, till you close the browser and the visit ends).</li>
            <li>“Persistent” cookies: they stay in your browser after the session (in case you do not remove them).</li>
            <li>“Performance” cookies: they collect information about the use of the website; they do not collect personal information and collected data is stored in an anonymous way. The “Performance” cookies are used to improve the behaviour of the website.</li>
            <li>“Functionality” cookies: they let to the website to store whichever option you have done in the page (for instance, changes in font- size, customization of pages) or let services as include posts in blogs.</li>
          </ul>

          <h3>Purpose</h3>
          <ul>
            <li>Analytic cookies: they are used to collect statistics about the activity of the user. Among others, items such as followings are analysed: number of users who visit the website, number of visited pages as well as the activity of the users in the website and frequency of using. Collected information is always anonymous, therefore there will be no way to stablish a link between the information and the person whom it refers.</li>
            <li>Cookies used by social networks: They let the user to have the chance of sharing with his contacts in a social network, the contents of interest through clicking the corresponding button (plug-in), which is inserted on the website. Plug-ins store and access to the cookies within the final user and let the social network to identify the users when these ones interact with the plug-ins.</li>
          </ul>
          <h3>Use of cookies Talented Europe</h3>
          <p>
            Based on the directives of the National Spanish Agency of Data Protection, next is detailed the use of the cookies in this website. With the use of this website, you are conscious and agree that we store these cookies in your computer / device / browser for the declared aims.
          </p>
          <p>
            Third-party cookies are those that are sent to the final machine of the user, from a host or domain that is not managed by the editor, but by another entity which treats the obtained data through the cookies. The next table explains the way we use the cookies:
          </p>

         <table class="table table-striped">
            <thead>
              <tr>
                <th>Provider</th>
                <th>Aim</th>
                <th>Description</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Google Analytics </td>
                <td>To analyse websites </td>
                <td>It lets that the owners of websites know how the users interact with their websites. Additionally, it enables cookies in the domain of the site where you are and uses a cookie named “_ga” to collect information in an anonymous way and produce trend-reports of websites without identifying individual users.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">View more information</a></td>
              </tr>
              <tr>
                <td>Youtube</td>
                <td>To display videos </td>
                <td>It lets that the owners of websites know how the users interact with their websites. Additionally, it enables cookies in the domain of the site where you are and it uses them to collect information in an anonymous way and produce trend- reports of websites without identifying individual users. </td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">View more information</a></td>
              </tr>
              <tr>
                <td>Addthis</td>
                <td>To share content in social networks</td>
                <td>“psc”, “uvc”, “atuvc” and “uid”. These cookies are used by Addthis.com letting to the users, to share pages and contents easily. These cookies let remind preferences, such as in which net the user prefer to share the content (for instance Facebook or Twitter).</td>
                <td><a href="http://www.addthis.com/privacy">View more information</a></td>
              </tr>
            </tbody>
          </table>

          <h3>Additional notes</h3>
          <p>Web browsers are the tools in charge of storing the cookies, and from this place you can exercise your rights in order to remove or disable them. Nor this web nor their legal representatives can guarantee the correct or incorrect handling of the cookies by the mentioned browsers.</p>
          <p>In some cases it is necessary to install cookies for the browser not to forget its decision of non-acceptance of the cookies.</p>
        </div>

      @elseif (App::getLocale() == 'es')
        <h2 class="page-title">INFORMACIÓN SOBRE COOKIES</h2>
        <div class="well">
          <p>
            De acuerdo con la Ley 34/2002 de Servicios de la Sociedad de la Información, le informamos que este sitio web utiliza cookies.
          </p>

          <p>
            Las cookies son pequeños archivos de texto utilizados por el sitio web que está visitando y se almacenan en su ordenador. Son ampliamente utilizados con el fin de hacer que el sitio web funcione correctamente y de manera eficiente, ya que proporciona información a los propietarios del sitio. El uso de cookies está estandarizado en la mayoría de los sitios web. Si se niega a enviar cookies a nuestros sistemas, puede "deshabilitar" y administrar desde su navegador, eliminándolos del historial de navegación (caché) cuando termine la visita.
          </p>

          <h3>Tipos de cookies</h3>
          <ul>
            <li>Cookies "temporales": permanecen en su navegador durante su visita (por ejemplo, hasta que cierre el navegador y la visita termine).</li>
            <li>Cookies "persistentes": permanecen en su navegador después de la sesión (en caso de que no las retire).</li>
            <li>Cookies de "rendimiento": recopilan información sobre el uso del sitio web; No recopilan información personal y los datos recolectados se almacenan de manera anónima. Las "cookies" de rendimiento se utilizan para mejorar el comportamiento del sitio web.</li>
            <li>Cookies de "funcionalidad": permiten al sitio web almacenar la opción que haya hecho en la página (por ejemplo, cambios en el tamaño de la fuente, personalización de páginas) o dejar que los servicios incluyan publicaciones en blogs.</li>
          </ul>

          <h3>Propósito</h3>
          <ul>
            <li>Cookies analíticas: se utilizan para recopilar estadísticas sobre la actividad del usuario. Entre otros, se analizan temas como los siguientes: número de usuarios que visitan el sitio web, número de páginas visitadas, así como la actividad de los usuarios en el sitio web y la frecuencia de uso. La información recogida es siempre anónima, por lo tanto no habrá manera de establecer un vínculo entre la información y la persona a la que se refiere.</li>
            <li>Cookies utilizados por las redes sociales: permiten al usuario tener la posibilidad de compartir con sus contactos en una red social, los contenidos de interés haciendo clic en el botón correspondiente (plug-in), que se inserta en el sitio web. Los (plug-in) almacenan y acceden a las cookies dentro del usuario final y permiten que la red social identifique a los usuarios cuando éstos interactúan con los (plug-in).</li>
          </ul>
          <h3>Uso de cookies Talented Europe</h3>
          <p>
            Basado en las directivas de la Agencia Nacional de Protección de Datos de España, a continuación se detalla el uso de las cookies en este sitio web. Con el uso de este sitio web, usted es consciente y está de acuerdo en que almacenamos estas cookies en su computadora / dispositivo / navegador para los objetivos declarados.
          </p>
          <p>
            Las cookies de terceros son aquellas que se envían al aparato final del usuario, desde un host o dominio que no es administrado por el editor, sino por otra entidad que trata los datos obtenidos a través de las cookies. La siguiente tabla explica la forma en que usamos las cookies:
          </p>

         <table class="table table-striped">
            <thead>
              <tr>
                <th>Proveedor</th>
                <th>Objetivo</th>
                <th>Descripción</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Google Analytics </td>
                <td>Para analizar sitios web</td>
                <td>Permite que los propietarios de sitios web conozcan cómo interactúan los usuarios con sus sitios web. Además, habilita las cookies en el dominio del sitio en el que se encuentra y utiliza una cookie denominada "_ga" para recopilar información de manera anónima y producir informes de tendencias de sitios web sin identificar usuarios individuales.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">Ver más información</a></td>
              </tr>
              <tr>
                <td>Youtube</td>
                <td>Para mostrar videos</td>
                <td>Permite que los propietarios de sitios web conozcan cómo interactúan los usuarios con sus sitios web. Además, habilita las cookies en el dominio del sitio donde se encuentra y las utiliza para recolectar información de forma anónima y producir informes de tendencias de sitios web sin identificar usuarios individuales.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">Ver más información</a></td>
              </tr>
              <tr>
                <td>Addthis</td>
                <td>Para compartir contenido en redes sociales</td>
                <td>"psc", "uvc", "actuvc" y "uid". Estas cookies son utilizadas por Addthis.com dejando a los usuarios compartir páginas y contenidos fácilmente. Estas cookies permiten recordar las preferencias, como en qué red el usuario prefiere compartir el contenido (por ejemplo, Facebook o Twitter).</td>
                <td><a href="http://www.addthis.com/privacy">Ver más información</a></td>
              </tr>
            </tbody>
          </table>

          <h3>Notas adicionales</h3>
          <p>Los navegadores web son las herramientas encargadas de almacenar las cookies, y desde este lugar puede ejercitar sus derechos con el fin de eliminarlos o deshabilitarlos. Ni esta web ni sus representantes legales pueden garantizar el correcto o incorrecto manejo de las cookies por los mencionados navegadores.</p>
          <p>En algunos casos es necesario instalar cookies para que el navegador no olvide su decisión de no aceptar las cookies.</p>
        </div>

      @elseif (App::getLocale() == 'it')
        <h2 class="page-title">Informazioni su cookie</h2>
        <div class="well">
          <p>
            Ai sensi della legge nr. 34/2002 sui servizi della società informatica, vi informiamo che questo sito utiilizza i cookie.
          </p>

          <p>
            Un cookie è un piccolo file di testo, memorizzato nel vostro computer da siti web durante la navigazione. I cookie vengono ampiamente utilizzati per migliorare le preferenze dei siti web perché forniscono informazioni ai proprietari dei siti web. La maggior parte dei siti web fa uso dei cookie. Se decidede di rifiutare la diffusione dei cookie al nostro sistema, potrete “disattivarli“ e gestirli dal vostro browser, rimuovendoli dalla vostra cronologia di navigazione (cache) a fine visita.
          </p>

          <h3>Tipologie di cookie</h3>
          <ul>
            <li>Cookie di sessione: rimangono memorizzati nel vostro browser solo durante la visita del sito (cioè finché non chiudiate il browser e non finiate la visita del sito).</li>
            <li>Cookie persistenti: rimangono nel vostro browser anche dopo la visita (a meno che non li rimuoviate da soli).</li>
            <li>Cookie tecnici: raccolgono informazioni sull‘utilizzo del sito; non raccolgono informazioni personali e i dati raccolti vengono memorizzati in modo anonimo. I cookie tecnici servono a facilitare la fruizione del sito da parte dell’utente.</li>
            <li>Cookie funzionali: permettono al sito di ricordare tutte le preferenze che avete scelto sul sito (ad es. modifica della dimensione dei caratteri, personalizzazione del sito), oppure di permettere il funzionamento dei servizi, ad es. aggiungere reazioni ai blog.</li>
          </ul>

          <h3>Scopo dei cookie</h3>
          <ul>
            <li>Cookie analitici: servono a raccogliere statistiche sull’attività dell’utente. Tra l’altro, vengono analizzati i seguenti argomenti: numero degli utenti che visitano il sito, numero dei siti visualizzati, attività degli utenti sul sito e frequenza del suo utilizzo. Le informazioni raccolte sono sempre anonime, perciò non è mai possibile connettere le informazioni con la persona a cui si riferiscono.</li>
            <li>Cookie utilizzati dai social network: permettono all’utente di condividere un contenuto, secondo i suoi interessi, con i suoi contatti nei social network, cliccando sull’appostio pulsante (plug-in) che si trova sul sito. I plug-in conservano l’accesso ai cookie dell’utente finale e permettono ai social network di identificare gli utenti quando interagiscono con i plug-in.</li>
          </ul>
          <h3>Utilizzo dei cookie su Talented Europe</h3>
          <p>
            Ai sensi delle direttive della Agenzia spagnola per la protezione dei dati, segue una descrizione dettagliata dell‘utilizzo dei cookie su questo sito. Utilizzando questo sito, confermate di aver compreso e accettato il fatto che noi memorizziamo questi cookie sul vostro computer / dispositivo / browser, per obiettivi sopra indicati.
          </p>
          <p>
            I cookie di terze parti sono dei file mandati al dispostivo finale dell’utente da ospiti o domini non gestiti dall‘editore, bensì da un’altra entità, che elabora i dati ottenuti tramite i cookie. La seguente tabella descrive come utilizziamo i cookie:
          </p>

         <table class="table table-striped">
            <thead>
              <tr>
                <th>Fornitore</th>
                <th>Scopo</th>
                <th>Descrizione</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Google Analytics</td>
                <td>Analizzare siti web</td>
                <td>Permette ai proprietari dei siti web di sapere come gli utenti interagiscono con i loro siti. Inoltre, autorizza l’utilizzo dei cookie nel dominio della pagina in cui vi trovate e utilizza un cookie intitolato “_ga“ per raccogliere informazioni in modo anonimo e per produrre i trend report dei siti web senza identificare i singoli utenti.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">Per saperne di più</a></td>
              </tr>
              <tr>
                <td>Youtube</td>
                <td>Visualizzare video</td>
                <td>Permette ai proprietari dei siti web di sapere come gli utenti interagiscono con i loro siti. Inoltre, autorizza l’utilizzo dei cookie nel dominio della pagina in cui vi trovate e utilizza i cookie per raccogliere informazioni in modo anonimo e per produrre i trend report dei siti web senza identificare i singoli utenti.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">Per saperne di più</a></td>
              </tr>
              <tr>
                <td>Addthis</td>
                <td>Condividere contenuti sui social network</td>
                <td>“psc“, “uvc“, “atuvc“ e “uid“. Questi cookie vengono utilizzati dal sito Addthis.com,  permettendo agli utenti di condividere facilmente pagine e contenuti. Questi cookie servono a memorizzare preferenze, ad es. su quale social network l’utente preferisce condividere il contenuto (ad es. Facebook o Twitter).</td>
                <td><a href="http://www.addthis.com/privacy">Per saperne di più</a></td>
              </tr>
            </tbody>
          </table>

          <h3>Note aggiuntive</h3>
          <p>I web browser sono degli strumenti per memorizzare i cookie. A questo punto potete applicare il vostro diritto di rimuoverli o disattivarli. Né questo sito, né i suoi legali rappresentanti possono garantire un utilizzo corretto o scorretto dei cookie da parte dei browser sopra indicati.</p>
          <p>In alcuni casi è necessario installare i cookie nel browser, perché esso non si dimentichi della sua decisione di disattivare i cookie.</p>
        </div>

      @elseif (App::getLocale() == 'de')
        <h2 class="page-title">Informationen über Cookies</h2>
        <div class="well">
          <p>
            Im Einklang mit dem Gesetz 34/2002 über die Dienstleistung der Informationsgesellschaft informieren wir Sie hiermit, dass diese Webseite cookies benutz.
          </p>

          <p>
            Cookies ist eine kleine Textdatei, die die Webseite in Eurem Computer speichert. Oft werden Sie genutzt, damit die Webseite richtig und effektiv funktioniert, weil Sie Informationen an die Betreiber der Webseite liefern. Die Nutzung von cookies ist ein übliches Verfahren der Mehrheit der Webseiten. Wenn Sie die Bereitstellung von cookies an unser System verweigern, können Sie sie „abstellen“ und sie von Ihrem Computer aus verwalten. Damit werden sie aus Ihrer Chronik nach dem Verlassen der Webseite gelöscht.
          </p>

          <h3>Arten der cookies Dateien:</h3>
          <ul>
            <li>Session Cookies: sind temporäre Dateien, die nur so lange auf dem Rechner des Nutzers verbleiben bis dieser die Webseite verlässt. Sie werden nicht dauerhaft auf dem Rechner gespeichert.</li>
            <li>Dauerhafte Cookies: diese Cookies werden auf dem Rechner des Nutzers im Ordner Cookies gespeichert und verbleiben dort auch nach Schließung der Internetsitzung, falls Sie nicht von Ihnen gelöscht werden.</li>
            <li>Leistungs- (Performance-) Cookies Diese Cookies helfen, die Leistung der Website zu verbessern und bieten eine bessere Benutzererfahrung.</li>
            <li>Funktionalitäts-Cookies Diese Cookies verbessern die Funktionalität einer Website durch das Speichern Ihrer Einstellungen.</li>
          </ul>

          <h3>Zweck</h3>
          <ul>
            <li>Analytische -Cookies: es handelt sich hierbei um Cookies, die Zugriffsstatistiken ermöglichen, indem sie Daten zu Anzahl und Verhalten der Besucher in anonymer Form erfassen. Diese Cookies können und werden nicht zur Identifizierung der Website-Besucher verwendet. Alle erfassten Daten bleiben anonym.</li>
            <li>Cookies für soziale Netzwerke: sie ermöglichen den Nutzer  den Inhalt, nach seinem Interesse, mit seinen Kontakten in den sozialen Netzwerken zu teilen, in dem er den entsprechenden Button anklickt, der auf der Webseite installiert ist. Ladbare Dateien speichern und behalten den Zutritt zu den cookies Dateien des Endabnehmers. Sie erlauben dem sozialen Netzwerken die Nutzer zu identifizieren, wenn sie die ladbare Dateien nutzen.</li>
          </ul>
          <h3>Die Nutzung der cookies Dateien auf den Webseiten von Talented Europe</h3>
          <p>
            Auf Grund der Richtlinien des Spanischen Amtes für den Informationsschutz führen wir die detaillierte Nutzung der cookies auf dieser Webseite. Wenn Sie diese Webseite nutzen, sind Sie sich Bewusst, dass wir diese Dateien in Ihrem Computer/Anlage/Suchmaschine auf Grund der deklarierten Ziele speichern, und Sie sind damit einverstanden.
          </p>
          <p>
            Drittanbieter-cookies sind Dateien, die von einer anderen Website angelegt und verwalten werden als von der, die Sie gerade besuchen. Die folgende Tabelle erklärt, auf welche Weise wir die cookies-Dateien nutzen.
          </p>

         <table class="table table-striped">
            <thead>
              <tr>
                <th>Anbieter</th>
                <th>Ziel</th>
                <th>Beschreibung</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Google Analytics</td>
                <td>Webseiten analysieren</td>
                <td>Sie ermöglichen den Inhaber der Webseiten Informationen über Nutzung der Webseite seitens der Nutzer.  Außerdem werden die cookies Dateien erlaubt, auf der Webseite wo Sie sich befinden und diese nutzt die cookies Dateien „_ga“ für das anonyme Sammeln von Informationen und die Erstellung Webseitentendenzen ohne die einzelnen Nutzer zu identifizieren.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">Mehr Informationen</a></td>
              </tr>
              <tr>
                <td>Youtube</td>
                <td>Anzeigen von Videos</td>
                <td>Ermöglicht den Webseiteninhaber die Informationen über die Nutzung der Webseiten. Außerdem werden die cookies Dateien erlaubt, auf der Webseite wo Sie sich befinden und diese nutzt die cookies Dateien für das anonyme Sammeln von Informationen und die Erstellung Webseitentendenzen ohne die einzelnen Nutzer zu identifizieren.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">Mehr Informationen</a></td>
              </tr>
              <tr>
                <td>Addthis</td>
                <td>Den Inhalt in sozialen Netzwerken teilen</td>
                <td>"psc", "uvc", "atuvc" und "uid". Diese cooikies  Dateien werden von der Webseite  Addthis.com genutzt, was es erlaubt den Nutzer mühelos Webseiten und Inhalte zu teilen. Diese Dateien ermöglichen das Speicher von Präferenzen, wie z.B. in welchem sozialen Netzwerk der Nutzer den Inhalt teilte (z.B. Facebook oder Twitter).</td>
                <td><a href="http://www.addthis.com/privacy">Mehr Informationen</a></td>
              </tr>
            </tbody>
          </table>

          <h3>Ergänzende Bemerkungen</h3>
          <p>Webseitensuchmaschinen sind Instrumente zu Speichern von cookies Dateien,  und hier können Sie sich Ihres Rechts bedienen diese zu löschen oder abzustellen. Auch dieser Web, ach nicht seine Rechtsvertreter, können das richtige oder falsche Nutzen von cookies Dateien gewährleisten, die in der Suchmaschine angeführt sind.</p>
          <p>In manchen Fällen ist es notwendig die cookies Dateien in der Suchmaschine zu installieren, damit sie sich auf das Sperren der cookies Dateien erinnert.</p>
        </div>

      @elseif (App::getLocale() == 'fr')
        <h2 class="page-title">Informations sur les cookies</h2>
        <div class="well">
          <p>
            Selon la loi 34/2002 sur les services de la société de l'information, nous vous informons que ce site utilise des cookies.
          </p>

          <p>
            Les cookies sont de petits fichiers texte utilisés par le site que vous visitez et ils sont stockés sur votre ordinateur. Ils sont largement utilisés pour faire fonctionner le bon site et efficace, car il fournit des informations aux propriétaires du site. L'utilisation de cookies est normalisé dans le sur la plupart des sites. Si vous refusez d'envoyer des cookies à nos systèmes, vous pouvez « désactiver » et gérer quelque chose qui manque, par exemple « Eux » de votre navigateur, les supprimer de votre historique de navigation (cache) lorsque la visite se termine.
          </p>

          <h3>Types de cookies</h3>
          <ul>
            <li>Session » cookies: ils restent dans votre navigateur lors de votre visite (par exemple, jusqu'à ce que vous fermez le navigateur et la visite se termine).</li>
            <li>De façon anonyme. Les cookies « Performance » sont utilisés pour améliorer le comportement des « cookies website.Persistent: ils restent dans votre navigateur après la session (dans le cas où vous ne les retirez pas).</li>
            <li>Les cookies « de performance »: ils recueillent des informations sur l'utilisation du site; ils ne recueillent pas de renseignements personnels et les informations recueillies sont stockées dans un.</li>
            <li>Fonctionnalité » cookies: ils laissent activer / permettre au site de stocker selon l'option que tout changement que vous avez fait dans la page (par exemple, les changements dans la taille de la police, la personnalisation des pages) ou laissez les services et activer les services comprennent sec messages dans les blogs.</li>
          </ul>

          <h3>But</h3>
          <ul>
            <li>Les cookies analytiques: ils sont utilisés pour recueillir des statistiques sur l'activité de l'utilisateur. Entre autres, on analyse les éléments suivants como: nombre d'utilisateurs qui visitent le site, le nombre de pages visitées, ainsi que l'activité des utilisateurs sur le site et la fréquence d'utilisation. Les informations collectées sont toujours anonymes. Par conséquent, il n'y aura aucun moyen de FONDÉE un lien entre l'information et la personne qui elle se réfère.</li>
            <li>Les cookies utilisés par les réseaux sociaux: Lles années permettent à l'utilisateur d'avoir la chance de partager avec ses contacts dans un réseau social, le contenu d'intérêt en cliquant sur le bouton correspondant (plug-in), qui est inséré sur le site Web ordre des mots. Notre version: Ils permettent aux utilisateurs de partager le contenu d'intérêt avec leurs contacts dans un réseau social en cliquant sur le bouton correspondant (plug-in), qui est inséré sur le site. Magasin et accès Plug-ins aux cookies dans l'utilisateur final et permettent d'activer le réseau social d'identifier les utilisateurs lorsque ceux-ci interagissent avec les plug-ins.</li>
          </ul>
          <h3>Utilisation des cookies manquants dans les préposition? Talented Europe</h3>
          <p>
            Sur la base des directives de l'Agence nationale espagnole de la protection des données, la prochaine est l'utilisation détaillée des cookies dans ce site suit / est indiqué ci-dessous. Avec l'utilisation de ce site, vous êtes conscient et acceptez que nous stockons ces cookies dans votre ordinateur / périphérique / navigateur pour les objectifs déclarés.
          </p>
          <p>
            Les cookies tiers sont ceux qui sont envoyés à l'utilisateur final de la machine, à partir d'un hôte ou d'un domaine non géré par l'éditeur, mais par une autre entité qui traite les données obtenues par les cookies. La prochaine table ci-dessous explique la façon dont nous utilisons les témoins:
          </p>

         <table class="table table-striped">
            <thead>
              <tr>
                <th>Fournisseur</th>
                <th>Objectif</th>
                <th>La description</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Google Analytics </td>
                <td>Pour analyser</td>
                <td>Il permet aux propriétaires de sites Web de savoir comment les utilisateurs interagissent avec leurs sites Web. En outre, il permet des cookies dans le domaine du site où vous êtes et utilise Manière anonyme et produire des rapports de tendances de sites Web sans identifier les utilisateurs individuels. un cookie appelé «_ga» pour collecter des informations dans un.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">View more information</a></td>
              </tr>
              <tr>
                <td>Youtube</td>
                <td>Pour afficher des vidéos</td>
                <td>Il permet aux propriétaires de sites Web de savoir comment les utilisateurs interagissent avec leurs sites Web. De plus, il permet aux cookies de se trouver dans le domaine du site où vous vous trouvez, et il les utilise pour collecter des informations de manière anonyme et produire des rapports sur les tendances des sites Web sans identifier les utilisateurs individuels.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">View more information</a></td>
              </tr>
              <tr>
                <td>Addthis</td>
                <td>Pour partager le contenu</td>
                <td>"psc", "uvc", "atuvc" et "uid". Ces cookies sont utilisés par Addthis.com permettant aux utilisateurs, permettant aux utilisateurs de partager facilement des pages et sur les réseaux sociaux des contenus. Ces cookies permettent de rappeler d'activer les préférences de conservation / stockage, par exemple dans le cas où l'utilisateur préfère partager le contenu (par exemple, Facebook ou Twitter).</td>
                <td><a href="http://www.addthis.com/privacy">View more information</a></td>
              </tr>
            </tbody>
          </table>

          <h3>Notes complémentaires</h3>
          <p>Les navigateurs web sont les outils chargés de stocker les cookies et de cet endroit que vous pouvez exercer vos droits afin de supprimer ou de les désactiver. Ni Ni ce site ni leurs représentants légaux peuvent garantir la manipulation correcte ou incorrecte des cookies par les navigateurs mentionnés.</p>
          <p>Dans certains cas, il est nécessaire d'installer des cookies pour en? le navigateur pour ne pas oublier sa décision de non-acceptation des cookies.</p>
        </div>

      @elseif (App::getLocale() == 'sk')
        <h2 class="page-title">Informácie o cookies</h2>
        <div class="well">
          <p>
            V súlade so zákonom 34/2002 o službách informačnej spoločnosti vás týmto informujeme, že táto webová stránka používa súbory cookies.
          </p>

          <p>
            Súbor cookie je malý textový súbor, ktorý webová lokalita ukladá vo vašom počítači pri jej prehliadaní. Často sa používajú na to, aby webová stránka správne a efektívne fungovala, pretože poskytujú informácie majiteľom stránky. Používanie súborov cookies je bežná prax väčšiny webových lokalít. Ak odmietate poskytnúť súbory cookies nášmu systému, môžete ich „odstraviť“ a spravovať z vášho prehliadača, čím sa odstránia z vašej histórie prehliadania (cache) po skončení návštevy stránky.
          </p>

          <h3>Druhy súborov cookies</h3>
          <ul>
            <li>Dočasné súbory cookies: zostávajú vo vašom prehliadači počas vašej návštevy stránky (napr. kým nezatvoríte prehliadač a neukončíte návštevu stránky).</li>
            <li>Trvalé súbory cookies: zostávajú vo vašom prehliadači po vašej návšteve stránky (v prípade, že ich sami neodstránite).</li>
            <li>Výkonnostné súbory cookies: zbierajú informácie o používaní webovej stránky; nezbierajú osobné informácie a uložené údaje sú anonymné. Tieto výkonnostné cookies sa používajú na zlepšenie používateľského komfortu/funkcionality webstránky.</li>
            <li>Funkčné súbory cookies: umožňujú webovej stránke uložiť akékoľvek preferencie, ktoré ste na stránke zvolili (napr. zmeny písma – veľkosť, prispôsobenie strany) alebo povoliť služby ako pridávanie reakcií na blogy.</li>
          </ul>

          <h3>Účel</h3>
          <ul>
            <li>Analytické súbory cookies: používajú sa na zber štatistík o aktivite užívateľa. Okrem iného sa analyzujú tieto položky: počet používateľov, ktorí navštívia webovú stránku, počet zobrazených stránok, ako aj aktivita používateľov na webovej stránke a frekvencia jej používania. Zozbierané informácie sú vždy anonymné, a teda nie je možné zistiť prepojenie medzi informáciami a osobou, ku ktorej sa viažu.</li>
            <li>Súbory cookies používané sociálnymi sieťami: umožňujú používateľovi zdieľať obsah podľa jeho záujmu  so svojimi kontaktmi v sociálnej sieti tým, že klikne na zodpovedajúce tlačidlo (zásuvný modul) inštalovaný na webovej stránke. Zásuvné moduly uchovávajú a majú prístup k súborom cookies koncového používateľa. Umožňujú tiež sociálnej sieti identifikovať používateľov, keď využívajú zásuvné moduly.</li>
          </ul>
          <h3>Používanie súborov cookies na stránkach projektu Talented Europe</h3>
          <p>
            Na základe smerníc Španielskeho úradu na ochranu údajov ďalej uvádzame detailné používanie súborov cookies na tejto webovej stránke. Ak používate túto webovú stránku, ste si vedomí, že uchovávame tieto súbory cookies vo vašom počítači/zariaden/prehliadači na deklarované ciele a súhlasíte s tým.
          </p>
          <p>
            Súbory cookies tretích strán sú súbory zasielané koncovému prístroju používateľa z domovského počítača alebo domény, ktoré nespravuje editor, ale iný subjekt, a ten spracováva získané údaje pomocou súborov cookies. Nasledujúca tabuľka vysvetľuje, akým spôsobom používame súbory cookies.
          </p>

         <table class="table table-striped">
            <thead>
              <tr>
                <th>Poskytovateľ</th>
                <th>Cieľ</th>
                <th>Popis</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Google Analytics</td>
                <td>Analyzovať webové stránky</td>
                <td>Umožňuje majiteľom webovej stránky dozvedieť sa, ako používatelia narábajú s ich webovými stránkami. Okrem toho povoľuje súbory cookies v doméne na stránke, na ktorej ste, a používa cookie s názvom „-ga“ na anonymný zber informácií a výrobu správ o  tendencii  webových stránok bez identifikácie jednotlivých užívateľov.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">Zobraziť viac informácií</a></td>
              </tr>
              <tr>
                <td>Youtube</td>
                <td>Zobrazovať videá</td>
                <td>Umožňuje majiteľom webovej stránky dozvedieť sa, ako používatelia narábajú s ich webovými stránkami. Okrem toho povoľuje súbory cookies v doméne na stránke, na ktorej ste, a používa súbor cookies na anonymný zber informácií a výrobu správ o  tendencii webových stránok bez identifikácie jednotlivých užívateľov.</td>
                <td><a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">Zobraziť viac informácií</a></td>
              </tr>
              <tr>
                <td>Addthis</td>
                <td>Zdieľať obsah na sociálnych sieťach</td>
                <td>"psc", "uvc", "atuvc" a "uid". Tieto súbory cookies používa stránka Addthis.com, čím umožňuje používateľom bez námahy zdieľať stránky a obsah. Tieto súbory umožňujú uchovanie preferencií ako napr. v ktorej sociálnej sieti chce používateľ zdieľať obsah (napr. Facebook alebo Twitter).</td>
                <td><a href="http://www.addthis.com/privacy">Zobraziť viac informácií</a></td>
              </tr>
            </tbody>
          </table>

          <h3>Doplňujúce poznámky</h3>
          <p>Webové prehliadače sú nástrojmi na ukladanie súborov cookies a odtiaľto môžete využiť svoje právo na ich odstránenie alebo odstavenie. Ani tento web, ani jeho právni zástupcovia nemôžu zaručiť správne alebo nesprávne narábanie so súbormi cookies uvedenými prehliadačmi.</p>
          <p>V niektorých prípadoch je nevyhnutné nainštalovať súbory cookies do prehliadača, aby nezabudol na svoje rozhodnutie o neprijatí súborov cookies.</p>
        </div>
      @endif

    </div>
  </div>
</div>
@endsection
