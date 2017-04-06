@extends('../layouts.app')

@section('page-title') Privacy policy @endsection

@section('content')
<div class="container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">

      @if (App::getLocale() == 'en')
        <h2 class="page-title">Privacy Policy Disclaimer – Talented Europe</h2>
        <div class="well">
          <p>This privacy policy sets out how Talented Europe uses and protects any information that you give Talented Europe when you use this website.</p>
          <p>Talented Europe is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement.</p>
          <p>Talented Europe may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.<strong> This policy is effective from January 1st 2017.</strong></p>

          <h3>What we collect</h3>

          We may collect the following information:
          <ul>
            <li>For registered stakeholders: you can be part of Talented Europe community being a Student, an Educational Institution (University / Faculty /High School) or a Company.
              <ul>
                <li>Students and graduates: personal information, academic information, training and work experience, languages, skills.</li>
                <li>Educational Institutions / Companies: Institutional information, Contacts, Addressing.</li>
              </ul>
            </li>
            <li>For the newsletters subscription: email address for contact information.</li>
          </ul>

          <h3>What we do with the information we gather</h3>
          We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:
          <ul>
            <li>
              Internal record keeping.
            </li>
            <li>
              We may use the information to improve our searches and contacts betweenstakeholders.
            </li>
            <li>
              We may periodically send promotional emails about new issues which we think you may find interesting using the email address which you have provided.
            </li>
            <li>
              From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone or mail. We may use the information to customize the Talented Europe Applications according to your needs.
            </li>
          </ul>
          <h3>Security</h3>
          <p>We are committed to ensuring that your information is secure. In order to prevent unauthorised access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.</p>

          <h3>How we use cookies</h3>
          <p>A cookie is a small file which asks permission to be placed on your computer's hard drive. Once you agree, the file is added and the cookie helps analyse web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences.</p>

          <p>We use traffic log cookies to identify which pages are being used. This helps us analyse data about web page traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system.</p>

          <p>Overall, cookies help us provide you with a better website, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us.</p>

          <p>You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website.</p>

          <h3>Links to other websites</h3>
          <p>Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites which are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.</p>

          <h3>Controlling your personal information</h3>
          <p>You may choose to restrict the collection or use of your personal information in the following ways:</p>
          <ul>
            <li>
              Whenever you are asked to fill in a form on the website you should know that the information won’t be used by anybody for direct marketing purposes. Only the registered stakeholders, as part of the community, are allowed to access to your information for possible contacts.
            </li>
            <li>
              If you have registered Talented Europe and you want your information to be removed from the platform, you may change your mind at any time by emailing us at {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}.
            </li>
            <li>
              The same way, if you have subscribed Talented Europe’s newsletter and you want to stop receiving emails, you may change your mind at any time by emailing us at {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}.
            </li>
          </ul>
          <p>
            We will not distribute or lease your personal information to third parties unless we are required by law to do so. We may use your personal information to send you promotional information about new issues and news from Talented Europe.
            If you believe that any information we are holding on you is incorrect or incomplete, please write to or email us as soon as possible, at {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}. We will promptly correct any information found to be incorrect.
          </p>
        </div>

      @elseif (App::getLocale() == 'es')
        <h2 class="page-title">RENUNCIA DE PRIVACIDAD - TALENTED EUROPE</h2>
        <div class="well">
          <p>Esta política de privacidad establece cómo Talented Europe utiliza y protege cualquier información que usted proporciona cuando usa éste sitio web.</p>
          <p>Talented Europe se compromete a garantizar que su privacidad está protegida. Si le pedimos que proporcione cierta información mediante la cual puede ser identificado al utilizar este sitio, puede estar seguro de que sólo se utilizará de acuerdo con esta declaración de privacidad.</p>
          <p>Talented Europe puede cambiar esta política de vez en cuando, actualizando esta página. Debe revisar esta página de vez en cuando para asegurarse de que está satisfecho con cualquier cambio. <strong>Esta política se hace efectiva a partir del 1 de enero de 2017.</strong></p>

          <h3>Lo que recogemos</h3>

          Podemos recopilar la siguiente información:
          <ul>
            <li>Para los interesados ​​registrados: Usted puede ser parte de la comunidad de Talented Europe siendo un estudiante, una institución educativa (universidad / facultad / escuela secundaria) o una compañía.
              <ul>
                <li>Estudiantes y graduados: Información personal, información académica, formación y experiencia laboral, idiomas, habilidades.</li>
                <li>Instituciones / empresas: Información institucional, contactos, direcciones.</li>
              </ul>
            </li>
            <li>Para la suscripción a boletines: Dirección de correo electrónico para información de contacto.</li>
          </ul>

          <h3>Qué hacemos con la información que recopilamos</h3>
          Requerimos esta información para entender sus necesidades y brindarle un mejor servicio, y en particular por las siguientes razones:
          <ul>
            <li>
              Mantenimiento de registros internos.
            </li>
            <li>
              Podemos usar la información para mejorar nuestras búsquedas y contactos entre las partes interesadas.
            </li>
            <li>
              Podremos enviar periódicamente correos electrónicos promocionales sobre nuevos temas que creemos que pueden resultar interesantes utilizando la dirección de correo electrónico que nos ha proporcionado.
            </li>
            <li>
              De vez en cuando, también podemos usar su información para comunicarnos con usted para fines de investigación de mercado. Podemos comunicarnos con usted por correo electrónico, teléfono o correo postal. Podemos utilizar la información para personalizar las aplicaciones de Talented Europe según sus necesidades.
            </li>
          </ul>
          <h3>Seguridad</h3>
          <p>Estamos comprometidos a garantizar que su información sea segura. Con el fin de evitar el acceso o divulgación no autorizados, hemos establecido procedimientos físicos, electrónicos y de gestión adecuados para salvaguardar y asegurar la información que recopilamos en línea.</p>

          <h3>Cómo utilizamos las cookies</h3>
          <p>Una cookie es un pequeño archivo que pide permiso para ser colocado en el disco duro de su computadora. Una vez que acepte, el archivo se agrega y la cookie ayuda a analizar el tráfico web o le permite saber cuándo visita un sitio en particular. Las cookies permiten que las aplicaciones web le respondan como un individuo. La aplicación web puede adaptar sus operaciones a sus necesidades, gustos recopilando y recordando información sobre sus preferencias.</p>

          <p>Utilizamos cookies de registro de tráfico para identificar qué páginas se están utilizando. Esto nos ayuda a analizar datos sobre tráfico de páginas web y mejorar nuestro sitio para adaptarlo a las necesidades del cliente. Sólo utilizamos esta información para propósitos de análisis estadístico y luego los datos se eliminan del sistema.</p>

          <p>En general, las cookies nos ayudan a ofrecerle un sitio web mejor, al permitirnos supervisar qué páginas le resultan útiles y cuáles no. Una cookie de ninguna manera nos da acceso a su computadora o cualquier información sobre usted, aparte de los datos que usted elija para compartir con nosotros.</p>

          <p>Puede elegir aceptar o rechazar las cookies. La mayoría de los navegadores aceptan automáticamente las cookies, pero normalmente puede modificar la configuración de su navegador para rechazar las cookies si lo prefiere. Esto puede impedirle aprovechar al máximo el sitio web.</p>

          <h3>Enlaces a otros sitios web</h3>
          <p>Nuestro sitio web puede contener enlaces a otros sitios de interés. Sin embargo, una vez que haya utilizado estos enlaces para salir de nuestro sitio web, debe tener en cuenta que no tenemos ningún control sobre ese otro sitio. Por lo tanto, no podemos ser responsables de la protección y privacidad de cualquier información que usted proporcione al visitar dichos sitios, y dichos sitios, no se rigen por esta declaración de privacidad. Usted debe tener cuidado y ver la declaración de privacidad aplicable al sitio web en cuestión.</p>

          <h3>Control de su información personal</h3>
          <p>Usted puede optar por restringir la recopilación o el uso de su información personal de las siguientes maneras:</p>
          <ul>
            <li>
              Siempre que se le solicite que rellene un formulario en el sitio web, debe saber que la información no será utilizada por nadie para fines de marketing directo. Solamente las partes interesadas registradas, como parte de la comunidad, podrían tener acceso a su información para posibles contactos.
            </li>
            <li>
              Si se ha registrado Talented Europe y quiere que su información sea eliminada de la plataforma, puede cambiar de opinión en cualquier momento escribiendo o enviándonos un correo electrónico a {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}
            </li>
          </ul>
          <p>
            No distribuiremos ni alquilaremos su información personal a terceros a menos que la ley así lo exija. Podemos utilizar su información personal para enviarle información promocional sobre nuevos temas y noticias de Talented Europe. Si crees que cualquier información que tengamos sobre ti es incorrecta o incompleta, escríbenos o envíanos un correo electrónico lo antes posible, a {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}. Corregiremos inmediatamente cualquier información que se considere incorrecta.
          </p>
        </div>

      @elseif (App::getLocale() == 'it')
        <h2 class="page-title">Privacy Policy Disclaimer – Talented Europe</h2>
        <div class="well">
          <p>La presente informativa sulla privacy stabilisce le modalità in cui Talented Europe utilizza e protegge tutte le informazioni che fornite a Talented Europe quando visitate questo sito.</p>
          <p>Talented Europe si impegna a garantire che la vostra privacy sia protetta. Potremo chiedervi alcune  informazioni attraverso cui potrete essere identificati quando utilizzate questo sito, e vogliamo darvi la certezza che queste saranno utilizzate solo in conformità con la presente informativa sulla privacy.</p>
          <p>Talented Europe potrà modificare in qualsiasi momento la presente informativa, aggiornando il contenuto della presente pagina. Di volta in volta, dovreste controllare la presente pagina, per essere certi che siete contenti delle eventuali modifiche. <strong>La presente informativa è effettiva dal 1 gennaio 2017.</strong></p>

          <h3>Che cosa raccogliamo</h3>

          Potremo raccogliere le seguenti informazioni:
          <ul>
            <li>Per le registrate parti interessate: Può far parte della comunità Talented Europe uno studente, un’istituzione educativa (università, facoltà, scuola secondaria) o un’azienda.
              <ul>
                <li>Studenti e laureati: informazioni personali, informazioni accademiche, informazioni su tirocinio e lavoro, lingue, competenze.</li>
                <li>Istituzioni educative / Aziende: informazioni istituzionali, contatti, indirizzi.</li>
              </ul>
            </li>
            <li>Per iscriversi alla newsletter: indirizzo email come informazione di contatto.</li>
          </ul>

          <h3>Come utilizziamo le informazioni raccolte</h3>
          Richiediamo queste informazioni per capire i vostri bisogni e per garantirvi un miglior servizio, e in particolare per i seguenti motivi:
          <ul>
            <li>
              Conservazione interna dei dati.
            </li>
            <li>
              Potremo utilizzare le informazioni per migliorare le nostre ricerche e la comunicazione tra le parti interessate.
            </li>
            <li>
              Potremo mandare periodicamente delle email promozionali riguardo i nuovi argomenti che crediamo possano interessarvi, utilizzando l’indirizzo email che ci avete fornito.
            </li>
            <li>
              Di volta in volta, potremo utilizzare le vostre informazioni per contattarvi per obiettivi di ricerche di mercato. Vi contatteremo via email, telefono, o per posta. Potremo far uso delle vostre informazioni per personalizzare le applicazioni di Talented Europe in linea con i vostri bisogni.
            </li>
          </ul>
          <h3>Sicurezza</h3>
          <p>Ci impegniamo a garantire la sicurezza delle vostre informazioni. Con l’obiettivo di prevenire accessi o comunicazioni non autorizzate, abbiamo messo in campo procedure fisiche, elettroniche e gestionali, atte a salvaguardare e mantenere in sicurezza le informazioni che raccogliamo on-line.</p>

          <h3>Come utilizziamo i cookie</h3>
          <p>Un cookie è un piccolo file di testo che richiede un permesso per essere inserito nel disco fisso del vostro computer. Una volta che avete accettato, il file viene aggiunto e il cookie aiuta ad analizzare il traffico web, o vi avvisa quando visitate un particolare sito. I cookie autorizzano le applicazioni web a rispondervi individualmente. Successivamente, l‘applicazione web può adattare i suoi interventi ai vostri bisogni, piaceri e dispiaceri, ricorrendo ai dati sulle vostre preferenze raccolti e immagazzinati.</p>

          <p>Utilizziamo i traffic log cookie per identificare quali pagine sono usate. Questo ci aiuta ad analizzare i dati riguardo il traffico sulle pagine web e a migliorare così il nostro sito, personalizzandolo in linea con i bisogni del cliente. Utilizziamo queste informazioni unicamente per obiettivi di analisi statistica, dopo di che i dati vengono rimossi dal sistema.</p>

          <p>In generale, i cookie ci aiutano a garantirvi un sito migliore, autorizzandoci a monitorare quali pagine trovate utili e quali no. I cookie non ci garantiscono in alcun modo l‘accesso al vostro computer o ad alcune informazioni riguardo a voi, a parte i dati che decidete di condividere con noi.</p>

          <p>Voi potete decidere di accetare o rifiutare i cookie. La maggior parte dei browser accettano automaticamente i cookie ma, di solito, potete tranquillamente modificare le impostazioni del vostro browser per rifiutare i cookie. Questo però può impedirvi di sfruttare appieno i vantaggi del sito.</p>

          <h3>Collegamenti ad altri siti web</h3>
          <p>Il nostro sito può contenere collegamenti ad altri siti d‘interesse. Tuttavia, una volta che avete usato questi link per abbandonare il nostro sito, dovreste fare attenzione perché noi non garantiamo controllo su questo altro sito. Non siamo responsabili per la protezione e la privacy delle informazioni che impegnate mentre visitate tali siti, a cui non si applica la presente informativa sulla privacy. Consigliamo di visionare con cautela le dichiarazioni di privacy applicabili ai siti web in questione.</p>

          <h3>Controllo dei vostri dati personali</h3>
          <p>Potete decidere di restringere la raccolta e l’utilizzo dei vostri dati personali, nei seguenti modi:</p>
          <ul>
            <li>
              Ogni qual volta vi si chiede di compilare un form sul sito, dovreste sapere che le informazioni non verranno utilizzate da alcuno per obiettivi di direct marketing. Soltanto le registrate parti interessate, facendo parte della comunità, avranno accesso alle vostre informazioni e ai vostri contatti.
            </li>
            <li>
              Se vi siete registrati su Talented Europe e vorrete cambiare idea e far rimuovere le vostre informazioni dal piattaforma, potrete avvisarci in qualsiasi momento, scrivendoci o mandando un’email a {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}.
            </li>
            <li>
              In via analoga, se vi siete iscritti alla newsletter di Talented Europe e vorrete smettere di ricevere le email, potrete avvisarci in qualsiasi momento, scrivendoci o mandando un’email a {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}.
            </li>
          </ul>
          <p>
            Non distribuiremo o lasceremo vostre informazioni personali a terze parti, se non previsto dalla legge. Potremo utilizzare i vostri dati personali per mandarvi informazioni promozionali riguardo novità su Talented Europe. Se credete che alcune informazioni a vostro riguardo siano errate o incomplete, vi invitiamo a scriverci o a mandarci un‘email a {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}. In tal caso, interverremo prontamente per correggere le informazioni non corrette.
          </p>
        </div>

      @elseif (App::getLocale() == 'de')
        <h2 class="page-title">Des Schutzes der Privatsphäre – Talented Europe</h2>
        <div class="well">
          <p>Diese Prinzipen des Schutzes der Privatsphäre definieren, wie Talented Europe sämtliche Informationen, die Sie von Ihnen innerhalb der Webseite bekommt, nutzt und schützt. Talented Europe verpflichtet sich zum Schutz der Sicherheit Ihrer Privatsphäre.</p>
          <p>Im Fall der Informationen, dank deren Sie als User dieser Website identifiziert werden, können Sie sicher sein, dass Sie nur im Sinne dieser Erklärung, über den Schutz der personenbezogenen Daten, genutzt werden.</p>
          <p>Talented Europe kann die Regeln gelegentlich ändern, dies auf Grund der Webseitenaktualisierung. Ihre empfehlte Kontrolle unserer Webseite garantiert, dass Sie mit den Änderungen zufrieden sein werden. <strong>Die Regeln gelten ab den 1. Januar 2017.</strong></p>

          <h3>Welche Informationen benötigen wir</h3>

          Wir können folgende Informationen und Angaben anfordern:
          <ul>
            <li>für registrierte Teilnehmer: Teil von Talented Europe kann ein Student, eine Bildungseinrichtung (Universität, Fakultät, Fachschule) oder ein Unternehmen sein.
              <ul>
                <li>Studenten und Absolventen: Persönliche Angaben, akademische Angaben, Schulungen und Arbeitserfahrungen, Fremdsprachen, Fähigkeiten.</li>
                <li>Bildungseinrichtungen /Firmen: Informationen über die Institution, Kontaktangaben, Adresse.</li>
              </ul>
            </li>
            <li>Für das Zusenden on Neuigkeiten: E-Mail-Adresse als Kontaktangabe.</li>
          </ul>

          <h3>Was machen wir mit den Informationen, die wir sammeln?</h3>
          Diese Informationen helfen uns, Ihre Bedürfnisse zu verstehen und damit Ihnen bessere Dienstleistungen anzubieten, vor allem aus den folgenden Gründen:
          <ul>
            <li>
              interne Verarbeitung von Aufzeichnungen
            </li>
            <li>
              die Informationen nutzen wir, um das unser Suchen und die Kontaktnahme zwischen den Usern zu verbessern.
            </li>
            <li>
              Regelmäßiges Zusenden von Werbe-E-Mails mit den neuen Themen, die Sie interessieren könnten, aufgrund der von Ihnen angegebenen E-Mail-Adresse.
            </li>
            <li>
              Von Zeit zurzeit können wir mit Ihnen  zwecks einer Markterforschung  in Kontakt kommen. Die Kontaktaufnahme verläuft per E-Mail, telefonisch oder per Post. Ihre Informationen dienen dazu, die einzelnen Apps innerhalb von Talented Europe anzupassen und gemäß Ihren Bedürfnissen anzupassen.
            </li>
          </ul>
          <h3>Sicherheit</h3>
          <p>Wir verpflichten uns, die von Ihnen anvertraute Informationen, in Sicherheit zu bewahren. Um einen unbefugten Zutritt oder eine Veröffentlichung zu verhindern, haben wir passende physische, elektronische und  Leitverfahren zum Schutz und Gewährleistung der Informationen eingeführt, die wir online sammeln.</p>

          <h3>Wie nutzen wir Cookies?</h3>
          <p>Cookies ist eine kleine Datei, die verlangt, an Ihrer Harddisk platziert zu sein. Nach einer Einwilligung, ist die Cookie-Datei platziert und hilft dabei die Arbeit mit Web zu analysieren oder sie meldet sich beim Besuchen einer entsprechenden  Web-Seite. Cookies erlauben den Web-Apps auf Sie als User entsprechend  zu reagieren. Die Web-App passt sich dann Ihren Bedürfnissen, Interessen an. Das alles kommt aufgrund von Sammeln und Merken von Informationen über Ihre Präferenzen zu Stande.</p>

          <p>Wir benutzen sog. traffic log cookies zur Identifizierung der gerade genutzten Webseiten. Das hilft uns, die Daten über das Nutzen der Webseiten zu analysieren und so unsere Webseite zu verbessern damit wir Sie den Bedürfnissen unserer Kunden anpassen können. Informationen dieser Art werden ausschließlich zu Zwecken der statistischen Analyse genutzt und gleich danach wieder vom System gelöscht.</p>

          <p>Cookies helfen uns bessere Webseiten anzubieten, in dem uns cookies zeigen, welche Webseiten für Sie hilfreich sind und welche nicht. Cookies erlauben uns in keinem Fall den Zutritt zu Ihrem Computer oder geben uns keinerlei Informationen über Sie persönlich. Wir arbeiten nur mit den persönlichen Angeben, die Sie mit uns freiwillig teilen.</p>

          <p>Cookies können Sie zulassen oder blockieren. Große Anzahl der Web-Browser lässt cookies automatisch zu, man kann aber die Einstellungen des Computers so einstellen, dass er cookies automatisch blockiert, wen es Ihr Wunsch ist. Das kann aber die volle Nutzung der Webseiten stören.</p>

          <h3>Links, die auf andere Webseiten verweisen</h3>
          <p>Unsere Webseiten können auch Links, die auf andere interessante Webseiten verweisen, beinhalten. Im Falle der Nutzung so eines Links, müssen Sie im Klaren sein, dass wir keinerlei Kontrolle über den Inhalt solcher Webseiten haben. Aus diesem Grund tragen wir keine Verantwortung über den Schutz und Privatsphäre der Informationen, die Sie bei der Nutzung solcher Webseite preisgeben. Diese Webseiten halten sich nicht an unsere Erklärung über den Schutz der personenbezogenen Daten. Sie sollten vorsichtig sein, und sich über die Erklärung über den Schutz der personenbezogenen Daten der konkreten Webseite informieren.</p>

          <h3>Kontrolle Ihrer personenbezogener Daten</h3>
          <p>Das Sammeln und Nutzen ihrer personenbezogenen Daten können Sie folgendermaßen wählen oder beschränken:</p>
          <ul>
            <li>
              Wenn Sie das Formular an unserer Webseite ausfüllen, ist es nötig zu wissen, dass die Informationen nicht zum Zweck des Direktmarketings genutzt werden. Nur registrierte Parteien, die Teil von Talented Europe sind, haben einen Zutritt zu Ihren Informationen und Kontaktangaben.
            </li>
            <li>
              Wenn Sie bei Talented Europe registriert sind und möchten, dass sämtliche Informationen aus unserer Plattform gelöscht werden sollen, können Sie darüber nachdenken und uns damit schriftlich oder per E-Mail unter {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }} in Kenntnis zu setzen.
            </li>
            <li>
              Auch im Falle, dass Sie die Abnahme der Neuigkeiten von Talented Europe gewilligt haben und Sie es  jetzt nicht wünschen, können Sie darüber nachdenken und uns damit schriftlich oder per E-Mail unter {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }} in Kenntnis zu setzen.
            </li>
          </ul>
          <p>
            Ihre persönlichen Informationen leiten wir nicht weiter an dritte Personen, wenn wir es aus gesetzlichen Gründen nicht machen müssen. Ihre persönlichen Informationen können wir für das Zusenden von Neuigkeiten über Talented Europe nützen. Falls Sie denken, dass Informationen über Sie, die wir haben, falsch oder unvollständig sind, so schreiben Sie uns an.
          </p>
        </div>


      @elseif (App::getLocale() == 'fr')
        <h2 class="page-title">Politique de la vie privée – Talented Europe</h2>
        <div class="well">
          <p>Cette politique de confidentialité définit comment l'Europe des utilisations Talentueux et protège les informations que vous donnez l'Europe Talentueux lorsque vous utilisez ce site.</p>
          <p>L'Europe est Talentueux engagée à assurer que votre vie privée soit protégée. Si nous vous demandons de fournir certaines informations que vous pouvez être identifié lors de l'utilisation de ce site, vous pouvez être assuré qu'il ne sera utilisé conformément à la présente déclaration de confidentialité.</p>
          <p>Talentueux l'Europe peut changer cette politique de temps en temps en mettant à jour cette page. Vous devriez consulter cette page de temps en temps pour vous assurer que vous êtes satisfait des changements. <strong>Cette politique est effective à partir du 1er Janvier 2017.</strong></p>

          <h3>Ce que nous recueillons</h3>

          Nous pouvons recueillir les informations suivantes:
          <ul>
            <li>Pour les intervenants inscrits: yyou peut faire partie de l'Europe communautaire Talentueux être un étudiant, un établissement d'enseignement (Université / Faculté / Lycée) ou d'une société.
              <ul>
                <li>Les étudiants et les diplômés: l'information Ppersonal, information scolaire, la formation et l'expérience de travail, langues, compétences.</li>
                <li>Les établissements d'enseignement / entreprises: informations Iinstitutional, Ccontacts, Aaddressing.</li>
              </ul>
            </li>
            <li>Pour les bulletins de souscription Adresse e-mail pour les informations de contact. </li>
          </ul>

          <h3>What we do with the information we gather</h3>
          Nous avons besoin de cette information pour comprendre vos besoins et vous fournir un meilleur service, et notamment pour les raisons suivantes:
          <ul>
            <li>
              Tenue de dossiers internes.
            </li>
            <li>
              Nous pouvons utiliser les informations pour améliorer nos recherches et les contacts entre les parties prenantes.
            </li>
            <li>
              Nous pouvons envoyer périodiquement des courriels promotionnels sur les nouveaux problèmes que nous pensons susceptibles de vous intéresser en utilisant l'adresse e-mail que vous avez fourni.
            </li>
            <li>
              De temps en temps, nous pouvons également utiliser vos informations pour vous contacter à des fins de recherche de marché. Nous pouvons vous contacter par e-mail, téléphone ou courrier. Nous pouvons utiliser ces informations pour personnaliser les applications Talentueux Europe selon vos besoins.
            </li>
          </ul>
          <h3>Sécurité</h3>
          <p>Nous nous engageons à faire en sorte que vos informations sont en sécurité. Afin d'empêcher l'accès non autorisé ou la divulgation, nous avons mis en place des procédures physiques, électroniques et de gestion appropriées pour sauvegarder et sécuriser les informations que nous recueillons en ligne.</p>

          <h3>Comment nous utilisons cookiesSecurity</h3>
          <p>Un cookie est un petit fichier qui demande la permission d'être placé sur le disque dur de votre ordinateur. Une fois que vous êtes d'accord, le fichier est ajouté et le cookie permet d'analyser le trafic web ou vous permet de savoir quand vous visitez un site particulier. Les cookies permettent aux applications Web de vous répondre en tant qu'individu. L'application Web peut adapter son fonctionnement à vos besoins, goûts et dégoûts en recueillant et en mémorisant des informations sur vos préférences.</p>

          <p>Nous utilisons des cookies de trafic pour identifier quelles pages sont utilisées. Cela nous aide à analyser des données sur le trafic de page Web et d'améliorer notre site afin de l'adapter aux besoins des clients. Nous utilisons ces informations à des fins d'analyse statistique et les données sont supprimées du système.</p>

          <p>Dans l'ensemble, les cookies nous aident à vous fournir un meilleur site web, en nous permettant de surveiller les pages que vous trouvez utiles et que vous ne faites pas. Un cookie ne nous donne accès à votre ordinateur ou toute information vous concernant, autres que les données que vous choisissez de partager avec nous.</p>

          <p>Vous pouvez choisir d'accepter ou de refuser les cookies. La plupart des navigateurs Web acceptent automatiquement les cookies, mais vous pouvez généralement modifier les paramètres de votre navigateur pour refuser les cookies si vous préférez. Toutefois, cela peut vous empêcher de profiter pleinement du site.</p>

          <h3>Liens vers d'autres sites</h3>
          <p>Notre site peut contenir des liens vers d'autres sites d'intérêt. Cependant, une fois que vous avez utilisé ces liens pour quitter notre site, il faut noter que nous n'avons aucun contrôle sur cet autre site. Par conséquent, nous ne pouvons pas être responsables de la protection et la confidentialité des informations que vous fournissez en visitant des sites secs et ces sites / qui ne sont pas régis par la présente déclaration de confidentialité. Vous devez faire preuve de prudence et de regarder la déclaration de confidentialité applicable au site en question. </p>

          <h3>Contrôle de vos informations personnelles</h3>
          <p>Vous pouvez choisir de restreindre la collecte ou l'utilisation de vos renseignements personnels de la manière suivante:</p>
          <ul>
            <li>
              Chaque fois que l'on vous demande de remplir un formulaire sur le site, vous devez savoir que les informations ne seront pas utilisées par quiconque à des fins de marketing direct. Seuls les intervenants inscrits, dans le cadre de la communauté, pourrait peut / sont autorisés à accéder à vos informations pour les contacts possibles.
            </li>
            <li>
              Si vous avez enregistré Talentueux Europe et vous voulez que vos informations soient retiré de la plate-forme, vous pouvez changer d'avis à tout moment en écrivant ou en nous envoyant un courriel à {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}.
            </li>
            <li>
              De la même façon, si vous avez souscrit la lettre d'information de l'Europe Talentueux et que vous voulez arrêter de recevoir des e-mails, vous pouvez changer d'avis à tout moment en nous écrivant ou en envoyant un courriel à {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}.
            </li>
          </ul>
          <p>
            Nous ne distribuer ou louer vos renseignements personnels à des tiers à moins que nous sommes tenus par la loi de le faire. Nous pouvons utiliser vos informations personnelles pour vous envoyer des informations promotionnelles sur de nouvelles questions et des nouvelles de l'Europe Talentueux. Si vous pensez que les informations que nous détenons sur vous sont incorrectes ou incomplètes, s'il vous plaît écrire ou nous envoyer un courriel dès que possible, à {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}. Nous corrigerons rapidement toute information jugée incorrecte.
          </p>
        </div>

      @elseif (App::getLocale() == 'sk')
        <h2 class="page-title">Zásady ochrany súkromia – Talented Europe</h2>
        <div class="well">
          <p>Tieto zásady ochrany súkromia definujú, ako Talentovaná Európa používa a chráni všetky informácie, ktoré jej poskytujete pri použití jej webovej stránky. Talentovaná Európa sa zaväzuje k ochrane bezpečnosti vášho súkromia.</p>
          <p>Ak vás požiadame o poskytnutie určitých informácií, na základ ktorých môžete byť identifikovaní pri použití tejto webovej stránky,  môžete si byť istí, že budú použité iba v súlade s týmto prehlásením o ochrane osobných údajov.</p>
          <p>Talentovaná Európa môže pravidlá z času na čas zmeniť, na základe aktualizácie svojej stránky. Vaša odporúčaná sporadická kontrola našej stránky zabezpečí, že budete s prípadnými zmenami spokojní. <strong>Pravidlá sú účinné od 1. januára 2017.</strong></p>

          <h3>Aké údaje zhromažďujeme</h3>

          Zhromažďovať môžeme nasledujúce informácie:
          <ul>
            <li>Pre registrovaných účastníkov: Súčasťou komunity Talentovaná Európa môže byť študent, vzdelávacia inštitúcia (univerzita / fakulta / odborná škola) alebo spoločnosť.
              <ul>
                <li>Študenti a absolventi: osobné informácie, akademické informácie, školenia a pracovné skúsenosti, jazyky, schopnosti.</li>
                <li>Vzdelávacie inštitúcie/firmy: inštitucionálne informácie, kontakty, adresovanie.</li>
              </ul>
            </li>
            <li>Pre zasielanie noviniek: e-mailová adresa ako kontaktná informácia.</li>
          </ul>

          <h3>Čo robíme s informáciami, ktoré zhromažďujeme</h3>
          Tieto informácie nám pomáhajú porozumieť vašim potrebám a poskytnúť vám lepšie služby, najmä z nasledujúcich dôvodov:
          <ul>
            <li>
              Vnútorné vedenie záznamov.
            </li>
            <li>
              Informácie môžeme použiť na zlepšenie našich vyhľadávaní a kontaktovanie sa medzi zúčastnenými stranami.
            </li>
            <li>
              Pravidelné zasielanie reklamných e-mailov s novými témami, ktoré veríme, že by vás mohli zaujímať na základe e-mail adresy, ktorú ste nám poskytli.
            </li>
            <li>
              Z času na čas vás na základe vami poskytnutých informácií môžeme kontaktovať za účelom prieskumu trhu. Kontaktovať vás budeme e-mailom, telefonicky alebo poštou. Vaše informácie môžeme použiť na prispôsobenie aplikácií v rámci Talentovanej Európy podľa vašich potrieb.
            </li>
          </ul>
          <h3>Bezpečnosť</h3>
          <p>Zaväzujeme sa k udržaniu vami poskytnutých informácií v bezpečí. Aby sme zabránili neoprávnenému prístupu alebo zverejneniu, zaviedli sme vhodné fyzické, elektronické a riadiace postupy na ochranu a zabezpečenie informácií, ktoré zhromažďujeme online.</p>

          <h3>Ako používame cookies</h3>
          <p>Cookie je malý súbor, ktorý požaduje, aby mohol byť umiestnený na pevnom disku vášho počítača. Po jeho schválení je cookie súbor pridaný a  pomáha analyzovať web prevádzku, alebo vám dá vedieť pri návšteve určitej stránky. Cookies umožňujú webovým aplikáciám reagovať na vás ako na  jednotlivca. Webová aplikácia potom prispôsobí svoje fungovanie vašim potrebám, záujmom aj nezáujmom, na základe zbierania a zapamätania si informácií o vašich preferenciách.</p>

          <p>Používame traffic log cookies na  identifikáciu práve používaných stránok. To nám pomáha analyzovať dáta o prevádzke web stránky a zlepšovať naše webové stránky tak, aby sme ich  prispôsobili potrebám nášho zákazníka. Tieto informácie používame výhradne na účely štatistickej analýzy a po ich použití sú zo systému odstránené.</p>

          <p>Celkovo nám cookies pomáhajú  poskytovať lepšie webové stránky, keďže nám umožňujú sledovať, ktoré stránky sú pre vás užitočné, a ktoré nie. Cookie nám v žiadnom prípade neposkytuje prístup k vášmu počítaču alebo akékoľvek informácie o vás, okrem údajov, ktoré s nami dobrovoľne zdieľate.</p>

          <p>Môžete sa rozhodnúť prijať alebo odmietnuť cookies. Veľké množstvo webových prehliadačov cookies automaticky akceptuje, väčšinou je však možné zmeniť nastavenia prehliadača tak, aby cookies odmietal, ak si to prajete. To však môže zabrániť plnému využitiu webových stránok.</p>

          <h3>Odkazy na iné webové stránky</h3>
          <p>Naše webové stránky môžu obsahovať odkazy na iné zaujímavé stránky.  Ak však použijete takýto odkaz a opustíte našu stránku, mali by ste si uvedomiť, že nemáme žiadnu kontrolu nad obsahom týchto stránok. Preto nemôžeme byť zodpovední za ochranu a súkromie akýchkoľvek informácií, ktoré poskytnete pri návšteve týchto stránok a tieto stránky sa neriadia našim prehlásením o ochrane súkromia. Mali by ste byť opatrní a oboznámiť sa s vyhlásením o ochrane súkromia vzťahujúcim sa ku konkrétnej webovej stránke.</p>

          <h3>Kontrola vašich osobných údajov</h3>
          <p>Môžete si zvoliť, ako obmedzíte zhromažďovanie alebo používanie vašich osobných údajov nasledujúcimi spôsobmi:</p>
          <ul>
            <li>
              Ak budete vyzvaní na vyplnenie formulára na našej web stránke, je potrebné vedieť, že informácie nebudú nikým iným použité na účely priameho marketingu. Iba registrované zúčastnené strany, ako súčasť komunity, majú prístup k vašim informáciám a kontaktným údajom.
            </li>
            <li>
              Ak ste sa zaregistrovali v Talentovanej Európe a chcete, aby boli vaše údaje z našej platformy odstránené, môže si to rozmyslieť a oznámiť nám to písomne ​​alebo e-mailom na {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}.
            </li>
            <li>
              Rovnako, v prípade, že ste sa prihlásili k odberu noviniek Talentovanej Európy a chcete zrušiť  prijímanie e-mailov, môžete si to rozmyslieť a oznámiť nám to písomne ​​alebo e-mailom na {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}.
            </li>
          </ul>
          <p>
            Vaše osobné informácie nebudeme šíriť a posúvať tretím stranám, ak nebudeme zo zákona povinní tak urobiť. Vaše osobné údaje môžeme použiť na zaslanie propagačných informácií o novinkách v Talentovanej Európe. Ak si myslíte, že akékoľvek informácie o vás, ktorými disponujeme, sú  nesprávne alebo neúplné, napíšte nám alebo zašlite e-mail.
          </p>
        </div>

      @endif

    </div>
  </div>
</div>
@endsection
