@extends('../layouts.app')

@section('page-title') {{ trans('global.faq') }} @endsection

@section('content')
<div class="container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <h2 class="page-title">{{ trans('global.faq') }}</h2>
      <div class="well">

      @if (Config::get('app.locale') == 'en')
      <ol>
        <li>
          <p>
            <strong>What is Talented Europe?</strong>
          </p>
          <p>
            It’s a project co-funded by the Erasmus+ programme of European Union.
          </p>
          <p>
            The Erasmus Plus ‘Talented Europe’ project addresses two flagship initiatives of the ‘Europe 2020’ Strategy, namely Youth on the Move and the Agenda for New Skills and Jobs. It is a mechanism for connecting students with employers and vice versa across Europe with a view to identify, provide and facilitate career and internship opportunities.
          </p>
        </li>
        <li>
          <p>
            <strong>Who can register on www.talentedeurope.eu?</strong>
          </p>
          <p>
            Any student or employer can register. If you are an employer looking to recruit students you can advertise your company. If you are students/recent graduates looking for a job you can register your details.
          </p>
        </li>
        <li>
          <p>
            <strong>Do I have to register?</strong>
          </p>
          <p>
            Yes. For students, the registration form provides us with information about your education, work experience and the type of job you’re looking for. For employers, registering enables you to advertise your area of expertise.
          </p>
        </li>
        <li>
          <p>
            <strong>Why should I register?</strong>
          </p>
          <p>
            It’s a database of hundreds of companies and students profiles that will help to find what or who they are exactly looking for.
          </p>
        </li>
        <li>
          <p>
            <strong>How much does it cost to register?</strong>
          </p>
          <p>
            It is free for both students and companies to register. 
          </p>
        </li>
        <li>
          <p>
            <strong>How should I register?</strong>
          </p>
          <p>
            You should click Sign up button and register your details.
          </p>
        </li>
        <li>
          <p>
            <strong>How can I change my personal data, emails or password?</strong>
          </p>
          <p>
            Students: To change your personal data you can do this by logging in and going to your Profile Settings to edit your details.
          </p>
          <p>
            Employers: You can change your company data by logging in and going to your Profile Settings where you can change your details.
          </p>
        </li>
        <li>
          <p>
            <strong>How can I remove my account?</strong>
          </p>
          <p>
            Visit your personal page, and then Profile Settings. Once you're on the page, scroll down to bottom and you will see an option Delete Account. Click the link titled and your account will be removed.
          </p>
        </li>
        <li>
          <p>
            <strong>I have lost my password, what should I do?</strong>
          </p>
          <p>
            If you forgot or lose your password, press the button Forgot Your Password? under the login portal. You will be redirected to another page where you should enter the e-mail address you registered with and your password reset link will then be sent to that e-mail address.
          </p>
        </li>
        <li>
          <p>
            <strong>How can I contact you?</strong>
          </p>
          <p>
            Please contact us using the email address: <a href="mailto:info@talentedeurope.org">info@talentedeurope.org</a>
          </p>
        </li>
        <li>
          <p>
            <strong>How students can contact employers?</strong>
          </p>
          <p>
            You should click on a button View More of the company you found interesting. You will be redirected to the company’s profile page where you should click on a button View Contact Details.
          </p>
        </li>
        <li>
          <p>
            <strong>How employers can contact students?</strong>
          </p>
          <p>
            You need to click on a button View More of the student you found interesting. You will be redirected to the student’s profile page where you should click on a button View Contact Details.
          </p>
        </li>
        <li>
          <p>
            <strong>What details a company should provide to get registered?</strong>
          </p>
          <p>
            During registration a company should provide all relevant information such as: type, legal representative name, registration number, address and upload its logo and a certificate of authenticity.
          </p>
        </li>
      </ol>

      @elseif (Config::get('app.locale') == 'es')
      <ol>
        <li>
          <p>
            <strong>¿Qué es Talented Europe?</strong>
          </p>
          <p>
            Es un proyecto cofinanciado por el programa Erasmus+ de la Unión Europea.
          </p>
          <p>
            El proyecto Erasmus Plus «Talented Europe» aborda dos iniciativas emblemáticas de la estrategia «Europa 2020», que son ‘Youth on the Move’ y ‘Agenda for New Skills and Jobs’. Este proyecto mediante una aplicación multiplataforma, una "aplicación" en línea/ móvil tiene como objetivo hacer coincidir a los mejores estudiantes con oportunidades de trabajo y/o de prácticas en toda Europa. Permite a estudiantes con talento y empresas de todos los continentes conectarse entre sí a nivel profesional.
          </p>
        </li>
        <li>
          <p>
            <strong>¿Quién puede participar en Talented Europe?</strong>
          </p>
          <p>
            Los participantes serán estudiantes, instituciones educativas y empresas de todos los continentes.
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cuánto cuesta inscribirse?</strong>
          </p>
          <p>
            Es gratuito para instituciones educativas, estudiantes y empresas.
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cómo debo inscribirme?</strong>
          </p>
          <p>
            Debe hacer clic en el botón Registrarse y rellenar los campos necesarios con su información personal.
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cómo funciona la plataforma Talented Europe para los estudiantes?</strong>
          </p>
          <p>
            <ol>
              <li>Un estudiante está buscando un trabajo y se une a Talented Europe (talentedeurope.eu) y pide a su universidad que valide su perfil.</li>
              <li>La universidad del estudiante recibe una notificación. Un profesor revisa su rendimiento académico y valida que él/ella puede unirse a las filas de los estudiantes de élite de Talented Europe.</li>
              <li>Un negocio registrado en la plataforma Talented Europe encuentra el CV del estudiante y lo contacta para una entrevista. También, alternativamente, un estudiante puede solicitar directamente el trabajo ofrecido por la compañía. Recibe una notificación en la aplicación para dispositivos móviles o en el sitio web y reserva una reunión con ellos.</li>
            </ol>
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cómo funciona la plataforma Talented Europe para las instituciones?</strong>
          </p>
          <p>
            <ol>
              <li>Un estudiante está buscando un trabajo y se une a Talented Europe (talentedeurope.eu). Allí pide a sus profesores que confirmen sus talentos, para tener más información para proporcionar a las empresas.</li>
              <li>Los profesores evalúan las habilidades del estudiante, confirmando las habilidades y conocimientos que pueden ser beneficiosas para la empresa.</li>
              <li>Gracias a las referencias y evaluaciones de los profesores, las empresas pueden obtener información confiable y de calidad sobre los alumnos, lo que mejorará el proceso de selección.</li>
            </ol>
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cómo funciona la plataforma Talented Europe para las empresas?</strong>
          </p>
          <p>
            <ol>
              <li>Un/a ejecutivo/a de la empresa reconoce la necesidad de una persona en prácticas o recién titulado con habilidades específicas. Se une a Talented Europe (talentedeurope.eu) y publica los requisitos del puesto.</li>
              <li>El/La ejecutivo/a también puede buscar en la base de datos de Talented Europe para estudiantes con las habilidades necesarias.</li>
              <li>El/La ejecutivo/a de la empresa encuentra el CV apropiado de los estudiantes y los contacta a través de la aplicación móvil o del sitio web para concertar una entrevista, en persona o en línea.</li>
            </ol>
          </p>
        </li>
        <li>
          <p>
            <strong>¿Qué detalles debe proporcionar una empresa para registrarse?</strong>
          </p>
          <p>
            Durante la inscripción, una empresa debe proporcionar toda la información pertinente, tales como: tipo, nombre del representante legal, número de registro, dirección y cargar su logotipo y un certificado de autenticidad (puede descargar la plantilla en la Web).
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cómo pueden los estudiantes contactar a las empresas?</strong>
          </p>
          <p>
            Debe hacer clic en el botón Ver más de la empresa que encontró interesante. Usted será redirigido a la página de perfil de la empresa donde debe hacer clic en el botón Ver detalles de contacto.
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cómo pueden los empleadores contactar a los estudiantes?</strong>
          </p>
          <p>
            Necesitas hacer clic en el botón Ver más del estudiante que encontraste interesante. Se le redirigirá a la página de perfil del estudiante donde deberá hacer clic en el botón Ver detalles del contacto.
          </p>
        </li>
        <li>
          <p>
            <strong>¿Quién organiza la documentación?</strong>
          </p>
          <p>
            Una vez que la práctica o el trabajo esté dispuesto a través de la plataforma Talented Europe, el estudiante y la empresa deberán manejar cualquier documentación necesaria.
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cómo puedo cambiar mis datos personales, correos electrónicos o contraseña?</strong>
          </p>
          <p>
            Estudiantes: ingresando y accediendo a Configuración de perfil para editar sus datos.
          </p>
          <p>
            Empleadores: ingresando y accediendo a Configuración de perfil donde puede cambiar sus datos.
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cómo puedo eliminar mi cuenta?</strong>
          </p>
          <p>
            Vaya a su página personal y, a continuación, Configuración del perfil. Una vez que esté en la página, desplácese hasta la parte inferior y verá una opción Eliminar cuenta y, al hacer clic en ella, se eliminará su cuenta.
          </p>
        </li>
        <li>
          <p>
            <strong>He perdido mi contraseña, ¿qué debo hacer?</strong>
          </p>
          <p>
            Si olvidó o perdió su contraseña, pulse la tecla ¿Olvidó su contraseña? bajo el portal de inicio de sesión. Será redirigido a otra página donde debe ingresar la dirección de correo electrónico con la que se registró y a continuación se le enviará a esa dirección de correo electrónico su enlace de restablecimiento de contraseña.
          </p>
        </li>
        <li>
          <p>
            <strong>¿Cómo puedo contactar con usted?</strong>
          </p>
          <p>
            Por favor, póngase en contacto con nosotros a través de la siguiente dirección de correo electrónico: <a href="mailto:info@talentedeurope.org">info@talentedeurope.org</a>
          </p>
        </li>
      </ol>

      @elseif (Config::get('app.locale') == 'it')
      <ol>
        <li>
          <p>
            <strong>Che cos’è Talented Europe?</strong>
          </p>
          <p>
            Si tratta di un progetto cofinanziato dal programma Erasmus+ dell’Unione europea.
          </p>
          <p>
            Nell’ambito del programma Erasmus Plus, il progetto Talented Europe si indirizza a due iniziative principali della strategia Europa 2020: Gioventù in movimento e Agenda per nuove competenze e nuovi posti di lavoro. È un meccanismo per unire gli studenti con i datori di lavoro e viceversa, con il fine di identificare, fornire e facilitare opportunità di lavoro e tirocinio in tutta Europa.
          </p>
        </li>
        <li>
          <p>
            <strong>Chi si può registrare sul sito www.talentedeurope.eu?</strong>
          </p>
          <p>
            Si può registrare ogni studente o datore di lavoro. Se siete un datore di lavoro in cerca di studenti, potete pubblicizzare la vostra azienda. Se siete studenti/laureati in cerca di lavoro, potete registrare i vostri dati.
          </p>
        </li>
        <li>
          <p>
            <strong>Devo registrarmi?</strong>
          </p>
          <p>
            Sì. Per quanto riguarda gli studenti, il formulario di registrazione ci fornisce informazioni sulla vostra educazione, sulle vostre esperienze lavorative e sul tipo di lavoro che state cercando. Ai datori di lavoro, invece, la registrazione permette di pubblicizzare il loro settore di attività.
          </p>
        </li>
        <li>
          <p>
            <strong>Perché dovrei registrarmi?</strong>
          </p>
          <p>
            Dopo la registrazione ottenete l’accesso a una banca dati di centinaia di aziende e profili degli studenti, che vi aiuterà a trovare esattamente quello che state cercando.
          </p>
        </li>
        <li>
          <p>
            <strong>Quanto mi costa la registrazione?</strong>
          </p>
          <p>
            La registrazione è gratuita sia per gli studenti sia per le aziende.
          </p>
        </li>
        <li>
          <p>
            <strong>Come posso registrarmi?</strong>
          </p>
          <p>
            Cliccate sul pulsante Registrati e registrate i vostri dati.
          </p>
        </li>
        <li>
          <p>
            <strong>Come posso modificare i miei dati personali, l’indirizzo email o la password?</strong>
          </p>
          <p>
            Studenti: se volete modificare i vostri dati personali, accedete al sito, passate alle impostazioni del profilo e modificate i vostri dati.
          </p>
          <p>
            Datori di lavoro: accedete al sito, passate alle impostazioni del profilo e modificate i vostri dati.
          </p>
        </li>
        <li>
          <p>
            <strong>Come posso eliminare il mio account?</strong>
          </p>
          <p>
            Accedete al vostro sito personale e cliccate su Impostazioni del profilo. Una volta sul sito, scorrete verso il basso e vedrete l’opzione Eliminare account. Cliccate su questo link e il vostro account verrà eliminato.
          </p>
        </li>
        <li>
          <p>
            <strong>Ho perso la password. Che devo fare?</strong>
          </p>
          <p>
            Se avete dimenticato o perso la password, cliccate sul pulsante Password dimenticata? sotto il pulsante di accesso. Sarete reindirizzati a un sito dove dovrete inserire l’indirizzo email con cui vi siete registrati; un link di rinnovo della password sarà inviato a questo indirizzo email.
          </p>
        </li>
        <li>
          <p>
            <strong>Come posso contattarvi?</strong>
          </p>
          <p>
            Contattateci usando l’indirizzo email: <a href="mailto:info@talentedeurope.org">info@talentedeurope.org</a>
          </p>
        </li>
        <li>
          <p>
            <strong>Come gli studenti possono contattare i datori di lavoro?</strong>
          </p>
          <p>
            Cliccate sul pulsante Scoprire di più dell’azienda che trovate interessante. Sarete reindirizzati al sito del profilo dell’azienda; là cliccate sul pulsante Vedere dettagli del contatto.
          </p>
        </li>
        <li>
          <p>
            <strong>Come possono i datori di lavoro contattare gli studenti?</strong>
          </p>
          <p>
            Cliccate sul pulsante Scoprire di più dello studente che trovate interessante. Sarete reindirizzati al sito del profilo dello studente; là cliccate sul pulsante Vedere dettagli del contatto.
          </p>
        </li>
        <li>
          <p>
            <strong>Quali dettagli dovrebbe fornire un’azienda per registrarsi?</strong>
          </p>
          <p>
            Nella registrazione, l’azienda dovrebbe fornire tutte le informazioni rilevanti, quali tipo di azienda, nome del titolare, codice fiscale, indirizzo. Inoltre, dovrebbe aggiungere il suo logo e un certificato di autenticità.
          </p>
        </li>
      </ol>

      @elseif (Config::get('app.locale') == 'de')
      <ol>
        <li>
          <p>
            <strong>Was ist Talented Europe?</strong>
          </p>
          <p>
            Es handelt sich um ein Projekt, das von dem Programm Erasmus + der Europäischen Union mitfinanziert wird.
          </p>
          <p>
            Im  Projekt Talented Europe geht es um die zwei Hauptinitiativen der Strategie Europa 2020, konkret Jugend in Bewegung und Agenda für neue Kompetenzen und Beschäftigung. Es geht um ein Instrument, das Studenten mit den Arbeitsgebern verbindet und umgekehrt. Das Ziel ist es, die Karriere- und Praktikumsmöglichkeiten in ganz Europa zu identifizieren, vermitteln und zu erleichtern.
          </p>
        </li>
        <li>
          <p>
            <strong>Wer kann sich unter www.talentedeurope.eu registrieren?</strong>
          </p>
          <p>
            Registrieren kann jeder Student und Arbeitsgeber. Wenn Sie als Arbeitgeber Studenten suchen, dann können Sie bei uns Werbung für Ihr Unternehmen machen. Wenn Sie Studenten / Absolventen sind, die Arbeit suchen, können Sie Ihre Angaben registrieren.
          </p>
        </li>
        <li>
          <p>
            <strong>Muss ich registrieren?</strong>
          </p>
          <p>
            Ja. Wenn es um Studenten geht, bekommen wir anhand des Formulars Informationen  über Ihre Ausbildung, Arbeitserfahrungen und über die Arbeit, die Sie suchen. Den Arbeitsgebern bietet sich ein Möglichkeit mit ihrem Arbeitsgebiet zu werben.
          </p>
        </li>
        <li>
          <p>
            <strong>Warum sollte ich registrieren?</strong>
          </p>
          <p>
            Nach der Registrierung bekommen Sie den Zugang zu hunderten Unternehmen und Studentenprofile, die Ihnen bei der Suche hilft.
          </p>
        </li>
        <li>
          <p>
            <strong>Wie viel kostet die Registrierung?</strong>
          </p>
          <p>
            Die Registrierung ist sowohl für Studenten als auch für Unternehmen kostenlos.
          </p>
        </li>
        <li>
          <p>
            <strong>Wie soll ich registrieren?</strong>
          </p>
          <p>
            Klicken Sie den Button Registrieren an und registrieren Sie.
          </p>
        </li>
        <li>
          <p>
            <strong>Wie kann ich meine Personalangeben, die E-Mail-Adresse oder Password ändern?</strong>
          </p>
          <p>
            Studenten: falls Sie Ihre Personalangaben ändern wollen, melden Sie sich an und klicken Sie Profileinstellungen an, um die Personalangeben zu ändern.
          </p>
          <p>
            Arbeitgeber: Ihre Unternehmensangeben ändern Sie, in dem die Profileinestellungen ansteuern, wo Sie die Angaben ändern können.
          </p>
        </li>
        <li>
          <p>
            <strong>Wie kann ich mein Konto löschen?</strong>
          </p>
          <p>
            Besuchen Sie Ihre Privatseite und steuern Sie dann Profileinstellungen an. Wenn Sie runterscrollen, sehen Sie die Möglichkeit Konto entfernen. Klicken Sie diesen Button an und das Konto wird entfernt.
          </p>
        </li>
        <li>
          <p>
            <strong>Password vergessen, was soll ich machen?</strong>
          </p>
          <p>
            Falls Sie das Password vergessen oder verloren haben, klicken Sie den Button Password vergessen, unter der Einloggen-Zeile, an. Sie werden auf eine andere Seite geleitet, wo Sie Ihre Registrierung - E-Mail-Adresse angeben und Sie erhalten dann einen Link zur Erneuerung des Passwords.
          </p>
        </li>
        <li>
          <p>
            <strong>Wie können wir Sie kontaktieren?</strong>
          </p>
          <p>
            Kontaktieren Sie uns unter der E-Mail-Adresse: <a href="mailto:info@talentedeurope.org">info@talentedeurope.org</a>
          </p>
        </li>
        <li>
          <p>
            <strong>Wie können Studenten die Arbeitgeber kontaktieren?</strong>
          </p>
          <p>
            Bei dem Unternehmen, das Sie interessant finden, kicken Sie den Button „weiter Informationen zeigen“ an. Sie werden auf die Profil-Seite des Unternehmens weitergeleitet. Dort können Sie den Button „weitere Einzelheiten ansehen“ anklicken.
          </p>
        </li>
        <li>
          <p>
            <strong>Wie können Arbeitgeber Studenten kontaktieren?</strong>
          </p>
          <p>
            Bei dem Studenten, den Sie interessant finden, kicken Sie den Button „weiter Informationen zeigen“ an. Sie werden auf die Profil-Seite des Studenten weitergeleitet. Dort können Sie den Button „weitere Einzelheiten ansehen“ anklicken.
          </p>
        </li>
        <li>
          <p>
            <strong>Welche Einzelheiten sollte das Unternehmen angeben, um sich zu registrieren?</strong>
          </p>
          <p>
            Bei der Registrierung, sollte das Unternehmen alle relevanten Informationen angeben, d.h. Typ, Name der Geschäftsführers, Registrierungsnummer, Adresse und weiter das Firmenlogo und  Echtheitszertifikat anbinden.
          </p>
        </li>
      </ol>

      @elseif (Config::get('app.locale') == 'fr')
      <ol>
        <li>
          <p>
            <strong>Qu'est-ce que l'Europe Talentueuse?</strong>
          </p>
          <p>
            Ce projet est cofinancé par l'Union européenne Erasmus Plus.
          </p>
          <p>
            Le projet  l'Europe Talentueuse Erasmus Plus se concentre sur les deux initiatives principales de la stratégie Europe 2020 -  la Jeunesse en mouvement et l'Agenda pour de  nouvelles compétences et les postes de travail .C' est un mécanisme permettant de relier les étudiants avec les employeurs et vice-versa, afin d' identifier, fournir et faciliter les possibilités de carrière et de stages en Europe.
          </p>
        </li>
        <li>
          <p>
            <strong>Qui peut s'inscrire sur www.talentedeurope.eu?</strong>
          </p>
          <p>
            Chaque étudiant ou employeur. Si vous êtes un employeur qui tente d'amener les élèves, vous   pouvez annoncer votre entreprise. Si vous êtes des étudiants / diplômés à la recherche du travail, vous pouvez enregistrer vos coordonnées.
          </p>
        </li>
        <li>
          <p>
            <strong>Suis- je obligé (e) de m'inscrire?</strong>
          </p>
          <p>
            Oui. En ce qui concerne les étudiants, le formulaire d'inscription des étudiants nous donne des informations sur vos études, vos expérience professionnelle et le type de travail que vous recherchez. L'inscription permet aux employeurs d'annoncer leur portée.
          </p>
        </li>
        <li>
          <p>
            <strong>Pourquoi devrais-je  m' inscrire?</strong>
          </p>
          <p>
            Après l'inscription, vous aurez accès à une base de données de centaines d'entreprises et profils d'étudiants qui aidera à trouver exactement ce qu'ils recherchent.
          </p>
        </li>
        <li>
          <p>
            <strong>Quels sont les frais d'enregistrement? </strong>
          </p>
          <p>
            L'inscription est gratuite pour les étudiants et meme pour les entreprises.
          </p>
        </li>
        <li>
          <p>
            <strong>Comment puis-je m'nscrire?</strong>
          </p>
          <p>
            Cliquez sur Enregistrer et enregistrer vos coordonnée.
          </p>
        </li>
        <li>
          <p>
            <strong>Comment puis-je modifier mes informations personnelles, adresse e-mail ou mot de passe?</strong>
          </p>
          <p>
            Les étudiants: si vous souhaitez modifier vos données personnelles, connectez-vous et accédez à vos paramètres de profil pour modifier vos données.
          </p>
          <p>
            Les employeurs: pour modifier les données d'entreprise  ouvrez une session et accédez à vos paramètres de profil, où vous pouvez modifier les données.
          </p>
        </li>
        <li>
          <p>
            <strong>Comment puis-je supprimer mon compte?</strong>
          </p>
          <p>
            Connectez-vous à votre page personnelle, puis cliquez sur les paramètres de profil. Lorsque vous êtes déjà sur la page, faites défiler vers le bas et vous verrez Supprimer le compte. Cliquez sur le lien et votre compte sera supprimé.
          </p>
        </li>
        <li>
          <p>
            <strong>J'ai perdu mon mot de passe, que dois-je faire?</strong>
          </p>
          <p>
            Si vous avez oublié ou perdu votre mot de passe, appuyez sur Mot de passe oublié? Vous allez être redirigé vers une autre page où vous devez entrer votre adresse e-mail que vous avez enregistrée et votre lien de réinitialisation de mot de passe sera alors envoyé à cette adresse e-mail.
          </p>
        </li>
        <li>
          <p>
            <strong>Comment puis-je vous contacter?</strong>
          </p>
          <p>
            Contactez-nous via l'adresse e-mail: <a href="mailto:info@talentedeurope.org">info@talentedeurope.org</a>
          </p>
        </li>
        <li>
          <p>
            <strong>Comment les étudiants peuvent trouver des employeurs?</strong>
          </p>
          <p>
            Lorsque que vous considérez  une entreprise comme intéressante, cliquez sur Afficher des informations supplémentaires. Vous serez redirigé vers la page Profil de l'entreprise, puis cliquez sur Afficher les détails de contact.
          </p>
        </li>
        <li>
          <p>
            <strong>Comment les employeurs peuvent trouver des étudiants?</strong>
          </p>
          <p>
            Cliquez sur Afficher plus aux étudiants que vous considérez comme intéressants. Vous allez être redirigé vers le profil des étudiants, où vous devez cliquer sur Afficher les détails de contact.
          </p>
        </li>
        <li>
          <p>
            <strong>Quels sont les détails que la société devrait fournir lors de l'enregistrement?</strong>
          </p>
          <p>
            Lors de l'enregistrement , l'entreprise doit fournir toutes les informations pertinentes telles que le type, le nom du gestionnaire, le numéro d'enregistrement, l'adresse et également joindre leur logo et un certificat d'authenticité.
          </p>
        </li>
      </ol>

      @elseif (Config::get('app.locale') == 'sk')
      <ol>
        <li>
          <p>
            <strong>Čo je Talented Europe?</strong>
          </p>
          <p>
            Ide o projekt spolufinancovaný programom Erasmus + Európskej únie.
          </p>
          <p>
            Projekt Talented Europe sa v rámci programu Erasmus Plus zameriava na dve hlavné iniciatívy stratégie Európa 2020, konkrétne Mládež v pohybe a Agenda pre nové zručnosti a pracovné miesta. Je to mechanizmus na spájanie študentov so zamestnávateľmi a aj naopak,  s cieľom identifikovať, poskytnúť a uľahčiť kariérne a stážové príležitosti v celej Európe.
          </p>
        </li>
        <li>
          <p>
            <strong>Kto sa môže zaregistrovať na stránke www.talentedeurope.eu?</strong>
          </p>
          <p>
            Zaregistrovať sa môže každý študent alebo zamestnávateľ. Ak ste zamestnávateľ, ktorý sa snaží získať študentov, môžete inzerovať vašu spoločnosť. Ak ste študenti / absolventi hľadajúci prácu, môžete zaregistrovať svoje údaje.
          </p>
        </li>
        <li>
          <p>
            <strong>Musím sa zaregistrovať?</strong>
          </p>
          <p>
            Áno. Pokiaľ ide o študentov, registračný formulár nám poskytuje informácie o vašom vzdelaní, pracovných skúsenostiach a type práce, ktorú hľadáte. Zamestnávateľom registrácia umožňuje inzerovať ich oblasť pôsobnosti.
          </p>
        </li>
        <li>
          <p>
            <strong>Prečo by som sa mal/a zaregistrovať?</strong>
          </p>
          <p>
            Po registrácii získate prístup k databáze stoviek spoločností a študentských profilov, ktorá pomôže nájsť presne to, čo hľadajú.
          </p>
        </li>
        <li>
          <p>
            <strong>Koľko stojí registrácia?</strong>
          </p>
          <p>
            Registrácia je bezplatná pre študentov aj pre firmy.
          </p>
        </li>
        <li>
          <p>
            <strong>Ako sa mám zaregistrovať?</strong>
          </p>
          <p>
            Kliknite na tlačidlo Registrovať a zaregistrovať svoje údaje.
          </p>
        </li>
        <li>
          <p>
            <strong>Ako môžem zmeniť svoje osobné údaje, e-mailovú adresu alebo heslo?</strong>
          </p>
          <p>
            Študenti: ak chcete zmeniť svoje osobné údaje, prihláste sa a prejdite do nastavení profilu, aby ste upravili svoje údaje.
          </p>
          <p>
            Zamestnávatelia: svoje firemné údaje zmeníte tak, že sa prihlásite a prejdete na nastavenia profilu, kde môžete údaje upraviť.
          </p>
        </li>
        <li>
          <p>
            <strong>Ako môžem odstrániť svoj účet?</strong>
          </p>
          <p>
            Navštívte svoju osobnú stránku a potom položku Nastavenia profilu. Keď sa už nachádzate na stránke, prejdite nadol a uvidíte možnosť Odstrániť účet. Kliknite na tento odkaz a váš účet bude odstránený.
          </p>
        </li>
        <li>
          <p>
            <strong>Stratil som heslo, čo mám robiť?</strong>
          </p>
          <p>
            Ak ste zabudli alebo stratili heslo, stlačte tlačidlo Zabudli ste heslo? pod prihlasovacím tlačidlom. Budete presmerovaný na inú stránku, kde by ste mali zadať e-mailovú adresu, na ktorú ste sa zaregistrovali a váš odkaz na obnovenie hesla bude potom odoslaný na túto e-mailovú adresu.
          </p>
        </li>
        <li>
          <p>
            <strong>Ako vás môžem kontaktovať?</strong>
          </p>
          <p>
            Kontaktujte nás prostredníctvom e-mailovej adresy: <a href="mailto:info@talentedeurope.org">info@talentedeurope.org</a>
          </p>
        </li>
        <li>
          <p>
            <strong>Ako môžu študenti kontaktovať zamestnávateľov?</strong>
          </p>
          <p>
            Pri spoločnosti, ktorú považujete za zaujímavú, kliknite na tlačidlo Zobraziť ďalšie informácie. Budete presmerovaný na stránku profilu spoločnosti,  a tam kliknite na tlačidlo Zobraziť podrobnosti o kontakte.
          </p>
        </li>
        <li>
          <p>
            <strong>Ako môžu zamestnávatelia kontaktovať študentov?</strong>
          </p>
          <p>
            Kliknite na tlačidlo Zobraziť viac pri študentovi, ktorého považujete za zaujímavého. Budete presmerovaný na stránku profilu študenta, kde by ste mali kliknúť na tlačidlo Zobraziť podrobnosti o kontakte.
          </p>
        </li>
        <li>
          <p>
            <strong>Aké podrobnosti by spoločnosť mala poskytnúť na to, aby sa zaregistrovala?</strong>
          </p>
          <p>
            Pri registrácii by spoločnosť mala poskytnúť všetky relevantné informácie ako napr. typ, meno konateľa, registračné číslo, adresu,  a ďalej pripojiť svoje logo a osvedčenie o pravosti.
          </p>
        </li>
      </ol>

      @endif
      </div>
    </div>
  </div>
</div>
@endsection
